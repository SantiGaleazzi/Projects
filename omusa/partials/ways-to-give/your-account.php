<?php

    $your_account_button = get_field('your_account_button');
    $your_account_target = $your_account_button['target'] ? $your_account_button['target'] : '_self';
    $your_account_side_image = get_field('your_account_side_image');

?>

<div class="py-20 md:py-24 bg-red-500 relative">
    <div class="container px-6">
        <div class="flex">
            <div class="sm:w-1/2 md:w-3/5 xl:w-1/2 text-white-pure relative z-10 searcher-list">
                <div class="text-4xl font-roboto font-light leading-none mb-4">
                    <?php the_field('your_account_title'); ?>
                </div>

                <div class="mb-6">
                    <?php the_field('your_account_description'); ?>
                </div>
                
                <?php
                    if ( get_field('your_account_button') ) :

                        $your_account_button = get_field('your_account_button');
                        $your_account_target = $your_account_button['target'] ? $your_account_button['target'] : '_self';
                        
                ?>
                    <div>
                        <a href="<?= $your_account_button['url']; ?>" target="<?= esc_attr( $your_account_target ); ?>" class="text-lg text-center text-white-pure leading-none font-black px-8 py-4 bg-orange-500 cursor-pointer inline-block"><?= $your_account_button['title']; ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="hidden sm:block sm:w-3/5 lg:w-1/2 h-full bg-cover xl:bg-center bg-no-repeat absolute top-0 right-0" style="background-image: url('<?= $your_account_side_image['url']; ?>');"></div>
</div>