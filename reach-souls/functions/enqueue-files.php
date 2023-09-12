<?php

    /**
     * Function that enqueue the css, js, google fonts and wp_ajax.
     *
     * @since 1.0
    */
    
    function add_theme_scripts() {

        wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/app.css', array(), laravel_mix_asset( 'assets/css/app.css' ), 'all' );
        wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/app.js', array(), laravel_mix_asset( 'assets/js/app.js' ), true );
        wp_localize_script( 'custom-js', 'wp_ajax_custom', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
        wp_enqueue_style( 'google-fonts-inter', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );

    }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
