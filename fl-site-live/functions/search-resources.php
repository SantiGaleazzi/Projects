
<?php
    
    function enqueue_search_in_resources_script() {
    
        wp_enqueue_script( 'search_in_resources', get_stylesheet_directory_uri() . '/assets/js/filters-dropdown.js', array(), laravel_mix_asset( 'assets/js/filters-dropdown.js' ), true );

        // We have to pass parameters to job-search.js script but we can get the parameters values only in PHP
        wp_localize_script( 'search_in_resources', 'search_resources_ajax', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );

    }
    add_action( 'wp_enqueue_scripts', 'enqueue_search_in_resources_script' );


    // Internships page content Filtering
    function search_resources() {
        
        $page = $_POST['page_number'] + 1; // This paginates the posts
		
		$data = (object)[]; // This line fixes the issue with PHP8.

        // All taxonomies
        $all_taxonomies = array(
            'relation' => 'AND',
        );

        // Get all resources posts that are published.
        $args = array(
            'post_type' => 'resources',
            'orderby' => 'date',
            'post_status' => 'publish',
            'posts_per_page' => 12,
            'paged' => $page
        );

        if ( isset( $_POST['search_resources_string'] ) && !empty( $_POST['search_resources_string'] ) ) {

            $args['s'] = $_POST['search_resources_string'];

        } else {

            // Topics types taken from the filters.
            $all_resources_topics = array();
            $topics = get_terms( array( 'taxonomy' => 'topic') );

            // If the topic filter is selected then get only the locations that have been selected.
            if ( $topics ) {

                // Loop through the locations.
                foreach ( $topics as $topic ) {

                    // If the location is selected on the filter option add it to the array, so we can filter after.
                    if ( isset( $_POST['taxonomy_' . $topic->taxonomy] ) && $_POST['taxonomy_' . $topic->taxonomy] == 'topic_' . $topic->term_id ) {

                        array_push( $all_resources_topics, $topic->term_id );

                    }

                }

                // Add the selected types as filter for the posts.
				if ( is_countable($all_resources_topics) && count( (array)$all_resources_topics ) > 0 ) {

                    array_push( $all_taxonomies, array(
                        'taxonomy' => 'topic',
                        'field' => 'term_id',
                        'terms'=> $all_resources_topics
                    ));
                    
                }

            }

            // Persons types taken from the filters.
            $all_resources_people = array();
            $people = get_terms( array( 'taxonomy' => 'person') );

            // If the topic filter is selected then get only the locations that have been selected.
            if ( $people ) {

                // Loop through the locations.
                foreach ( $people as $person ) {

                    // If the location is selected on the filter option add it to the array, so we can filter after.
                    if ( isset( $_POST['taxonomy_' . $person->taxonomy] ) && $_POST['taxonomy_' . $person->taxonomy] == 'person_' . $person->term_id ) {

                        array_push( $all_resources_people, $person->term_id );

                    }

                }

                // Add the selected types as filter for the posts.
				if ( is_countable($all_resources_people) && count( (array)$all_resources_people ) > 0 ) {

                    array_push( $all_taxonomies, array(
                        'taxonomy' => 'person',
                        'field' => 'term_id',
                        'terms'=> $all_resources_people
                    ));
                    
                }

            }

            // Years types taken from the filters.
            $all_resources_years = array();
            $years = get_terms( array( 'taxonomy' => 'resource-year') );

            // If the year filter is selected then get only the locations that have been selected.
            if ( $years ) {

                // Loop through the locations.
                foreach ( $years as $year ) {

                    // If the location is selected on the filter option add it to the array, so we can filter after.
                    if ( isset( $_POST['taxonomy_' . $year->taxonomy] ) && $_POST['taxonomy_' . $year->taxonomy] == 'year_' . $year->term_id ) {

                        array_push( $all_resources_years, $year->term_id );

                    }

                }

                // Add the selected types as filter for the posts.
				if ( is_countable($all_resources_years) && count( (array)$all_resources_years ) > 0 ) {

                    array_push( $all_taxonomies, array(
                        'taxonomy' => 'resource-year',
                        'field' => 'term_id',
                        'terms'=> $all_resources_years
                    ));
                    
                }

            }

            $args['tax_query'][] = $all_taxonomies;

        }

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) :

            $resources_that_matched = '';

            while( $query->have_posts() ) : $query->the_post();

                /*
                if ( has_term('series', 'type') && has_term('', 'series') ) {

                    // Get the serie attached to the post.
                    $serie_data = wp_get_post_terms( get_the_ID(), 'series', array( 'fields' => 'all') );

                    // Get the seasons attached to the post.
                    $season_data = wp_get_post_terms( get_the_ID(), 'season', array( 'fields' => 'all') );

                    $resources_that_matched .= '
                        <div class="resource-item w-full sm:w-1/2 lg:w-1/3 flex px-1">
                            <a href="'. get_term_link( $serie_data[0]->term_id ) . '?season='. str_replace( 'season-', '', $season_data[0]->slug ) .'&episode='. get_field('series_episode_number') .'" target="_blank" class="w-full inline-flex">
                                <div class="w-full border-2 border-gray-850 hover:border-white rounded-lg group transition-all duration-100 ease-in-out">
                                    <div class="h-40 rounded-lg transition-all duration-100 ease-in-out overflow-hidden relative">
                                        <div class="w-full h-full flex items-end px-4 py-3 bg-center bg-cover bg-no-repeat relative" style="background-image: url(' . get_the_post_thumbnail_url( $post->ID, 'medium' ) . ');">
                                            <i class="far fa-play-circle text-3xl"></i>
                                        </div>
                                    </div>

									<div class="py-2">
										<div class="text-white text-lg font-bold px-4">'
											. get_the_title() .
										'</div>
									</div>
                                </div>
                            </a>
                        </div>
                    ';
				*/

                 $resources_that_matched .= '
                        <div class="resource-item w-full sm:w-1/2 lg:w-1/3 flex px-1">
                            <a href="' . get_the_permalink() . '" target="_blank" class="w-full inline-flex">
                                <div class="w-full border-2 border-gray-850 hover:border-white rounded-lg group transition-all duration-100 ease-in-out">
                                    <div class="h-40 rounded-lg transition-all duration-100 ease-in-out overflow-hidden relative">
                                        <div class="w-full h-full flex items-end px-4 py-3 bg-center bg-cover bg-no-repeat relative" style="background-image: url(' . get_the_post_thumbnail_url( $post->ID, 'medium' ) . ');">
                                            <i class="far fa-play-circle text-3xl"></i>
                                        </div>
                                    </div>

                                    <div class="text-white text-lg font-bold px-4 py-2">'
                                        . get_the_title() .
                                    '</div>
                                </div>
                            </a>
                        </div>
                    ';
            
            endwhile;

            wp_reset_postdata();

            $data->resources = $resources_that_matched; // String of resourcces found in the query.
            $data->page = $page;
            $data->not_found = false;
            $data->num_max = $query->max_num_pages;

            echo json_encode( $data ); // Returns the data to the javascript as object.

        else :

            $data->resources =
                '<div class="w-full text-center text-white text-xl">
                    No resources found
                </div>'
            ;

            $data->not_found = true;
            $data->page = 1;
            $data->num_max = 1;
    
            echo json_encode( $data ); // Returns the data to the javascript as object.

        endif;

        die();
        
    }
    add_action('wp_ajax_resources_search', 'search_resources');
    add_action('wp_ajax_nopriv_resources_search', 'search_resources');
