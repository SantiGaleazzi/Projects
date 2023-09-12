<?php

    /**
     * Function that creates custom post type for the USA States.
     *
     * @since 1.0
    */
    add_action( 'init', 'create_post_type' );
    function create_post_type() {

        register_post_type( 'states',
            array(
                'labels' => array(
                    'name' => __( 'States' ),
                    'singular_name' => __( 'State' ),
                    'add_new' => __( 'Add New State' ),
                    'edit_item' => __( 'Edit State' ),
                    'view_item' => __( 'View State' ),
                    'view_items' => __( 'View States' )
                ),
                'public' => true,    
                'has_archive' => true,
                'rewrite' => array('slug' => 'states'),          
                'supports'  => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'author' ),
                'show_in_rest'  => true,
                'menu_icon' => 'dashicons-admin-site-alt2'
            )
            
        );

    }

    add_action( 'init', 'create_post_type_states' );
    function create_post_type_states() {

        register_post_type( 'anti-slapp-states',
            array(
                'labels' => array(
                    'name' => __( 'Anti Slapp Report States' ),
                    'singular_name' => __( 'Anti Slapp Report State' ),
                    'add_new' => __( 'Add New Anti Slapp Report State' ),
                    'edit_item' => __( 'Edit Anti Slapp Report State' ),
                    'view_item' => __( 'View Anti Slapp Report State' ),
                    'view_items' => __( 'View Anti Slapp Report States' )
                ),
                'public' => true,    
                'has_archive' => true,
                'rewrite' => array('slug' => 'anti-slapp-states'),          
                'supports'  => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'author' ),
                'show_in_rest'  => true,
                'menu_icon' => 'dashicons-admin-site-alt'
            )
            
        );

    }