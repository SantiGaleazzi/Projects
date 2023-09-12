<?php 

    /**
     * Function that creates custom post type.
     *
     * @since 1.0
    */
    
    function create_post_type() {

        register_post_type( 'testimonies',

            array(
                'labels' => array(
                    'name' => __( 'Testimonies' ),
                    'singular_name' => __( 'Testimonies' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'testimonies'),
                'supports' => array('title', 'editor', 'thumbnail','excerpt','revisions'),
                'show_in_rest'  => true,
                'menu_position' => 31,
                'menu_icon' => 'dashicons-format-quote'
            )
            
        );
    }
    add_action( 'init', 'create_post_type' );
