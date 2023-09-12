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
		'remove-wp-json-oembed.php',
		'gf-group-management.php',
		'login.php',
		'deregister-jquery.php',
		'get-help.php',
		'lms-wrapper-class.php'
	];

	foreach ( $includes as $include ) {

		if ( file_exists( TEMPLATEPATH . "/functions/" . $include ) ) {

			require_once( TEMPLATEPATH . "/functions/" . $include );

		}

	}

	add_action( 'gform_user_registration_add_option_group', 'add_custom_group', 10, 3 );
	function add_multisite_section( $config, $form, $is_validation_error ) {
	    ?>
	 
	    <div class="margin_vertical_10">
	        <label class="left_header"><?php _e("Send Email?", "gravityformsuserregistration"); ?> <?php gform_tooltip("user_registration_notification") ?></label>
	        <input type="checkbox" id="gf_user_registration_notification" name="gf_user_registration_notification" value="1" <?php echo ($config["meta"]["notification"] == 1 || !isset($config["meta"]["notification"])) ? "checked='checked'" : ""?> />
	        <label for="gf_user_registration_notification" class="checkbox-label"><?php _e("Send this password to the new user by email.", "gravityformsuserregistration"); ?></label>
	    </div> <!-- / send email? -->
	 
	    <?php
	}
