<?php

    /**
     * Template Name: Trips Opportunities
     */

    get_header();

?>

    <section class="section-quoted px-6 pt-24 pb-12 md:pb-16 md:mt-32 xl:mt-32 relative" style="background-color: <?php the_field('trips_banner_bg_color'); ?>;">
        <div class="container relative z-10">
            <div class="flex">
                <div class="w-full md:w-1/2">
                    <div class="headline">
                        <?php the_field('trips_banner_title'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden md:block md:w-3/4 lg:w-3/5 h-full bg-cover bg-left-top xl:bg-right-top bg-no-repeat absolute top-0 right-0" style="background-image: url('<?php the_field('trips_banner_background'); ?>');"></div>
    </section>

    <?php if ( get_field('trips_after_banner_title') ) : ?>
        <section class="text-center font-bold leading-none px-6 pt-12">
            <div class="container">
                <div class="text-default text-2xl">
                    <?php the_field('trips_after_banner_title'); ?>
                </div>

                <?php if ( get_field('trips_after_banner_subtitle') ) : ?>
                    <div class="text-red-500 text-lg mt-4">
                        <?php the_field('trips_after_banner_subtitle'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( have_rows('trips_opportunities_countries') ) : ?>
        <?php
            while ( have_rows('trips_opportunities_countries') ) : the_row();

            $side_image = get_sub_field('trips_content_side_image');
        ?>
            <section class="px-6 pt-16 pb-56">
                <div class="container">
                    <div class="flex flex-col md:flex-row gap-8">
                        <div class="w-full md:w-2/5">
                            <img src="<?= $side_image['url']; ?>" alt="<?= $side_image['alt']; ?>" class="mx-auto" />
                        </div>

                        <div class="w-full md:w-3/5">
                            <div class="text-default text-2xl font-bold mb-2">
                                <?php the_sub_field('trips_content_title'); ?>
                            </div>

                            <div class="text-default has-wysiwyg mb-3">
                                <?php the_sub_field('trips_content_description'); ?>
                            </div>

                            <div>
                                <div class="text-orange-500 text-xs font-bold uppercase mb-3">
                                    <?php the_sub_field('trips_notes_title'); ?>
                                </div>

                                <?php if ( have_rows('trips_notes') ) : ?>
                                    <?php while ( have_rows('trips_notes') ) : the_row(); ?>
                                        <div class="text-default flex flex-col sm:flex-row mb-4 sm:mb-2">
                                            <div class="w-full sm:w-24 font-black">
                                                <?php the_sub_field('name'); ?>
                                            </div>

                                            <div class="flex-1 sm:pl-6">
                                                <?php the_sub_field('description'); ?>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="px-6 pt-32 pb-16 bg-gray-200-new">
                <div class="container">
                    <div class="-mt-72">
                        <?php if ( get_sub_field('trips_trip_title') ) : ?>
                            <div class="text-red-500 text-3xl font-roboto font-light leading-none mb-8">
                                <?php the_sub_field('trips_trip_title'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="flex flex-col md:flex-row justify-center gap-4 mb-8">
                            <?php if ( have_rows('trips_repeater') ) : ?>
                                <?php

                                    while ( have_rows('trips_repeater') ) : the_row();

                                        $trip_link = get_sub_field('link');

                                ?>
                                    <div class="w-full md:w-1/3">
                                        <div class="px-6 py-6 md:px-4 lg:px-8 lg:py-8 bg-page border-t-4 border-red-500 shadow-xl">
                                            <div class="text-default text-2xl lg:text-3xl leading-none font-bold mb-1">
                                                <?php the_sub_field('location'); ?>
                                            </div>

                                            <div class="text-sm lg:text-base font-roboto font-bold flex items-center text-default uppercase mb-1">
                                                <?php the_sub_field('start_date'); ?> <?= get_sub_field('end_date') ? '<span class="px-1"> - </span>' : ''; ?> <?php the_sub_field('end_date'); ?>
                                            </div>
                                            
                                            <?php if ( get_sub_field('apply_by') ) : ?>
                                                <div class="text-orange-500 text-xs font-bold uppercase mb-4">
                                                    Apply by <?php the_sub_field('apply_by'); ?>
                                                </div>
                                            <?php endif; ?>

                                            <div>
                                                <a href="<?= $trip_link['url']; ?>" target="<?= esc_attr( $trip_link['target'] ?: '_self' ); ?>" class="w-full text-center text-white-pure text-lg font-black leading-none p-3 bg-orange-500 inline-block"><?= $trip_link['title']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php if ( get_sub_field('trips_upcoming_title') ) : ?>
                        <div class="text-center text-default text-sm font-black mb-6">
                            <?php the_sub_field('trips_upcoming_title'); ?>
                        </div>
                    <?php endif; ?>


                    <?php if ( have_rows('trips_upcoming') ) : ?>
                        <div class="flex flex-col items-center">
                            <?php while ( have_rows('trips_upcoming') ) : the_row(); ?>
                                <div class="flex items-center uppercase">
                                    <div class="flex-none">
                                        <a href="<?php the_sub_field('link'); ?>" class="text-red-500 font-roboto font-bold underline">
                                            <?php the_sub_field('start_date'); ?> <?= get_sub_field('end_date') ? '<span> — </span>' : ''; ?> <?php the_sub_field('end_date'); ?>
                                        </a>
                                    </div>

                                    <?php if ( get_sub_field('apply_by') ) : ?>
                                        <div class="text-orange-500 text-xs font-bold">
                                            <span class="text-red-500 font-black px-1"> – </span> Apply by <?php the_sub_field('apply_by'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endwhile; ?>
    <?php endif; ?>

    

<?php get_footer();
