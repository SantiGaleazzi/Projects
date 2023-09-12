<div class="home-swiper">

    <div class="swiper-wrapper">

        <?php 
            if( have_rows('woocommerce_settings_slider', 'option') ):
                while( have_rows('woocommerce_settings_slider', 'option') ): the_row();
                
                $left_image = get_sub_field('left_image');
                $right_image = get_sub_field('right_image');
        ?>
                <div class="swiper-slide">
                    <div class="w-full md:w-1/2 h-full absolute top-0 left-0 bg-center bg-cover" data-swiper-parallax-x="40" data-swiper-parallax-opacity="0" style="background-image: url('<?= $left_image['url']; ?>');">
                        <div class="w-full h-full absolute top-0 left-0 bg-gray-400 opacity-75 md:opacity-25">
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 h-full absolute top-0 right-0 bg-center bg-cover" data-swiper-parallax-x="-40" data-swiper-parallax-opacity="0" style="background-image: url('<?= $right_image['url']; ?>');">
                        <div class="w-full h-full absolute top-0 left-0 bg-gray-400 opacity-75 md:opacity-25">
                        </div>
                    </div>

                    <div class="container px-10 py-16 md:px-6 h-full">
                        <div class="w-full h-full text-center flex items-center justify-center">
                            <div class="text-white text-4xl leading-none font-medium mb-6" data-swiper-parallax-y="-50" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="400">
                                <?php the_sub_field('title'); ?>
                            </div>
                        </div>
                    </div>
                </div>
        <?php   
                endwhile;
            endif;
        ?>
    </div>

    <div class="swiper-pagination"></div>

    <div class="container px-10 md:px-6 relative">
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
        
</div>