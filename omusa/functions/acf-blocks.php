<?php

    /**
     * Function that register Advanced Custom Fields blocks.
     *
     * @since 1.0
    */
    function custom_blocks_init() {

        if ( function_exists('acf_register_block') ) {

            /* acf_register_block(array(
                'name'              => 'tite-with-button',
                'title'             => __('Title with Button'),
                'description'       => __('A custom title with button block.'),
                'category'          => 'layout',
                'icon'              => 'id',
                'keywords'          => array( 'title', 'button' ),
                'mode'              => 'edit',
                'render_template'   => 'blocks/title-with-button.php'
            ));
            */
            
        }

    }
	add_action( 'acf/init', 'custom_blocks_init' );
