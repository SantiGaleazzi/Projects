<?php

    /**
     * Function that register custom navigation on a WordPress Theme.
     *
     * @since 1.0
    */
    register_nav_menus( array(
        'header_menu' => 'Header Menu',
		'preheader_menu' => 'Preheader Menu',
        'footer_menu' => 'Footer Menu'
    ));

    $file = TEMPLATEPATH."/inc/extends-nav.php";

    if ( file_exists( $file ) ) {
        
        require_once( $file );

    }
