<?php

    /**
     * Function that creates the Theme settings page.
     *
     * @since 1.0
    */
    if ( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
            'menu_title'  => 'Theme Settings',
            'menu_slug'   => 'theme-settings'
        ));

        acf_add_options_sub_page(array(
            'title' => 'Header',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

        acf_add_options_sub_page(array(
            'title' => 'Featured Content',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

        acf_add_options_sub_page(array(
            'title' => 'Action Bar',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

        acf_add_options_sub_page(array(
            'title' => 'Header Archive',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

        acf_add_options_sub_page(array(
            'title' => 'Form Single',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

        acf_add_options_sub_page(array(
            'title' => 'Footer',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));
        
    }
