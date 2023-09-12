<?php

add_action( 'init', 'create_post_type_news' );
function create_post_type_news() {
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'new' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'news'),
            'supports' => array('title', 'editor', 'thumbnail','excerpt','author'),
            'menu_position' => 30,
            'menu_icon'   => 'dashicons-megaphone'
        )
    );
}