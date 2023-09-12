<?php

    function enqueue_search_for_internship_script() {
    
        wp_enqueue_script( 'search_for_internship', get_stylesheet_directory_uri() . '/resources/js/internships/search-internship.js', array('jquery'), '4', false);

        wp_localize_script( 'search_for_internship', 'search_for_internship_ajax', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );

    }
    add_action( 'wp_enqueue_scripts', 'enqueue_search_for_internship_script' );

    // Internships page content Filtering
    function search_for_internships() {

        $page = $_POST['page_number'] + 1; // This paginates the posts

        // Holds the jobs after filtering.
        $data = (object)[]; // This line fixes the issue with PHP8.

        // Terms
        $all_terms = array(
            'relation' => 'AND',
        );

        // Get all long term posts that are published.
        $args = array(
            'post_type' => 'internships',
            'orderby' => 'date',
            'post_status' => 'publish',
            'posts_per_page' => 10,
            'paged' => $page
        );

        // When search input has text, search by title otherwise search by categories.
        if ( isset( $_POST['internships_string'] ) && !empty($_POST['internships_string']) ) {
            
            $args['s'] = $_POST['internships_string'];

        } else {

            // Semesers taken from the filters.
            $all_semesters = array();
            $semesters = get_terms( array( 'taxonomy' => 'semesters' ) );

            // If the category filter is selected then get only the degrees that have been selected.
            if ( $semesters ) {

                // Loop through the categories.
                foreach ( $semesters as $semester ) {

                    // If the category is selected on the filter option add it to the array, so we can filter after.
                    if ( isset( $_POST['semester_' . $semester->term_id] ) && $_POST['semester_' . $semester->term_id] == 'on' ) {

                        array_push( $all_semesters, $semester->term_id );

                    }

                }

                if ( is_countable( $all_semesters ) && count( $all_semesters ) > 0 ) {

                    array_push( $all_terms, array(
                        'taxonomy' => 'semesters',
                        'field' => 'id',
                        'terms'=> $all_semesters
                    ));
                    
                }

            }

            // Degrees taken from the filters.
            $all_degrees = array();
            $degrees = get_terms( array( 'taxonomy' => 'degrees' ) );

            // If the category filter is selected then get only the degrees that have been selected.
            if ( $degrees ) {

                // Loop through the categories.
                foreach ( $degrees as $degree ) {

                    // If the category is selected on the filter option add it to the array, so we can filter after.
                    if ( isset( $_POST['degree_' . $degree->term_id] ) && $_POST['degree_' . $degree->term_id] == 'on' ) {

                        array_push( $all_degrees, $degree->term_id );

                    }

                }

                if ( is_countable( $all_degrees ) && count( $all_degrees ) > 0 ) {

                    array_push( $all_terms, array(
                        'taxonomy' => 'degrees',
                        'field' => 'id',
                        'terms'=> $all_degrees
                    ));
                    
                }

            }

            // Locations taken from the filters.
            $all_locations = array();
            $locations = get_terms( array( 'taxonomy' => 'internship-location') );

            // If the region filter is selected then get only the regions that have been selected.
            if ( $locations ) {

                // Loop through the regions.
                foreach ( $locations as $location ) {

                    // If the region is selected on the filter option add it to the array, so we can filter after.
                    if( isset( $_POST['location_' . $location->term_id] ) && $_POST['location_' . $location->term_id] == 'on' ) {

                        array_push( $all_locations, $location->term_id );

                    }

                }

                // Add the selected region as filter for the posts.
                if ( is_countable( $all_locations ) && count( $all_locations ) > 0 ) {

                    array_push( $all_terms, array(
                        'taxonomy' => 'internship-location',
                        'field' => 'id',
                        'terms'=> $all_locations
                    ));
                    
                }

            }

            // Type taken from the filters.
            $all_types = array();
            $types = get_terms( array( 'taxonomy' => 'internship-type') );

            // If the region filter is selected then get only the regions that have been selected.
            if ( $types ) {

                // Loop through the regions.
                foreach ( $types as $type ) {

                    // If the region is selected on the filter option add it to the array, so we can filter after.
                    if ( isset( $_POST['type_' . $type->term_id] ) && $_POST['type_' . $type->term_id] == 'on' ) {

                        array_push( $all_types, $type->term_id );

                    }

                }

                // Add the selected region as filter for the posts.
                if ( is_countable($all_types) && count( $all_types ) > 0 ) {

                    array_push( $all_terms, array(
                        'taxonomy' => 'internship-type',
                        'field' => 'id',
                        'terms'=> $all_types
                    ));
                    
                }

            }
            
        }

        $args['tax_query'][] = $all_terms;

        $query = new WP_Query( $args );
    
        if ( $query->have_posts() ) {

            $internships_that_matched = ''; // Is used to get the jobs as string

            while ( $query->have_posts() ) { $query->the_post();

                $post_name = get_the_title();
                $post_excerpt = get_the_excerpt();
                $post_link = get_field('external_url');
                $post_thumbnail = get_the_post_thumbnail_url();

                // Fallback to check if has thumbnail otherwise use the term image as background.
                if ( has_post_thumbnail() ) {

                    $post_thumbnail = get_the_post_thumbnail_url();
            
                } else {
            
                    if ( has_term('', 'degrees') ) {
            
                        $intern_degree = get_the_terms( get_the_ID(), 'degrees' );
            
                        $post_thumbnail = get_field('internship_degree_image', 'term_' . $intern_degree[0]->term_id);
            
                        $post_thumbnail = $post_thumbnail['url'];
            
                    }
            
                }

                // When has a location or semester
                if ( has_term('', 'internship-location') || has_term('', 'semesters') ) {

                    $intern_location = get_the_terms( get_the_ID(), 'internship-location');

                    $intern_location_name = '';
                    $internship_types = '';

                    if ( has_term('virtual', 'internship-location') && has_term('virtual', 'internship-type') && !has_term('in-person', 'internship-type') ) {

                        $intern_location_name = 'Virtual';
                    
                    }  else if ( empty($intern_location) && has_term('virtual', 'internship-type') && !has_term('in-person', 'internship-type') ) {

                        $intern_location_name = 'Virtual';

                    } else if ( has_term('virtual', 'internship-location') && !has_term('virtual', 'internship-type') && !has_term('in-person', 'internship-type') ) {
                        
                        $intern_location_name = 'Virtual';

                    } else if ( $intern_location[0]->name != 'Virtual' ) {

                        $intern_location_name = $intern_location[0]->name;

                    } else if ( !has_term('virtual', 'internship-location') && has_term('virtual', 'internship-type') && has_term('in-person', 'internship-type') ) {
                            
                        $intern_location_name = 'Virtual or In-Person';

                    }

                    if ( has_term('in-person', 'internship-type') && !has_term('virtual', 'internship-type') && !has_term('virtual', 'internship-location') ) {
                            
                        $internship_types = '<span class="text-black-700-new px-1">/</span> IN-PERSON';

                    } else if ( has_term('virtual', 'internship-type') && has_term('in-person', 'internship-type') && $intern_location[0]->name != 'Virtual' ) {
                            
                        $internship_types = '<span class="text-black-700-new px-1">/</span> Virtual or In-Person';

                    } else if ( has_term('virtual', 'internship-type') && has_term('virtual', 'internship-location') && has_term('in-person', 'internship-type') && $intern_location[0]->name != 'Virtual' ) {

                        $internship_types = 'Virtual or In-Person';

                    } elseif ( $intern_location && $intern_location[0]->name != 'Virtual' && has_term('virtual', 'internship-type') && !has_term('in-person', 'internship-type') ) {

                        $internship_types = '<span class="text-black-700-new px-1">/</span> VIRTUAL';

                    }

                    if ( has_term('virtual', 'internship-type') && has_term('in-person', 'internship-type') && has_term('virtual', 'internship-location') && !empty($intern_location) ) {

                        $intern_location_name = 'Virtual or In-Person';

                    } else if ( !has_term('virtual', 'internship-type') && has_term('in-person', 'internship-type') && has_term('virtual', 'internship-location') && !empty($intern_location) ) {

                        $intern_location_name = 'Virtual or In-Person';

                    }

                    if ( has_term('', 'semesters') ) {

                        // Post taxonomies
                        $semesters_taxonomy = array('semesters');
                        $semesters_list = '';

                        foreach ( $semesters_taxonomy as $taxonomy ) {
                            
                            $semesters_associated = wp_get_post_terms( get_the_ID(), $taxonomy, array( 'fields' => 'names' ) );
                            
                            if ( !empty( $semesters_associated ) ) {
                                
                                foreach ( $semesters_associated as $term ) {
                                    
                                    $semesters_list .= $term . '/';
                                
                                }
                            
                            }

                        }
                        
                        $semesters_list = substr_replace($semesters_list, '', -1);
                        $semesters_list = str_replace('/', '<span class="px-1">/</span>', $semesters_list);

                    }

                    $internships_that_matched .= '
                        <div class="internship-itern text-default p-6 border-t-8 border-red-500 rounded-md shadow-2xl mb-10">
                            <div class="flex flex-col md:flex-row justify-between">
                                <div class="w-2/5 md:pr-8 hidden lg:block">
                                    <div class="w-full h-full bg-cover bg-no-repeat rounded-md" style="background-image: url('. $post_thumbnail .');"></div>
                                </div>
                        
                                <div class="w-full lg:w-3/5">

                                    <div class="text-xs font-bold flex items-center mb-2">
                                        <div class="text-orange-500 uppercase">'
                                            . $intern_location_name . ' ' . $internship_types .
                                        '</div>
                                    </div>

                                    <div class="text-3xl font-roboto font-light leading-9 mb-3">'
                                        . $post_name .
                                    '</div>

                                    <div class="text-xs font-bold flex items-center mb-2">
                                        <div class="text-black-700-new uppercase">'
                                            . $semesters_list .
                                        '</div>
                                    </div>

                                    <div class="font-medium leading-8 pl-6 border-l-2 border-separator mb-4">'
                                        . $post_excerpt .
                                    '</div>

                                    <div>
                                        <a href="'. $post_link .'" target="_blank" class="w-full md:w-auto text-center text-white-pure text-xl font-black leading-none px-10 py-3 bg-teal-500 inline-block">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';
                
                } else {

                    $internships_that_matched .= '
                        <div class="internship-itern text-default p-6 border-t-8 border-red-500 rounded-md shadow-2xl mb-10">
                            <div class="flex flex-col md:flex-row justify-between">
                                <div class="w-2/5 md:pr-8 hidden lg:block">
                                    <div class="w-full h-full bg-cover bg-no-repeat rounded-md" style="background-image: url('. $post_thumbnail .');"></div>
                                </div>
                        
                                <div class="w-full lg:w-3/5">

                                    <div class="text-3xl font-roboto font-light leading-9 mb-3">'
                                        . $post_name .
                                    '</div>

                                    <div class="font-medium leading-8 pl-6 border-l-2 border-separator mb-4">'
                                        . $post_excerpt .
                                    '</div>

                                    <div>
                                        <a href="'. $post_link .'" target="_blank" class="w-full md:w-auto text-center text-white-pure text-xl font-black leading-none px-10 py-3 bg-teal-500 inline-block">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ';

                }

            }

            wp_reset_postdata(); 

            $data->internships = $internships_that_matched; // String of jobs found in the query.
            $data->total_of_internships_found = $query->found_posts;
            $data->page = $page;
            $data->num_max = $query->max_num_pages;

            echo json_encode( $data ); // Returns the data to the javascript as object.
            
        } else {

            $data->internships =
                '<div class="w-full text-center text-default">
                    No internships found
                </div>'
            ;

            $data->total_of_internships_found = 0;
            $data->page = 1;
            $data->num_max = 1;

            echo json_encode( $data ); // Returns the data to the javascript as object.

        }

        die();

    }
    add_action('wp_ajax_internships_search', 'search_for_internships');
    add_action('wp_ajax_nopriv_internships_search', 'search_for_internships');
