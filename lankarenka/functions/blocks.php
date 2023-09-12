<?php

    /**
     * Function that register Advanced Custom Fields blocks.
     *
     * @since 1.0
    */
    add_action('acf/init', 'custom_blocks_init');
    function custom_blocks_init() {

        if( function_exists('acf_register_block') ) {

            /* Uncomment if you want to use blocks on your WordPress Theme
            acf_register_block(array(
                'name'              => 'overview',
                'title'             => __('Overview'),
                'description'       => __('A custom overview block.'),
                'render_template'   => 'blocks/filename.php',
                'category'          => 'formatting',
                'icon'              => 'admin-comments',
                'mode'              => 'edit',
                'keywords'          => array( 'overview')
            ));
            */
        }
    }
