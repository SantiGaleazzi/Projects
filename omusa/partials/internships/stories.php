<?php

    $quote_sude_image = get_field('internships_stories_quote_side_image');
    $default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

?>

<section class="section-quoted text-center pt-12">
    <div class="container">
        <div class="headline text-default mx-auto">
            <?php the_field('internships_stories_title'); ?>
        </div>
    </div>
</section>

<section class="py-12 internships-testimonials">
    <div class="container">
        <div class="lg:w-4/5 xl:w-3/5 internships-testimonials-swiper">
            <div class="swiper-wrapper">
                <?php if ( have_rows('internships_stories_testimonials') ): ?>
                    <?php
                        while( have_rows('internships_stories_testimonials') ) : the_row();

                        $testimonial_image = get_sub_field('photo');
                    ?>
                        <div class="testimonial swiper-slide px-12 sm:px-16 md:px-20 mb-0">
                            <div class="w-full relative rounded overflow-hidden">
                                <div class="w-full testimonial-box h-full absolute top-0 z-10"></div>
                                <div class="flex bg-page border-t-4 border-red-500 rounded-md ">
                                    <div class="flex-none hidden md:block">
                                        <img src="<?= $testimonial_image['url']; ?>" alt="<?= $testimonial_image['alt']; ?>" />
                                    </div>

                                    <div class="flex-1 flex flex-col justify-between p-4 md:p-8">
                                        <div>
                                            <div class="text-xs text-orange-500 font-bold uppercase mb-2">
                                                <?php the_sub_field('title'); ?>
                                            </div>

                                            <div class="text-default">
                                                <?php the_sub_field('phrase'); ?>
                                            </div>
                                        </div>

                                        <div class="text-default flex items-center justify-end py-3 border-b border-separator">
                                            <strong class="mr-1">- <?php the_sub_field('name'); ?></strong> <?php the_sub_field('lastname'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</section>

<section class="pb-12">
    <div class="py-32 bg-gray-150-new -mt-40"></div>
    <div class="container -mt-24">
        <?php

            $args = array(
                'post_type' => 'videos',
                'posts_per_page' => 6,
            );

            $videos_query = new WP_Query( $args );

        ?>

        <?php if ( $videos_query->have_posts() ) : ?>
            <div class="internships-videos flex flex-wrap flex-col sm:flex-row">
                <?php
                    while ( $videos_query->have_posts() ) : $videos_query->the_post();

                    $thumbnail_image = get_the_post_thumbnail_url();
                    
                ?>
                    <div class="intern-video w-full sm:w-1/2 flex p-3">
                        <div class="w-full bg-white-pure rounded-lg overflow-hidden shadow-2xl">
                            <div class="py-32 bg-top bg-cover bg-no-repeat relative" style="background-image: url('<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>');">
                                <?php if ( get_field('internship_stories_video_id') ) : ?>
                                    <div class="play-video w-14 h-14 flex items-center justify-center bg-red-500 rounded-full absolute left-0 bottom-0 ml-5 mb-5 cursor-pointer" data-video-id="<?php the_field('internship_stories_video_id'); ?>">
                                        <i class="fas fa-play text-white-pure text-3xl leading-none pl-1"></i>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="text-white-pure text-xl lg:text-2xl leading-none font-bold p-4 bg-red-500">
                                <?php the_title(); ?>
                            </div>

                            <div class="text-sm p-4">
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>

            <?php if ( $videos_query->found_posts > 6 ) : ?>
                <div class="text-center mt-4">
                    <a href="/videos" class="text-white-pure font-black leading-none px-8 py-3 bg-orange-500 inline-block">Watch More Stories</a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<section class="px-6 pt-12 bg-gray-150-new">
    <div class="container">
		<div class="text-center text-wysiwyg font-roboto font-light text-3xl mb-6">
			<?php the_field('internships_stories_quote_title'); ?>
		</div>

        <div class="flex flex-col-reverse lg:flex-row">
            <div class="w-full lg:w-1/2 mt-6">
                <img src="<?= $quote_sude_image['url']; ?>" alt="<?= $quote_sude_image['alt']; ?>">
            </div>

			<div class="w-full lg:w-1/2">
                <div>
                    <?php if( have_rows('internships_stories_quotes_repeater') ): ?>
                        <?php while( have_rows('internships_stories_quotes_repeater') ): the_row(); ?>
                            <div class="mb-2">
                                <div class="text-default mb-1">
                                    <?php the_sub_field('title'); ?>
                                </div>

                                <div class="text-default italic p-3 bg-page border-l-4 border-red-500">
                                    <?php the_sub_field('quote'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="text-default">
                    <?php the_field('internships_stories_quotes_caption'); ?>
                </div>
			</div>
		</div>
    </div>
</section>
