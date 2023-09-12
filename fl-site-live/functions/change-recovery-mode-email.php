<?php

    /**
	 * It changes the email address that the recovery mode email is sent to
	 * 
	 * @param email The email address to send the email to.
	 * 
	 * @return The email address that the recovery mode email is being sent to.
	 */
	function change_recovery_mode_email ( $email ) {

        $email['to'] = 'wp-admin@mysitebuild.com';

        return $email;

    }
    add_filter( 'recovery_mode_email', 'change_recovery_mode_email' );
