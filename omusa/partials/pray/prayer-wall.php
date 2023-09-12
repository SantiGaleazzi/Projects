<?php

    // Only if the pray is granted by OM and the user
    // key 5.1 -> Allow request to be shown on partener prayer wall
    // Key 8 -> Show in Pray Wall
    $search_criteria = array(
        'status'        => 'active',
        'field_filters' => array(
            'mode' => 'all',
            array(
                'key' => '5.1',
                'value' => 'allow'
            ),
            array(
                'key' => '8',
                'value' => 'yes'
            )
        )
    );

    $wall_prays = GFAPI::get_entries(4, $search_criteria);
    
?>

<section class="pt-12">
    <div class="container">
        <div class="text-3xl lg:text-4xl text-red-500 text-center font-roboto font-light leading-none mb-12">
            <?php the_field('pray_w_us_wall_title'); ?>
        </div>
    </div>
</section>

<section class="pb-10 relative">
    <div class="w-full testimonials">
        <div class="container">
            <div class="lg:w-4/5 xl:w-3/5 swiper-container pb-4 lg:pb-6">
                <div class="swiper-wrapper">

                    <?php foreach ( $wall_prays as $pray ) : ?>
                        <div class="testimonial swiper-slide px-16 lg:px-20 mb-0 pray-in-wall">
                            <div class="w-fll relative">
                                <div class="testimonial-box w-full h-full absolute top-0 z-10"></div>
                                <div class="flex flex-col justify-between p-6 lg:p-10 bg-page border-t-4 border-red-500 rounded-md shadow-lg ">
                                    <div class="text-default pl-6 border-l border-separator mb-8 lg:mb-12">
                                        <?= $pray['4']; ?>
                                    </div>

                                    <div class="text-center pray-cta">
                                        <button class="text-xl text-white-pure font-black leading-none px-12 py-3 bg-green-500 inline-block">Pray For This Request</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                </div>

                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>
