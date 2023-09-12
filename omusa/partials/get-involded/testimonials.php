<?php

    $call_a_coach_link = get_field('coach_settings_link', 'option');
    $call_a_coach_target = $call_a_coach_link['target'] ? $call_a_coach_link['target'] : '_self';

?>

<section class="pt-12 md:pt-24 relative">
    <div class="container relative pb-16">
        <div class="text-center text-red-500 text-4xl lg:text-5xl font-roboto font-light leading-none">
            <?php the_field('testimonials_title'); ?>
        </div>
    </div>
</section>

<section class="w-full testimonials -mb-32">
    <div class="container">
        <div class="lg:w-4/5 xl:w-3/5 swiper-container">
            <div class="swiper-wrapper">
                <?php if( have_rows('testimonials_repeater') ): ?>
                    <?php
                        while( have_rows('testimonials_repeater') ): the_row();
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

<section class="pt-48 pb-16 md:pb-24 px-6 bg-gray-150-new">
    <div class="container relative">

        <div class="flex justify-center">
            <div class="md:w-3/5 lg:w-1/2 text-center relative">
                <div class="text-wysiwyg text-4xl lg:text-5xl font-roboto font-light leading-none mb-6 md:mb-12">
                    <?php the_field('get_it_title'); ?>
                </div>

                <div class="text-default">
                    <?php the_field('get_it_description'); ?>
                </div>
            </div>
        </div>

        <div class="w-full  z-30">
            <div class="md:w-3/4 lg:w-full xl:w-3/4 flex flex-col lg:flex-row items-center p-4 lg:px-8 lg:py-6 bg-page rounded mx-auto mt-12 md:-mt-0 md:-mb-10 relative shadow-xl z-10">
                <div class="lg:w-2/5 xl:w-auto text-default text-xl leading-none font-roboto sm:mb-4 lg:mb-0 lg:pr-6 xl:pr-10">
                    <?php the_field('get_involved_buttons_title'); ?>
                </div>
                
                <div class="w-full flex-1 flex flex-col sm:flex-row justify-between">
                    <a href="<?= $call_a_coach_link ? $call_a_coach_link['url'] : '#'; ?>" target="<?= esc_attr( $call_a_coach_target ); ?>" class="w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-teal-500 inline-block sm:mx-2 mt-3 sm:mt-0"><?= $call_a_coach_link['title']; ?></a>
                        
                    <button type="button" class="quiz-lightbox-btn w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-orange-500 inline-block sm:mx-2 mt-3 sm:mt-0">Take the Readiness Quiz</button>
                </div>
                
            </div>
        </div>
    </div>
</section>