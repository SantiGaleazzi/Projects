<?php

//Login Error
	add_action( 'wp_login_failed', 'my_front_end_login_fail' );  // hook failed login

	function my_front_end_login_fail( $username ) {
	   $referrer = $_SERVER['HTTP_REFERER'];  
	   
	   if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
	      wp_redirect( $referrer . '?login=failed#error' );  // let's append some information (login=failed) to the URL for the theme to use
	      exit;
	   }
	}


//Successful Login

	function my_login_redirect( $redirect_to, $request, $user ) {
	    
	    global $user;
	    $url = get_site_url();
		$loginUrl = "".$url."/courses/no-apologies/";

	    if ( isset( $user->roles ) && is_array( $user->roles ) ) {
	    
	        return $loginUrl; 

	    } else {

	        return $redirect_to;
	        
	    }
	}

	add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );


//Hide the admin bar for all the users except for the admin

	add_action('after_setup_theme', 'remove_admin_bar');
	function remove_admin_bar() {
	  if (!current_user_can('administrator') && !is_admin()) {
	    show_admin_bar(false);
	  }
	}
