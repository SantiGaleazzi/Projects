<?php
    
    get_header();

    $mission_gap_intro_side_image = get_field('mission_gap_intro_side_image');
    
?>

    <section class="section-quoted px-6 pt-24 md:pt-48 lg:pt-56 xl:pt-64 pb-16">
        <div class="container">
            <div class="headline text-default mx-auto">
                <?php the_field('mission_gap_title'); ?>
            </div>

            <div class="flex flex-col md:flex-row justify-end relative mt-12 lg:mt-24 xl:pr-24">
                <div class="md:w-1/2 lg:pb-8">
                    <?php if( have_rows('mission_gap_title_resources') ) : ?>
                        <?php while( have_rows('mission_gap_title_resources') ) : the_row(); ?>
                            <div class="text-default mb-8">
                                <div class="text-2xl md:text-3xl font-roboto font-light leading-10 mb-2">
                                    <?php the_sub_field('title'); ?>
                                </div>

                                <div class="font-medium">
                                    <?php the_sub_field('description'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="md:absolute left-0 bottom-0 md:-ml-24 lg:-ml-0 xl:ml-8">
                    <img src="<?= $mission_gap_intro_side_image['url']; ?>" alt="<?= $mission_gap_intro_side_image['alt']; ?>" />
                </div>
            </div>

            <div class="text-center text-default px-6 py-8 border-t border-b border-separator">
                <div class="text-3xl font-roboto font-light leading-none mb-5">
                    <?php the_field('mission_gap_intro_summary_title'); ?>
                </div>

                <div class="text-lg tracking-wider">
                    <?php the_field('mission_gap_intro_summary_desciption'); ?>
                </div>
            </div>
        </div>
    </section>

    <section class="px-6 pt-10 pb-32 bg-gray-150-new">
        <div class="container">
            <div class="text-center text-red-500 text-4xl lg:text-5xl font-roboto font-light leading-none">
                <?php the_field('mission_gap_pages_title'); ?>
            </div>
        </div>
    </section>

    <section class="pb-16">
        <div class="container -mt-24">
            <div class="flex flex-wrap justify-center">
                <?php if ( have_rows('mssion_gap_pages_repeater') ) : ?>
                    <?php
                        while ( have_rows('mssion_gap_pages_repeater') ) : the_row();

                        $image = get_sub_field('image');
                        $link = get_sub_field('link');
                        $link_target = $link['target'] ? $link['target'] : '_self';

                    ?>
                        <div class="flex px-3 w-full sm:w-1/2 lg:w-1/3 my-3">
                            <div class="w-full border-t-4 border-red-500 shadow-2xl">
                                <div class="w-full py-40 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $image['url']; ?>');"></div>

                                <div class="text-default p-6">
                                    <div class="mb-1">
                                        <a href="<?= $link['url']; ?>" target="<?= esc_attr(  $link_target ); ?>" class="text-2xl font-roboto font-bold leading-none"><?= $link['title']; ?> »</a> 
                                    </div>
                                    
                                    <div class="font-medium">
                                        <?php the_sub_field('description'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>

<?php get_footer();
