<?php

    $generosity_side_image = get_field('get_inspired_generosity_side_image');

    $generosity_button = get_field('get_inspired_generosity_button');
    $generosity_button_target = $generosity_button['target'] ? $generosity_button['target'] : '_self';

?>

<section class="px-6 py-12">
    <div class="container">
        <div class="relative">
            <div class="text-center text-red-500 font-roboto font-light leading-none text-4xl lg:text-5xl">
                <?php the_field('get_inspired_generosity_title'); ?>
            </div>

            <div class="flex items-center md:items-end flex-col-reverse md:flex-row justify-center">
                <div class="md:pt-4">
                    <img src="<?= $generosity_side_image['url']; ?>" alt="<?= $generosity_side_image['alt']; ?>" />
                </div>

                <div class="md:w-3/5 lg:w-1/2 text-default py-10">
                    <?php the_field('get_inspired_generosity_description'); ?>
                </div>
            </div>
        </div>

        <div class="text-center md:text-left flex flex-col md:flex-row items-center justify-center py-8 border-t border-b border-separator">
            <div class="md:flex-1 lg:flex-none text-default font-roboto font-light text-xl md:text-3xl">
                <?php the_field('get_inspired_generosity_quote'); ?>
            </div>

            <div class="w-full sm:w-auto mt-4 md:mt-0 md:pl-8 lg:pl-14">
                <a
                    href="<?=  $generosity_button['url']; ?>"
                    target="<?= esc_attr(  $generosity_button_target ); ?>"
                    class="button w-full sm:w-auto text-xl lg:px-14 bg-red-500"
                >
                    <?=  $generosity_button['title']; ?>
                </a>
            </div>
        </div>
    </div>
</section>