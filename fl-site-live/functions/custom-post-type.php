<?php 

    /**
     * Function that creates custom post type.
     *
     * @since 1.0 
    */
    add_action( 'init', 'create_post_type' );

    // add post-formats to post_type 'page'
    add_theme_support( 'post-formats', array( 'video') );

    function create_post_type() {

        register_post_type( 'resources',

            array(
                'labels' => array(
                    'name' => __( 'Resources' ),
                    'singular_name' => __( 'Resources' )
                ),
                'public' => true,
                'has_archive' => true,
                'rewrite' => array('slug' => 'videos'),
                'supports'  => array( 'title','thumbnail','custom-fields',  'editor', 'excerpt','author','post-formats'),
                'menu_icon' => 'dashicons-rss'
            )
            
        );
        
    }

    function be_register_taxonomies() {
        $taxonomies = array(
            array(
                'slug'         => 'resources-category',
                'single_name'  => 'Category',
                'plural_name'  => 'Categories',
                'post_type'    => 'resources'
            ),
            array(
                'slug'         => 'series',
                'single_name'  => 'Series Name',
                'plural_name'  => 'Series Name',
                'post_type'    => 'resources'
            ),
            array(
                'slug'         => 'season',
                'single_name'  => 'Season',
                'plural_name'  => 'Seasons',
                'post_type'    => 'resources'
            ),
            array(
                'slug'         => 'type',
                'single_name'  => 'Type',
                'plural_name'  => 'Types',
                'post_type'    => 'resources'
            ),
            array(
                'slug'         => 'topic',
                'single_name'  => 'Topic',
                'plural_name'  => 'Topics',
                'post_type'    => 'resources'
            ),
            array(
                'slug'         => 'person',
                'single_name'  => 'Person',
                'plural_name'  => 'Persons',
                'post_type'    => 'resources'
            ),
            array(
                'slug'         => 'resource-year',
                'single_name'  => 'Year',
                'plural_name'  => 'Years',
                'post_type'    => 'resources'
            )
        );
        foreach( $taxonomies as $taxonomy ) {
            $labels = array(
                'name' => $taxonomy['plural_name'],
                'singular_name' => $taxonomy['single_name'],
                'search_items' =>  'Search ' . $taxonomy['plural_name'],
                'all_items' => 'All ' . $taxonomy['plural_name'],
                'parent_item' => 'Parent ' . $taxonomy['single_name'],
                'parent_item_colon' => 'Parent ' . $taxonomy['single_name'] . ':',
                'edit_item' => 'Edit ' . $taxonomy['single_name'],
                'update_item' => 'Update ' . $taxonomy['single_name'],
                'add_new_item' => 'Add New ' . $taxonomy['single_name'],
                'new_item_name' => 'New ' . $taxonomy['single_name'] . ' Name',
                'menu_name' => $taxonomy['plural_name']
            );
            
            $rewrite = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
            $hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;
        
            register_taxonomy( $taxonomy['slug'], $taxonomy['post_type'], array(
                'hierarchical' => $hierarchical,
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => true,
                'show_in_rest' => true,
                'query_var' => true,
                'rewrite' => $rewrite,
            ));
        }
        
    }
    add_action( 'init', 'be_register_taxonomies' );