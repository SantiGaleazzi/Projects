<?php

    /**
     * Function that enqueue the css, js, google fonts and wp_ajax.
     *
     * @since 1.0
    */
    function add_theme_scripts() {
        
        wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/app.css', array(), laravel_mix_asset( 'assets/css/app.css' ), 'all' );
        wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), laravel_mix_asset( 'assets/js/app.js' ), true );
        wp_enqueue_style( 'google-pt-sans', 'https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );
        wp_enqueue_style( 'google-roboto', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );
        wp_enqueue_style( 'google-roboto-condensed', 'https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;400;700&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );

    }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
