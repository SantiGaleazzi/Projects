<?php 

	/**
	 * Function that automatically adds image meta description to WordPress image.
	 *
	 * @since 1.0
	 */
	
	function add_meta_image_upload ( $postID ) {

		if ( wp_attachment_is_image( $postID ) ) {

			$imageTitle = get_post( $postID )->post_title;
			$sanitizeImageTitle = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $imageTitle );
			$sanitizeImageTitle = ucwords( strtolower( $sanitizeImageTitle ) );

			$imageMeta = array(
				'ID'		    => $postID,	
				'post_title'	=> $sanitizeImageTitle,
				'post_excerpt'	=> $sanitizeImageTitle,
				'post_content'	=> $sanitizeImageTitle,
			);

			// Set the image Alt-Text
			update_post_meta( $postID, '_wp_attachment_image_alt', $sanitizeImageTitle );

			// Set the image meta (e.g. Title, Excerpt, Content)
			wp_update_post( $imageMeta );

		}
		
	}
	add_action( 'add_attachment', 'add_meta_image_upload' );
