<?php

    /**
     * Function that register Advanced Custom Fields blocks.
     *
     * @since 1.0
    */
    function custom_blocks_init() {

        if ( function_exists( 'acf_register_block' ) ) {

            acf_register_block(array(
                'name'              => 'background-with-text',
                'title'             => __('Background with text'),
                'description'       => __('Background with text'),
                'render_template'   => 'blocks/background-with-side-text.php',
                'category'          => 'layout',
                'icon'              => 'format-image',
                'mode'              => 'edit',
                'keywords'          => array( 'background', 'text' )
            ));

            acf_register_block(array(
                'name'              => 'video-slider',
                'title'             => __('Video Slider'),
                'description'       => __('A video slider from resources posts'),
                'render_template'   => 'blocks/video-slider.php',
                'category'          => 'layout',
                'icon'              => 'format-video',
                'mode'              => 'edit',
                'keywords'          => array( 'video', 'slider' )
            ));

            acf_register_block(array(
                'name'              => 'series',
                'title'             => __('Series'),
                'description'       => __('A series slider from resources posts'),
                'render_template'   => 'blocks/series.php',
                'category'          => 'layout',
                'icon'              => 'video-alt3',
                'mode'              => 'edit',
                'keywords'          => array( 'series', 'video', 'slider' )
            ));

            acf_register_block(array(
                'name'              => 'main-slider',
                'title'             => __('Main Slider'),
                'description'       => __('A Main Slider'),
                'render_template'   => 'blocks/main-slider.php',
                'category'          => 'layout',
                'icon'              => 'format-gallery',
                'mode'              => 'edit',
                'keywords'          => array( 'banner', 'slider' )
            ));

        }

    }
    add_action( 'acf/init', 'custom_blocks_init' );
