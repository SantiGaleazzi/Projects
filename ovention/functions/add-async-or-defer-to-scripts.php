<?php

    /**
     * Adds async or defer attributes to enqueued scripts
     *
     * Use this function to add async property to your script files.
     * This function has been created to follow Google's Lighthouse performance recommendations.
     *
     *
     * @since 1.0.0
     *
     * @param string $handle refers to the enqueued file on the WordPress 
     */
    // 
    function styless_and_script_loader_tag ( $tag, $handle ) {
        
        if ( $handle === 'custom-js' ) {
            
            if ( false === stripos( $tag, 'defer' ) ) {
                
                $tag = str_replace(' src', ' defer src', $tag );
                
            }

			/*
            * Uncomment this statement if you want to add 'async' to your script file.
            if ( false === stripos( $tag, 'async' ) ) {
                
                $tag = str_replace( ' src', ' async="async" src', $tag );
                
            }
			*/
            
        }
		
		if ( $handle === 'user-to-datalayer' ) {

			if ( false === stripos( $tag, 'async' ) ) return str_replace( ' src', ' async="async" src', $tag );

		}
        
        return $tag;
        
    }
    add_filter( 'script_loader_tag', 'styless_and_script_loader_tag', 10, 2 );
