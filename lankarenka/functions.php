<?php

/**
 * Theme Functions
 *
 * @since 1.0
 */
$includes = [
    'laravel-mix-asset.php',
    'add-meta-image-upload.php',
    'icons.php',
    'enqueue-files.php',
    'custom-post-type.php',
    'settings-page.php',
    'menu.php',
    'blocks.php',
    'remove-wordpress-styles.php',
    'protected-api.php',
    'svg-format-support.php',
    'add-async-or-defer-to-scripts.php'
];

foreach ($includes as $include) {

    if ( file_exists(TEMPLATEPATH."/functions/".$include) ) {
        require_once( TEMPLATEPATH."/functions/".$include );
    }
}

/**
 * Enables feature image on posts.
 *
 * @since 1.0
*/
add_theme_support( 'post-thumbnails' );

add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );
function spinner_url( $image_src, $form ) {
    return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
}

/*******************
* WooCommerce
********************/
$woocommerce_settings = [
    'add-to-cart-refresh.php',
    'theme-settings.php',
    'remove-breadcrumbs.php',
    'quantity-buttons.php'
];
foreach ($woocommerce_settings as $settings) {

    if ( file_exists(TEMPLATEPATH."/functions/woocommerce/".$settings) ) {
        require_once( TEMPLATEPATH."/functions/woocommerce/".$settings );
    }
}
