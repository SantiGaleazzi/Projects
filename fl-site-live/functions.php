<?php

/**
 * Digizent functions and definitions
 *
 *
 * @package Digizent
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

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
    'add-async-or-defer-to-scripts.php',
    'add-media-size-column.php',
    'gravity-forms-validations.php',
    'remove-rss-feed.php',
    'change-recovery-mode-email.php',
    'deregister-jquery.php',
    'google-optimize.php',
    'gravity-forms-luminate.php',
    'google-analytics.php',
    'flexformz.php',
    'eu-gdpr.php',
    'remove-wp-oembed-and-wp-json-links.php',
    'duplicate-resources-posts.php',
    'duplicate_page.php',
    'stack-adapt-script.php',
    'add-feathr.php',
    'search-series-episodes.php',
    'search-resources.php',
    'paginator.php',
    'search-anything.php',
    'custom-blocks.php',
    'full-custom-functions.php',
	'theme-support.php'
];

foreach ( $includes as $include ) {

    if ( file_exists( TEMPLATEPATH . "/functions/" . $include ) ) {

        require_once( TEMPLATEPATH."/functions/".$include );

    }

}
