<?php
add_action( 'init', 'create_post_type_experts' );
function create_post_type_experts() {
    register_post_type( 'experts',
        array(
            'labels' => array(
                'name' => __( 'Expert Analysis' ),
                'singular_name' => __( 'expert' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'expert-analysis'),
            'supports' => array('title', 'editor', 'thumbnail','excerpt','author'),
            'menu_position' => 30,
            'menu_icon'   => 'dashicons-awards'
        )
    );
}