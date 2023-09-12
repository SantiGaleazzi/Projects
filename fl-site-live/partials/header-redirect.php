<?php
    
    $redirect_page = get_field('redirect_page');

    $add_url = get_field('add_url');

    if ( $redirect_page && $add_url ) {

        wp_redirect( $add_url , 301 );
        
        exit;

    }
