<?php

    // This function sets a default compatibility when a new post is created.
    function short_opportunities_default_compatibility( $post_id, $post, $update ) {

        if ( $post->post_type == 'short-term' ) {

            wp_set_object_terms( $post_id, 'Individuals', 'short-remote-compatibility' );
            
        }

    }
    add_action( 'save_post', 'short_opportunities_default_compatibility', 30, 3 );