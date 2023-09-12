<?php 

    // Enqueue ajax and script
    function enqueue_storie_search_script() {
    
        wp_enqueue_script( 'search-stories-script', get_stylesheet_directory_uri() . '/resources/js/stories/stories-search.js', array('jquery'), '4', false );
    
        wp_localize_script( 'search-stories-script', 'stories_search_ajax', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );

    }
    add_action( 'wp_enqueue_scripts', 'enqueue_storie_search_script' );
    
    function stories_search_filtering() {

        $page = $_POST['page_number'] + 1; // This paginates the posts

        // Holds the jobs after filtering.
        $data = (object)[]; // This line fixes the issue with PHP8.

        // Get all long term posts that are published.
        $args = array(
            'post_type' => 'stories',
            'orderby' => 'date',
            'post_status' => 'publish',
            'posts_per_page' => 10,
            'paged' => $page
        );

        // Categories taken from the filters.
        $all_workers = array();
        $workers = get_terms( array( 'taxonomy' => 'type-worker' ) );

        // If the category filter is selected then get only the categories that have been selected.
        if ( $workers ) {

            // Loop through the categories.
            foreach ( $workers as $worker ) {

                // If the category is selected on the filter option add it to the array, so we can filter after.
                if ( isset( $_POST['worker_' . $worker->term_id] ) && $_POST['worker_' . $worker->term_id] == 'on' ) {

                    array_push( $all_workers, $worker->term_id );

                }

            }

            if ( is_countable( $all_workers ) && count( $all_workers ) > 0 ) {

                $args['tax_query'][] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'type-worker',
                        'field' => 'id',
                        'terms'=> $all_workers,
                        'relation' => 'IN'
                    )
                );
                
            }

        }

        // Regions taken from the filters.
        $all_regions = array();
        $regions = get_terms( array( 'taxonomy' => 'region') );

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
            if ( is_countable( $all_regions ) && count( $all_regions ) > 0 ) {

                $args['tax_query'][] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'region',
                        'field' => 'id',
                        'terms'=> $all_regions,
                        'relation' => 'IN'
                    )
                );
                
            }

        }

        // Regions taken from the filters.
        $all_impacts = array();
        $impacts = get_terms( array( 'taxonomy' => 'type-impact') );

        // If the region filter is selected then get only the regions that have been selected.
        if ( $impacts ) {

            // Loop through the regions.
            foreach ( $impacts as $impact ) {

                // If the region is selected on the filter option add it to the array, so we can filter after.
                if ( isset( $_POST['impact_' . $impact->term_id] ) && $_POST['impact_' . $impact->term_id] == 'on' ) {

                    array_push( $all_impacts, $impact->term_id );

                }

            }

            // Add the selected region as filter for the posts.
            if ( is_countable( $all_impacts ) && count( $all_impacts ) > 0 ) {

                $args['tax_query'][] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'type-impact',
                        'field' => 'id',
                        'terms'=> $all_impacts,
                        'relation' => 'IN'
                    )
                );
                
            }

        }

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) {

            $stories_that_matched = ''; // Is used to get the stories as string

            while( $query->have_posts() ) { $query->the_post();

                // Post taxonomies
                $taxonomies = array('type-worker', 'region', 'type-impact');
                $taxo_string = '';
                
                foreach ( $taxonomies as $taxonomy ) {

					$taxonomies_associated = wp_get_post_terms( get_the_ID(), $taxonomy, array( 'fields' => 'names' ) );
																	
					if ( !empty( $taxonomies_associated ) ) {
																	
						foreach ( $taxonomies_associated as $term ) {
																	
							$taxo_string .= $term . '/';

						}
																	
					}
				}

				$taxo_string = substr_replace($taxo_string, '', -1);
				$taxo_string = str_replace('/', '<span class="text-white-pure px-1">/</span>', $taxo_string);

                $thumb_image = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : get_field('settings_default_thumbnail', 'options');
                $excerpt = mb_strimwidth( get_the_excerpt(), 0, 145, '...' );

                $stories_that_matched .= '
                    <div class="story-item sm:w-1/2 lg:w-1/3 flex px-3 py-3">
                        <div class="bg-black-500-new shadow-2xl rounded flex flex-col">
                            <div class="thumb">
                                <a href="' . get_the_permalink() . '" target="_blank">
                                    <img src="' . $thumb_image . '" alt="' . get_the_title() . '" class="w-full h-48 object-cover object-center">
                                </a>
                            </div>

                            <div class="px-6 py-4 bg-red-500">
                                <div class="text-2xl text-white-pure font-bold leading-tight mb-1">
								    <a href="' . get_the_permalink() . '" target="_blank">' . mb_strimwidth(get_the_title(), 0, 60, '...') . '</a>
								</div>

                                <div class="flex flex-wrap text-xs text-orange-500 font-bold uppercase">
                                    ' . $taxo_string . '
                                </div>
                            </div>

                            <div class="h-full flex flex-col justify-between px-6">
                                <div class="text-default text-sm leading-6 pt-5 mb-4">
                                    ' . $excerpt  .'
                                </div>

                                <div class="text-right pt-4 pb-4 border-t border-white-300-new">
                                    <a href="' . get_the_permalink() . '" target="_blank" class="text-red-500 leading-none font-black">More About ' . get_field('stories_more_about_button') . ' »</a>
                                </div>
                            </div>

                        </div>
                    </div>
                ';

            }

            $data->stories = $stories_that_matched; // String of jobs found in the query.
            $data->page = $page;
            $data->num_max = $query->max_num_pages;

            echo json_encode( $data ); // Returns the data to the javascript as object.

        } else {

            $data->stories =
                '<div class="w-full text-center text-default">
                    No stories found
                </div>'
            ;
        
            $data->page = 1;
            $data->num_max = 1;
        
            echo json_encode( $data ); // Returns the data to the javascript as object.
        
        }

        wp_reset_postdata(); 

	    die();
    
    }
    add_action('wp_ajax_search_for_stories', 'stories_search_filtering');
    add_action('wp_ajax_nopriv_search_for_stories', 'stories_search_filtering'); 