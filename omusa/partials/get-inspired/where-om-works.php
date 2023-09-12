<?php
    
    $get_inspired_wow_button = get_field('get_inspired_wow_button');
    $get_inspired_wow_target = $get_inspired_wow_button['target'] ? $get_inspired_wow_button['target'] : '_self';

    $side_image = get_field('get_inspired_wow_side_image');

?>

<section class="px-6 md:px-0 py-12">
    <div class="container">
        <div class="w-full flex flex-col md:flex-row items-center justify-between p-6 md:py-8 md:px-12 bg-card rounded-md">
            <div class="w-full md:w-2/3 lg:w-2/5 text-center md:text-left mb-12 md:mb-0">
                <div class="text-2xl text-default font-bold leading-none mb-5">
                    <?php the_field('get_inspired_wow_title'); ?>
                </div>

                <div class="text-default mb-6">
                    <?php the_field('get_inspired_wow_description'); ?>
                </div>

                <div>
                    <a href="<?= $get_inspired_wow_button['url']; ?>" target="<?= esc_attr( $get_inspired_wow_target ); ?>" class="md:text-lg text-center text-white-pure leading-none font-black px-4 md:px-8 py-4 bg-red-500 inline-block"><?= $get_inspired_wow_button['title']; ?></a>
                </div>
            </div>

            <div class="md:pl-6  lg:pt-3">
                <img src="<?= $side_image['url']; ?>" alt="<?= $side_image['alt']; ?>">
            </div>
        </div>
    </div>
</section>