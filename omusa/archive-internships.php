<?php

    get_header();

    $internships_that_matched = 0; // Is used to get the internships as string

    $default_image = get_field('internships_background_image_options', 'options');
    
?>

    <section class="px-6 pt-16 md:pt-40">
        <div class="container">
            <div class="pb-16 xl:pt-12">
                <div class="flex flex-col xl:flex-row justify-center">
                    <div id="internship-form-nav" class="text-center">
                        <a href="/internships" class="internship-menu-option">
                            Home
                        </a>
                        <a href="/internships/?internOption=about-internships" class="internship-menu-option">
                            About
                        </a>
                        <a href="/internships/?internOption=degree-tracks" class="internship-menu-option active">
                            Degree Tracks
                        </a>
                        <a href="/internships/?internOption=stories" class="internship-menu-option">
                            Stories
                        </a>
                        <a href="/internships/?internOption=faqs" class="internship-menu-option">
                            FAQs
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
        
        // Updates the page title and description when params are sent.
        if ( isset( $_GET['internship-cat'] ) ) {

            $degree_terms = get_term_by('slug', $_GET['internship-cat'], 'degrees');

            $default_image = get_field('internship_degree_background', 'term_' . $degree_terms->term_id);

        } else {

            $degree_terms = get_term_by('id', get_field('internships_default_degree', 'options'), 'degrees');

        }

    ?>
    <section class="section-quoted py-12 md:py-20 bg-gray-150-new relative">
        <div class="container">
            <div class="md:w-1/2 xl:w-1/3">
                <div class="headline text-default">
                    <strong><?= $degree_terms->name; ?></strong>
                </div>

                <div class="text-sm text-default">
                    <?= $degree_terms->description; ?>
                </div>
            </div>
        </div>

        <div class="hidden md:block w-3/5 h-full bg-cover xl:bg-contain bg-center bg-no-repeat absolute top-0 right-0" style="background-image: url(<?= $default_image; ?>);"></div>
    </section>

    <!-- Job List -->
    <?php

    $args = array(
        'post_type' => 'internships',
        'orderby' => 'date',
        'post_status' => 'publish',
        'posts_per_page' => 10,
        'paged' => 1
    );

    // This scripts checks what filters have been selected and filters the query.
    if ( isset( $_GET['applied-filters'] ) ) {

        $filter_params = $_GET['applied-filters'];
        $filter_params = explode(',', strtolower($filter_params));

        $all_semesters = array();
        $semesters = get_terms( array( 'taxonomy' => 'semesters' ) );

        // If the category filter is selected then get only the categories that have been selected.
        if ( $semesters ) {

            // Loop through the categories.
            foreach ( $semesters as $semester ) {

                // If the semester is selected on the filter option add it to the array, so we can filter after.
                if (  in_array(strtolower($semester->name), $filter_params) ) {

                    array_push( $all_semesters, $semester->term_id );

                }

            }

            if ( is_countable( $all_semesters ) && count( $all_semesters ) > 0 ) {

                $args['tax_query'][] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'semesters',
                        'field' => 'id',
                        'terms'=> $all_semesters,
                        'relation' => 'IN'
                    )
                );
                
            }

        }

        // Degrees taken from the filters.
        $all_degrees = array();
        $degrees = get_terms( array( 'taxonomy' => 'degrees') );

        // If the region filter is selected then get only the regions that have been selected.
        if ( $degrees ) {

            // Loop through the regions.
            foreach ( $degrees as $degree ) {

                // If the location is selected on the filter option add it to the array, so we can filter after.
                if ( in_array(strtolower($degree->name), $filter_params) ) {

                    array_push( $all_degrees, $degree->term_id );

                }

            }

            // Add the selected region as filter for the posts.
            if ( is_countable( $all_degrees ) && count( $all_degrees ) > 0 ) {

                $args['tax_query'][] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'degrees',
                        'field' => 'id',
                        'terms'=> $all_degrees,
                        'relation' => 'IN'
                    )
                );
                
            }

        }

        // Locations taken from the filters.
        $all_locations = array();
        $locations = get_terms( array( 'taxonomy' => 'internship-location') );

        // If the region filter is selected then get only the regions that have been selected.
        if ( $locations ) {

            // Loop through the regions.
            foreach ( $locations as $location ) {

                // If the location is selected on the filter option add it to the array, so we can filter after.
                if ( in_array(strtolower($location->name), $filter_params) ) {

                    array_push( $all_locations, $location->term_id );

                }

            }

            // Add the selected region as filter for the posts.
            if ( is_countable( $all_locations ) && count( $all_locations ) > 0 ) {

                $args['tax_query'][] = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'internship-location',
                        'field' => 'id',
                        'terms'=> $all_locations,
                        'relation' => 'IN'
                    )
                );
                
            }

        }

    }

    // To load specific degree tracks from a param comming from the Internships page
    if ( isset( $_GET['internship-cat'] ) ) {

        $internship_params = $_GET['internship-cat'];
        $internship_params = str_replace(',', ' ', $internship_params);
        
        // Degrees taken from the filters.
        $all_cat_degrees = array();
        $cat_degrees = get_terms(
            array(
                'taxonomy' => 'degrees',
                'orderby' => 'name'
            )
        );

        // If the degree filter is selected then get only the regions that have been selected.
        if ( $cat_degrees ) {

            // Loop through the regions.
            foreach ( $cat_degrees as $degree ) {

                // If the degree is selected on the filter option add it to the array, so we can filter after.
                if ( strpos( $internship_params, $degree->slug ) !== false ) {

                    array_push( $all_cat_degrees, $degree->term_id );

                }

            }

            // Add the selected region as filter for the posts.
            if ( is_countable( $all_cat_degrees ) && count( $all_cat_degrees ) > 0 ) {

                $args['tax_query'][] = array(
                    array(
                        'taxonomy' => 'degrees',
                        'field' => 'id',
                        'terms'=> $all_cat_degrees
                    )
                );
                
            }

        }

    }

    $internships_query = new WP_Query( $args );

    if ( $internships_query->have_posts() ) :

        $internships_that_matched = $internships_query->found_posts;

    ?>
    <form id="internships-filters" action="<?= admin_url('admin-ajax.php'); ?>" method="POST" class="py-10 px-6 bg-page">
        <div class="container relative">
            <div class="text-default font-medium mb-8">
                You May Personalize Your Search by Narrowing Your Options:
            </div>

            <div class="flex flex-col md:flex-row">

                <!-- Filters -->
                <div class="w-full md:w-1/3 lg:w-1/4 md:pr-6 flex flex-wrap flex-col sm:flex-row md:flex-col">

                    <div class="w-full text-default flex flex-col sm:flex-row md:flex-col lg:flex-row items-center justify-center px-8 py-4 md:py-8 lg:py-4 bg-gray-150-new rounded-md mb-8">
                        <div class="flex-none">
                            <img src="<?php bloginfo('template_url'); ?>/assets/images/short-term-posts-icon.png" alt="Internships Term Clock Icon" class="w-8">
                        </div>

                        <div class="total-of-internships-found md:flex-1 text-center text-4xl font-roboto font-light leading-none sm:px-5 md:px-0 lg:px-6 py-6 lg:py-0">
                            <?= $internships_that_matched; ?>
                        </div>

                        <div class="text-center lg:text-left font-roboto leading-5">
                            Internships Found
                        </div>
                    </div>

                    <!-- Semesters -->
                     <?php
                        $internship_semesters = get_terms(
                            array(
                                'taxonomy' => 'semesters',
                                'orderby' => 'name',
                                'hide_empty' => false
                            )
                        );

                        if ( $internship_semesters ) :
                            
                    ?>
                        <div class="w-full sm:w-1/2 md:w-full sm:pr-2 md:pr-0 mb-5">
                            <div class="text-xs text-default font-bold mb-2">
                                SEMESTER
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
                                    <?php foreach ( $internship_semesters as $semester ) : ?>
                                        <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
                                            <label for="semester_<?= $semester->term_id; ?>" class="flex items-center">
                                                <input type="checkbox" id="semester_<?= $semester->term_id; ?>" name="semester_<?= $semester->term_id; ?>" data-name="<?= $semester->name; ?>" data-term-id="<?= $semester->term_id; ?>" class="mr-2">
                                                <?= $semester->name; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Semesters -->

                    <!-- Degrees -->
                    <?php
                        $internship_degress = get_terms(
                            array(
                                'taxonomy' => 'degrees',
                                'orderby' => 'name'
                            )
                        );

                        if ( $internship_degress ) :
                    ?>
                        <div class="w-full sm:w-1/2 md:w-full sm:pl-2 md:pl-0 mb-5">
                            <div class="text-xs text-default font-bold uppercase mb-2">
                                DEGREE TRACK
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
                                    <?php foreach ( $internship_degress as $degree ) : ?>
                                        <?php
                                            if ( $degree->parent == 0 ) :

                                                $children_terms = get_term_children($degree->term_id, 'degrees');

                                        ?>
                                            <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
                                                <label for="degree_<?= $degree->term_id; ?>" class="flex items-center">
                                                    <input type="checkbox" id="degree_<?= $degree->term_id; ?>" name="degree_<?= $degree->term_id; ?>" data-name="<?= $degree->name; ?>" data-term-id="<?= $degree->term_id; ?>" class="mr-2">
                                                    <?= $degree->name; ?>
                                                </label>
                                            </div>

                                            <?php if ( !empty( $children_terms ) && !is_wp_error( $children_terms ) ) : ?>
                                                <?php
                                                    foreach ( $children_terms as $child_id ) :

                                                    $child_name = get_term( $child_id )->name
                                                ?>
                                                    <div class="text-xs leading-none pl-6 pr-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
                                                        <label for="degree_<?= $child_id; ?>" class="flex items-center">
                                                            <input type="checkbox" id="degree_<?= $child_id; ?>" name="degree_<?= $child_id; ?>" data-name="<?= $child_name; ?>" data-term-id="<?= $child_id; ?>" class="mr-2">
                                                            <?= $child_name; ?>
                                                        </label>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Degrees -->

                    <!-- Locations -->
                    <?php
                        $internship_location = get_terms(
                            array(
                                'taxonomy' => 'internship-location',
                                'orderby' => 'name'
                            )
                        );

                        if ( $internship_location ) :
                    ?>
                        <div class="w-full sm:w-1/2 md:w-full sm:pr-2 md:pr-0 mb-5">
                            <div class="text-xs text-default font-bold uppercase mb-2">
                                REGION
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
                                    <?php foreach ( $internship_location as $location ) : ?>
                                        <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md cursor-pointer">
                                            <label for="location_<?= $location->term_id; ?>" class="flex items-center">
                                                <input type="checkbox" id="location_<?= $location->term_id; ?>" name="location_<?= $location->term_id; ?>" data-name="<?= $location->name; ?>" data-term-id="<?= $location->term_id; ?>" class="mr-2">
                                                <?= $location->name; ?>
                                            </label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Locations -->

                    <!-- Types -->
                    <?php
                        $internship_types = get_terms(
                            array(
                                'taxonomy' => 'internship-type',
                                'orderby' => 'name',
                                'hide_empty' => false
                            )
                        );

                        if ( $internship_types ) :
                    ?>
                        <div class="w-full sm:w-1/2 md:w-full sm:pl-2 md:pl-0 mb-5">
                            <div class="text-xs text-default font-bold uppercase mb-2">
                                TYPE
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
                                    <?php foreach ( $internship_types as $type ) : ?>
                                        <?php if ( $type->name != 'Featured' ) : ?>
                                            <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md cursor-pointer">
                                                <label for="type_<?= $type->term_id; ?>" class="flex items-center">
                                                    <input type="checkbox" id="type_<?= $type->term_id; ?>" name="type_<?= $type->term_id; ?>" data-name="<?= $type->name; ?>" data-term-id="<?= $type->term_id; ?>" class="mr-2">
                                                    <?= $type->name; ?>
                                                </label>
                                            </div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <!-- Types -->


                    <div class="w-full sm:w-1/2 md:w-full font-bold leading-none uppercase mb-5 relative">
                        <label for="internships_string" class="text-xs text-default">SEARCH BY KEYWORD
                            <input type="text" id="internships_string" name="internships_string" class="w-full pl-3 pr-8 py-2 border border-separator rounded shadow mt-2 text-black-700-new">
                        </label>

                        <i class="fas fa-search text-red-500 text-sm absolute bottom-0 right-0 mr-2 mb-2"></i>
                    </div>

                    <div class="sm:ml-4 md:ml-0 mb-5 sm:mb-0 md:mb-5">
                        <button id="reset-internship" class="w-full text-white-pure text-lg font-black leading-none p-4 bg-red-500" type="button">Clear Filter(s)</button>
                    </div>

                    <div class="selected_filtered_options"></div>
                </div>
                <!-- Filters -->

                <!-- Internships List -->
                    <div class="w-full">
                        <div id="internships-found" class="internships_found flex-1">
                            <?php
                            
                                while ( $internships_query->have_posts() ) : $internships_query->the_post();

                                    get_template_part( 'partials/internships/single-internship');

                                endwhile;
                                
                                wp_reset_postdata();
                            ?>
                        </div>

                        <?php if ( $internships_query->max_num_pages > 1) : ?>
                            <div class="w-full load-the-new-internships text-center">
                                <div>
                                    <button type="button" class="text-white-pure text-lg font-bold leading-none px-10 py-4 bg-red-500 relative">See More <div class="loading-spinner absolute top-0 right-0"></div></button>
                                </div>

                                <input type="hidden" id="current_internship_page" name="page_number" value="1">
                            </div>
                        <?php endif; ?>
                    </div>
                <!-- Internships List -->

            </div>
        </div>

        <input type="hidden" name="action" value="internships_search">
    </form>
    <?php endif; ?>
    
<?php get_footer();
