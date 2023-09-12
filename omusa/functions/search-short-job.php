<?php

// Enqueue ajax and script
function enqueue_short_search_job_script() {
 
    wp_enqueue_script( 'short-job-search-script', get_stylesheet_directory_uri() . '/resources/js/short-term/job-search.js', array('jquery'), '8', false );
   
    wp_localize_script( 'short-job-search-script', 'short_job_search_ajax', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );

}
add_action( 'wp_enqueue_scripts', 'enqueue_short_search_job_script' );

// Job Filtering
function short_job_search_filtering() {

    $page = $_POST['page_number'] + 1; // This paginates the posts

    // Holds the jobs after filtering.
    $data = (object)[]; // This line fixes the issue with PHP8.

    // All taxonomies
    $all_taxonomies = array(
        'relation' => 'AND',
    );

    // Get all long term posts that are published.
	$args = array(
		'post_type' => 'short-term',
		'orderby' => 'date',
        'post_status' => array('publish', 'future'),
		'posts_per_page' => 10,
        'paged' => $page
	);

    // If both FROM and TO dates are selected.
    if ( isset( $_POST['from_date'] ) && !empty( $_POST['from_date'] ) && isset( $_POST['to_date'] ) && !empty( $_POST['to_date'] ) ) {
        
        $to_date = strtotime( $_POST['to_date'] );

        $to_year = date('Y', $to_date);
        $to_month = date('m', $to_date);
        $to_day = date('d', $to_date);

        $args['date_query'][] = array(
            array(
                'after'     => date('F j, Y', strtotime( $_POST['from_date'] ) ),
                'before'    => array(
                    'year'  => $to_year,
                    'month' => $to_month,
                    'day'   => $to_day,
                ),
                'inclusive' => true,
            )
        );

    } else if ( isset( $_POST['from_date'] ) && !empty( $_POST['from_date'] ) && isset( $_POST['to_date'] ) && empty( $_POST['to_date'] ) ) {

        $from_date = strtotime( $_POST['from_date'] );

        $args['date_query'][] = array(
            array(
                'after'     => date('F j, Y', $from_date),
                'before'    => array(
                    'year'  => date('Y'),
                    'month' => 12,
                    'day'   => 31,
                ),
                'inclusive' => true,
            )
        );

    } else if ( isset( $_POST['from_date'] ) && empty( $_POST['from_date'] ) && isset( $_POST['to_date'] ) && !empty( $_POST['to_date'] ) ) {

        $to_date = strtotime( $_POST['to_date'] );

        $to_year = date('Y', $to_date);
        $to_month = date('m', $to_date);
        $to_day = date('d', $to_date);

        $args['date_query'][] = array(
            array(
                'after'     => date('F j, Y'),
                'before'    => array(
                    'year'  => date('Y'),
                    'month' => $to_month,
                    'day'   => $to_day,
                ),
                'inclusive' => true,
            )
        );

    }

    // When search input has text, search by title otherwise search by categories.
    if ( isset( $_POST['short_string'] ) && !empty($_POST['short_string']) ) {
        
        $args['s'] = $_POST['short_string'];

    } else {

        // Categories taken from the filters.
        $all_categories = array();
        $categories = get_terms( array( 'taxonomy' => 'short-type-of-work', 'hide_empty' => false, ) );

        // If the category filter is selected then get only the categories that have been selected.
        if ( $categories ) {

            // Loop through the categories.
            foreach( $categories as $category ) {

                // If the category is selected on the filter option add it to the array, so we can filter after.
                if( isset($_POST['category_' . $category->term_id]) && $_POST['category_' . $category->term_id] == 'on' ) {

                    array_push( $all_categories, $category->term_id );

                }

            }

            if ( is_countable($all_categories) && count( $all_categories ) > 0 ) {

                array_push( $all_taxonomies, array(
                    'taxonomy' => 'short-type-of-work',
                    'field' => 'term_id',
                    'terms'=> $all_categories
                ));
                
            }

        }

        // Regions taken from the filters.
        $all_regions = array();
        $regions = get_terms( array( 'taxonomy' => 'short-regions', 'hide_empty' => false, ) );

        // If the region filter is selected then get only the regions that have been selected.
        if ( $regions ) {

            // Loop through the regions.
            foreach ( $regions as $region ) {

                // If the region is selected on the filter option add it to the array, so we can filter after.
                if( isset( $_POST['region_' . $region->term_id] ) && $_POST['region_' . $region->term_id] == 'on' ) {

                    array_push( $all_regions, $region->term_id );

                }

            }

            // Add the selected region as filter for the posts.
            if( is_countable($all_regions) && count( $all_regions ) > 0 ) {

                array_push( $all_taxonomies, array(
                    'taxonomy' => 'short-regions',
                    'field' => 'term_id',
                    'terms'=> $all_regions
                ));
                
            }

        }

        // Compatibilities taken from the filters.
        $all_compatibilities = array();
        $compatibilities = get_terms( array( 'taxonomy' => 'short-remote-compatibility', 'hide_empty' => false, ) );
 
        // If the category filter is selected then get only the Compatibilities that have been selected.
        if ( $compatibilities ) {
 
            // Loop through the Compatibilities.
            foreach( $compatibilities as $compatibility ) {
 
                // If the category is selected on the filter option add it to the array, so we can filter after.
                if( isset($_POST['compatibility_' . $compatibility->term_id]) && $_POST['compatibility_' . $compatibility->term_id] == 'on' ) {
 
                    array_push( $all_compatibilities, $compatibility->term_id );
 
                }
 
            }
 
            if ( is_countable($all_compatibilities) && count( $all_compatibilities ) > 0 ) {

                array_push( $all_taxonomies, array(
                    'taxonomy' => 'short-remote-compatibility',
                    'field' => 'term_id',
                    'terms'=> $all_compatibilities,
                ));
                 
            }
 
        }
        
    }

    $args['tax_query'][] = $all_taxonomies;

	$query = new WP_Query( $args );
 
	if ( $query->have_posts() ) {

        $jobs_that_matched = ''; // Is used to get the jobs as string

		while( $query->have_posts() ) { $query->the_post();

            $terms = get_the_terms( $post->ID, 'short-regions');

            $job_id = get_field('short_term_job_id');
            $post_name = get_the_title();
            $post_link = get_the_permalink();
            $post_excerpt = get_the_excerpt();
            $job_date = '';
            $dead_line = '';

            // If both start and end dates are given
            if ( get_field('short_term_job_start_date') && get_field('short_term_job_end_date') ) {
                
                $job_date = '<strong>' . get_field('short_term_job_start_date') . ' – ' . get_field('short_term_job_end_date') . '</strong>';
                    
            // Only if the start date is given
            } elseif ( get_field('short_term_job_start_date') && !get_field('short_term_job_end_date') ) {

                $job_date = '<strong>' . get_field('short_term_job_start_date') . '</strong>';

            // Only if the end date is given
            } elseif ( !get_field('short_term_job_start_date') && get_field('short_term_job_end_date') ) {
                                                        
                $job_date = '<strong>' . get_field('short_term_job_end_date') . '</strong>';
            
            }
                                                                        
            // Show the Application deadline if the data exists
            if ( get_field('short_term_job_application_deadline') ) {                                   
                
                $dead_line = '(Apply by ' . get_field('short_term_job_application_deadline') . ')';

            }

            if ( has_term('', 'short-remote-compatibility') )  {

                // Post taxonomies
                $taxonomies = array('short-remote-compatibility');
                $compatibility_list = '';

                foreach ( $taxonomies as $taxonomy ) {
                    
                    $taxonomies_associated = wp_get_post_terms( get_the_ID(), $taxonomy, array( 'fields' => 'names' ) );
                    
                    if ( !empty( $taxonomies_associated ) ) {
                        
                        foreach ( $taxonomies_associated as $term) {
                            
                            $compatibility_list .= $term . '/';
                        
                        }
                    
                    }

                }
                
                $compatibility_list = substr_replace($compatibility_list, '', -1);
                $compatibility_list = str_replace('/', '<span class="px-1">/</span>', $compatibility_list);

                $jobs_that_matched .= '
                    <div class="short-term-job text-default p-6 md:p-10 lg:p-14 border-t-8 border-red-500 rounded-md shadow-2xl mb-10">
                        <div class="flex flex-col md:flex-row justify-between mb-8 md:mb-0">
                            <div class="flex-1 mb-5">
                                <div class="text-xs font-bold flex items-center mb-2">
                                    <div class="underline">
                                        ' . $job_id . '
                                    </div>
                    
                                    <div class="text-orange-500 px-4">
                                        - 
                                    </div>
                    
                                    <div class="text-orange-500 uppercase">
                                        ' . $terms[0]->name . '
                                    </div>
                                </div>
                    
                                <div class="text-3xl font-roboto font-light leading-9 mb-2">
                                    ' . $post_name . '
                                </div>
                                                        
                                <div class="font-roboto font-bold">
                                    '. $job_date . ' ' . $dead_line .'
                                </div>
                            </div>
                    
                            <div class="flex-none w-full md:w-auto">
                                <div>
                                    <a href="' . $post_link . '" target="_blank" class="w-full md:w-auto text-center text-white-pure text-xl font-black leading-none px-10 py-3 bg-red-500 inline-block">Explore Opportunity</a>
                                </div>

                                <div class="text-center">
                                    <div class="my-1">
                                        Available for
                                    </div>

                                    <div class="text-xs font-bold text-orange-500 uppercase">'
                                        . $compatibility_list . 
                                    '</div>
                                </div>
                            </div>
                        </div>
                    
                        <div class="font-medium leading-8 pl-6 border-l-2 border-separator">
                            ' . $post_excerpt . '
                        </div>
                    </div>
                ';

            } else {

                $jobs_that_matched .= '
                    <div class="short-term-job text-default p-6 md:p-10 lg:p-14 border-t-8 border-red-500 rounded-md shadow-2xl mb-10">
                        <div class="flex flex-col md:flex-row justify-between mb-8 md:mb-0">
                            <div class="flex-1 mb-5">
                                <div class="text-xs font-bold flex items-center mb-2">
                                    <div class="underline">
                                        ' . $job_id . '
                                    </div>
                    
                                    <div class="text-orange-500 px-4">
                                        - 
                                    </div>
                    
                                    <div class="text-orange-500 uppercase">
                                        ' . $terms[0]->name . '
                                    </div>
                                </div>
                    
                                <div class="text-3xl font-roboto font-light leading-9 mb-2">
                                    ' . $post_name . '
                                </div>
                                                        
                                <div class="font-roboto font-bold">
                                    '. $job_date . ' ' . $dead_line .'
                                </div>
                            </div>
                    
                            <div class="w-full md:w-auto">
                                <a href="' . $post_link . '" target="_blank" class="w-full md:w-auto text-center text-white-pure text-xl font-black leading-none px-10 py-3 bg-red-500 inline-block">Explore Opportunity</a>
                            </div>
                        </div>
                    
                        <div class="font-medium leading-8 pl-6 border-l-2 border-separator">
                            ' . $post_excerpt . '
                        </div>
                    </div>
                ';
                
            }

        }

        $data->jobs = $jobs_that_matched; // String of jobs found in the query.
        $data->total_of_jobs_found = $query->found_posts;
        $data->page = $page;
        $data->num_max = $query->max_num_pages;

        echo json_encode( $data ); // Returns the data to the javascript as object.
        
	} else {

        $data->jobs =
            '<div class="w-full text-center text-default">
                No jobs found
            </div>'
        ;

        $data->total_of_jobs_found = 0;
        $data->page = 1;
        $data->num_max = 1;

        echo json_encode( $data ); // Returns the data to the javascript as object.

    }

    wp_reset_postdata(); 

	die();

}
add_action('wp_ajax_short_search_jobs', 'short_job_search_filtering');
add_action('wp_ajax_nopriv_short_search_jobs', 'short_job_search_filtering');
 