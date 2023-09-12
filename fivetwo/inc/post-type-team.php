<?php
add_action( 'init', 'create_post_type_team' );
function create_post_type_team() {
    register_post_type( 'team',
        array(
            'labels' => array(
                'name' => __( 'Team' ),
                'singular_name' => __( 'Team' )
            ),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'team'),
            'supports' => array('title', 'editor', 'thumbnail','excerpt','revisions'),
            'show_in_rest'  => true,
            'menu_position' => 10,
            'menu_icon' => 'dashicons-universal-access'
        )
    );
}
