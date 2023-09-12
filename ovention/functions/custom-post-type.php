<?php 

    /**
     * Function that creates custom post type.
     *
     * @since 1.0
    */
    
    function create_post_type() {

        register_post_type( 'oven',
			array(
				'labels' => array(
					'name' => __( 'Ovens' ),
					'singular_name' => __( 'oven' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'oven'),
				'supports' => array('title', 'page-attributes', 'editor','excerpt', 'post-thumbnails', 'thumbnail'),
				'taxonomies' => array('category-oven'),
				'show_in_rest' => true
			)
		);

		register_post_type( 'calculator',
			array(
			'labels' => array(
				'name' => __( 'Calculator' ),
				'singular_name' => __( 'Calculator' ),
				'add_new' => __( 'Add New Oven' ),
				'edit_item' => __( 'Edit Oven' ),
			),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => 'calculator'),
			'menu_icon'   => 'dashicons-admin-settings',
			'supports' => array('title'),
			'menu_position' => 6,
			)
		);

		register_post_type( 'videos',
			array(
				'labels' => array(
					'name' => __( 'Videos' ),
					'singular_name' => __( 'videos' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'videos'),
				'supports' => array('title', 'page-attributes', 'editor','excerpt', 'post-thumbnails', 'thumbnail'),
				'taxonomies' => array('category-videos'),  
			)
		);

    }
    add_action( 'init', 'create_post_type' );


	/**
	 * It registers a new taxonomy called category-oven, which is hierarchical (like categories) and is for
	 * the oven custom post type
	 */
	function register_taxonomies() {

		register_taxonomy(
			'category-oven',
			'oven',
			array(
				'labels' => array(
					'name' => 'Category',
					'singular_name' => 'Category',
					'search_items' =>  'Search Category',
					'all_items' => 'All Category',
					'parent_item' => 'Parent Category',
					'parent_item_colon' => 'Parent Category:',
					'edit_item' => 'Edit Category',
					'update_item' => 'Update Category',
					'add_new_item' => 'Add New Category',
					'new_item_name' => 'New Category'
				),
				'rewrite' => array( 'slug' => 'category-oven' ),
				'hierarchical' => true,
				'show_ui' => true,
				'query_var' => true,
			)
		);

		register_taxonomy(
			'category-videos',
			'videos',
			array(
				'label' => __( 'Category' ),
				'rewrite' => array( 'slug' => 'category-videos' ),
				'hierarchical' => true,
			)
		);

	}
	add_action( 'init', 'register_taxonomies' );
