<?php

    /**
     * Functions that hides the users from the REST API.
     * This will only show the users when the user is authenticated.
     *
     * @since 1.0
    */
    add_filter( 'rest_authentication_errors', function( $result ) {
        
        if ( ! empty( $result ) ) {
            return $result;
        }
    
        if ( ! is_user_logged_in() ) {
            return new WP_Error( 'rest_not_logged_in', 'You are not currently logged in.', array( 'status' => 401 ) );
        }
    
        return $result;
    
    });