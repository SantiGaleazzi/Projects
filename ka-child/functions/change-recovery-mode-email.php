<?php

    function change_recovery_mode_email ( $email ) {

        $email['to'] = 'wp-admin@mysitebuild.com';

        return $email;

    }
    add_filter( 'recovery_mode_email', 'change_recovery_mode_email' );
