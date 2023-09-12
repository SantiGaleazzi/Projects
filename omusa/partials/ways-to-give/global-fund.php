<?php

    $global_fund_side_image = get_field('global_fund_side_image');

?>

<div class="py-20 md:pt-32 md:pb-24 relative">
    <div class="container px-6">
        <div class="flex">
            <div class="sm:w-1/2 md:w-3/5 xl:w-1/2 text-default relative z-10 searcher-list">
                <div class="text-4xl font-roboto font-light leading-none mb-4">
                    <?php the_field('global_fund_title'); ?>
                </div>

                <div class="mb-6">
                    <?php the_field('global_fund_description'); ?>
                </div>
                
                <?php
                    if ( get_field('global_fund_button') ) :

                        $global_fund_button = get_field('global_fund_button');
                        $global_fund_button_target = $global_fund_button['target'] ? $global_fund_button['target'] : '_self';

                ?>
                    <div class="open-lightbox">
                        <a href="<?= $global_fund_button['url']; ?>" target="<?= esc_attr( $global_fund_button_target ); ?>" class="text-lg text-center text-white-pure leading-none font-black px-8 py-4 bg-red-500 cursor-pointer"><?= $global_fund_button['title']; ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="hidden sm:block sm:w-3/5 lg:w-1/2 h-full bg-cover xl:bg-center bg-no-repeat absolute top-0 right-0" style="background-image: url('<?= $global_fund_side_image['url']; ?>');"></div>
</div>