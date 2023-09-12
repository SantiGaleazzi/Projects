<?php
add_action( 'init', 'create_post_type_blog' );
function create_post_type_blog() {
    register_post_type( 'blog',
        array(
            'labels' => array(
                'name' => __( 'Blog' ),
                'singular_name' => __( 'blog' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'blog'),
            'supports' => array('title', 'editor', 'thumbnail','excerpt','author'),
            'menu_position' => 30,
            'menu_icon'   => 'dashicons-format-chat',
        )
    );
}