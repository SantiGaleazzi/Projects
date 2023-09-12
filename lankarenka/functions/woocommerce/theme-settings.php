<?php   

    /*******************
    * WooCommerce Support
    ********************/

    // Remove Default woocommerce Wrapper
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

    // Adds custom wrapper to the content
    add_action('woocommerce_before_main_content', 'lankarenka_wrapper_start', 10);
    add_action('woocommerce_after_main_content', 'lankarenka_wrapper_end', 10);

    function lankarenka_wrapper_start() { echo '<section id="lankarenka">' . '<div class="container">'; }
    function lankarenka_wrapper_end() { echo '</div>' . '</section>'; }

    // Adds WooCommerce Theme Support to the site Theme
    function mytheme_add_woocommerce_support() { add_theme_support( 'woocommerce' ); }

    add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

    // Removes WooCommerce Default Styles
    add_filter( 'woocommerce_enqueue_styles', '__return_false' );

    // Gallery support
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );


    // Remove Sidebar on the products Page
    remove_action( 'woocommerce_sidebar', 'action_woocommerce_sidebar', 10, 2 ); 