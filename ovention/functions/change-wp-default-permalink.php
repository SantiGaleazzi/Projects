<?php

/**
 * Override WordPress default post args
 */
add_filter('register_post_type_args', 'change_wp_default_blog', 10, 2 );
function change_wp_default_blog($args, $post_type) {
  if ($post_type !== 'post') {

    return $args;

  }

  $args['rewrite'] = [
      'slug' => 'blog',
      'with_front' => true,
  ];

  return $args;
  
}

/**
 * Override WordPress default permalinke structure
 */
add_filter( 'pre_post_link', 'change_wp_default_permalink', 10, 2);
function change_wp_default_permalink($permalink, $post) {
  
  if ($post->post_type !== 'post') {

      return $permalink;

  }

  return '/blog/%postname%/';
  
}