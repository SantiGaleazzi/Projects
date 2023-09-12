<?php 

    /**
     * Function that creates custom post type.
     *
     * @since 1.0
    */
    
    function create_post_type() {

        register_post_type( 'portfolio',
			array(
                'labels' => array(
                    'name' => __( 'Portfolio' ),
                    'singular_name' => __( 'Portfolio' )
                ),
                'public' => true,
				'hierarchical' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position'	=> 5,
                'menu_icon' => 'dashicons-portfolio',
				'show_in_rest' => true,
                'has_archive' => true,
                'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'author', ),
                'rewrite' => array( 'slug' => 'portfolio' ),
            )
        );

    }
    add_action( 'init', 'create_post_type' );

	function create_taxonomies() {

       	register_taxonomy( 'work-type', 'portfolio', array(
            'labels' => array(
                'name' => 'Type' ,
                'singular_name' => 'Type',
			),
			'public' => true,
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'work-type' )
        ));

		register_taxonomy( 'industries', 'portfolio', array(
            'labels' => array(
                'name' => 'Industries' ,
                'singular_name' => 'Industry',
			),
			'public' => true,
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_rest' => true,
			'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array( 'slug' => 'industries' )
        ));
        
    }
    add_action( 'init', 'create_taxonomies' );
