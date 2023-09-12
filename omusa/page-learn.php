<?php

    get_header();

    $intro_side_image = get_field('learn_intro_side_image');

    $learn_lead_logo = get_field('learn_lead_logo');
    $learn_lead_button = get_field('learn_lead_button');
    $learn_lead_button_target = $learn_lead_button['target'] ? $learn_lead_button['target'] : '_self';
    
?>

    <section class="section-quoted pt-24 md:pt-64 pb-16 md:pb-24 relative">
        <div class="container relative z-10">
            <div class="text-default lg:pl-12 xl:pl-24 ">
                <div class="headline mb-8">
                    <?php the_field('learn_intro_title'); ?>
                </div>

                <div class="md:w-3/5 xl:w-1/2">
                    <div class="text-3xl font-roboto font-bold leading-9 mb-6">
                        <?php the_field('learn_intro_subtitle'); ?>
                    </div>

                    <div class="font-medium">
                        <?php the_field('learn_intro_description'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden sm:block sm:w-3/5 lg:w-1/2 h-full bg-cover xl:bg-left-top bg-no-repeat absolute bottom-0 right-0 z-0" style="background-image: url('<?= $intro_side_image['url']; ?>');"></div>
    </section>

    <section class="text-default px-6 bg-gray-150-new">
        <div class="container">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/4 text-center pt-12 lg:pt-16 md:pr-6 lg:pr-0">
                    <img src="<?= $learn_lead_logo['url']; ?>" alt="<?= $learn_lead_logo['alt']; ?>" class="inline-block">
                </div>

                <div class="flex-1 flex flex-col lg:flex-row pt-12 lg:pt-16 md:pl-16 pb-10 md:border-l-20 border-white-pure">
                    <div class="flex-1 lg:w-3/5 lg:pr-16 xl:pr-32 mb-8">
                        <div class="has-wysiwyg mb-6">
                            <?php the_field('learn_lead_description'); ?>
                        </div>

                        <div class="text-lg font-black mb-6">
                            <?php the_field('learn_lead_cost'); ?>
                        </div>

                        <div>
                            <a href="<?= $learn_lead_button['url'] ?>" target="<?= esc_attr( $learn_lead_button_target ); ?>" class="text-white-pure text-lg font-black leading-none px-8 py-3 bg-orange-500 inline-block"><?= $learn_lead_button['title'] ?></a>
                        </div>
                    </div>

                    <div>
                        <div class="text-xl font-bold mb-3">
                            <?php the_field('learn_topics_title'); ?>
                        </div>

                        <ol class="font-bold list-decimal ml-4">
                            <?php if( have_rows('learn_topics_repeater') ) : ?>
                                <?php while( have_rows('learn_topics_repeater') ) : the_row(); ?>
                                    <li class="pl-3">
                                        <span class="font-normal"><?php the_sub_field('topic'); ?></span>
                                    </li>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-6 py-12">
        <div class="container">
            <div class="text-center text-red-500 text-4xl lg:text-5xl font-roboto font-light leading-none mb-8">
                <?php the_field('learn_instructors_title'); ?>
            </div>

            <div class="flex flex-wrap justify-center">
                <?php if ( have_rows('learn_instructors_repeater') ) : ?>
                    <?php
                        while( have_rows('learn_instructors_repeater') ): the_row();
                        $instructor_image = get_sub_field('image');
                    ?>
                        <div class="text-default px-5 w-full md:w-1/2 flex flex-col sm:flex-row my-3">
                            <div class="flex-none mb-5 sm:mb-0">
                                <img src="<?= $instructor_image['url']; ?>" alt="<?= $instructor_image['alt']; ?>" class="w-24 h-24 object-cover object-center">
                            </div>

                            <div class="flex-1 sm:pl-6 xl:pl-10">
                                <div class="text-3xl font-roboto font-bold leading-none mb-3">
                                    <?php the_sub_field('name'); ?>
                                </div>

                                <div class="text-xs has-red-links has-wysiwyg">
                                    <?php the_sub_field('description'); ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php get_footer();
