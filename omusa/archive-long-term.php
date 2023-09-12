<?php

    get_header();

    $jobs_that_matched = 0; // Is used to get the jobs as string
    $number_of_jobs_visible = 0; // Is used to count the jobs visible which are different from the posts found.
    
?>

    <div class="ask-a-question-btn w-auto md:w-40 text-center text-white-pure flex flex-col items-center justify-center p-5 bg-teal-500 fixed top-0 right-0 mt-56 rounded-l-lg shadow-2xl cursor-pointer z-30">
        <div class="md:mb-3">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/ask-a-question-white-icon.png" alt="Ask a Question about Working with OM" class="w-8 md:w-auto">
        </div>

        <div class="font-roboto font-light hidden md:block">
            <strong>Ask</strong> a Question about <strong>Working with OM »</strong>
        </div>
    </div>

    <section class="section-quoted pt-20 md:pt-48 lg:pt-56 xl:pt-64 pb-16 relative">
        <div class="container">
            <div class="headline text-default mx-auto">
                Job <strong>Search</strong>
            </div>
        </div>
    </section>

    <form id="filters" action="<?= admin_url('admin-ajax.php'); ?>" method="POST" class="px-6 pb-16 bg-gray-150-new">
        <div class="container relative">
            <div class="w-full md:w-3/4 pt-6 px-0 md:px-10 rounded absolute top-0 left-0 right-0 -mt-14 mx-auto">
                <div class="w-full py-8 bg-red-500 rounded">
                </div>

                <div class="w-11/12 flex items-end px-4 py-3 bg-page rounded relative z-10 -mt-8 mx-auto shadow-xl">
                    <div class="flex-1 pr-4">
                        <div class="text-xs text-default font-bold mb-1">
                            SEARCH BY POSITION TITLE
                        </div>

                        <div>
                            <input type="text" id="long_string" name="long_string" class="w-full px-3 py-1 border border-separator rounded shadow">
                        </div>
                    </div>

                    <div>
                        <button type="button" class="text-white-pure px-6 py-2 bg-red-500 cursor-pointer"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                
            </div>

            <div class="pt-32 flex flex-col lg:flex-row">

                <!-- Filters -->
                <div class="w-full lg:w-1/4 lg:pr-3 xl:pr-6 flex flex-wrap flex-col sm:flex-row lg:flex-col">

                    <button id="reset-long" class="w-full lg:w-full text-white-pure text-lg font-black leading-none p-4 bg-orange-500 mb-5" type="button">Clear All Filters</button>

                    <!-- Location -->
                    <?php
                        $term_location = get_terms(
                            array(
                                'taxonomy' => 'long-location',
                                'orderby' => 'name'
                            )
                        );

                        if ( $term_location ) :
                    ?>
                        <div class="w-full sm:w-1/2 lg:w-full sm:px-2 lg:px-0 mb-5">
                            <div class="text-xs text-default font-bold mb-1">
                                JOB LOCATION
                            </div>

                            <div class="filter">
                                <div class="filter-collapsable flex items-center justify-between text-xs text-red-500 font-black leading-none px-4 py-3 cursor-pointer">
                                    <span class="options-selected uppercase">SELECT</span>

                                    <div class="flex items-center relative">
                                        <div class="options-counter w-5 h-5 flex items-center justify-center text-white-pure bg-red-500 rounded-full absolute top-0 right-0 -mt-1 mr-5 opacity-0 transition duration-150 ease-in-out">
                                            0
                                        </div>

                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </div>

                                <div class="filter-terms px-2">
                                    <?php foreach ( $term_location as $location ) : ?>
                                        <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
                                            <label for="location_<?= $location->term_id; ?>" class="flex items-center">
                                                <input type="checkbox" id="location_<?= $location->term_id; ?>" name="location_<?= $location->term_id; ?>" data-name="<?= $location->name; ?>" data-term-id="<?= $location->term_id; ?>" class="mr-2" <?php if ( $location->name == 'Virtual' && isset($_GET['is-virtual']) ) { echo 'checked="checked"'; } ?>>
                                                <?= $location->name; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- location -->

                    <!-- Regions -->
                    <?php
                        $term_regions = get_terms(
                            array(
                                'taxonomy' => 'long-regions',
                                'orderby' => 'name'
                            )
                        );

                        if ( $term_regions ) :
                    ?>
                        <div class="w-full sm:w-1/2 lg:w-full sm:px-2 lg:px-0 mb-5">
                            <div class="text-xs text-default font-bold mb-1">
                                GLOBAL REGION OR COUNTRY
                            </div>

                            <div class="filter">
                                <div class="filter-collapsable flex items-center justify-between text-xs text-red-500 font-black leading-none px-4 py-3 cursor-pointer">
                                    <span class="options-selected uppercase">SELECT</span>

                                    <div class="flex items-center relative">
                                        <div class="options-counter w-5 h-5 flex items-center justify-center text-white-pure bg-red-500 rounded-full absolute top-0 right-0 -mt-1 mr-5 opacity-0 transition duration-150 ease-in-out">
                                            0
                                        </div>

                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </div>

                                <div class="filter-terms px-2">
                                    <?php foreach ( $term_regions as $region ) : ?>
                                        <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
                                            <label for="region_<?= $region->term_id; ?>" class="flex items-center">
                                                <input type="checkbox" id="region_<?= $region->term_id; ?>" name="region_<?= $region->term_id; ?>" data-name="<?= $region->name; ?>" data-term-id="<?= $region->term_id; ?>" class="mr-2">
                                                <?= $region->name; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Regions -->

                    <!-- Categories -->
                    <?php
                        $term_category = get_terms(
                            array(
                                'taxonomy' => 'long-type-of-work',
                                'orderby' => 'name'
                            )
                        );

                        if ( $term_category ) :
                    ?>
                        <div class="w-full sm:w-1/2 lg:w-full sm:px-2 lg:px-0 mb-5">
                            <div class="text-xs text-default font-bold mb-1">
                                JOB CATEGORY
                            </div>

                            <div class="filter">
                                <div class="filter-collapsable flex items-center justify-between text-xs text-red-500 font-black leading-none px-4 py-3 cursor-pointer">
                                    <span class="options-selected uppercase">SELECT</span>

                                    <div class="flex items-center relative">
                                        <div class="options-counter w-5 h-5 flex items-center justify-center text-white-pure bg-red-500 rounded-full absolute top-0 right-0 -mt-1 mr-5 opacity-0 transition duration-150 ease-in-out">
                                            0
                                        </div>

                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </div>

                                <div class="filter-terms px-2">
                                    <?php foreach ( $term_category as $category ) : ?>
                                        <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
                                            <label for="category_<?= $category->term_id; ?>" class="flex items-center">
                                                <input type="checkbox" id="category_<?= $category->term_id; ?>" name="category_<?= $category->term_id; ?>" data-name="<?= $category->name; ?>" data-term-id="<?= $category->term_id; ?>" class="mr-2">
                                                <?= $category->name; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Categories -->

                    <!-- Pay Structure -->
                    <?php
                        $term_job_type = get_terms(
                            array(
                                'taxonomy' => 'long-part-time',
                                'orderby' => 'name'
                            )
                        );

                        if ( $term_job_type ) :
                    ?>
                        <div class="w-full sm:w-1/2 lg:w-full sm:px-2 lg:px-0 mb-5 lg:mb-0">
                            <div class="text-xs text-default font-bold mb-1">
                                PAY STRUCTURE
                            </div>

                            <div class="filter">
                                <div class="filter-collapsable flex items-center justify-between text-xs text-red-500 font-black leading-none px-4 py-3 cursor-pointer">
                                    <span class="options-selected uppercase">SELECT</span>

                                    <div class="flex items-center relative">
                                        <div class="options-counter w-5 h-5 flex items-center justify-center text-white-pure bg-red-500 rounded-full absolute top-0 right-0 -mt-1 mr-5 opacity-0 transition duration-150 ease-in-out">
                                            0
                                        </div>

                                        <i class="fas fa-sort-down"></i>
                                    </div>
                                </div>

                                <div class="filter-terms px-2">
                                    <?php foreach ( $term_job_type as $job_type ) : ?>
                                        <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
                                            <label for="job_type_<?= $job_type->term_id; ?>" class="flex items-center">
                                                <input type="checkbox" id="job_type_<?= $job_type->term_id; ?>" name="job_type_<?= $job_type->term_id; ?>" data-name="<?= $job_type->name; ?>" data-term-id="<?= $job_type->term_id; ?>" class="mr-2">
                                                <?= $job_type->name; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Pay Structure -->

                    <div class="selected_filtered_options"></div>
                </div>
                <!-- Filters -->

                <!-- Job List -->
                <?php

                    $args = array(
                        'post_type' => 'long-term',
                        'orderby' => 'date',
                        'post_status' => 'publish',
                        'posts_per_page' => 10,
                        'paged' => 1
                    );

                    if ( isset($_GET['is-virtual']) ) {

                        $args['tax_query'][] = array(
                            'relation' => 'AND',
                            array(
                                'taxonomy' => 'long-location',
                                'field' => 'slug',
                                'terms'=> 'virtual',
                                'relation' => 'IN'
                            )
                        );
                
                    }


                    // This scripts checks what filters have been selected and filters the query.
                    if ( isset($_GET['applied-filters']) ) {

                        $filter_params = $_GET['applied-filters'];
                        $filter_params = str_replace(',', ' ', $filter_params);

                        // Locations taken from the filters.
                        $all_locations = array();
                        $locations = get_terms( array( 'taxonomy' => 'long-location') );

                        // If the region filter is selected then get only the locations that have been selected.
                        if ( $locations ) {

                            // Loop through the locations.
                            foreach ( $locations as $location ) {

                                // If the location is selected on the filter option add it to the array, so we can filter after.
                                if ( strpos($filter_params, (string)$location->term_id) !== false ) {

                                    array_push($all_locations, $location->term_id);

                                }

                            }

                            // Add the selected region as filter for the posts.
                            if ( is_countable($all_locations) && count( (array)$all_locations ) > 0 ) {

                                $args['tax_query'] = array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'long-location',
                                        'field' => 'id',
                                        'terms'=> $all_locations,
                                        'relation' => 'IN'
                                    )
                                );
                                
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
                                if ( strpos($filter_params, (string)$region->term_id) !== false ) {

                                    array_push( $all_regions, $region->term_id );

                                }

                            }

                            // Add the selected region as filter for the posts.
                            if ( is_countable($all_regions) && count( (array)$all_regions ) > 0 ) {

                                $args['tax_query'] = array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'long-regions',
                                        'field' => 'id',
                                        'terms'=> $all_regions,
                                        'relation' => 'IN'
                                    )
                                );
                                
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
                                if ( strpos( $filter_params, (string)$category->term_id ) !== false ) {

                                    array_push( $all_categories, $category->term_id );

                                }

                            }

                            if( is_countable($all_categories) && count( (array)$all_categories ) > 0 ) {

                                $args['tax_query'][] = array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'long-type-of-work',
                                        'field' => 'id',
                                        'terms'=> $all_categories,
                                        'relation' => 'IN'
                                    )
                                );
                                
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
                                if ( strpos( $filter_params, (string)$job_type->term_id ) !== false ) {

                                    array_push( $all_job_types, $job_type->term_id );

                                }

                            }

                            if ( is_countable($all_job_types) && count( (array)$all_job_types ) > 0 ) {

                                $args['tax_query'][] = array(
                                    'relation' => 'AND',
                                    array(
                                        'taxonomy' => 'long-part-time',
                                        'field' => 'id',
                                        'terms'=> $all_job_types,
                                        'relation' => 'IN'
                                    )
                                );
                                
                            }

                        }

                    }

                    $long_query = new WP_Query( $args );

                    if ( $long_query->have_posts() ) :

                        $jobs_that_matched =  $long_query->found_posts;

                        // This while allows us to know how many posts are visible.
                        while ( $long_query->have_posts() ) {

                            $long_query->the_post();
                                        
                            // Post Terms.
                            $job_region = get_the_terms( $post->ID, 'long-regions');
                            $job_category = get_the_terms( $post->ID, 'long-type-of-work');

                            $number_regions = count((array)$job_region);
                            $number_categories = count((array)$job_category);

                            $total_taxonomies =  $number_regions * $number_categories;

                            $number_of_jobs_visible += $total_taxonomies;

                        }
                        
                        wp_reset_postdata();
                ?>
                    <div class="w-full lg:w-3/4 flex flex-col lg:pl-3 xl:pl-6">
                        <div class="w-full px-5 bg-page rounded shadow-xl">
                            <div class="flex items-center py-4 border-b border-separator mb-4 justify-between">
                                <div class="text-xs text-default font-bold uppercase">
                                    SHOWING <span class="total-of-jobs-visible"><?= $number_of_jobs_visible; ?></span> RESULTS FOUND IN <span class="total-of-jobs-found"><?= $jobs_that_matched; ?></span> POSITIONS <span id="query-search"></span>
                                </div>
                            </div>
                        
                            <div class="w-full pb-5 overflow-x-scroll">
                                <table class="table-sortable">
                                    <thead>
                                        <tr>
                                            <th class="job-id">Job Number</th>
                                            <th class="country">Country</th>
                                            <th class="position">Position</th>
                                            <th class="category">Category</th>
                                            <th class="date">Date Posted</th>
                                        </tr>
                                    </thead>

                                    <tbody id="list-of-jobs-found" class="list_of_jobs_found">
                                        <?php
                                            while( $long_query->have_posts() ) : $long_query->the_post();
                                        
                                            // Post Terms.
                                            $job_region = get_the_terms( $post->ID, 'long-regions');
                                            $job_category = get_the_terms( $post->ID, 'long-type-of-work');

                                            // Variable declare.
                                            $all_jobs = array();
                                            $regions_list = array();
                                            $categories_list = array();

                                            // Gets region object slug and adds it to a new array.
                                            foreach ( $job_region as $region ) {

                                                array_push($regions_list, $region->name);

                                            }
                                            
                                            // Gets categories object slug and adds it to a new array.
                                            foreach ( $job_category as $position ) {

                                                array_push($categories_list, $position->name );

                                            }
                                            
                                            // Amount of items in both arrays.
                                            $amount_of_regions = count((array)$regions_list);
                                            $amount_of_categories = count((array)$categories_list);
                                            
                                            // When the job has more regions than categories
                                            if ( $amount_of_regions > $amount_of_categories ) {
                                                
                                                foreach ( $regions_list as $region ) {

                                                    foreach ( $categories_list as $category ) {

                                                        $new_job  = array(
                                                            'job_id' => get_field('long_term_job_id'),
                                                            'country' => $region,
                                                            'position' => get_the_title(),
                                                            'category' => $category,
                                                            'date' => get_the_date('M j, Y'),
                                                        );
                                                        
                                                        // Adds the data to the jobs array.
                                                        array_push($all_jobs, $new_job);

                                                    }
                                                }
                                            
                                            // When the job has more categories than regions
                                            } else if ( $amount_of_categories > $amount_of_regions) {

                                                foreach ( $categories_list as $category ) {

                                                    foreach ( $regions_list as $region ) {

                                                        $new_job  = array(
                                                            'job_id' => get_field('long_term_job_id'),
                                                            'country' => $region,
                                                            'position' => get_the_title(),
                                                            'category' => $category,
                                                            'date' => get_the_date('M j, Y'),
                                                        );
                                                        
                                                        // Adds the data to the jobs array.
                                                        array_push($all_jobs, $new_job);
                                                        
                                                    }
                                                }

                                            // When the job categories and regions are equal
                                            } else {

                                                foreach ( $categories_list as $category ) {

                                                    foreach ( $regions_list as $region ) {

                                                        $new_job  = array(
                                                            'job_id' => get_field('long_term_job_id'),
                                                            'country' => $region,
                                                            'position' => get_the_title(),
                                                            'category' => $category,
                                                            'date' => get_the_date('M j, Y'),
                                                        );

                                                        array_push($all_jobs, $new_job);

                                                    }
                                                }
                                            }

                                        ?>
                                            <?php foreach ( $all_jobs as $job ) : ?>
                                                <tr class="job-listing">
                                                    <td class="job-id"><a href="<?php the_permalink(); ?>" target="_blank"><?= $job['job_id']; ?></a></td>
                                                    <td class="country"><a href="<?php the_permalink(); ?>" target="_blank"><?= $job['country']; ?></a></td>
                                                    <td class="position" title="<?= $job['position']; ?>"><a href="<?php the_permalink(); ?>" target="_blank"><?= $job['position']; ?></a></td>
                                                    <td class="category" title="<?= $job['category']; ?>"><a href="<?php the_permalink(); ?>" target="_blank"><?= $job['category']; ?></a></td>
                                                    <td class="datex"><a href="<?php the_permalink(); ?>" target="_blank"><?= $job['date']; ?></a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endwhile; ?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    
                        <?php if ( $long_query->max_num_pages > 1 ) : ?>
                            <div class="w-full load-the-new-jobs text-center pt-8">
                                <div>
                                    <button type="button" class="text-white-pure text-lg font-bold leading-none px-10 py-4 bg-red-500 relative">See More <div class="loading-spinner absolute top-0 right-0"></div></button>
                                </div>

                                <input type="hidden" id="current_page" name="page_number" value="1">
                                <input type="hidden" id="current_visible" name="page_jobs_visible" value="<?= $number_of_jobs_visible; ?>">
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
                <!-- Job List -->

            </div>
        </div>

        <input type="hidden" name="action" value="long_search_jobs">
    </form>

    <!-- Ask a Questiostion Lightbox -->
    <?php get_template_part('partials/lightboxes/long-term-lightbox'); ?>
    <!-- Ask a Questiostion Lightbox -->
    
<?php get_footer();
