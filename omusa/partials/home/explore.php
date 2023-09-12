<?php

    $guys_side_image = get_field('home_explore_side_image');
    
    $explore_button = get_field('home_explore_button');
    $explore_button_target = $explore_button['target'] ? $explore_button['target'] : '_self';

    $impact_button = get_field('home_explore_impact_button');
    $impact_button_target = $impact_button['target'] ? $impact_button['target'] : '_self';

?>

<section class="px-6 py-16 md:py-20 lg:pt-40">
    <div class="container">
        <div class="relative">
            <div class="lg:w-2/5 lg:pb-12">
                <h1 class="text-default font-roboto font-light text-4xl md:text-5xl mb-2">
                    <?php the_field('home_explore_title'); ?>
                </h1>

                <div class="lg:w-3/4 text-default mb-6 md:mb-8 has-wysiwyg">
                    <?php the_field('home_explore_description'); ?>
                </div>
                
                <?php if ( $explore_button ) : ?>
                    <div>
                        <a
                            href="<?= $explore_button['url']; ?>"
                            target="<?= esc_attr( $explore_button_target ); ?>"
                            class="button text-xl bg-orange-500"
                        >
                            <?= $explore_button['title']; ?>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="lg:absolute right-0 bottom-0">
                <img src="<?= $guys_side_image['url']; ?>" alt="<?= $guys_side_image['alt']; ?>" />
            </div>
        </div>

        <div class="text-center md:text-left flex flex-col md:flex-row items-center justify-center py-8 border-t border-b border-separator">
            <div class="md:flex-1 lg:flex-none text-default font-roboto text-xl">
                <?php the_field('home_explore_impact_text'); ?>
            </div>

            <div class="w-full sm:w-auto mt-4 md:mt-0 md:pl-8 lg:pl-14">
                <a
                    href="<?= $impact_button['url']; ?>"
                    target="<?= esc_attr( $impact_button_target ); ?>"
                    class="button w-full sm:w-auto text-xl lg:px-14 bg-red-500"
                >
                    <?= $impact_button['title']; ?>
                </a>
            </div>
        </div>
    </div>
</section>