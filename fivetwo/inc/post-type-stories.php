<?php
add_action( 'init', 'create_post_type_stories' );
function create_post_type_stories() {
    register_post_type( 'stories',
        array(
            'labels' => array(
                'name' => __( 'Stories Of Success' ),
                'singular_name' => __( 'Story' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'stories'),
            'supports' => array('title', 'editor', 'thumbnail','excerpt','revisions'),
            'show_in_rest' => true,
            'menu_position' => 9,
            'menu_icon' => 'dashicons-heart'
        )
    );
}
