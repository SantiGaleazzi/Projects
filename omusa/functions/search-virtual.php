<?php 

    // Enqueue ajax and script
    function enqueue_virtual_jobs_script() {
    
        wp_enqueue_script( 'search-virtual-jobs', get_stylesheet_directory_uri() . '/resources/js/virtual/job-search.js', array('jquery'), '9', false );
    
        wp_localize_script( 'search-virtual-jobs', 'virtual_jobs_search_ajax', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );

    }
    add_action( 'wp_enqueue_scripts', 'enqueue_virtual_jobs_script' );

    function virtual_jobs_filtering() {

        // Default thumbnail image.
        $post_thumbnail = get_field('settings_default_thumbnail', 'options');
        $post_thumbnail = $post_thumbnail['url'];

        // Holds the jobs after filtering.
        $data = (object)[]; // This line fixes the issue with PHP8.

        // Variables.
        $all_taxonomies_regions = array();
        $page = $_POST['page_number'] + 1; // This paginates the posts
        $loaded_jobs = 0; // Used to count how many jobs are being showed.

        // Check which post types are being passed.
        if ( isset( $_POST['selected_type_of_posts'] ) && !empty( $_POST['selected_type_of_posts'] )) {

            $type_of_posts = explode(',', urldecode( $_POST['selected_type_of_posts'] ));

        } else {

            $type_of_posts = array('long-term', 'internships');

        }

        // This allows to correclty calculate the amount of jobs listed.
        if ( isset( $_POST['page_virtual_jobs_visible'] ) ) {
            
            $loaded_jobs = $_POST['page_virtual_jobs_visible'];

        }

        // Get all long term posts that are published.
        $args = array(
           'post_type' => $type_of_posts,
           'orderby' => 'date',
           'post_status' => array('publish', 'future'),
           'posts_per_page' => 10,
           'paged' => $page
        );

        // When search input has text, search by title otherwise search by categories.
        if ( isset( $_POST['virtual_search_string'] ) && !empty( $_POST['virtual_search_string'] ) ) {
           
           $args['s'] = $_POST['virtual_search_string'];

           $args['tax_query'] = array(
                'relation' => 'OR',
                array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'long-remote-jobs',
                        'field' => 'slug',
                        'terms' => array('virtual')
                    )
                ),
                array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'internship-remote-jobs',
                        'field' => 'slug',
                        'terms' => array('virtual')
                    )
                )
            );

        } else {
        
            if ( isset( $_POST['selected_regions_active'] ) && !empty( $_POST['selected_regions_active'] ) ) {

                // Regions taken from the filters.
                $param_regions = explode(',', urldecode( $_POST['selected_regions_active'] ));
                
                // Gets all regions from the terms.
                $terms_regions = get_terms(
                    array(
                        'taxonomy' => array(
                            'long-regions',
                            'internship-location'
                        ),
                        'hide_empty' => false
                    )
                );

                $args['tax_query'] = array(
                    'relation' => 'OR'
                );

                // If the region filter is selected then get only the regions that have been selected.
                if ( $terms_regions ) {
                   
                    // Check if the term exists in the post_type
                    foreach ( $type_of_posts as $type_of_post ) {
    
                        // This will create a temporary array where the regions are being saved and will reset for each custpm post-type.
                        $temporary_regions = array();
                        $temporary_tax_query = array(
                            'relation' => 'AND',
                        );
    
                        // This only helps the check which taxonomy should exists on each post-type.
                        if ( strpos( $type_of_post, 'long-') !== false ) {
    
                            $taxonomy_to_search = 'long-regions';

                            array_push( $temporary_tax_query, array(
                                'taxonomy' => 'long-remote-jobs',
                                'field' => 'slug',
                                'terms' => array('virtual')
                            ));
    
                        } else {
    
                            $taxonomy_to_search = 'internship-location';

                            array_push( $temporary_tax_query, array(
                                'taxonomy' => 'internship-remote-jobs',
                                'field' => 'slug',
                                'terms' => array('virtual')
                            ));
    
                        }
                        
                        // Loop through the regions that exists in the region.
                        foreach ( $param_regions as $region ) {
    
                            // Check if the region being searched exists in the post-type.
                            $term = term_exists( $region, $taxonomy_to_search );
    
                            if ( $term !== 0 && $term !== null ) {
                                
                                array_push( $temporary_regions, $region );
    
                            }
    
                        }
    
                        // Creates a array with all the data from each post-type.
                        array_push( $temporary_tax_query, array(
                            'taxonomy' => $taxonomy_to_search,
                            'field' => 'slug',
                            'terms'=> $temporary_regions
                        ));

                        // Adds only the data needed to the query.
                        array_push( $args['tax_query'], $temporary_tax_query );
    
                    }
    
                }
    
            } else {

                $args['tax_query'] = array(
                    'relation' => 'OR',
                    array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'long-remote-jobs',
                            'field' => 'slug',
                            'terms' => array('virtual')
                        )
                    ),
                    array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'internship-remote-jobs',
                            'field' => 'slug',
                            'terms' => array('virtual')
                        )
                    )
                );
            }
        }

        array_push( $args['tax_query'], $all_taxonomies_regions );

        $query = new WP_Query( $args );

        if ( $query->have_posts() ) {

            $jobs_that_matched = '';
            $number_of_vitual_jobs_visible = 0; // Is used to count the jobs visible which are different from the posts found.

            while ( $query->have_posts() ) { $query->the_post();

                // Get post thumbnail if exists.
                if ( has_post_thumbnail() ) {
                                
                    $post_thumbnail = get_the_post_thumbnail_url();

                }

                if ( get_post_type() === 'long-term' ) {

                    // Post taxonomies
                    $long_region = '';
                    $taxonomies_associated = wp_get_post_terms( get_the_ID(), 'long-regions', array( 'fields' => 'names' ) );

                    $desciption = wp_trim_words( get_field('long_term_description'), $num_words = 100, $more = '...' );
                        
                    if ( !empty( $taxonomies_associated ) ) {
                            
                        foreach ( $taxonomies_associated as $term) {
                                
                            $long_region .= $term . '/';
                            
                        }
                        
                    }
                    
                    $long_region = substr_replace($long_region, '', -1);
                    $long_region = str_replace('/', '<span class="px-1">/</span>', $long_region);

                    $jobs_that_matched .= '
                        <div class="job-listing w-full flex bg-page border-t-4 border-red-500 rounded-md overflow-hidden mb-4" data-job-type="' . get_post_type() . '">
                            <div class="sm:w-64 md:w-1/4 hidden sm:block">
                                <div class="w-full h-full bg-cover bg-center bg-no-repeat" style="background-image: url(' . $post_thumbnail . ');"></div>
                            </div>
            
                            <div class="w-full sm:w-3/4 flex flex-col md:flex-row p-6 lg:p-8">
                                <div class="w-full pr-0 md:pr-6 mb-4 md:mb-0">
                                    <div class="text-xs text-orange-500 font-bold uppercase mb-4">
                                        Long-term <span class="px-4">-</span> ' . $long_region . ' 
                                    </div>
            
                                    <div class="text-default">
                                        <div class="text-2xl font-bold leading-none mb-3">
                                            ' . get_the_title() . '
                                        </div>
                
                                        <div class="font-roboto font-bold mb-2">'
                                            . get_field('long_term_commitment') .
                                        '</div>

                                        <div class="font-medium">'
                                            . $desciption .
                                        '</div>
                                    </div>
                                </div>
            
                                <div class="flex-none">
                                    <a href="' . get_the_permalink() . '" class="text-white-pure text-lg leading-none font-black px-8 py-4 bg-red-500 inline-block">Learn More</a>
                                </div>
                            </div>
                        </div>
                    ';

                } else {

                    // Get Internship location.
                    $intern_location = wp_get_post_terms( get_the_ID(), 'internship-location');

                    if ( $intern_location && ! is_wp_error( $intern_location ) && count( $intern_location ) > 0 ) {

                        $intern_location = $intern_location[0]->name;

                    }

                    // Get semesters.
                    if ( has_term('', 'degrees') ) {

                        $intern_degree = wp_get_post_terms( get_the_ID(), 'degrees');
            
                        $post_thumbnail = get_field('internship_degree_image', 'term_' . $intern_degree[0]->term_id);
            
                        $post_thumbnail = $post_thumbnail['url'];
            
                    }

                    // Post taxonomies
                    $semesters_list = '';
                    $semesters_associated = wp_get_post_terms( get_the_ID(), 'semesters', array( 'fields' => 'names' ) );
                        
                    if ( !empty( $semesters_associated ) ) {
                            
                        foreach ( $semesters_associated as $term ) {
                                
                            $semesters_list .= $term . '/';
                            
                        }
                    
                    }
                    
                    $semesters_list = substr_replace( $semesters_list, '', -1 );
                    $semesters_list = str_replace( '/', '<span class="px-1">/</span>', $semesters_list );

                    $jobs_that_matched .= '
                        <div class="job-listing w-full flex bg-page border-t-4 border-red-500 rounded-md overflow-hidden mb-4">
                            <div class="sm:w-64 md:w-1/4 hidden sm:block">
                                <div class="w-full h-full bg-cover bg-center bg-no-repeat" style="background-image: url(' . $post_thumbnail . ');"></div>
                            </div>
            
                            <div class="w-full sm:w-3/4 flex flex-col md:flex-row p-6 lg:p-8">
                                <div class="w-full pr-0 md:pr-6 mb-4 md:mb-0">
                                    <div class="text-xs text-orange-500 font-bold uppercase mb-4">
                                        INTERNSHIP <span class="px-4">-</span> ' . $intern_location . ' 
                                    </div>
            
                                    <div class="text-default">
                                        <div class="text-2xl font-bold leading-none mb-3">
                                            ' . get_the_title() . '
                                        </div>
                
                                        <div class="font-roboto font-bold mb-2">'
                                            . $semesters_list .
                                        '</div>

                                        <div class="font-medium">'
                                            . get_the_excerpt() .
                                        '</div>
                                    </div>
                                </div>
            
                                <div class="flex-none">
                                    <a href="' . get_field('external_url') . '" target="_blank" class="text-white-pure text-lg leading-none font-black px-8 py-4 bg-red-500 inline-block">Learn More</a>
                                </div>
                            </div>
                        </div>
                    ';
                }
                
                $number_of_vitual_jobs_visible++;

            }

            $data->jobs = $jobs_that_matched; // String of jobs found in the query.
            $data->total_of_jobs_visible = $number_of_vitual_jobs_visible + $loaded_jobs;
            $data->total_of_jobs_found = $query->found_posts;
            $data->page = $page;
            $data->num_max = $query->max_num_pages;

            echo json_encode( $data ); // Returns the data to the javascript as object.

        } else {

            $data->jobs =
                '<div class="w-full text-center text-default">
                    No virtual jobs found
                </div>'
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
    add_action('wp_ajax_search_for_virtual_jobs', 'virtual_jobs_filtering');
    add_action('wp_ajax_nopriv_search_for_virtual_jobs', 'virtual_jobs_filtering'); 
