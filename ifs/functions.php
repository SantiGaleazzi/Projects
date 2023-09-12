<?php

  	/**
	 * Theme Functions
	 *
	 *
	 * @since 1.0
	 */
	$theme_files = [
		'enqueue-files.php',
		'add-attr-external-links.php',
		'add-async-or-defer-to-scripts.php',
		'add-rel-preload-to-styles.php',
		'remove-rss-feed.php',
		'protected_api.php',
		'remove-wordpress-css.php',
		'change-recovery-mode-email.php',
		'google-analytics.php',
		'remove-wp-oembed-and-json-links.php',
		'acf-blocks.php',
		'svg-format-support.php',
		'theme-support.php'
	];

	foreach ( $theme_files as $file ) {

		if ( file_exists( TEMPLATEPATH . "/functions/" . $file ) ) {

			require_once( TEMPLATEPATH . "/functions/" . $file );

		}

	}

	/***************
	 * REGISTER CUSTOM IMAGE SIZES
	****************/
	add_image_size( 'article-destacada', 480, 360, true );
	add_image_size( 'article', 180, 135, true );

	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );

	/***************
	 * ADMIN FAVICON
	****************/
	add_action('admin_head', 'show_favicon');

	function show_favicon() {

		echo '<link href="'.get_template_directory_uri().'/assets/img/favicon.ico" rel="icon" type="image/x-icon">';

	}
	add_action( 'login_head', 'show_favicon' );

	/************************
	 *UNSET DEFAULTS MEDIA IMAGES SIZES
	*************************/
	function wp_remove_default_image_sizes( $sizes) {

		unset( $sizes['medium']);
		unset( $sizes['large']);

		return $sizes;

	}
	add_filter('intermediate_image_sizes_advanced', 'wp_remove_default_image_sizes');

	function reset_editor() {

		global $_wp_post_type_features;

		$post_type="page";
		$feature = "editor";
		
		if ( !isset($_wp_post_type_features[$post_type]) ) {

		} elseif ( isset($_wp_post_type_features[$post_type][$feature]) ) {

			//unset($_wp_post_type_features[$post_type][$feature]);

		}

	}
	add_action("init","reset_editor");

	/************************
	 *HIDE DEFAULT POST WP*
	*************************/
	// function post_remove() {
	//   remove_menu_page('edit.php');
	// }
	// add_action('admin_menu', 'post_remove');

  	function init_scripts() {
		
		return true;

	}
	add_filter('gform_init_scripts_footer', 'init_scripts');

  /************************
  *EXTENDS NAV SIMPLE
  *************************/
  register_nav_menus( array(
    'preheader_menu' =>  'Preheader Menu',
    'header_menu' =>  'Header Menu',
    'prefooter_menu' => 'Prefooter Menu',
    'footer_menu' => 'Footer Menu',
  ));

  /***************************
  * SETTINGS PAGE
  ****************************/
  if ( function_exists( 'acf_add_options_page' ) ) {

    acf_add_options_page(array(
      'page_title'  => 'Theme Settings',
      // 'menu_title'  => 'Theme Settings',
      'menu_slug'   => 'theme-settings'
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Homepage',
        'parent_slug' => 'theme-settings',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        // 'title' => 'Header',
        'page_title' => 'Archive Settings',
        'parent_slug' => 'theme-settings',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Cases',
        'parent_slug' => 'theme-settings',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        // 'title' => 'Header',
        'page_title' => 'Header',
        'parent_slug' => 'theme-settings',
        'capability' => 'manage_options'
    ));

    acf_add_options_sub_page(array(
        'page_title' => 'Footer',
        'parent_slug' => 'theme-settings',
        'capability' => 'manage_options'
    ));


    acf_add_options_sub_page(array(
        'page_title' => 'States Settings',
        'parent_slug' => 'theme-settings',
        'capability' => 'manage_options'
    ));
  }

  	$includes = [
		'extends-nav.php',
		'extends-nav-img.php',
		'post-type-research.php',
		'post-type-cases.php',
		'post-type-news.php',
		'post-type-expanalysis.php',
		'post-type-blog.php',
		'post-type-states.php',
		'breadcrumbs.php'
	];

	foreach ( $includes as $include ) {

		if ( file_exists( TEMPLATEPATH . "/inc/" . $include ) ) {

			require_once( TEMPLATEPATH . "/inc/" . $include );

		}

	}

	/**************************************
	 * Changed excerpt length to 140 words
	**************************************/
	function my_excerpt_length( $length ) {

		return 60;

	}
  	add_filter( 'excerpt_length', 'my_excerpt_length', 999 );

  
  	function ld_new_excerpt_more( $more ) {
		
		global $post;

      	return '...';

  	}
  	add_filter( 'excerpt_more', 'ld_new_excerpt_more' );

  	function excerpt( $limit ) {

    	$excerpt = explode( ' ', get_the_excerpt(), $limit );

    	if ( count( $excerpt ) >= $limit ) {

			array_pop( $excerpt );

			$excerpt = implode( " ", $excerpt ) . ' ...';

		} else {

			$excerpt = implode( " ", $excerpt );
			
		}

    	$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );

    	return $excerpt;
  	}

	function excerpt_cases( $limit ) {

		$excerpt = explode( ' ', get_the_content(), $limit );

		if ( count( $excerpt )>= $limit ) {
			
			array_pop( $excerpt );

			$excerpt = implode( " ", $excerpt ) . ' ...';

		} else {

			$excerpt = implode( " ", $excerpt );

		}
		
		$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );

		return $excerpt;
	}

	function content( $limit ) {

		$content = explode(' ', get_the_content(), $limit);

		if ( count( $content ) >= $limit ) {

			array_pop( $content );

			$content = implode( " ", $content ) . ' ...' ;

		} else {

			$content = implode( " ", $content );

		}

		$content = preg_replace( '/[.+]/', '', $content );
		$content = apply_filters( 'the_content', $content );
		$content = str_replace( ']]>', ']]&gt;', $content );

		return $content;
	}

	function get_excerpt( $limit, $source = null ){

		if ( $source == "content" ? ( $excerpt = get_the_content() ) : ( $excerpt = get_the_excerpt() ) );

		$excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
		$excerpt = strip_shortcodes($excerpt);
		$excerpt = strip_tags($excerpt);
		$excerpt = substr($excerpt, 0, $limit);
		$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
		$excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
		$excerpt = $excerpt.' ...';

		return $excerpt;
	}

	/*************************************
	 * ARTICLES-POSTS TAXONOMIES
	**************************************/
	function ajax_get_articles() {

		locate_template( '/content-articles-loop.php', TRUE, FALSE );

		die();

	}
	add_action( 'wp_ajax_nopriv_get_articles', 'ajax_get_articles' );
	add_action( 'wp_ajax_get_articles', 'ajax_get_articles' );

	/*************************************
	 * ARTICLES-POSTS RESEARCH
	**************************************/
	function ajax_get_initialArticles() {

		locate_template( '/content-articlestax-loop.php', TRUE, FALSE );

		die();

	}
	add_action( 'wp_ajax_nopriv_get_initialArticles', 'ajax_get_initialArticles' );
	add_action( 'wp_ajax_get_initialArticles', 'ajax_get_initialArticles' );

	/*************************************
	 * EXPERTS-POSTS TAXONOMIES
	**************************************/
	function ajax_get_experts() {

		locate_template( '/content-experts-loop.php', TRUE, FALSE );

		die();

	}
	add_action( 'wp_ajax_nopriv_get_experts', 'ajax_get_experts' );
	add_action( 'wp_ajax_get_experts', 'ajax_get_experts' );

	/*************************************
	 * ARTICLES-POSTS ISSUES
	**************************************/
	function ajax_get_filter_issues() {

		locate_template( '/content-issues-loop.php', TRUE, FALSE );

		die();

	}
	add_action( 'wp_ajax_nopriv_get_filter_issues', 'ajax_get_filter_issues' );
	add_action( 'wp_ajax_get_filter_issues', 'ajax_get_filter_issues' );

	/*************************************
	 * ARTICLES-POSTS ISSUES
	**************************************/
	function ajax_get_initialArticlesIssue() {

		locate_template( '/content-issuestax-loop.php', TRUE, FALSE );

		die();

	}
	add_action( 'wp_ajax_nopriv_get_initialArticlesIssue', 'ajax_get_initialArticlesIssue' );
	add_action( 'wp_ajax_get_initialArticlesIssue', 'ajax_get_initialArticlesIssue' );

	/*************************************
	 * ARTICLES-POSTS STATE INITIAL
	**************************************/
	function ajax_get_initialArticlesState() {

		locate_template( '/content-state-loop.php', TRUE, FALSE );

		die();

	}
	add_action( 'wp_ajax_nopriv_get_initialArticlesState', 'ajax_get_initialArticlesState' );
	add_action( 'wp_ajax_get_initialArticlesState', 'ajax_get_initialArticlesState' );

	/*************************************
	 * ARTICLES-POSTS STATE
	**************************************/
	function ajax_get_filter_state() {

		locate_template( '/content-statetax-loop.php', TRUE, FALSE );

		die();

	}
	add_action( 'wp_ajax_nopriv_get_filter_state', 'ajax_get_filter_state' );
	add_action( 'wp_ajax_get_filter_state', 'ajax_get_filter_state' );

	/*************************************
	 * ARTICLES-POSTS CASES INITIAL
	**************************************/
	function ajax_get_initialArticlesCases() {

		locate_template( '/content-cases-loop.php', TRUE, FALSE) ;

		die();

	}
	add_action( 'wp_ajax_nopriv_get_initialArticlesCases', 'ajax_get_initialArticlesCases' );
	add_action( 'wp_ajax_get_initialArticlesCases', 'ajax_get_initialArticlesCases' );

	/*************************************
	 * ARTICLES-POSTS CASES
	**************************************/
	function ajax_get_filter_cases() {

		locate_template( '/content-casestax-loop.php', TRUE, FALSE );

		die();

	}
	add_action( 'wp_ajax_nopriv_get_filter_cases', 'ajax_get_filter_cases' );
	add_action( 'wp_ajax_get_filter_cases', 'ajax_get_filter_cases' );

	/*************************************
	 * ARTICLES-POSTS CASES
	**************************************/
	function ajax_get_tax_issues() {

		locate_template( '/content-taxissues-loop.php', TRUE, FALSE );

		die();

	}
	add_action( 'wp_ajax_nopriv_get_tax_issues','ajax_get_tax_issues' );
	add_action( 'wp_ajax_get_tax_issues','ajax_get_tax_issues' );

	/*************************************
	 * ADVANCE SEARCH
	**************************************/
	function ajax_get_advance_search() {

		locate_template( '/filter-advance-search.php', TRUE, FALSE );

		die();

	}
	add_action( 'wp_ajax_nopriv_get_advance_search', 'ajax_get_advance_search' );
	add_action( 'wp_ajax_get_advance_search', 'ajax_get_advance_search' );

	function filter_search( $query ) {

		if ( $query->is_search && !is_admin() && !(defined('DOING_AJAX') && DOING_AJAX ) ) {

			$tax_query = array(
				array(
				'taxonomy'  => 'category-type',
				'field'   => 'slug',
				'terms'   => 'daily-media-links',
				'operator'  => 'NOT IN'
				)
			);

			$query->set( 'tax_query', $tax_query );
		};

		return $query;

	}
	add_filter( 'pre_get_posts', 'filter_search' );

	/*************************************
	 * ALLOW USE SAME GF ID IN THE SAME PAGE
	**************************************/
    function change_tabindex( $tabindex, $form ) {

		return 10;

    }
	add_filter( 'gform_tabindex_5', 'change_tabindex' , 10, 2 );

	/*************************************
	 * DISABLE SCROLL AFTER SUBMIT GF
	**************************************/
	add_filter( 'gform_confirmation_anchor_1', '__return_false' );


	/**
	 * If the current page is an archive page, and the current archive page has a featured post, then
	 * remove the featured post from the archive page
	 * 
	 * @param query The WP_Query object.
	 */
	/*************************************
	 * REMOVE FUTURED ISSUES POST FROM ISSUES ARCHIVES
	**************************************/
	function remove_featured( $query ) {

		$posts_id = array();

		if ( $query->is_main_query() ) {
			//get_queried_object_id();

			$featured_post = get_field( 'featured_post','option' );

			if ( have_rows( 'featured_post', 'option' ) ) {

				while ( have_rows( 'featured_post', 'option' ) ) { the_row();

					$archives_featured_posts    = get_sub_field( 'archive_featured_post' );
					$archives_featured_taxonomy = get_sub_field( 'archive_featured_post_taxonomy' );

					if ( get_queried_object_id() == $archives_featured_taxonomy->term_id ) {

						if ( $archives_featured_posts ) {

							foreach ( $archives_featured_posts as $post) {

								$posts_id[] = $post->ID;

							}

							$query->set( 'post__not_in', $posts_id );

						}

					}

				}

			}

		}

	}
	add_action( 'pre_get_posts', 'remove_featured' );

	/*************************************
	* CHANGE DEFAULT RESULT CALENDAR
	**************************************/
	function customize_notice( $html, $notices ) {

		if ( stristr( $html, 'There were no results found.' ) ) {

			$html = str_replace( 'There were no results found.', 'No events scheduled at this time.', $html );

		}

		return $html;

	}
	add_filter( 'tribe_the_notices', 'customize_notice', 10, 2 );


	// Changes listed event views to reverse chronological order
	function tribe_past_reverse_chronological ( $post_object ) {

		$past_ajax = ( defined( 'DOING_AJAX' ) && DOING_AJAX && $_REQUEST['tribe_event_display'] === 'upcoming' ) ? true : false;

		if ( tribe_is_past() || tribe_is_upcoming() || $past_ajax ) {

			$post_object = array_reverse( $post_object );

		}

		return $post_object;

	}
	add_filter( 'the_posts', 'tribe_past_reverse_chronological', 100 );

	function year_shortcode() {

		$year = date('Y');

		return $year;

	}
	add_shortcode('year', 'year_shortcode');

	function my_mce_buttons_2( $buttons ) {

		$buttons[] = 'superscript';
		$buttons[] = 'subscript';

		return $buttons;

	}
	add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

	/**
	 * ARCHIVE NAVIGATION
	 *
	 * @author Bill Erickson
	 * @see https://www.billerickson.net/custom-pagination-links/
	 *
	 */
	function ea_archive_navigation() {

		$settings = array(
			'count' => 6,
			'prev_text' => '&laquo; Prev page',
			'next_text' => 'Next page &raquo;'
		);

		global $wp_query;

		$current = max( 1, get_query_var( 'paged' ) );
		$total = $wp_query->max_num_pages;
		$links = array();

		if ( $current < $total ) $settings['count']--;

		// Previous
		if ( $current > 1 ) {

			$settings['count']--;

			$links[] = ea_archive_navigation_link( $current - 1, 'prev', $settings['prev_text'] );

		}

		// Current
		$links[] = ea_archive_navigation_link( $current, 'current' );

		// Next Pages
		for ( $i = 1; $i < $settings['count']; $i++ ) {

			$page = $current + $i;

			if ( $page <= $total ) {

				$links[] = ea_archive_navigation_link( $page );

			}

		}

		// Next
		if ( $current < $total ) {

			$links[] = ea_archive_navigation_link( $current + 1, 'next', $settings['next_text'] );

		}

		return '<nav class="navigation posts-navigation" role="navigation"><div class="nav-links">'.join( '', $links ).'</div></nav>';

	}
	add_action( 'tha_content_while_after', 'ea_archive_navigation' );

	/**
	 * ARCHIVE NAVIGATION LINK
	 *
	 * @author Bill Erickson
	 * @see https://www.billerickson.net/custom-pagination-links/
	 *
	 * @param int $page
	 * @param string $class
	 * @param string $label
	 * @return string $link
	 */
	function ea_archive_navigation_link( $page = false, $class = '', $label = '' ) {

		if ( ! $page ) return;

		$classes = array( 'page-numbers' );

		if ( !empty( $class ) ) $classes[] = $class;

		$classes = array_map( 'sanitize_html_class', $classes );
		
		$label = $label ? $label : $page;

		$link = esc_url_raw( get_pagenum_link( $page ) );

		return '<a class="' . join ( ' ', $classes ) . '" href="' . $link . '" data-page="' . $page . '">' . $label . '</a>';

	}
