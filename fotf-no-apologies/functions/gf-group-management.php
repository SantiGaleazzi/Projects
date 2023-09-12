<?php 
	
	add_action( 'gform_after_submission_5', 'enroll_users', 10, 2 );
	function enroll_users( $entry, $form ) {
		 
		$number_of_new_users = (rgar($entry,'6')) ?  rgar($entry,'6') : '';

		$group = $_COOKIE['group'];
		$users = $number_of_new_users;
		$users_array = [];

		function initials($str) {
		    $ret = '';
		    $str = 0;
		    $word = 0;
		    foreach (explode(' ', $str) as $word) {
		      $ret .= strtoupper($word[0]);
		    }
		    return $ret;
		}

		function create_single_user($username, $password, $number, &$users_array) {
		    $keyword = $username.'_'.$number;
		    $email =  $keyword."@noapologies.com";
		    $new_user_id = wp_create_user($keyword, $keyword, $email);
		    $user = get_user_by( 'ID', $new_user_id );
		    $user->add_role('subscriber');
		    $users_array[] = [
		    	'user_name' => $keyword,
		        'password' => $keyword,
		        'user_email' => $email
		    ];
		    return $new_user_id;
		}

		function enrol_user_to_group($user_id, $group_id) {
			learndash_set_users_group_ids( $user_id, [$group_id] );
		}

		function create_bulk_users($group_id, $number_of_users, $offset, $users_array) {
	    	$group_name = get_the_title($group_id);
	    	$initals = initials(preg_replace('/\d/', '', $group_name));
	    	$date = wp_date('m-d-Y');
	    	$prefix = $initals.'_'.$group_id.'_'.$date;
	    	$limit = $offset + $number_of_users;
	    	for ($offset; $offset < $limit; $offset++) {
	        	$new_user = create_single_user(
		            $prefix, 
		            $prefix, 
		            $offset+1,
		            $users_array, 
	        	);
	        	enrol_user_to_group($new_user, $group_id); 
	    	}   
	    	//var_dump($users_array);
	  	}
	  
		$total_users = learndash_get_groups_user_ids( $group, false );
		$offset = count($total_users);
		create_bulk_users($group, $users, $offset+1, []);

	}
