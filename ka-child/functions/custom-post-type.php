<?php 

    /**
     * Function that creates custom post type.
     *
     * @since 1.0
    */
    
    function create_post_type() {
        
        register_post_type( 'team-members',

            array(
                'labels' => array(
                    'name' => __( 'Team Members' ),
                    'singular_name' => __( 'Team Members' )
                ),
                'public' => true,
                'hierarchical' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'menu_position' => 5,
                'menu_icon' => 'dashicons-portfolio',
                'show_in_rest'  => true,
                'has_archive' => true,
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author'),
                'rewrite' => array('slug' => 'team-members'),
            )
            
        );

    }
    add_action( 'init', 'create_post_type');
