<?php

    get_header();

    // Intro
    $side_intro_image = get_field('long_term_intro_side_image');
    $jobs_link = get_field('long_term_jobs_link');
    $jobs_link_target = $jobs_link['target'] ? $jobs_link['target'] : '_self';

    $default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

    // Coach
    $call_a_coach_link = get_field('coach_settings_link', 'option');

    
?>

    <div class="ask-a-question-btn w-auto md:w-40 text-center text-white-pure flex flex-col items-center justify-center p-5 bg-teal-500 fixed top-0 right-0 mt-56 rounded-l-lg shadow-2xl cursor-pointer z-30">
        <div class="md:mb-3">
            <img src="<?php bloginfo('template_url'); ?>/assets/images/ask-a-question-white-icon.png" alt="Ask a Question about Working with OM" class="w-8 md:w-auto">
        </div>

        <div class="font-roboto font-light hidden md:block">
            <strong>Ask</strong> a Question about <strong>Working with OM »</strong>
        </div>
    </div>
    
    <!-- Intro -->
    <section class="section-quoted text-default px-6 pt-24 md:pt-48 xl:pt-64 pb-8">
        <div class="container">
            <div class="headline mx-auto">
                <?php the_field('long_term_intro_title'); ?>
            </div>

            <div class="text-center text-3xl font-roboto font-light leading-9 pt-10 pb-12 lg:pb-20 xl:pb-32">
                <?php the_field('long_term_intro_small_title'); ?>
            </div>

            <div class="relative xl:pl-12">
                <div class="lg:w-2/5 lg:pb-12">
                    <div class="has-wysiwyg mb-6 md:mb-0">
                        <?php the_field('long_term_intro_description'); ?>
                    </div>
                </div>

                <div class="flex justify-center lg:absolute bottom-0 right-0">
                    <img src="<?= $side_intro_image['url']; ?>" alt="<?= $side_intro_image['alt']; ?>" />
                </div>
            </div>

            <div class="text-center py-8 border-t border-b border-separator">
                <div class="font-roboto text-xl">
                    <?php the_field('long_term_intro_short_description'); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro -->

    <section>
        <div class="container -mb-20">
            <div>
                <div class="flex flex-wrap items-center justify-center">
                    <div class="w-full sm:w-1/2 md:w-1/3 px-4 my-4">
                        <div class="w-full p-5 bg-white-pure shadow-xl">
                            <div class="text-center text-xl font-black leading-none mb-5">
                                Browse Opportunities
                            </div>

                            <div>
                                <a href="/long-term-opportunities" class="w-full text-lg text-center text-white-pure font-black leading-none px-3 py-3 bg-teal-500 inline-block">Search for a Job</a>
                            </div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 md:w-1/3 px-4 my-4">
                        <div class="w-full p-5 bg-white-pure shadow-xl">
                            <div class="text-center text-xl font-black leading-none mb-5">
                                Get More Information
                            </div>

                            <div>
                                <button type="button" class="ask-a-question-btn w-full text-lg text-center text-white-pure font-black leading-none px-3 py-3 bg-teal-500 inline-block">Ask a Question</button>
                            </div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/2 md:w-1/3 px-4 my-4">
                        <div class="w-full p-5 bg-white-pure shadow-xl">
                            <div class="text-center text-xl font-black leading-none mb-5">
                                Get Started Now
                            </div>

                            <div>
                                <a href="https://omusa.servicereef.com/tracks/form-onboarding/88af40b6-f940-4be9-bb76-78a6adfe6acd" class="w-full text-lg text-center text-white-pure font-black leading-none px-3 py-3 bg-teal-500 inline-block">Answer a Short Questionnaire</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-6 pt-24 pb-10 bg-gray-150-new">
        <div class="container">
            <div class="text-center text-sm text-default">
                <?php the_field('long_term_jobs_description'); ?>
            </div>

            <div class="text-center text-sm text-default">
                <a href="<?= $jobs_link['url']; ?>" target="<?= esc_attr($jobs_link_target); ?>" class="text-sm text-wysiwyg font-black underline"><?= $jobs_link['title']; ?></a>
            </div>
        </div>
    </section>
    

    <?php
        $args = array(
            'post_type' => 'long-term',
            'orderby' => 'date',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'long-featured',
                    'field' => 'slug',
                    'terms' => 'featured'
                ) 
            )	
        );

        $long_jobs_featured = new WP_Query( $args );

        if ( $long_jobs_featured->have_posts() ) :
    ?>
        <!-- Featured Jobs -->
        <section class="pt-10 pb-6 px-6">
            <div class="container">
                <div class="text-center text-red-500 text-4xl md:text-5xl font-roboto font-light">
                    <?php the_field('long_term_jobs_title'); ?>
                </div>
            </div>    
        </section>

        <section class="long-featured-jobs px-8 sm:px-0">
            <div class="container relative -mb-40">
                <div class="long-featured-swiper-container">
                    <div class="swiper-wrapper pb-12">
                        <?php
                            
                            while ( $long_jobs_featured->have_posts()) :  $long_jobs_featured->the_post();

                                $thumbnail_image = get_the_post_thumbnail_url();
                            
                        ?>
                            <a href="<?php the_permalink(); ?>" class="long-job w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 swiper-slide px-2 mb-0 inline-block">
                                <div class="h-64 max-h-full bg-page border-t-4 border-red-500 rounded-md shadow-xl relative overflow-hidden">
                                    <div class="w-full h-48 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>');">
                                    </div>

                                    <div class="job-description px-5 py-4 bg-page absolute left-0 right-0">
                                        <div class="mb-5">
                                            <div title="<?php the_title(); ?>" class="text-sm text-default font-bold mb-1 truncate">
                                                <?php the_title(); ?>
                                            </div>

                                            <div class="text-xs text-orange-500 font-bold uppercase">
                                                <?php
													// Post taxonomies
													$taxonomies = array('long-location', 'long-part-time');
													$taxo_string = '';

													foreach($taxonomies as $taxonomy) {

														$taxonomies_associated = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) );
																	
														if ( !empty($taxonomies_associated) ) {
																	
															foreach ( $taxonomies_associated as $term) {
																	
																$taxo_string .= $term . '/';

															}
																	
														}
													}

													$taxo_string = substr_replace($taxo_string, '', -1);
													$taxo_string = str_replace('/', '<span class="text-orange-500 px-1">/</span>', $taxo_string);
												?>
												<?= $taxo_string ? $taxo_string : '&nbsp;'; ?>	
                                            </div>
                                        </div>

                                        <?php if ( !empty(get_field('long_term_commitment')) ) : ?>
                                            <div class="text-sm">
                                                <div class=" text-default font-black">
                                                    Commitment Length
                                                </div>

                                                <div class="text-default">
                                                    <?php the_field('long_term_commitment'); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( empty(get_field('long_term_commitment')) && !empty(get_field('long_term_full_part_time')) ) : ?>
                                            <div class="text-sm">
                                                <div class="text-default font-black">
                                                    Pay Structure
                                                </div>

                                                <div class="text-default">
                                                    <?= get_field('long_term_full_part_time') ? get_field('long_term_full_part_time') : '-'; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>
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

        <section class="bg-gray-150-new pt-40 pb-4 px-6 mt-2">
            <div class="container">
                <div class="text-center text-default has-wysiwyg has-gray-bg">
                    <?php the_field('long_term_featured_jobs_description'); ?> <a href="<?= esc_url($call_a_coach_link['url']); ?>"><?php the_field('long_term_featured_jobs_coach_link_text'); ?></a> <?php the_field('long_term_featured_jobs_coach_text'); ?>
                </div>
            </div>
        </section>
        <!-- Featured Jobs -->
    <?php endif; ?>

    <!-- Explore Our Values -->
    <section class="px-6 pt-8 pb-32">
        <div class="container">
            <div class="md:w-4/5 mx-auto">
                <div class="has-video">
                    <?php the_field('long_term_intro_video'); ?>
                </div>
            </div>

            <div class="text-center text-red-500 text-4xl md:text-5xl font-roboto font-light pt-6">
                <?php the_field('long_term_values_title'); ?>
            </div>
        </div>
    </section>

    <section class="long-term-values px-6 bg-gray-150-new pt-12 pb-32">
        <div class="container xl:px-20 -mt-32">
            <div class="flex flex-wrap justify-center">
                <?php if( have_rows('long_term_values_list_repeater') ) : ?>
                    <?php while( have_rows('long_term_values_list_repeater') ) : the_row(); ?>
                        <div class="w-48 h-48 border border-gray-250-new flex items-center justify-center bg-white-pure shadow-xl relative the-value">
                            <div class="text-center font-bold uppercase">
                                <div class="mb-2">
                                    <img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('value'); ?>" class="inline-block">
                                </div>

                                <div class="text-default text-xs">
                                    <?php the_sub_field('value'); ?>
                                </div>

                                <div class="text-red-500 leading-none">
                                    <?php the_sub_field('action'); ?>
                                </div>
                            </div>

                            <div class="bg-teal-500 absolute top-0 rounded-md value-info">
                               <div class="text-white-pure font-black mb-2">
                                <?php the_sub_field('value'); ?> <?php the_sub_field('action'); ?>
                               </div>

                               <div>
                                <?php the_sub_field('description'); ?>
                               </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Explore Our Values -->

    <section>
        <div class="container -mt-20">
            <div class="flex flex-wrap items-center justify-center">
                <div class="w-full sm:w-1/2 md:w-1/3 px-4 my-4">
                    <div class="w-full p-5 bg-white-pure shadow-xl">
                        <div class="text-center text-xl font-black leading-none mb-5">
                            Browse Opportunities
                        </div>

                        <div>
                            <a href="/long-term-opportunities" class="w-full text-lg text-center text-white-pure font-black leading-none px-3 py-3 bg-teal-500 inline-block">Search for a Job</a>
                        </div>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 md:w-1/3 px-4 my-4">
                    <div class="w-full p-5 bg-white-pure shadow-xl">
                        <div class="text-center text-xl font-black leading-none mb-5">
                            Get More Information
                        </div>

                        <div>
                            <button type="button" class="ask-a-question-btn w-full text-lg text-center text-white-pure font-black leading-none px-3 py-3 bg-teal-500 inline-block">Ask a Question</button>
                        </div>
                    </div>
                </div>

                <div class="w-full sm:w-1/2 md:w-1/3 px-4 my-4">
                    <div class="w-full p-5 bg-white-pure shadow-xl">
                        <div class="text-center text-xl font-black leading-none mb-5">
                            Get Started Now
                        </div>

                        <div>
                            <a href="https://omusa.servicereef.com/tracks/form-onboarding/88af40b6-f940-4be9-bb76-78a6adfe6acd" class="w-full text-lg text-center text-white-pure font-black leading-none px-3 py-3 bg-teal-500 inline-block">Answer a Short Questionnaire</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Inside OM -->
    <section class="px-6 py-12">
        <div class="container">
            <div class="text-center text-4xl lg:text-5xl text-red-500 font-roboto font-light mb-6">
                <?php the_field('long_term_inside_title'); ?>
            </div>

            <div class="flex flex-wrap flex-col sm:flex-row justify-between">
                <?php if( have_rows('long_term_inside_pages_repeater') ) : ?>
                    <?php
                        while( have_rows('long_term_inside_pages_repeater') ) : the_row();

                        $image = get_sub_field('image');
                        $link = get_sub_field('link');
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    ?>
                        <div class="w-full sm:w-1/2 md:w-1/3 sm:px-3 my-4 md:my-0">
                            <div class="w-full border-t-4 border-red-500 shadow-xl">
                                <div class="w-full py-48 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $image['url']; ?>');"></div>
                                
                                <div>
                                    <a href="<?= $link['url']; ?>" target="<?php esc_attr( $link_target ); ?>" class="text-default text-2xl font-roboto font-bold leading-none px-6 py-6 inline-block"><?= $link['title']; ?></a>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Inside OM -->

    <!-- Social Media -->
    <section class="px-6 pb-12">
        <div class="container flex flex-col sm:flex-row items-center justify-center py-8 border-t border-b border-separator">
            <div class="text-default text-3xl font-roboto font-light leading-none sm:mr-3 mb-3 sm:mb-0">
                <strong>Follow Us</strong> on
            </div>

            <?php if ( have_rows('social_networks_repeater', 'options') ) : ?>
				<div class="flex items-center">
					<?php
						while( have_rows('social_networks_repeater', 'options') ): the_row();
					?>
						<div class="px-2">
							<a href="<?php the_sub_field('url'); ?>" target="_blank" rel="noopener noreferrer" class="leading-none"><i class="fab <?php the_sub_field('network');?> text-xl text-red-500"></i></a>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
        </div>
    </section>
    <!-- Social Media -->
            
    <!-- Ask a Questiostion Lightbox -->
    <?php get_template_part('partials/lightboxes/long-term-lightbox'); ?>
    <!-- Ask a Questiostion Lightbox -->

<?php get_footer();
