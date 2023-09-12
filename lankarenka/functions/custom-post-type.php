<?php 

    /**
     * Function that creates custom post type.
     *
     * @since 1.0
    */
    add_action( 'init', 'create_post_type' );
    function create_post_type() {

        /* Uncomment if you want to use custom post types on your WordPress site.
        register_post_type( 'portfolio',

            array(
                'labels' => array(
                    'name' => __( 'Portfolio' ),
                    'singular_name' => __( 'Portfolio' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'portfolio'),
                'supports' => array('title', 'editor', 'thumbnail','excerpt','revisions'),
                'show_in_rest'  => true,
                'menu_position' => 11,
                'menu_icon' => 'dashicons-portfolio'
            )
            
        );
        */
    }
