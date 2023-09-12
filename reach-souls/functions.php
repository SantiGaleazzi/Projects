<?php

	/**
	 * Theme Functions
	 *
	 * @since 2.0
	 */

	$includes = [
		'laravel-mix-asset.php',
		'add-async-or-defer-to-scripts.php',
		'add-rel-preload-to-styles.php',
		'add-meta-image-upload.php',
		'icons.php',
		'enqueue-files.php',
		'custom-post-type.php',
		'menu.php',
		'remove-wordpress-styles.php',
		'remove-wp-json-oembed.php',
		'protected-api.php',
		'svg-format-support.php',
		'add-media-size-column.php',
		'change-recovery-mode-email.php',
		'acf-site-settings.php',
		'acf-blocks.php',
		'gf-class-submission-limit.php',
		'gf-submition-limit.php',
		'gf-validations.php',
		'theme-support.php',
		'shortcode-current-year.php',
		'body-donation-button.php'
	];

	foreach ( $includes as $include ) {

		if ( file_exists( TEMPLATEPATH . "/functions/" . $include ) ) {

			require_once( TEMPLATEPATH . "/functions/" . $include );

		}

	}
