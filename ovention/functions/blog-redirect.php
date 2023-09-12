<?php

	remove_filter( 'template_redirect','redirect_canonical' );
	add_action( 'template_redirect', 'redirect_to_new_blog_page' );

	function redirect_to_new_blog_page() {

		global $wp_query;

		$protocol = isset( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
		$requested_link = $protocol . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

		$post_found = url_to_postid( $requested_link );

		if ( strpos($requested_link, 'blog') != false ) {

			$post_found = url_to_postid( $requested_link );

			if ( $post_found == 0 ) {

				$blog_url = $protocol . "://$_SERVER[HTTP_HOST]" . '/blog' . "$_SERVER[REQUEST_URI]";
				$blog_post_id  = url_to_postid( $blog_url );
			
				if ( $blog_post_id ) {
			
					exit( wp_redirect( $blog_url, 301) );
			
				}
			
				$wp_query->set_404();
			
				status_header( 404 );
			
				get_template_part( 404 );
			
				exit();
		
			}

		}

	}
