<?php

    $mission_cap_logo = get_field('for_churches_cap_logo');
    $mission_cap_bg = get_field('for_churches_cap_bg');
    
    $mission_cap_button = get_field('for_churches_cap_button');
    $mission_cap_button_target = $mission_cap_button['target'] ? $mission_cap_button['target'] : '_self';

?>

<section class="px-6 bg-cover lg:bg-right-bottom bg-no-repeat relative" style="background-image: url('<?= $mission_cap_bg['url']; ?>');">

    <div class="w-full h-full opacity-50 lg:opacity-0 bg-white-pure absolute top-0 left-0">
    </div>

    <div class="container relative z-10">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/4 text-center pt-12 lg:pt-16 md:pr-6 lg:pr-0">
                <img src="<?= $mission_cap_logo['url']; ?>" alt="<?= $mission_cap_logo['alt']; ?>" class="inline-block">
            </div>

            <div class="md:w-3/4 lg:w-3/5 pt-12 lg:pt-16 md:pl-16 pb-12 lg:pb-32 md:border-l-20 border-white-pure">
                <div class="has-wysiwyg mb-8">
                    <?php the_field('for_churches_cap_content'); ?>
                </div>

                <div>
                    <a href="<?= $mission_cap_button['url'] ?>" target="<?= esc_attr( $mission_cap_button_target ); ?>" class="text-white-pure text-lg font-black leading-none px-8 py-3 bg-orange-500 inline-block"><?= $mission_cap_button['title'] ?></a>
                </div>
            </div>
        </div>
    </div>
</section>