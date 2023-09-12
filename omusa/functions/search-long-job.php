<?php

function enqueue_long_search_job_script() {
 
    wp_enqueue_script( 'long-job-search-script', get_stylesheet_directory_uri() . '/resources/js/long-term/job-search.js', array('jquery'), '4', false);

    wp_localize_script( 'long-job-search-script', 'long_job_search_ajax', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );
  
}
add_action( 'wp_enqueue_scripts', 'enqueue_long_search_job_script' );

// Job Filtering
function long_job_search_filtering() {

    $page = $_POST['page_number'] + 1; // This paginates the posts
    $loaded_jobs = 0; // Used to count how many jobs are being showed.

    // Holds the jobs after filtering.
    $data = (object)[]; // This line fixes the issue with PHP8.

    // All taxonomies
    $all_taxonomies = array(
        'relation' => 'OR',
    );
    
    // This allows to correclty calculate the amount of jobs listed.
    if ( isset( $_POST['page_jobs_visible'] ) ) {
        
        $loaded_jobs = $_POST['page_jobs_visible'];

    }

    // Get all long term posts that are published.
	$args = array(
		'post_type' => 'long-term',
		'orderby' => 'date',
        'post_status' => 'publish',
		'posts_per_page' => 10,
        'paged' => $page
	);

    // When search input has text, search by title otherwise search by categories.
    if ( isset( $_POST['long_string'] ) && !empty( $_POST['long_string'] ) ) {
        
        $args['s'] = $_POST['long_string'];

    } else {

        // Locations taken from the filters.
        $all_locations = array();
        $locations = get_terms( array( 'taxonomy' => 'long-location') );

        // If the region filter is selected then get only the locations that have been selected.
        if ( $locations ) {

            // Loop through the locations.
            foreach ( $locations as $location ) {

                // If the location is selected on the filter option add it to the array, so we can filter after.
                if ( isset( $_POST['location_' . $location->term_id] ) && $_POST['location_' . $location->term_id] == 'on' ) {

                    array_push( $all_locations, $location->term_id );

                }

            }

            // Add the selected region as filter for the posts.
            if ( is_countable($all_locations) && count( (array)$all_locations ) > 0 ) {

                array_push( $all_taxonomies, array(
                    'taxonomy' => 'long-location',
                    'field' => 'term_id',
                    'terms'=> $all_locations
                ));
                
            }

        }

        // Regions taken from the filters.
        $all_regions = array();
        $regions = get_terms( array( 'taxonomy' => 'long-regions') );

        // If the region filter is selected then get only the regions that have been selected.
        if ( $regions ) {

            // Loop through the regions.
            foreach ( $regions as $region ) {

                // If the region is selected on the filter option add it to the array, so we can filter after.
                if ( isset( $_POST['region_' . $region->term_id] ) && $_POST['region_' . $region->term_id] == 'on' ) {

                    array_push( $all_regions, $region->term_id );

                }

            }

            // Add the selected region as filter for the posts.
            if ( is_countable($all_regions) && count( (array)$all_regions ) > 0 ) {

                array_push( $all_taxonomies, array(
                    'taxonomy' => 'long-regions',
                    'field' => 'term_id',
                    'terms'=> $all_regions
                ));
                
            }

        }

        // Categories taken from the filters.
        $all_categories = array();
        $categories = get_terms( array( 'taxonomy' => 'long-type-of-work' ) );

        // If the category filter is selected then get only the categories that have been selected.
        if ( $categories ) {

            // Loop through the categories.
            foreach ( $categories as $category ) {

                // If the category is selected on the filter option add it to the array, so we can filter after.
                if ( isset( $_POST['category_' . $category->term_id] ) && $_POST['category_' . $category->term_id] == 'on' ) {

                    array_push( $all_categories, $category->term_id );

                }

            }

            if ( is_countable($all_categories) && count( (array)$all_categories ) > 0 ) {

                array_push( $all_taxonomies, array(
                    'taxonomy' => 'long-type-of-work',
                    'field' => 'term_id',
                    'terms'=> $all_categories
                ));
                
            }

        }

        // Job Type taken from the filters.
        $all_job_types = array();
        $job_types = get_terms( array( 'taxonomy' => 'long-part-time' ) );

        // If the Job Type filter is selected then get only the job_types that have been selected.
        if ( $job_types ) {

            // Loop through the job_types.
            foreach ( $job_types as $job_type ) {

                // If the job_type is selected on the filter option add it to the array, so we can filter after.
                if ( isset( $_POST['job_type_' . $job_type->term_id] ) && $_POST['job_type_' . $job_type->term_id] == 'on' ) {

                    array_push( $all_job_types, $job_type->term_id );

                }

            }

            if ( is_countable($all_job_types) && count( (array)$all_job_types ) > 0 ) {

                array_push( $all_taxonomies, array(
                    'taxonomy' => 'long-part-time',
                    'field' => 'term_id',
                    'terms'=> $all_job_types
                ));
                
            }

        }
        
    }

    $args['tax_query'][] = $all_taxonomies;

	$query = new WP_Query( $args );
 
	if ( $query->have_posts() ) {

        $jobs_that_matched = ''; // Is used to get the jobs as string
        $number_of_jobs_visible = 0; // Is used to count the jobs visible which are different from the posts found.

		while ( $query->have_posts() ) { $query->the_post();

            $all_posts = array();

            // wp_get_post_terms() hits the database everytime so results are overwritten everytime.
            // Using get_the_terms() on an ajax query the results are cached and returns 502 because the data cant be overwritten and we need to clearup the data after the lopp.
            $assigned_regions = wp_get_post_terms( get_the_ID(), 'long-regions', array( 'fields' => 'ids') );
            $assigned_categories = wp_get_post_terms( get_the_ID(), 'long-type-of-work', array( 'fields' => 'ids') );

            // If ONLY regions are selected.
            if ( count( (array)$all_regions ) != 0 && count( (array)$all_categories ) == 0 ) {
                
                foreach ( $assigned_regions as $assigned_region ) {
                    
                    // Check if the region exists on the filtered
                    if ( in_array( $assigned_region, $all_regions ) ) {

                        $region_name = get_term( $assigned_region )->name;

                        foreach ( $assigned_categories as $assigned_category ) {

                            $category_name = get_term( $assigned_category )->name;

                            $new_job  = array(
                                'job_id' => get_field('long_term_job_id'),
                                'link' => get_the_permalink(),
                                'country' => $region_name,
                                'position' => get_the_title(),
                                'category' => $category_name,
                                'date' => get_the_date('M j, Y'),
                            );

                            array_push( $all_posts, $new_job );

                        }

                    }
                    
                }

            } elseif ( count( (array)$all_categories ) != 0 && count( (array)$all_regions ) == 0 ) {

                foreach ( $assigned_categories as $assigned_category ) {
                    
                    if ( in_array( $assigned_category, $all_categories ) ) {

                        $category_name = get_term( $assigned_category )->name;

                        foreach ( $assigned_regions as $assigned_region ) {

                            $region_name = get_term( $assigned_region )->name;

                            $new_job  = array(
                                'job_id' => get_field('long_term_job_id'),
                                'link' => get_the_permalink(),
                                'country' => $region_name,
                                'position' => get_the_title(),
                                'category' => $category_name,
                                'date' => get_the_date('M j, Y'),
                            );

                            array_push( $all_posts, $new_job );

                        }

                    }
                    
                }

            } elseif ( has_term( $all_regions, 'long-regions' ) && has_term( $all_categories, 'long-type-of-work' ) && !empty( $all_regions ) && !empty( $all_categories ) ) {
            
                foreach ($assigned_regions as $region) {

                    if ( in_array( $region, $all_regions ) ){

                        $region_name = get_term( $region )->name;
                    
                        foreach ( $assigned_categories as $category ) {

                            if ( in_array($category, $all_categories) ) {

                                $category_name = get_term( $category )->name;

                                $new_job  = array(
                                    'job_id' => get_field('long_term_job_id'),
                                    'link' => get_the_permalink(),
                                    'country' => $region_name,
                                    'position' => get_the_title(),
                                    'category' => $category_name,
                                    'date' => get_the_date('M j, Y'),
                                );
        
                                array_push( $all_posts, $new_job );

                            }
                        }
                    }
                }

            } else {
                
                foreach ( $assigned_categories as $category ) {

                    $category_name = get_term( $category )->name;

                    foreach ( $assigned_regions as $region ) {

                        $region_name = get_term( $region )->name;

                        $new_job  = array(
                            'job_id' => get_field('long_term_job_id'),
                            'link' => get_the_permalink(),
                            'country' => $region_name,
                            'position' => get_the_title(),
                            'category' => $category_name,
                            'date' => get_the_date('M j, Y'),
                        );

                        array_push( $all_posts, $new_job );

                    }
                }

            }

            // Only show the filteres posts
            if ( is_countable($all_posts) && count( (array)$all_posts ) > 0 ) {

                foreach( $all_posts as $job ) {

                    $new_search_job = 
                        '<tr class="job-listing">
                            <td class="job-id"><a href="' . $job['link'] .'" target="_blank">' . $job['job_id'] . '</a></td>' .
                            '<td class="country"><a href="' . $job['link'] .'" target="_blank">' . $job['country'] . '</a></td>'.
                            '<td class="position" title="' . $job['position'] . '"><a href="' . $job['link'] .'" target="_blank">' . $job['position'] . '</a></td>'.
                            '<td class="category" title="' . $job['category'] . '"><a href="' . $job['link'] .'" target="_blank">' . $job['category'] . '</a></td>'.
                            '<td class="date"><a href="' . $job['link'] .'" target="_blank">' . $job['date'] . '</td>'.
                        '</tr>'
                    ;

                    $jobs_that_matched .= $new_search_job;

                    $number_of_jobs_visible++;

                }
                
            }

        }

        $data->jobs = $jobs_that_matched; // String of jobs found in the query.
        $data->total_of_jobs_visible = $number_of_jobs_visible + $loaded_jobs;
        $data->total_of_jobs_found = $query->found_posts;
        $data->page = $page;
        $data->num_max = $query->max_num_pages;

        echo json_encode( $data ); // Returns the data to the javascript as object.
        
	} else {
        
        $data->jobs =
            '<tr class="w-full">
                <td colspan="5" class="no-jobs-found">
                    No jobs found
                </td>
            </tr>'
        ;

        $data->total_of_jobs_visible = 0;
        $data->total_of_jobs_found = 0;
        $data->page = 1;
        $data->num_max = 1;

        echo json_encode( $data ); // Returns the data to the javascript as object.

    }

    wp_reset_postdata(); 

	die();

}
add_action('wp_ajax_long_search_jobs', 'long_job_search_filtering');
add_action('wp_ajax_nopriv_long_search_jobs', 'long_job_search_filtering');
 