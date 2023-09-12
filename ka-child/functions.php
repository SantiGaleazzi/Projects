<?php

	/*
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
    function styless_and_script_loader_tag ( $tag, $handle ) {
        
        if ( $handle === 'custom-js' ) {
            
            if ( false === stripos( $tag, 'defer' ) ) {
                
                $tag = str_replace(' src', ' defer src', $tag );
                
            }

        }
        
        return $tag;
        
    }
    add_filter('script_loader_tag', 'styless_and_script_loader_tag', 10, 2);

	/**
     * Function that enqueue the css, js, google fonts and wp_ajax.
     *
     * @since 1.0
    */
	function add_theme_scripts() {

		wp_enqueue_style( 'theme-icons', get_template_directory_uri() . '/fonts/styles.css', array(), THEME_VERSION, 'all' );
		wp_enqueue_style( 'theme', get_template_directory_uri() . '/style.css', array('theme-icons'), THEME_VERSION );
		wp_enqueue_style( 'theme-print', get_template_directory_uri() . '/print.css', array('theme'), THEME_VERSION, 'print' );
		
        wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;500;600;700;800&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );
        wp_enqueue_style( 'google-montserrat', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,700;0,800;1,400;1,700;1,800&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );
        wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/assets/css/app.css', array(), laravel_mix_asset( 'assets/css/app.css' ), 'all' );
        wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri() . '/assets/js/app.js', array(), laravel_mix_asset( 'assets/js/app.js' ), true );

		wp_enqueue_script('theme-carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), THEME_VERSION, true );
		wp_enqueue_script('theme', get_template_directory_uri() . '/js/page.js', array('jquery', 'hoverIntent', 'theme-carousel'), THEME_VERSION, true );

    }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

	class themeslug_walker_nav_menu_header extends Walker_Nav_Menu {

		//Show Nav
		function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
			if (!$element){
				return;
			}
					
			$id_field = $this->db_fields['id'];
			
			//display this element
			if ( is_array( $args[0] ) )
					$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
			
			//Adds the 'dropdown' class to the current item if it has children               
			if( ! empty( $children_elements[$element->$id_field] ) )
					array_push($element->classes,'dropdown');
			
			$cb_args = array_merge( array(&$output, $element, $depth), $args);
			
			call_user_func_array(array(&$this, 'start_el'), $cb_args);
			
			$id = $element->$id_field;
			
			// descend only when the depth is right and there are childrens for this element
			if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {
			
					foreach( $children_elements[ $id ] as $child ){
			
							if ( !isset($newlevel) ) {
									$newlevel = true;
									//start the child delimiter
									$cb_args = array_merge( array(&$output, $depth), $args);
									call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
							}
							$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
					}
					unset( $children_elements[ $id ] );
			}
			
			if ( isset($newlevel) && $newlevel ){
					//end the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
			}
			
			//end this element
			$cb_args = array_merge( array(&$output, $element, $depth), $args);
			call_user_func_array(array(&$this, 'end_el'), $cb_args);              
		}

		// add classes to ul sub-menus
		function start_lvl( &$output, $depth = 0, $args = Array() ) {
		// depth dependent classes
		$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
		$display_depth = ( $depth + 1); // because it counts the first submenu as 0
		$classes = array(
			'dropdown-content',
			( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
			( $display_depth >=2 ? 'sub-sub-menu' : '' ),
			'menu-depth-' . $display_depth
			);
		$class_names = implode( ' ', $classes );
		
		// build html
		$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}

		// add main/sub classes to li's and links
		function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0) {
			global $wp_query;
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

			$depth_classes = array(
				( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
				( $depth >=2 ? 'sub-sub-menu-item' : '' ),
				( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
				'menu-item-depth-' . $depth
			);
			$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
		
			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
			// build html
			$output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '">';
		
			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
		
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
		
			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

  	}

	class themeslug_walker_nav_menu_pos_menu extends Walker_Nav_Menu {

		// add classes to ul sub-menus
		function start_lvl( &$output, $depth = 0, $args = Array() ) {
			// depth dependent classes
			$indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
			$display_depth = ( $depth + 1); // because it counts the first submenu as 0
			$classes = array(
				'sub-menu',
				( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
				( $display_depth >=2 ? 'sub-sub-menu' : '' ),
				'menu-depth-' . $display_depth
				);
			$class_names = implode( ' ', $classes );
		
			// build html
			$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}

		// add main/sub classes to li's and links
		function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0 ) {
			global $wp_query;
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		
			// depth dependent classes
			$depth_classes = array(
				( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
				( $depth >=2 ? 'sub-sub-menu-item' : '' ),
				( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
				'menu-item-depth-' . $depth
			);
			$depth_class_names = esc_attr( implode( ' ', $depth_classes ) );
		
			// passed classes
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
		
			// build html
			$output .= $indent . '';
		
			// link attributes
			$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
			$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
			$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
			$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
			$attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';
		
			$item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
				$args->before,
				$attributes,
				$args->link_before,
				apply_filters( 'the_title', $item->title, $item->ID ),
				$args->link_after,
				$args->after
			);
		
			// build html
			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
		
	}

	/**
     * Gets the path to a versioned Mix file in a WordPress theme.
     *
     * Use this function if you want to version theme files. This function will cache the contents
     * of the manifest file for you.
     *
     * Inspired by <https://www.sitepoint.com/use-laravel-mix-non-laravel-projects/>.
     *
     * @since 2.0.0
     *
     * @param string $file_name The relative path to the file.
     *
     * @return string The versioned file path.
     */
	function laravel_mix_asset ( $file_name ) {

        static $manifest_assets;
        static $manifest_path;
        static $hashed_file_name;

        $manifest_path = get_theme_file_path( 'mix-manifest.json' );

        // Manifest couldn’t be found, return the asset URI
        if ( ! file_exists( $manifest_path ) ) return '';

        $manifest_assets = json_decode( file_get_contents( $manifest_path ), true );

        // Check the file exists on the manifest assets
        if ( ! array_key_exists( '/' . $file_name, $manifest_assets ) ) return '';

        // Get file URL from manifest file
        $hashed_file_name = $manifest_assets[ '/' . $file_name ];

        // Run this statement if the manifest file contains the word id
        // This means that npm run prod has been used and the file has been versioned
        // We only need the last 20 characters of the manifest file which are basically the hash number we need to version our files.
        if ( strpos( $hashed_file_name, 'id' ) !== false ) {

            $hashed_file_name = substr( $hashed_file_name, -32 );

            return $hashed_file_name;

        }

        // Return empty just when no production mode is enabled.
        // WordPress By default returns the WordPress Core Version as hash.
        return '';

    }

	/**
     * Function that creates custom post type.
     *
     * @since 1.0
    */
	function create_post_type() {
        
        register_post_type( 'team-members',

            array(
                'labels' => array(
                    'name' => __( 'Team Members' ),
                    'singular_name' => __( 'Team Members' )
                ),
                'public' => false,
                'hierarchical' => true,
                'show_ui' => true,
                'show_in_menu' => true,
                'menu_position' => 5,
                'menu_icon' => 'dashicons-portfolio',
                'show_in_rest'  => true,
                'has_archive' => false,
                'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'author', 'page-attributes'),
                'rewrite' => array('slug' => 'team-members'),
            )
            
        );

    }
    add_action( 'init', 'create_post_type');

	function create_taxonomies() {

		register_taxonomy( 'area', 'team-members', array(
			'labels' => array(
                'name' => __( 'Area' ),
                'singular_name' => __( 'Area' )
            ),
			'public' => true,
			'hierarchical' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_rest'  => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'area' ),
		) );

	}
	add_action('init', 'create_taxonomies');

	/**
     * Functions that Remove WordPress CSS.
     *
     * @since 1.0
    */
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );

	/* It's creating a new route for the REST API. */
	add_action( 'rest_api_init', function () {
		
		register_rest_route( 'kidsalive-api/v1',
			'team-members/(?P<id>\d+)',
			array(
				'methods' => WP_REST_Server::READABLE,
				'callback' => 'get_member_by_id',
				'permission_callback' => '__return_true'
			)
		);

		register_rest_route( 'kidsalive-api/v1',
			'country/regions',
			array(
				'methods' => WP_REST_Server::READABLE,
				'callback' => 'get_country_regions',
				'permission_callback' => '__return_true'
			)
		);

		register_rest_route( 'kidsalive-api/v1',
			'country/region/(?P<id>\d+)',
			array(
				'methods' => WP_REST_Server::READABLE,
				'callback' => 'get_region_by_id',
				'permission_callback' => '__return_true'
			)
		);

		register_rest_route( 'kidsalive-api/v1',
			'country/(?P<id>\d+)',
			array(
				'methods' => WP_REST_Server::READABLE,
				'callback' => 'get_countries_posts_by_region_id',
				'permission_callback' => '__return_true'
			)
		);

	});

	function get_member_by_id ( WP_REST_Request $request ) {

		$member_id = $request['id'];
		$member = get_post( $member_id );

		$member->position = get_field( 'team_members_position', $member_id );
		$member->feature_image = has_post_thumbnail( $member_id ) ? get_the_post_thumbnail_url( $member_id ) : null;

		return $member;

	}

	function get_country_regions() {

		$regions = array();

		$country_regions = get_terms( array(
			'taxonomy' => 'region'
		));

		foreach ( $country_regions as $region ) {

			$regions[] = array(
				'id' => $region->term_id,
				'name' => $region->name,
				'slug' => $region->slug,
				'permalink' => get_term_link( $region->term_id ),
				'area' => array(
					'latitude' => get_field( 'region_area_latitude', $region->taxonomy . '_' . $region->term_id ),
					'longitude' => get_field( 'region_area_longitude', $region->taxonomy . '_' . $region->term_id ),
					'length' => get_field( 'region_area_length', $region->taxonomy . '_' . $region->term_id )
				),
				'popup' => array(
					'latitude' => get_field( 'region_popup_latitude', $region->taxonomy . '_' . $region->term_id ),
					'longitude' => get_field( 'region_popup_longitude', $region->taxonomy . '_' . $region->term_id )
				) 
			);

		}

		return $regions;

	}

	function get_region_by_id ( WP_REST_Request $request ) {

		$region = (object) array();
		$region_id = $request['id'];

		$region_by_id = get_term_by( 'term_id', $region_id, 'region' );

		$region->slug = $region_by_id->slug;
		$region->map = array(
			'latitude' => get_field( 'region_map_latitude', $region_by_id->taxonomy . '_' . $region_by_id->term_id ),
			'longitude' => get_field( 'region_map_longitude', $region_by_id->taxonomy . '_' . $region_by_id->term_id ),
			'zoom' => get_field( 'region_map_zoom', $region_by_id->taxonomy . '_' . $region_by_id->term_id ),
		);

		return $region;

	}

	function get_countries_posts_by_region_id ( WP_REST_Request $request ) {

		$posts = array();
		$region_id = $request['id'];

		$countries = new WP_Query( array(
			'post_type' => 'country',
			'posts_per_page' => -1,
			'tax_query' => array(
				array(
					'taxonomy' => 'region',
					'field' => 'term_id',
					'terms' => $region_id
				)
			)
		));

		foreach ( $countries->posts as $post ) {

			$posts[] = array(
				'id' => $post->ID,
				'name' => $post->post_title,
				'permalink' => get_permalink( $post->ID ),
				'popup' => array(
					'latitude' => get_field( 'country_popup_latitude', $post->ID ),
					'longitude' => get_field( 'country_popup_longitude', $post->ID ),
					'tip_class' => get_field( 'country_popup_tip', $post->ID ) ?: ''
				)
			);

		}

		return $posts;

	}
	
	/**
     * Function that creates the Theme settings page.
     *
     * @since 1.0
    */

	if ( function_exists('acf_add_options_page') ) {

        acf_add_options_page( array(
            'menu_title'  => 'Theme Settings',
            'menu_slug'   => 'theme-settings'
        ));

        acf_add_options_sub_page( array(
            'title' => 'Newsletter',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

		acf_add_options_sub_page( array(
            'title' => 'Footer',
            'parent' => 'theme-settings',
            'capability' => 'manage_options'
        ));

    }

	/**
     * Function that adds the favicon and mobile app icons to the head of the HTML document.
     *
     * @since 1.0
     */

    function add_icons() {

        echo '<link href="' . get_template_directory_uri() . '/images/favicon.ico" rel="shortcut icon" type="image/x-icon">';

    }
    add_action('wp_head', 'add_icons');

	/**
	 * It returns a list of terms for a given post.
	 * 
	 * @param int post_id The ID of the post you want to get the terms for.
	 * @param string taxonomy The taxonomy you want to get the terms from.
	 * @param string field The field type to return. Default is 'name'.
	 * @param string separator The separator to use between the terms.
	 * 
	 * @return string A string of terms separated by a comma and a space.
	 */
	function kai_get_post_terms_as_list ( int $post_id, string $taxonomy, string $field = 'name', string $separator = ',' ) : string {

		$list = wp_list_pluck( wp_get_post_terms( $post_id, $taxonomy ), $field );

		return implode( $separator . ' ' , $list );

	}

	/**
	 * It returns the first term in a list of terms for a given post.
	 * 
	 * @param int post_id The ID of the post you want to get the term from.
	 * @param string taxonomy The taxonomy you want to get the terms from.
	 * @param string field the field you want to return.
	 * 
	 * @return string The first term in the list of terms for a given post.
	 */
	function kai_get_post_first_term_in_list ( int $post_id, string $taxonomy, string $field = 'name' ) : string {

		$terms_items = array();
		$terms = wp_get_post_terms( $post_id, $taxonomy );

		foreach ( $terms as $term ) {

			$terms_items[] = $term->{$field};

		}

		return $terms_items[0];

	}

