<?php

    /**
     * Function that register custom navigation on a WordPress Theme.
     *
     * @since 1.0
    */
    register_nav_menus(
		array(
			'header_main_menu'      => 'Header Menu',
			'header_top_menu'       => 'Header Top Menu',
			'footer_menu'           => 'Footer Menu',
			'header_main_menu_shop' => 'Shop Menu',
		)
	);

    $file = TEMPLATEPATH . "/inc/extends-nav.php";

    if ( file_exists( $file ) ) {
        
        require_once( $file );

    }

	$file = TEMPLATEPATH . '/inc/extends-nav-header.php';

	if ( file_exists( $file ) ) {

		require_once $file;
		
	}
