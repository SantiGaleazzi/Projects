<?php

    $intro_side_image = get_field('pray_w_us_side_image');
    $pray_w_us_request_pray = get_field('pray_w_us_request_pray');
    $pray_w_us_button = get_field('pray_w_us_button');

?>

<section class="section-quoted pt-24 sm:pt-32 md:pt-48 xl:pt-56">
	<div class="container">
        <div class="flex items-center flex-col sm:flex-row justify-between">
            <div class="sm:w-1/2 xl:w-2/5 mb-8 sm:mb-0">
                <div class="headline text-default mx-auto sm:mx-0">
                    <?php the_field('pray_w_us_title'); ?>
                </div>

                <div class="text-default text-center sm:text-left md:pr-12 mb-6 md:mb-10">
                    <?php the_field('pray_w_us_description'); ?>
                </div>

                <div class="flex items-center flex-col md:flex-row justify-between lg:pr-16">
                    <div class="w-full md:w-1/2 md:pr-2 mb-4 md:mb-0">
                        <a id="pray-request-button" href="<?= $pray_w_us_request_pray['url']; ?>" target="<?php esc_url( $pray_w_us_request_pray['target'] ? $pray_w_us_request_pray['target'] : '_self' ); ?>" class="text-center text-white-pure text-xl font-black leading-none px-4 py-3 bg-green-500 block"><?= $pray_w_us_request_pray['title']; ?></a>
                    </div>

                    <div class="w-full md:w-1/2 md:pl-2">
                        <a id="pray-w-us-btn" href="<?= $pray_w_us_button['url']; ?>" target="<?php esc_url( $pray_w_us_button['target'] ? $pray_w_us_button['target'] : '_self' ); ?>" class="text-center text-white-pure text-xl font-black leading-none px-4 py-3 bg-orange-500 block"><?= $pray_w_us_button['title']; ?></a>
                    </div>
                </div>
            </div>

            <div class="sm:w-1/2 lg:w-2/5 sm:pl-8 lg:pl-0">
                <img src="<?= $intro_side_image['url']; ?>" alt="<?= $intro_side_image['alt']; ?>">
            </div>
        </div>
    </div>
</section>