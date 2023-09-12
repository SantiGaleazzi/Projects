<?php

    /**
     * Function that creates the Theme settings page.
     *
     * @since 1.0
    */
    
    if ( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
			'menu_title' => 'Theme Settings',
			'menu_slug'  => 'theme-settings',
			)
		);

		acf_add_options_sub_page(array(
			'title'      => 'Header',
			'parent'     => 'theme-settings',
			'capability' => 'manage_options',
			)
		);

		acf_add_options_sub_page(array(
			'title' => 'General',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));

		acf_add_options_sub_page(array(
			'title' => 'Footer',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));

		acf_add_options_sub_page(array(
			'title' => 'Culinary Bar',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));
		
		
		acf_add_options_sub_page(array(
			'title' => 'Archive Videos',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));
		
		acf_add_options_sub_page(array(
			'title' => 'Archive Culinary Blog',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));
		
		acf_add_options_sub_page(array(
			'title' => 'Blog Categories Ovens',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));
		
		acf_add_options_sub_page(array(
			'title' => 'Contact Lightbox',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));
		
		acf_add_options_sub_page(array(
			'title' => 'Request Demo Lightbox',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));
		
		acf_add_options_sub_page(array(
			'title' => 'Quiz Lightbox',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));
		
		acf_add_options_sub_page(array(
			'title' => 'Find Representative Lightbox',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));
		
		acf_add_options_sub_page(array(
			'title' => 'Store Sticky Bar',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));
		
		acf_add_options_sub_page(array(
			'title' => 'Store Lightbox',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));

    }
