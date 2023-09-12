<?php 

    /**
     * Function that creates custom post type.
     *
     * @since 1.0
    */
    add_action( 'init', 'create_post_type' );
    function create_post_type() {

        register_post_type( 'stories',
            array(
                'labels' => array(
                    'name' => __( 'Stories' ),
                    'singular_name' => __( 'Stories' )
                ),
                'public' => true,    
                'has_archive' => true,
                'rewrite' => array('slug' => 'stories'),          
                'supports'  => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'author', 'revisions' ),
                'menu_icon' => 'dashicons-testimonial',
                'taxonomies' => array('post_tag')
            )
        );

        register_post_type( 'continents',
            array(
                'labels' => array(
                    'name' => __( 'Continents' ),
                    'singular_name' => __( 'Continents' )
                ),
                'public'              => true,    
                'has_archive' => true,            
                'rewrite' => array('slug' => 'continents'),  
                'supports'  => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'author', 'revisions' ),
                'menu_icon' => 'dashicons-admin-site'
            )
            
        );

        register_post_type( 'short-term',
            array(
                'labels' => array(
                    'name' => __( 'Short Term' ),
                    'singular_name' => __( 'Short Term' )
                ),
                'public' => true,    
                'has_archive' => true,
                'rewrite' => array('slug' => 'short-term-opportunities'),          
                'supports'  => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'author', 'revisions' ),
                'show_in_rest'  => true,
                'menu_icon' => 'dashicons-download'
            )
        );

        register_post_type( 'long-term',
            array(
                'labels' => array(
                    'name' => __( 'Long Term' ),
                    'singular_name' => __( 'Long Term' )
                ),
                'public' => true,    
                'has_archive' => true,
                'rewrite' => array('slug' => 'long-term-opportunities'),          
                'supports'  => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'author', 'revisions' ),
                'show_in_rest'  => true,
                'menu_icon' => 'dashicons-upload'
            )
        );

        register_post_type( 'videos',
            array(
                'labels' => array(
                    'name' => __( 'Videos' ),
                    'singular_name' => __( 'Videos' )
                ),
                'public' => true,    
                'has_archive' => true,
                'rewrite' => array('slug' => 'videos'),          
                'supports'  => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'author', 'revisions' ),
                'menu_icon' => 'dashicons-video-alt2'
            )
        );

        register_post_type( 'internships',
            array(
                'labels' => array(
                    'name' => __( 'Internships' ),
                    'singular_name' => __( 'Internships' )
                ),
                'public' => true,    
                'has_archive' => true,
                'rewrite' => array('slug' => 'internships-opportunities'),          
                'supports'  => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'author', 'revisions' ),
                'menu_icon' => 'dashicons-buddicons-buddypress-logo'
            )
        );

        register_post_type( 'video-stories',
            array(
                'labels' => array(
                    'name' => __( 'Video Stories' ),
                    'singular_name' => __( 'Video Story' )
                ),
                'public' => true,    
                'has_archive' => true,
                'rewrite' => array('slug' => 'video-stories'),          
                'supports'  => array( 'title', 'editor', 'thumbnail', 'custom-fields', 'excerpt', 'author' ),
                'show_in_rest'  => true,
                'menu_icon' => 'dashicons-format-status'
            )
        );
       
    }

    function be_register_taxonomies() {
        $taxonomies = array(
            array(
                'slug'         => 'type-worker',
                'single_name'  => 'Type of Worker',
                'plural_name'  => 'Type of Worker',
                'post_type'    => 'stories'
            ),
            array(
                'slug'         => 'region',
                'single_name'  => 'Region',
                'plural_name'  => 'Region',
                'post_type'    => 'stories'
            ),
            array(
                'slug'         => 'type-impact',
                'single_name'  => 'Type of Impact',
                'plural_name'  => 'Type of Impact',
                'post_type'    => 'stories'
            ),
            array(
                'slug'         => 'areas',
                'single_name'  => 'Area',
                'plural_name'  => 'Areas',
                'post_type'    => 'continents'
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
                'query_var' => true,
                'rewrite' => $rewrite,
            ));
        }
        
    }
    
    add_action( 'init', 'be_register_taxonomies' );

    // Long Term Taxonomies
    function long_term_taxonomies() {

        $long_term_taxonomy = array(
            array(
                'slug'         => 'long-featured',
                'single_name'  => 'Featured',
                'plural_name'  => 'Featured',
                'post_type'    => 'long-term',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'long-location',
                'single_name'  => 'Location',
                'plural_name'  => 'Location',
                'post_type'    => 'long-term',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'long-regions',
                'single_name'  => 'Region',
                'plural_name'  => 'Region',
                'post_type'    => 'long-term',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'long-type-of-work',
                'single_name'  => 'Type of Work',
                'plural_name'  => 'Type of Work',
                'post_type'    => 'long-term',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'long-part-time',
                'single_name'  => 'Support Salary',
                'plural_name'  => 'Support Salary',
                'post_type'    => 'long-term',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'long-remote-jobs',
                'single_name'  => 'Virtual Job',
                'plural_name'  => 'Virtual Jobs',
                'post_type'    => 'long-term',
                'hierarchical' => true
            )
        );

        foreach( $long_term_taxonomy as $taxonomy ) {

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
            $hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : false;
        
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
    add_action( 'init', 'long_term_taxonomies' );

    // Short Term Taxonomies
    function short_term_taxonomies() {

        $short_term_taxonomy = array(
            array(
                'slug'         => 'short-featured',
                'single_name'  => 'Featured',
                'plural_name'  => 'Featured',
                'post_type'    => 'short-term',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'short-regions',
                'single_name'  => 'Region',
                'plural_name'  => 'Region',
                'post_type'    => 'short-term',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'short-type-of-work',
                'single_name'  => 'Type of Work',
                'plural_name'  => 'Type of Work',
                'post_type'    => 'short-term',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'short-remote-compatibility',
                'single_name'  => 'Compatibility',
                'plural_name'  => 'Compatibility',
                'post_type'    => 'short-term',
                'hierarchical' => true
            )
        );

        foreach( $short_term_taxonomy as $taxonomy ) {

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
            $hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : false;
        
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
    add_action( 'init', 'short_term_taxonomies' );

    // Videos Taxonomies
    function videos_taxonomies() {

        $videos_taxonomies = array(
            array(
                'slug'         => 'videos-type',
                'single_name'  => 'Type',
                'plural_name'  => 'Types',
                'post_type'    => 'videos'
            )
        );

        foreach( $videos_taxonomies as $taxonomy ) {

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
            $hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : false;
        
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
    add_action( 'init', 'videos_taxonomies' );

    // Internships Taxonomies
    function internships_taxonomies() {

        $interships_taxonomy = array(
            array(
                'slug'         => 'semesters',
                'single_name'  => 'Semester',
                'plural_name'  => 'Semesters',
                'post_type'    => 'internships',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'degrees',
                'single_name'  => 'Degree',
                'plural_name'  => 'Degrees',
                'post_type'    => 'internships',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'internship-type',
                'single_name'  => 'Type',
                'plural_name'  => 'Types',
                'post_type'    => 'internships',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'internship-location',
                'single_name'  => 'Region',
                'plural_name'  => 'Regions',
                'post_type'    => 'internships',
                'hierarchical' => true
            ),
            array(
                'slug'         => 'internship-remote-jobs',
                'single_name'  => 'Virtual Job',
                'plural_name'  => 'Virtual Jobs',
                'post_type'    => 'internships',
                'hierarchical' => true
            )
        );

        foreach( $interships_taxonomy as $taxonomy ) {

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
            $hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : false;
        
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
    add_action( 'init', 'internships_taxonomies' );
