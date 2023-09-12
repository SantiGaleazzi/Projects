<?php

    /**
     * Function that enqueue the css, js, google fonts and wp_ajax.
     *
     * @since 1.0
    */
    
    function add_theme_scripts() {

        // wp_enqueue_style("gforms_css", WP_PLUGIN_URL . "/gravityforms/css/forms.css");
		wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/assets/css/app.css', array(), '30f4fc8376ad99338fd6995a6c5c49c3', 'all' );

		wp_enqueue_style( 'google-sans', 'https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,400&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );
		wp_enqueue_style( 'google-neuton', 'https://fonts.googleapis.com/css2?family=Neuton:wght@200;300;400;700&display=swap', array(), '1e4903665555e0c5d371de913f89dc15', 'all' );
		wp_enqueue_style( 'google-oxygen-yrsa', 'https://fonts.googleapis.com/css2?family=Oxygen:wght@700&family=Yrsa:wght@300;500&display=swap', array(), '1e4903665555e0c5d371de913f89dc16', 'all' );

		wp_enqueue_script('custom-js', get_template_directory_uri() . '/assets/js/app.js', array('jquery'), 'dfa47d5964a8fe39579840bec5c1c10b', true );

		wp_localize_script('custom-js', 'wp_ajax_object', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' )
		));

		wp_enqueue_script('theme-charts', get_template_directory_uri() . '/assets/js/charts.js', array(), 'c30484419688c3962ef535babb12e976', true);

		wp_localize_script('custom-js', 'wp_ajax_custom', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));

		wp_localize_script('custom-js', 'wp_load_issues', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
		wp_localize_script('custom-js', 'wp_filter_issues', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));

		wp_localize_script('custom-js', 'wp_load_states', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));
		wp_localize_script('custom-js', 'wp_filter_states', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));

		wp_localize_script('custom-js', 'wp_load_cases', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));

		wp_localize_script('custom-js', 'wp_filter_cases', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));

		wp_localize_script('custom-js', 'wp_load_taxarchives', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ));

		if ( is_post_type_archive('research') || is_post_type_archive('news') || is_post_type_archive('blog') ) {

			wp_enqueue_script('research', get_template_directory_uri() . '/assets/js/research.js?v1', array(), 'c5a883193204a4bcc0fc92fdfd1d0d9a', true);

		}

		if ( is_post_type_archive('experts') ) {
		
			wp_enqueue_script('experts', get_template_directory_uri() . '/assets/js/experts.js?v1', array(), '42335a058ee20fff17b2df6b0848145a', true);

		}

		if ( is_tax( 'category-issue' ) || is_tax( 'category-type' ) || is_tax( 'category-state' ) || is_tax( 'category-case' ) ) {

			wp_enqueue_script('taxonomy', get_template_directory_uri() . '/assets/js/taxonomy.js?v1', array(), 'e8a1e851516fdf29567910c7bacc27d8', true);

		}

		if ( is_page_template( 'template-issues.php' ) || is_page_template( 'template-home.php' ) ) {

			wp_enqueue_script('issues', get_template_directory_uri() . '/assets/js/issues.js?v1', array(), '30356e0ea4d546988d8e374fa9a767d2', true);

		}

		if ( is_page_template( 'template-work-state.php' ) ) {

			wp_enqueue_script('work-state', get_template_directory_uri() . '/assets/js/work-state.js?v1', array(), '651b20dcd61454a0c4898a7df99f4881', true);

		}

		if ( is_post_type_archive( 'cases' ) ) {

			wp_enqueue_script('cases', get_template_directory_uri() . '/assets/js/cases.js?v1', array(), '9f949e73e37ea048525f362f26112fb6', true);

		}

		if ( is_page_template( 'template-home.php' ) ) {

			wp_enqueue_script('homepage', get_template_directory_uri() . '/assets/js/push-down.js?v1', array(), '78a0d7ccb16827e3b38c039b12428692', true);

			wp_localize_script('homepage', 'days', array(
				'without_push_down' => get_field('days_without_push_down', 'option'),
				'can_see_each_push_down' => get_field('how_many_days_the_user_can_see_each_push_down', 'option'),
			));

		}

    }
    add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
