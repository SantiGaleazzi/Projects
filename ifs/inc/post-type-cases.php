<?php

	function create_post_type_cases() {

		register_post_type( 'cases',
			array(
				'labels' => array(
					'name' => __( 'Cases' ),
					'singular_name' => __( 'case' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'cases'),
				'supports' => array('title', 'editor', 'thumbnail','excerpt','author'),
				'menu_position' => 30,
				'menu_icon'   => 'dashicons-category'
			)
		);
		
	}
	add_action( 'init', 'create_post_type_cases' );
