<?php get_header(); ?>

    <div class="ask-a-question-btn md:w-40 text-center text-white-pure flex flex-col items-center justify-center px-5 md:px-8 py-5 bg-teal-500 fixed top-0 right-0 rounded-l-lg shadow-2xl mt-56 cursor-pointer z-10">
        <div class="md:mb-3">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/ask-a-question-white-icon.png" alt="Ask a Question about Working with OM" class="w-8 md:w-auto">
        </div>

        <div class="font-roboto font-light hidden md:block">
            <strong>Ask</strong> a Question »
        </div>
    </div>
    
    <section class="section-quoted pt-20 md:pt-48 lg:pt-56 xl:pt-64 pb-8 relative">
        <div class="container">
            <div class="headline text-default mx-auto">
                <strong>Search</strong> Short-Term Opportunities
            </div>
        </div>
    </section>

    <?php
        $args = array(
            'post_type' => 'short-term',
            'orderby' => 'date',
            'post_status' => array('publish', 'future'),
            'posts_per_page' => 10,
            'tax_query' => array(
                array(
                    'taxonomy' => 'short-featured',
                    'field' => 'slug',
                    'terms' => 'featured'
                )
            )
        );

        $short_featured = new WP_Query( $args );

        if ( $short_featured->have_posts() ) :
    ?>
        <section class="testimonials py-20 bg-gray-150-new relative">
            <div class="container">

                <div class="w-full flex justify-center absolute top-0 left-0">
                    <div class="text-white-pure text-lg font-bold px-10 py-2 bg-teal-500 rounded-b-md">
                        A few Highlighted Opportunities
                    </div>
                </div>

                <div class="lg:w-4/5 xl:w-3/4 swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                            while( $short_featured->have_posts() ) : $short_featured->the_post();

                                $terms = get_the_terms( $post->ID, 'short-regions');

                        ?>
                            <div class="testimonial swiper-slide px-16 mb-0">
                                <div class="p-6 md:p-8 bg-page rounded-md shadow-2xl">

                                    <div class="text-xs font-bold flex items-center mb-2">
                                        <div class="text-default underline">
                                            <?php the_field('short_term_job_id'); ?>
                                        </div>

                                        <div class="text-orange-500 px-4">
                                            -
                                        </div>

                                        <div class="text-orange-500 uppercase">
                                            <?= $terms[0]->name; ?>
                                        </div>
                                    </div>
                                            
                                    <div class="flex flex-col lg:flex-row justify-between mb-8 lg:mb-0">
                                        <div class="w-full lg:w-3/5 mb-5">
                                            <div class="text-default text-3xl font-roboto font-light leading-9 mb-2 md:truncate" title="<?php the_title(); ?>">
                                                <?php the_title(); ?>
                                            </div>

                                            <div class="text-default font-roboto font-bold">
                                                <?php
                                                    // If both start and end dates are given
                                                    if ( get_field('short_term_job_start_date') && get_field('short_term_job_end_date') ) :
                                                ?>

                                                    <strong><?php the_field('short_term_job_start_date'); ?> – <?php the_field('short_term_job_end_date'); ?></strong>

                                                <?php
                                                    // Only if the start date is given
                                                    elseif ( get_field('short_term_job_start_date') && !get_field('short_term_job_end_date') ) :
                                                ?>

                                                    <strong><?php the_field('short_term_job_start_date'); ?></strong>

                                                <?php
                                                    // Only if the end date is given
                                                    elseif ( !get_field('short_term_job_start_date') && get_field('short_term_job_end_date') ) :
                                                ?>

                                                    <strong><?php the_field('short_term_job_end_date'); ?></strong>

                                                <?php endif; ?>
                                                    
                                                <?php

                                                    // Show the Application deadline if the data exists
                                                    if ( get_field('short_term_job_application_deadline') ) :

                                                ?>
                                                    (Apply by <?php the_field('short_term_job_application_deadline'); ?>)
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <div class="flex-none w-full md:w-auto">
                                            <div>
                                                <a href="<?php the_permalink(); ?>" class="w-full md:w-auto text-center text-white-pure text-xl font-black leading-none px-10 py-3 bg-red-500 inline-block">Explore Opportunity</a>
                                            </div>

                                            <?php if ( has_term('', 'short-remote-compatibility') ) : ?>
                                                <div class="text-center">
                                                    <div class="my-1">
                                                        Available for
                                                    </div>

                                                    <div class="text-xs font-bold text-orange-500 uppercase">
                                                        <?php
                                                            // Post taxonomies
                                                            $taxonomies = array('short-remote-compatibility');
                                                            $taxo_string = '';

                                                            foreach ( $taxonomies as $taxonomy ) {
                                                                
                                                                $taxonomies_associated = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) );
                                                                
                                                                if ( !empty($taxonomies_associated) ) {
                                                                    
                                                                    foreach ( $taxonomies_associated as $term) {
                                                                        
                                                                        $taxo_string .= $term . '/';
                                                                    
                                                                    }
                                                                
                                                                }

                                                            }
                                                            
                                                            $taxo_string = substr_replace($taxo_string, '', -1);
                                                            $taxo_string = str_replace('/', '<span class="px-1">/</span>', $taxo_string);
                                                        ?>
                                                        <?= $taxo_string ? $taxo_string : '&nbsp;'; ?>	
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="text-default font-medium leading-7 pl-6 border-l-2 border-separator">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>                    
                    </div>

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    
    <?php
        $args = array(
            'post_type' => 'short-term',
            'orderby' => 'date',
            'post_status' => array('publish', 'future'),
            'posts_per_page' => 10,
            'paged' => 1
        );

        // This scripts checks what filters have been selected and filters the query.
        if ( isset( $_GET['applied-filters'] ) ) {

            $filter_params = $_GET['applied-filters'];
            $filter_params = str_replace(',', ' ', $filter_params);

            // Categories taken from the filters.
            $all_categories = array();
            $categories = get_terms( array(
                'taxonomy' => 'short-type-of-work',
                'hide_empty' => false,
                )
            );

            // If the category filter is selected then get only the categories that have been selected.
            if ( $categories ) {

                // Loop through the categories.
                foreach ( $categories as $category ) {

                    // If the category is selected on the filter option add it to the array, so we can filter after.
                    if ( strpos( $filter_params, (string)$category->term_id ) !== false ) {

                        array_push( $all_categories, $category->term_id );

                    }

                }

                if ( is_countable( $all_categories ) && count( $all_categories ) > 0 ) {

                    $args['tax_query'][] = array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'short-type-of-work',
                            'field' => 'id',
                            'terms'=> $all_categories,
                            'relation' => 'IN'
                        )
                    );
                    
                }

            }

            // Regions taken from the filters.
            $all_regions = array();
            $regions = get_terms( array(
                'taxonomy' => 'short-regions',
                'hide_empty' => false,
                )
            );

            // If the region filter is selected then get only the regions that have been selected.
            if ( $regions ) {

                // Loop through the regions.
                foreach ( $regions as $region ) {

                    // If the region is selected on the filter option add it to the array, so we can filter after.
                    if ( strpos( $filter_params, (string)$region->term_id ) !== false ) {

                        array_push( $all_regions, $region->term_id );

                    }

                }

                // Add the selected region as filter for the posts.
                if ( is_countable( $all_regions ) && count( $all_regions ) > 0 ) {

                    $args['tax_query'][] = array(
                        'relation' => 'AND',
                        array(
                            'taxonomy' => 'short-regions',
                            'field' => 'id',
                            'terms'=> $all_regions,
                            'relation' => 'IN'
                        )
                    );
                    
                }

            }

        }

        // If the date is assigned
        if ( isset( $_GET['from-date'] ) && !empty( $_GET['from-date'] ) && isset($_GET['to-date']) && !empty($_GET['to-date']) ) {

            $to_date = strtotime($_GET['to-date']);
    
            $to_year = date('Y', $to_date);
            $to_month = date('m', $to_date);
            $to_day = date('d', $to_date);
    
            $args['date_query'][] = array(
                array(
                    'after'     => date('F j, Y', strtotime($_GET['from-date']) ),
                    'before'    => array(
                        'year'  => $to_year,
                        'month' => $to_month,
                        'day'   => $to_day,
                    ),
                    'inclusive' => true,
                )
            );
    
        } else if ( isset( $_GET['from-date'] ) && !empty( $_GET['from-date'] ) ) {
    
    
            $args['date_query'][] = array(
                array(
                    'after'     => date('F j, Y', strtotime( $_GET['from-date'] ) ),
                    'before'    => array(
                        'year'  => date('Y'),
                        'month' => 12,
                        'day'   => 31,
                    ),
                    'inclusive' => true,
                )
            );
    
        } else if ( !isset( $_POST['from-date'] ) && empty( $_POST['from-date'] ) && isset( $_POST['to-date'] ) && !empty( $_POST['to-date'] ) ) {

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

        $short_query = new WP_Query( $args );

        if ( $short_query->have_posts() ) :

            $jobs_that_matched = $short_query->found_posts;
                
    ?>
        <section class="px-6 pb-10">
            <form id="short-filters" action="<?= admin_url('admin-ajax.php'); ?>" method="POST" >
                <div class="container">
                    <div class="w-full flex justify-center mb-12">
                        <div class="text-white-pure text-lg font-bold px-10 py-2 bg-teal-500 rounded-b-md">
                            Filter below to see all opportunities
                        </div>
                    </div>

                    <div class="text-default font-medium mb-8">
                        You May Personalize Your Search by Narrowing Your Options:
                    </div>

                    <div class="flex flex-col md:flex-row mb-10">
                        <div class="md:w-2/3">
                            <div class="w-full flex flex-col xl:flex-row md:pr-4">
                                <div class="w-full xl:w-1/2 mb-4 xl:mb-0 xl:pr-4">
                                    <div class="text-xs text-default font-bold uppercase mb-2">
                                        Narrow by dates
                                    </div>

                                    <div class="flex flex-col sm:flex-row items-center">
                                        <div class="w-full md:w-1/2">
                                            <input type="date" id="from_date" name="from_date" class="w-full text-xs text-red-500 font-bold px-4 py-2 border border-separator rounded-lg shadow uppercase">
                                        </div>

                                        <div class="text-red-500 px-2">-</div>

                                        <div class="w-full md:w-1/2">
                                            <input type="date" id="to_date" name="to_date" class="w-full text-xs text-red-500 font-bold px-4 py-2 border border-separator rounded-lg shadow uppercase">
                                        </div>
                                    </div>
                                </div>

                                <div class="w-full xl:w-1/2 flex flex-col sm:flex-row">
                                    <!-- Type of Work -->
                                    <?php
                                        $term_work_type = get_terms(
                                            array(
                                                'taxonomy' => 'short-type-of-work',
                                                'orderby' => 'name',
                                                'hide_empty' => false,
                                            )
                                        );

                                        if ( $term_work_type ) :
                                    ?>
                                        <div class="w-full sm:w-1/2 lg:w-1/2 sm:pr-2 mb-4">
                                            <div class="text-xs text-default font-bold uppercase mb-2">
                                                Narrow by type of work
                                            </div>
                                            
                                            <div class="filter">
                                                <div class="filter-collapsable flex items-center justify-between text-xs text-red-500 font-black leading-none px-4 py-3 cursor-pointer">
                                                    <span class="options-selected uppercase">SELECT</span>

                                                    <div class="flex items-center relative">
                                                        <div class="options-counter w-5 h-5 flex items-center justify-center text-white-pure bg-red-500 rounded-full absolute top-0 right-0 -mt-1 mr-3 opacity-0 transition duration-150 ease-in-out">
                                                            0
                                                        </div>

                                                        <i class="fas fa-sort-down"></i>
                                                    </div>
                                                </div>

                                                <div class="filter-terms px-2">
                                                    <?php foreach ( $term_work_type as $category ) : ?>
                                                        <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md cursor-pointer">
                                                            <label for="category_<?= $category->term_id; ?>" class="flex items-center">
                                                                <input type="checkbox" id="category_<?= $category->term_id; ?>" name="category_<?= $category->term_id; ?>" data-name="<?= $category->name; ?>" data-term-id="<?= $category->term_id; ?>"  class="mr-2">
                                                                <?= $category->name; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <!-- Type of Work -->
                                    
                                    <!-- Region -->
                                    <?php
                                        $term_region = get_terms(
                                            array(
                                                'taxonomy' => 'short-regions',
                                                'orderby' => 'name',
                                                'hide_empty' => false
                                            )
                                        );

                                        if ( $term_region ) :
                                    ?>
                                        <div class="w-full sm:w-1/2 lg:w-1/2 sm:pl-2 mb-4">
                                            <div class="text-xs text-default font-bold uppercase mb-2">
                                                Narrow by Region
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
                                                    <?php foreach ( $term_region as $region ) : ?>
                                                        <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md cursor-pointer">
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
                                    <!-- Region -->
                                </div>

                                <div class="selected_filtered_options"></div>
                            </div>

                            <div class="w-full flex flex-col lg:flex-row items-end justify-between md:pr-4 mb-6 md:mb-0">

                                <div class="w-full lg:w-1/2 flex flex-col sm:flex-row lg:pr-4 xl:pr-8">

                                    <div class="w-full sm:w-1/2 mb-4 lg:mb-0 sm:pr-2 hidden">
                                        <div class="text-xs text-default font-bold uppercase mb-2">
                                            Search by keyword
                                        </div>
                                        
                                        <div class="w-full relative">
                                            <input type="text" id="short_string" name="short_string" class="w-full leading-none pl-4 pr-8 py-2 border border-separator rounded-lg shadow">

                                            <i class="fas fa-search text-red-500 absolute top-0 right-0 mt-3 mr-3 cursor-pointer"></i>
                                        </div>
                                    </div>

                                    <!-- Compatibility -->
                                    <?php
                                        $term_compatibilities = get_terms(
                                            array(
                                                'taxonomy' => 'short-remote-compatibility',
                                                'orderby' => 'name',
                                                'hide_empty' => false
                                            )
                                        );

                                        if ( $term_compatibilities ) :
                                    ?>
                                        <div class="w-full mb-4 lg:mb-0">
                                            <div class="text-xs text-default font-bold uppercase mb-2">
                                                Compatible with
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
                                                    <?php foreach ( $term_compatibilities as $compatibility ) : ?>
                                                        <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md cursor-pointer">
                                                            <label for="compatibility_<?= $compatibility->term_id; ?>" class="flex items-center">
                                                                <input type="checkbox" id="compatibility_<?= $compatibility->term_id; ?>" name="compatibility_<?= $compatibility->term_id; ?>" data-name="<?= $compatibility->name; ?>" data-term-id="<?= $compatibility->term_id; ?>" class="mr-2">
                                                                <?= $compatibility->name; ?>
                                                            </label>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <!-- Compatibility -->

                                </div>

                                <div class="w-full lg:w-1/2">
                                    <button id="reset-short" type="button" class="w-full text-white-pure font-black leading-none px-4 py-3 bg-red-500">Clear Filter(s)</button>
                                </div>
                            </div>
                        </div>

                        <div class="md:w-1/3">
                            <div class="w-full text-default flex flex-col sm:flex-row md:flex-col lg:flex-row items-center justify-center px-8 py-4 md:py-8 lg:py-4 bg-gray-150-new rounded-md">
                                <div class="flex-none">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/images/short-term-posts-icon.png" alt="Short Term Clock Icon">
                                </div>

                                <div class="total-of-jobs-found md:flex-1 text-center text-4xl font-roboto font-light leading-none sm:px-5 md:px-0 lg:px-6 py-6 lg:py-0">
                                    <?= $jobs_that_matched; ?>
                                </div>

                                <div class="text-center lg:text-left font-roboto leading-5">
                                    Short-Term Opportunities Found
                                </div>
                            </div>
                        </div>
                    </div>
                
                    <div id="short-jobs-found" class="short_jobs_found">
                        <?php

                            while ( $short_query->have_posts() ) : $short_query->the_post();

                                get_template_part( 'partials/short-term/single-short-job');

                            endwhile;

                            wp_reset_postdata();
                        ?>
                    </div>

                    <?php if ( $short_query->max_num_pages > 1) : ?>
                        <div class="w-full load-the-new-short-jobs text-center">
                            <div>
                               <button type="button" class="text-white-pure text-lg font-bold leading-none px-10 py-4 bg-red-500 relative">See More <div class="loading-spinner absolute top-0 right-0"></div></button>
                            </div>

                            <input type="hidden" id="current_short_job_page" name="page_number" value="1">
                        </div>
                    <?php endif; ?>
                </div>

                <input type="hidden" name="action" value="short_search_jobs">
            </form>
        </section>
    <?php endif; ?>

    <!-- Ask a Questiostion Lightbox -->
    <?php get_template_part('partials/lightboxes/short-term'); ?>
    <!-- Ask a Questiostion Lightbox -->
    

<?php get_footer();
