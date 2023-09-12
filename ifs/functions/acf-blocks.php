<?php

    /**
     * Function that register Advanced Custom Fields blocks.
     *
     * @since 1.0
    */
    function custom_blocks_init() {

        if ( function_exists( 'acf_register_block' ) ) {

            acf_register_block(array(
                'name'              => 'Data Table',
                'title'             => __('Data Table'),
                'description'       => __('A custom data table block'),
                'render_template'   => 'blocks/data-table.php',
                'category'          => 'formatting',
                'icon'              => 'editor-table',
                'mode'              => 'edit',
                'keywords'          => array( 'table', 'data' )
            ));

            acf_register_block(array(
                'name'              => 'Report Card Button',
                'title'             => __('Report Card Button'),
                'description'       => __('A custom report card button'),
                'render_template'   => 'blocks/report-card-button.php',
                'category'          => 'formatting',
                'icon'              => 'button',
                'mode'              => 'edit',
                'keywords'          => array( 'button', 'card' )
            ));

            acf_register_block(array(
                'name'              => 'Map',
                'title'             => __('US Map'),
                'description'       => __('A custom US Map'),
                'render_template'   => 'blocks/map.php',
                'category'          => 'widgets',
                'icon'              => 'admin-site',
                'mode'              => 'auto',
                'keywords'          => array( 'map', 'usa', 'country' )
            ));

            acf_register_block(array(
                'name'              => 'Anti Slapp Map',
                'title'             => __('Anti Slapp Map'),
                'description'       => __('A custom Anti Slapp Map'),
                'render_template'   => 'blocks/anti-slapp-map.php',
                'category'          => 'widgets',
                'icon'              => 'admin-site',
                'mode'              => 'auto',
                'keywords'          => array( 'map', 'anti', 'slapp', 'country' )
            ));
            
        }
    }
	add_action( 'acf/init', 'custom_blocks_init' );
