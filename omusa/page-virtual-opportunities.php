<?php

    get_header();

    /**
     * This page can receive params to filter posts.
     * @param type_of_posts array or string
     * @param regions_active array or string
     */

    $post_thumbnail = get_field('settings_default_thumbnail', 'options');
    $post_thumbnail = $post_thumbnail['url'];

    $jobs_that_matched = 0; // Is used to get the jobs as string
    $number_of_jobs_visible = 0; // Is used to count the jobs visible which are different from the posts found.
    
?>

<section class="section-quoted px-6 pt-24 pb-10 md:pt-48 xl:pt-56">
    <div class="container">
        <div class="headline text-default mx-auto">
            Virtual <span class="font-bold">Opportunities</span>
        </div>
    </div>
</section>

<form id="virtual-filters" action="<?= admin_url('admin-ajax.php'); ?>" method="POST" class="p-6 bg-gray-200">
    <div class="container">

        <div class="font-medium">
            You May Personalize Your Search by Narrowing Your Options:
        </div>

        <div>
            <div class="flex flex-col md:flex-row py-5">
                <div class="w-full md:w-1/2 lg:w-2/5 flex flex-col sm:flex-row">
                    <!-- Post Type -->
                    <div class="w-full sm:w-1/2 lg:w-full sm:pr-2 mb-5 md:mb-0">
                        <div class="text-xs text-default font-bold mb-1">
                            TYPE
                        </div>

                        <div class="filter" data-filter-name="type_of_posts">
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
                                <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
                                    <label for="post_type_long_term" class="flex items-center">
                                        <input type="checkbox" id="post_type_long_term" data-name="Long Term" data-term-name="long-term" class="mr-2">
                                        LONG TERM
                                    </label>
                                </div>

                                <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
                                    <label for="post_type_internships" class="flex items-center">
                                        <input type="checkbox" id="post_type_internships" data-name="Internship" data-term-name="internships" class="mr-2">
                                        INTERNSHIP
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Post Type -->

                    <!-- Region -->
                    <?php
                        $all_regions_available = array();
                        
                        $terms_regions = get_terms(
                            array(
                                'taxonomy' => array(
                                    'long-regions',
                                    'internship-location'
                                ),
                                'hide_empty' => false,
                            )
                        );
                        
                        // Filter all the terms from all taxonomies and remove the repeated.
                        foreach ( $terms_regions as $region ) {

                            if ( !in_array( $region->slug, $all_regions_available ) ) {

                                array_push($all_regions_available, $region->slug);
                                
                            }

                        }

                    ?>
                    <div class="w-full sm:w-1/2 lg:w-full sm:pl-2 mb-5 md:mb-0">
                        <div class="text-xs text-default font-bold mb-1">
                            NARROW BY REGION
                        </div>

                        <div class="filter" data-filter-name="regions_active">
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
                                <?php foreach ( $all_regions_available as $region ) : ?>
                                    <div class="text-xs font-black leading-none px-3 py-2 hover:bg-gray-150-new text-default uppercase rounded-md">
                                        <label for="region_<?= $region; ?>" class="flex items-center">
                                            <input type="checkbox" id="region_<?= $region; ?>" name="region_<?= $region; ?>" data-name="<?= $region; ?>" data-term-name="<?= $region; ?>" class="mr-2">
                                            <?= $region; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <!-- Region -->
                </div>

                <div class="w-full md:w-1/2 lg:w-3/5 flex flex-col sm:flex-row items-end md:pl-4">
                    <div class="w-full sm:pr-2 mb-5 sm:mb-0">
                        <div class="text-xs text-default font-bold mb-1">
                            KEYWORD SEARCH
                        </div>
                                        
                        <div class="relative">
                            <input type="text" id="virtual_search_string" name="virtual_search_string" class="w-full leading-none pl-4 pr-8 py-2 border border-separator rounded-lg shadow">
                            <i class="fas fa-search text-sm text-red-500 absolute top-0 right-0 mr-3 mt-3 z-10"></i>
                        </div>
                    </div>

                    <div class="w-full sm:w-auto sm:flex-none sm:pl-2">
                        <button id="reset-virtual" type="button" class="w-full text-white-pure font-black leading-none px-4 py-3 bg-red-500">Clear Filter(s)</button>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <?php

                // Check which post types are being passed.
                if ( isset( $_GET['type_of_posts'] ) && !empty( $_GET['type_of_posts'] )) {

                    $type_of_posts = explode(',', urldecode( $_GET['type_of_posts'] ));

                } else {

                    $type_of_posts = array('long-term', 'internships');

                }

                $args = array(
                    'post_type' => $type_of_posts,
                    'orderby' => 'date',
                    'post_status' => array('publish', 'future'),
                    'posts_per_page' => 10,
                    'paged' => 1
                );

                if ( isset( $_GET['regions_active'] ) && !empty( $_GET['regions_active'] ) ) {

                    // Regions taken from the params.
                    $param_regions = explode(',', urldecode( $_GET['regions_active'] )); // Creates a comma separated array with the regions.

                    // Gets all regions from the terms.
                    $terms_regions = get_terms(
                        array(
                            'taxonomy' => array(
                                'long-regions',
                                'internship-location'
                            )
                        )
                    );

                    $args['tax_query'] = array(
                        'relation' => 'OR'
                    );
    
                    // If the region filter is selected then get only the regions that have been selected.
                    if ( $terms_regions ) {
                       
                        // Check if the term exists in the post_type
                        foreach ( $type_of_posts as $type_of_post ) {
        
                            // This will create a temporary array where the regions are being saved and will reset for each custom post-type.
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
            
                $virtual_query = new WP_Query( $args );

                // This if checks if there is any jobs that matched.
                // Usually when using params to filter posts some sections desaapered this fixes that.
                if ( $virtual_query->have_posts() ) {

                    $jobs_that_matched =  $virtual_query->found_posts;

                    $number_of_jobs_visible = count( $virtual_query->posts );

                }

            ?>

                <div class="flex flex-col sm:flex-row justify-between py-2">
                    <div class="text-xs mb-4 sm:mb-0 uppercase">
                        SHOWING <span class="total-of-jobs-visible"><?= $number_of_jobs_visible; ?></span> RESULTS FOUND IN <span class="total-of-jobs-found"><?= $jobs_that_matched; ?></span> POSITIONS <span id="query-search"></span>
                    </div>
                </div>

                <div class="border-t pt-4">
                    <?php if ( $virtual_query->have_posts() ) : ?>

                        <div id="list-of-virtual-jobs-found" class="list_of_virtual_jobs_found flex flex-wrap flex-col last:mb-0">
                        
                            <?php while( $virtual_query->have_posts() ) : $virtual_query->the_post(); ?>

                                <?php
                                    if ( has_post_thumbnail() ) {
                                    
                                        $post_thumbnail = get_the_post_thumbnail_url();
                
                                    }
                                ?>

                            <?php if ( get_post_type() === 'long-term' ) : ?>

                                    <?php

                                        // Post taxonomies
                                        $long_region = '';
                                        $taxonomies_associated = wp_get_post_terms( $post->ID, 'long-regions', array( 'fields' => 'names' ) );
                                            
                                        if ( !empty( $taxonomies_associated ) ) {
                                                
                                            foreach ( $taxonomies_associated as $term) {
                                                    
                                                $long_region .= $term . '/';
                                                
                                            }
                                            
                                        }
                                        
                                        $long_region = substr_replace($long_region, '', -1);
                                        $long_region = str_replace('/', '<span class="px-1">/</span>', $long_region);

                                    ?>

                                    <div class="job-listing w-full flex bg-page border-t-4 border-red-500 rounded-md overflow-hidden mb-4" data-job-type="<?= get_post_type(); ?>">
                                        <div class="sm:w-64 md:w-1/4 hidden sm:block">
                                            <div class="w-full h-full bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $post_thumbnail; ?>');"></div>
                                        </div>
                        
                                        <div class="w-full sm:w-3/4 flex flex-col md:flex-row p-6 lg:p-8">
                                            <div class="w-full pr-0 md:pr-6 mb-4 md:mb-0">
                                                <div class="text-xs text-orange-500 font-bold uppercase mb-4">
                                                    Long-term <span class="px-4">-</span> <?= $long_region; ?>
                                                </div>
                        
                                                <div class="text-default">
                                                    <div class="text-2xl font-bold leading-none mb-3">
                                                        <?php the_title(); ?>
                                                    </div>
                            
                                                    <div class="font-roboto font-bold mb-2">
                                                        <?php the_field('long_term_commitment'); ?>
                                                    </div>

                                                    <div class="font-medium">
                                                        <?= $desciption = wp_trim_words( get_field('long_term_description'), $num_words = 100, $more = '...' ); ?>
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="flex-none">
                                                <a href="<?php the_permalink(); ?>" class="text-white-pure text-lg leading-none font-black px-8 py-4 bg-red-500 inline-block">Learn More</a>
                                            </div>
                                        </div>
                                    </div>

                            <?php else : ?>

                                    <?php
                                        // Get Internship location.
                                        $intern_location = wp_get_post_terms( get_the_ID(), 'internship-location');

                                        if ( $intern_location && ! is_wp_error( $intern_location ) && !empty( $intern_location ) ) {

                                            $intern_location = $intern_location[0]->name;
                                            
                                        }

                                        // Get semesters.
                                        if ( has_term('', 'degrees') ) {

                                            $intern_degree = wp_get_post_terms( get_the_ID(), 'degrees');
                                
                                            $post_thumbnail = get_field( 'internship_degree_image', 'term_' . $intern_degree[0]->term_id );

                                            if ( $post_thumbnail ) {

                                                $post_thumbnail = $post_thumbnail['url'];

                                            } else {

                                                $post_thumbnail = get_field('settings_default_thumbnail', 'options');

                                                $post_thumbnail = $post_thumbnail['url'];

                                            }
                                
                                        }
                                    ?>

                                    <div class="job-listing w-full flex bg-page border-t-4 border-red-500 rounded-md overflow-hidden mb-4">
                                        <div class="sm:w-64 md:w-1/4 hidden sm:block">
                                            <div class="w-full h-full bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $post_thumbnail; ?>');"></div>
                                        </div>
                        
                                        <div class="w-full sm:w-3/4 flex flex-col md:flex-row p-6 lg:p-8">
                                            <div class="w-full pr-0 md:pr-6 mb-4 md:mb-0">
                                                <div class="text-xs text-orange-500 font-bold uppercase mb-4">
                                                    INTERNSHIP <?php if ( !empty( $intern_location ) ) : ?><span class="px-4">-</span> <?= $intern_location; ?><?php endif; ?>
                                                </div>
                        
                                                <div class="text-default">
                                                    <div class="text-2xl font-bold leading-none mb-3">
                                                        <?php the_title(); ?>
                                                    </div>
                            
                                                    <div class="font-roboto font-bold mb-2">
                                                        <?php
                                                            // Post taxonomies
                                                            $semesters_list = '';
                                                            $semesters_associated = wp_get_post_terms( $post->ID, 'semesters', array( 'fields' => 'names' ) );
                                                                
                                                            if ( !empty( $semesters_associated ) ) {
                                                                    
                                                                foreach ( $semesters_associated as $term ) {
                                                                        
                                                                    $semesters_list .= $term . '/';
                                                                    
                                                                }
                                                            
                                                            }
                                                            
                                                            $semesters_list = substr_replace($semesters_list, '', -1);
                                                            $semesters_list = str_replace('/', '<span class="px-1">/</span>', $semesters_list);
                                                        ?>
                                                        <?= $semesters_list; ?>	
                                                    </div>

                                                    <div class="font-medium">
                                                        <?php the_excerpt(); ?>
                                                    </div>
                                                </div>
                                            </div>
                        
                                            <div class="flex-none">
                                                <a href="<?php the_field('external_url'); ?>" target="_blank" class="text-white-pure text-lg leading-none font-black px-8 py-4 bg-red-500 inline-block">Learn More</a>
                                            </div>
                                        </div>
                                    </div>

                                <?php endif; ?>

                            <?php endwhile; ?>

                            <?php wp_reset_postdata(); ?>

                        </div>

                        <?php if ( $virtual_query->max_num_pages > 1 ) : ?>
                            <div class="w-full load-new-virtual-jobs text-center py-8">
                                <div>
                                    <button type="button" class="text-white-pure text-lg font-bold leading-none px-10 py-4 bg-red-500 relative">See More <div class="loading-spinner absolute top-0 right-0"></div></button>
                                </div>
                            </div>
                        <?php endif; ?>

                    <?php else : // Reused id and class to avoid issee when there are no post related using the params. ?>

                        <div id="list-of-virtual-jobs-found" class="list_of_virtual_jobs_found w-full">
                            <div class="text-center text-default">
                                No virtual jobs found
                            </div>
                        </div>

                    <?php endif; ?>
                </div>
        </div>
    </div>

    <input type="hidden" id="current_page" name="page_number" value="1">
    <input type="hidden" id="current_visible" name="page_virtual_jobs_visible" value="<?= $number_of_jobs_visible; ?>">
    <input type="hidden" name="action" value="search_for_virtual_jobs">
</form>

<?php get_footer();
