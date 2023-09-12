<?php
add_action( 'init', 'category_news_tax' );

function category_news_tax() {
    register_taxonomy(
        'category-news',
        'news',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'category-news' ),
            'hierarchical' => true,
        )
    );
}

add_action( 'init', 'create_post_type_news' );
function create_post_type_news() {
    register_post_type( 'news',
        array(
            'labels' => array(
                'name' => __( 'News' ),
                'singular_name' => __( 'news' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'news'),
            'supports' => array('title', 'editor', 'thumbnail'),
            'menu_position' => 8,
            'menu_icon'   => 'dashicons-megaphone'
        )
    );
}