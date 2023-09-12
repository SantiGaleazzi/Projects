<?php

    /**
     * Adds preload to enqueued styles
     *
     * Use this function to add preload attributy to your styles files.
     * This function has been created to follow Google's Lighthouse performance recommendations.
     *
     *
     * @since 1.0.0
     *
     * @param string $handle refers to the enqueued file on the WordPress 
     */
    // 
    function styles_preload_attribute ( $tag, $handle ) {
        
        if ( $handle === 'custom-style' ) {
            
            if ( stripos( $tag, "rel='preload'" ) === false ) {
                
                $tag = str_replace( "rel='stylesheet'", "rel='preload stylesheet' importance='high'", $tag );
                $tag = str_replace( "media='all'", "media='all' as='style'", $tag );
                
            }
            
        }
        
        return $tag;
        
    }
    add_filter('style_loader_tag', 'styles_preload_attribute', 10, 2);
