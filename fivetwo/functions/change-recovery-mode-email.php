<?php

add_filter( 'recovery_mode_email', 'change_recovery_mode_email', 10, 2 );
function change_recovery_mode_email( $email, $url ) {
    $email['to'] = 'wp-admin@mysitebuild.com';
    return $email;
}
