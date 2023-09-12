<?php
add_action( 'init', 'create_post_type_event' );
function create_post_type_event() {
    register_post_type( 'events',
        array(
            'labels' => array(
                'name' => __( 'Events' ),
                'singular_name' => __( 'Event' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'supports' => array('title', 'editor', 'thumbnail','excerpt','revisions'),
            'show_in_rest'  => true,
            'menu_position' => 11,
            'menu_icon' => 'dashicons-calendar-alt'
        )
    );
}
