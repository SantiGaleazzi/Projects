<?php

	/**
	 * If the user is not in the admin area and is searching, then order the results by post type, with
	 * products first, posts second, and everything else third
	 * 
	 * @param orderby The column to sort by.
	 * 
	 * @return the  variable.
	 */
	function order_search_by_posttype( $orderby ) {

		if ( !is_admin() && is_search() ) {

			global $wpdb;

			$orderby =
				"
				CASE WHEN {$wpdb->prefix}posts.post_type = 'product' THEN '1'
					WHEN {$wpdb->prefix}posts.post_type = 'post' THEN '2'
				ELSE {$wpdb->prefix}posts.post_type END ASC, 
				{$wpdb->prefix}posts.post_title ASC";

		}

		return $orderby;

	}

	add_filter( 'posts_orderby', 'order_search_by_posttype' );
