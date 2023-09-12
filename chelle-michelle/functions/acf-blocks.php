<?php

    /**
     * Function that register Advanced Custom Fields blocks.
     *
     * @since 1.0
    */

    function custom_blocks_init() {

        if ( function_exists( 'acf_register_block' ) ) {

            acf_register_block(array(
                'name'              => 'any-video',
                'title'             => __('Any Video'),
                'description'       => __('A custom any video block.'),
                'render_template'   => 'blocks/any-video.php',
                'category'          => 'formatting',
                'icon'              => 'video-alt2',
                'mode'              => 'edit',
                'keywords'          => array( 'video', 'any video')
            ));

        }
		
    }
    add_action('acf/init', 'custom_blocks_init');
