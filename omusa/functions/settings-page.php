<?php

    /**
     * Function that creates the Theme settings page.
     *
     * @since 1.0
    */
    if ( function_exists('acf_add_options_page') ) {

    	acf_add_options_page( array(
        	'menu_title'  => 'Theme Settings',
        	'menu_slug'   => 'theme-settings'
      	));

		acf_add_options_page(array(
			'title' => 'Menu',
			'parent' => 'theme-settings',
			'menu_slug'   => 'menu'
		));

        acf_add_options_page(array(
            'title' => 'Header',
            'parent' => 'theme-settings',
            'menu_slug'   => 'header'
        ));

		acf_add_options_page(array(
			'title' => 'Footer',
			'parent' => 'theme-settings',
			'menu_slug'   => 'footer'
		));

		acf_add_options_page(array(
			'title' => 'Default Post Image',
			'parent' => 'theme-settings',
			'menu_slug'   => 'post-image'
		));

		acf_add_options_page(array(
			'title' => 'Support Copy',
			'parent' => 'theme-settings',
			'menu_slug'   => 'support'
		));

		acf_add_options_sub_page(array(
			'title' => 'Pray',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));

		acf_add_options_sub_page(array(
			'title' => 'Short-Term Settings',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));

		acf_add_options_sub_page(array(
			'title' => 'Long-Term Settings',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));

		acf_add_options_sub_page(array(
			'title' => 'Quiz Settings',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));

		acf_add_options_sub_page(array(
			'title' => 'Virtuous Settings',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));

		acf_add_options_sub_page(array(
			'title' => 'Lightboxes',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));

		acf_add_options_sub_page(array(
			'title' => 'Internships',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));

		acf_add_options_sub_page(array(
			'title' => 'Home Banner',
			'parent' => 'theme-settings',
			'capability' => 'manage_options'
		));
      
    }
