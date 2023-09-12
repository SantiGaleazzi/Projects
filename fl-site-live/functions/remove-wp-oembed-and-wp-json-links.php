<?php

//Remove the wp-embed scripts
	function deregister_embed_scripts(){
	    wp_dequeue_script( 'wp-embed' );
	}
	add_action( 'wp_footer', 'deregister_embed_scripts' );

	// Remove the REST API endpoint.
	remove_action( 'rest_api_init', 'wp_oembed_register_route' );
	// Turn off oEmbed auto discovery.
	add_filter( 'embed_oembed_discover', '__return_false' );
	// Don't filter oEmbed results.
	remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
	// Remove oEmbed discovery links.
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	// Remove oEmbed-specific JavaScript from the front-end and back-end.
	remove_action( 'wp_head', 'wp_oembed_add_host_js' );
	//Remove the rest API Output on header.
	remove_action( 'wp_head',     'rest_output_link_wp_head'  );
	//Remove the rest API Link Output on header.
	remove_action( 'template_redirect', 'rest_output_link_header', 11 );
