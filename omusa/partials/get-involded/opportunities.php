<section id="explore" class="px-6 pt-16 md:pt-32">
    <div class="container relative">

        <div class="mb-10">
            <div class="text-center text-red-500 text-4xl lg:text-5xl font-roboto font-light leading-none mb-3">
                <?php the_field('opportunities_title'); ?>
            </div>

            <div class="text-center text-default text-lg">
                <?php the_field('opportunities_description'); ?>
            </div>
        </div>

        <?php if ( have_rows('opportunities_options_repeater') ) : $counter = 0; ?>
            <div class="text-default py-4 flex flex-wrap item-center justify-center border-b-4 border-red-500 opportunities-involved">
                <?php
                        while( have_rows('opportunities_options_repeater') ): the_row();
                        $counter++;
                        $title = str_replace(' ', '', strtolower(get_sub_field('title')));
                    ?>
                    <div id="opportunity-<?= $counter; ?>" data-name="<?= $title; ?>" class="w-full sm:w-1/2 md:w-1/3 xl:w-auto text-center font-roboto px-4 py-3 cursor-pointer opportunity">
                        <div class="font-bold text-lg">
                            <?php the_sub_field('title'); ?>
                        </div>

                        <div class="text-sm">
                            <?php the_sub_field('pre_text'); ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>


<?php if ( have_rows('opportunities_options_repeater') ) : $counter = 0; ?>
    <?php
        while( have_rows('opportunities_options_repeater') ): the_row();
            $counter++;
            $bg_class = $counter % 2 ? 'bg-gray-150-new' : '';
            $side_image = get_sub_field('side_image');
            $link = get_sub_field('button');
            $link_target = $link['target'] ? $link['target'] : '_self';
            $title = str_replace(' ', '', strtolower(get_sub_field('title')));
        ?>
        <section class="<?= $title; ?> px-6 py-14 relative <?= $bg_class; ?>">
            <div class="container">
                <div class="flex">
                    <div class="sm:w-1/2 md:w-3/5 lg:w-1/2 xl:w-2/5 text-default relative z-10">
                        <div class="text-3xl font-roboto font-bold leading-none mb-4">
                            <?php the_sub_field('title'); ?>
                        </div>

                        <div class="mb-6">
                            <?php the_sub_field('description'); ?>
                        </div>
                        
                        <?php if ( get_sub_field('has_social') == 'yes' ) : ?>
                            <div class="flex items-center mb-5">
                                <div class="font-black">
                                    <?php the_sub_field('social_title'); ?>
                                </div>

                                <?php if ( have_rows('social_networks') ) : ?>
                                    <?php while( have_rows('social_networks') ): the_row(); ?>
                                        <div class="ml-2">
                                           <a href="<?php the_sub_field('url'); ?>" class="text-xl inline-block"><i class="fab <?php the_sub_field('network'); ?>"></i></a>
                                        </div>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div>
                            <a href="<?= $link['url']; ?>" target="<?= esc_attr(  $link_target ); ?>" class="text-lg text-center text-white-pure leading-none font-black px-8 py-4 bg-red-500 cursor-pointer inline-block"><?= $link['title']; ?></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hidden sm:block sm:w-3/5 md:w-1/2 h-full bg-cover xl:bg-contain xl:bg-left-top bg-no-repeat absolute top-0 right-0" style="background-image: url('<?= $side_image['url']; ?>');"></div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>