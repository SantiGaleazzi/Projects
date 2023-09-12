<?php

    /**
     * Function that enqueue the css, js, google fonts and wp_ajax.
     *
     * @since 1.0
    */
    function add_theme_scripts() {

        if ( ! ( is_post_type_archive( 'recipes' ) or is_page_template( 'template-app_login.php' ) or is_page_template( 'template-app-registration.php' ) ) ) {

			wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/app.css', array(), laravel_mix_asset( 'assets/css/app.css' ), 'all' );
			
		}

		if ( ! ( is_post_type_archive( 'recipes' ) or is_page_template( 'template-app_login.php' ) or is_page_template( 'template-app-registration.php' ) or is_page_template( 'template-app-reset.php' ) ) ) {

			wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/assets/js/app.js', array(), laravel_mix_asset( 'assets/js/app.js' ), true );

		}

		wp_enqueue_style( 'google-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );

    }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
