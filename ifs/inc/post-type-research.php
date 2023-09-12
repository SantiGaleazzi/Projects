<?php

	
	function category_research_tax() {

		/* Create Type Taxonomy */
		$args = array(
			'label' => __( 'Type' ),
			'rewrite' => array( 'slug' => 'category-type' ),
			'hierarchical' => true,
		);
		register_taxonomy( 'category-type', array( 'research', 'news', 'experts', 'blog', 'cases' ), $args );

		/* Create Issue Taxonomy */
		$args = array(
			'label' => __( 'Issue' ),
			'rewrite' => array( 'slug' => 'category-issue' ),
			'hierarchical' => true,
		);
		register_taxonomy( 'category-issue', array( 'research', 'news', 'experts', 'blog', 'cases' ), $args );

		/* Create State Taxonomy */
		$args = array(
			'label' => __( 'State' ),
			'rewrite' => array( 'slug' => 'category-state' ),
			'hierarchical' => true,
		);
		register_taxonomy( 'category-state', array( 'research', 'news', 'experts', 'blog', 'cases' ), $args );

		/* Create Case Taxonomy */
		$args = array(
			'label' => __( 'Case' ),
			'rewrite' => array( 'slug' => 'category-case' ),
			'hierarchical' => true,
		);
		register_taxonomy( 'category-case', array( 'research', 'news', 'experts', 'blog', 'cases' ), $args );

	}
	add_action( 'init', 'category_research_tax' );

	function create_post_type_research() {

		register_post_type( 'research',
			array(
				'labels' => array(
					'name' => __( 'Research' ),
					'singular_name' => __( 'research' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'research'),
				'supports' => array('title', 'editor', 'thumbnail', 'excerpt','author'),
				'menu_position' => 30,
				'menu_icon'   => 'dashicons-welcome-write-blog'
			)
		);

	}
	add_action( 'init', 'create_post_type_research' );
