<?php
add_action( 'init', 'create_post_type_resources' );
function create_post_type_resources() {
    register_post_type( 'resources',
        array(
            'labels' => array(
                'name' => __( 'Resources' ),
                'singular_name' => __( 'Resource' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'resources'),
            'supports' => array('title', 'editor', 'thumbnail','excerpt','revisions'),
            'show_in_rest'  => true,
            'menu_position' => 8,
            'menu_icon' => 'dashicons-archive'
        )
    );
}
