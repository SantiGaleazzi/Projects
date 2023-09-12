<?php

    /**
     * Function that creates the Theme settings page.
     *
     * @since 1.0
    */
    if( function_exists('acf_add_options_page') ) {

        acf_add_options_page(array(
            'menu_title'  => 'Theme Settings',
            'menu_slug'   => 'theme-settings'
        ));

        acf_add_options_sub_page(array(
            'title' => 'WooCommerce',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));
       
        acf_add_options_sub_page(array(
            'title' => 'Payment Gateway',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

        acf_add_options_sub_page(array(
            'title' => 'NewsLetter',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

        acf_add_options_sub_page(array(
            'title' => 'Sale Banner',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

        acf_add_options_sub_page(array(
            'title' => 'Lightbox Settings',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

        acf_add_options_sub_page(array(
            'title' => '404',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

        acf_add_options_sub_page(array(
            'title' => 'WhatsApp',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

        acf_add_options_sub_page(array(
            'title' => 'Footer',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

    }
