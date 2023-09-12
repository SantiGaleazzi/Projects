<?php

    $default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

?>

<section class="section-quoted">
    <div class="container">
        <div class="mb-10">
            <div class="headline text-default mx-auto">
                <?php the_field('internship_home_title'); ?>
            </div>

            <div class="text-center text-3xl lg:text-4xl text-red-500 font-roboto font-light">
                <?php the_field('internship_home_subtitle'); ?>
            </div>
        </div>

        <div>
            <?php
                $args = array(
                    'post_type' => 'internships',
                    'posts_per_page' => 10,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'internship-type',
                            'field' => 'slug',
                            'terms' => array('featured')
                        )
                    )
                );

                $featured_internships = new WP_Query( $args );

                if ( $featured_internships->have_posts() ) :
            ?>  
                <section class="long-featured-jobs px-8 sm:px-0">
                    <div class="container relative">
                        <div class="long-featured-swiper-container">
                            <div class="swiper-wrapper pb-12">
                                <?php
                                
                                    while ( $featured_internships ->have_posts()) :  $featured_internships ->the_post();
                                        
                                        $thumbnail_image = get_the_post_thumbnail_url();
                                        
                                ?>
                                    <div class="long-job w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 swiper-slide px-2 mb-0 inline-block">
                                        <div class="h-64 max-h-full bg-page border-t-4 border-red-500 rounded-md shadow-xl relative overflow-hidden">
                                            <div class="w-full h-48 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>');">
                                            </div>

                                            <div class="job-description px-5 pt-3 pb-4 bg-white-pure absolute left-0 right-0">
                                                <div class="mb-4">
                                                    <a href="<?php the_field('external_url'); ?>" target="_blank" rel="noopener noreferrer" title="<?php the_title(); ?>" class="text-sm text-black-700-new font-roboto font-bold leading-none mb-1 truncate">
                                                        <?php the_title(); ?>
                                                    </a>

                                                    <div class="text-xs text-orange-500 font-bold uppercase">
                                                        <?php
                                                            // Post taxonomies
                                                            $taxonomies = array('internship-location');
                                                            $taxo_string = '';

                                                            foreach($taxonomies as $taxonomy) {

                                                                $taxonomies_associated = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) );
                                                                                            
                                                                if ( !empty($taxonomies_associated) ) {
                                                                                            
                                                                    foreach ( $taxonomies_associated as $term) {
                                                                                            
                                                                        $taxo_string .= $term . ',';

                                                                    }
                                                                                            
                                                                }

                                                            }

                                                            $taxo_string = substr_replace($taxo_string, '', -1);
                                                            $taxo_string = str_replace(',', '<span class="text-orange-500 pr-1">,</span>', $taxo_string);
                                                        ?>
                                                        <?= $taxo_string ? $taxo_string : '&nbsp;'; ?>	
                                                    </div>
                                                </div>

                                                <div class="text-xs">
                                                    <div class="text-black-700-new font-black">
                                                        DEGREE TRACK:
                                                    </div>

                                                    <div class="text-gray-500 uppercase">
                                                        <?php
                                                            // Post taxonomies
                                                            $taxonomies = array('degrees');
                                                            $taxo_string = '';

                                                            foreach($taxonomies as $taxonomy) {

                                                                $taxonomies_associated = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) );
                                                                                            
                                                                if ( !empty($taxonomies_associated) ) {
                                                                                            
                                                                    foreach ( $taxonomies_associated as $term) {
                                                                                            
                                                                        $taxo_string .= $term . ',';

                                                                    }
                                                                                            
                                                                }
                                                                                
                                                            }

                                                            $taxo_string = substr_replace($taxo_string, '', -1);
                                                            $taxo_string = str_replace(',', '<span class="pr-1">,</span>', $taxo_string);
                                                        ?>
                                                        <?= $taxo_string ? $taxo_string : '&nbsp;'; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    endwhile;
                                                    
                                    wp_reset_postdata();
                                ?>
                            </div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </section>
            <?php endif; ?>
        </div>

        <div class="flex flex-col lg:flex-row items-center p-4 lg:px-8 lg:py-6 border-t border-b">
            <div class="lg:w-2/5 xl:w-auto text-center md:text-left text-default text-xl leading-none font-roboto sm:mb-4 lg:mb-0 lg:pr-10">
                <?php the_field('internship_home_aside_buttons_text'); ?>
            </div>
                            
            <div class="w-full flex-1 flex flex-col sm:flex-row justify-between">
                <?php $internship_orange_button = get_field('internship_home_orange_button'); ?>
                <a href="<?= $internship_orange_button['url']; ?>" class="w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-orange-500 inline-block sm:mx-2 mt-3 sm:mt-0"><?= $internship_orange_button['title']; ?></a>
                                
                <?php $internship_teal_button = get_field('internship_home_teal_button'); ?>
                <a href="<?= $internship_teal_button['url']; ?>" data-internship-option="degree-tracks" class="internships-related w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-teal-500 inline-block sm:mx-2 mt-3 sm:mt-0"><?= $internship_teal_button['title']; ?></a>    
            </div>
        </div>

        <div class="px-4">
            <div class="md:w-3/5 py-12 mx-auto">
                <div class="has-wysiwyg has-red-links has-video ">
                    <?php the_field('internship_home_content'); ?>
                </div>
            </div>
                            
            <?php if ( get_field('internship_home_phrase') ) : ?>
                <div class="md:w-1/2 text-center text-default font-roboto text-lg mx-auto">
                    <?php the_field('internship_home_phrase'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="pt-8 pb-12">
            <div class="internships-videos flex frex-wrap flex-col sm:flex-row">
                <?php

                    $args = array(
                        'post_type' => 'videos',
                        'posts_per_page' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'videos-type',
                                'field' => 'slug',
                                'terms' => array('featured')
                            )
                        )
                    );

                    $videos_query = new WP_Query( $args );

                ?>
                <?php if ( $videos_query->have_posts() ) : ?>

                    <?php
                        while ( $videos_query->have_posts() ) : $videos_query->the_post();

                        $thumbnail_image = get_the_post_thumbnail_url();
                                        
                    ?>
                        <div class="intern-video w-full sm:w-1/2 md:w-1/3 flex p-3">
                            <div class="w-full bg-white-pure rounded-lg overflow-hidden shadow-2xl flex flex-col">
                                <div class="py-24 bg-top bg-cover bg-no-repeat relative" style="background-image: url('<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>');">
                                    <?php if ( get_field('internship_stories_video_id') ) : ?>
                                        <div class="play-video w-12 h-12 flex items-center justify-center bg-red-500 rounded-full absolute right-0 bottom-0 mr-5 mb-5 cursor-pointer shadow-md" data-video-id="<?php the_field('internship_stories_video_id'); ?>">
                                            <i class="fas fa-play text-white-pure text-2xl leading-none pl-1"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="flex-auto text-white-pure text-xl xl:text-2xl leading-none font-bold p-4 bg-red-500">
                                    <?php the_title(); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>

            <?php if ( $videos_query->found_posts > 2 ) : ?>
                <div class="text-center mt-4">
                    <button type="button" data-internship-option="stories" class="internships-related text-white-pure font-black leading-none px-8 py-3 bg-orange-500 inline-block">Watch More Stories</button>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

