<?php

    // This functions allows us to view future/scheduled post even after logged out.
    // This function only works for short-term post types.
    add_filter('get_post_status', 'make_future_posts_visible', 10, 2);

    function make_future_posts_visible( $post_status, $post ) {

        if ( $post->post_type == 'short-term' && $post_status == 'future' ) {

            return 'publish';

        }

        return $post_status;

    }