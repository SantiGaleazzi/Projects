<?php

    $pray_w_us_ministry_side_image = get_field('pray_w_us_ministry_side_image');

?>

<section class="bg-gray-150-new">
    <div class="container px-6 py-14 md:py-20 relative">
        <div class="flex justify-end">
            <div class="w-full md:w-3/5 lg:w-1/2 xl:pr-20 relative z-10">
                <div class="text-3xl text-red-500 font-roboto font-light leading-10 mb-6">
                    <?php the_field('pray_w_us_ministry_title'); ?>
                </div>

                <div class="text-default">
                    <?php the_field('pray_w_us_ministry_description'); ?>
                </div>
            </div>
        </div>

        <div class="hidden md:block md:w-3/4 lg:w-3/4 xl:w-3/5 h-full bg-cover lg:bg-contain sm:bg-right-top lg:bg-left-top bg-no-repeat absolute top-0 left-0 md:-ml-32 lg:-ml-20 xl:-ml-12" style="background-image: url('<?= $pray_w_us_ministry_side_image['url']; ?>');"></div>
    </div>

</section>