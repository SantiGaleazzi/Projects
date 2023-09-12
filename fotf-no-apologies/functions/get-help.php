<?php

if ( is_user_logged_in() ) {

	/* Student Get Help */
		/*
	    $args = array(

			'role'    => 'group_leader',
			'orderby' => 'user_nicename',
			'order'   => 'ASC'

		); 

		$users = get_users( $args );

		function filter_group_leader($user) {

			$student = get_user_by('ID', get_current_user_id());

			$student_id = $student->ID;

			return learndash_is_group_leader_of_user($user->ID, $student_id);

		}

		function return_lead_emails($user) {

			return $user->user_email;

		}

		$results = array_filter($users, 'filter_group_leader');
		$emails = implode(',' ,array_map('return_lead_emails', $results)); 
		
		global $current_user;
		wp_get_current_user();

		$studentEmail = (string) $current_user->user_email;

		add_action( 'gform_after_submission_4', 'contact_trainer', 10, 2 );
		function contact_trainer( $entry, $form ) {
		 
			$user_message = (rgar($entry,'1')) ?  rgar($entry,'1') : '';

		}
		
		add_filter( 'gform_notification_4', 'trainer_notification', 10, 3 );
		function trainer_notification( $notification, $form, $entry ) {	

			global $studentEmail; 
			global $emails;
				 	
			$notification['toType'] = 'email';
			$notification['to'] = $emails;	
			$notification['from'] = $studentEmail;	
				 
			return $notification;
		}
		*/



		/* Facilitator Get Help */

		global $facilitatorID;

		$facilitatorID = get_user_by('ID', get_current_user_id());
		$facilitator_id = $facilitatorID->ID;
		$facilitator_email = $facilitatorID->user_email;

		$getRegion = get_field('region', $facilitatorID);		


		$roles = array( 'administrator' );
		foreach( wp_roles()->roles as $role_slug => $role ) {
		    if( ! empty( $role['capabilities']['administrator'] ) ) {
		        $roles[] = $role_slug;
		    }
		}
		$user_ids = get_users( array( 'role__in' => $roles, 'fields' => 'ids' ) );


		foreach ($user_ids as $admin_id) {

			$getRegionAdmin = get_field('region', 'user_'. $admin_id);

			if($getRegionAdmin == $getRegion){
				$user_info = get_userdata($admin_id);
				$user_email = $user_info->user_email;
			}
		}		


		add_action( 'gform_after_submission_6', 'contact_admin_by_region', 10, 2 );
		function contact_admin_by_region( $entry, $form ) {
				 
			$facilitator_message = (rgar($entry,'1')) ?  rgar($entry,'1') : '';

		}
				
		add_filter( 'gform_notification_6', 'admin_notification', 10, 3 );
		function admin_notification( $notification, $form, $entry ) {				

			global $facilitator_email; 
			global $user_email;
				 	
			$notification['toType'] = 'email';
			$notification['to'] = $user_email;	
			$notification['from'] = $facilitator_email;	

						 
			return $notification;			
		}
}



