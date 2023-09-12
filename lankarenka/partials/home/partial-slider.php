
 <?php if ( get_field('home_hide_show_media') == 'slider' ) : ?>

    <div class="home-swiper">
        <div class="swiper-wrapper">

            <?php 
                if( have_rows('sliders_repeater') ):
                    while( have_rows('sliders_repeater') ): the_row();
                    
                    $link = get_sub_field('product_link');
                    $badge = get_sub_field('sale_badge');
                    $subtitle = get_sub_field('subtitle');
                    $slider_background_image = get_sub_field('image');
            ?>
                    <div class="swiper-slide">
                        <div class="w-full md:w-11/20 h-full absolute top-0 right-0 bg-center bg-cover" style="background-image: url('<?= $slider_background_image['url']; ?>');">
                            <div class="w-full h-full absolute top-0 left-0 bg-gray-300 opacity-50 md:opacity-0">
                            </div>
                        </div>
                        <div class="container px-10 py-16 md:px-6 h-full">
                            <div class="w-full md:w-2/4 lg:w-2/5 h-full flex items-center">
                                <div>
                                    <?php if ($badge) : ?>
                                        <span class="text-xs text-purple-100 font-medium tracking-wide leading-none px-3 py-2 bg-purple-400 uppercase rounded inline-block mb-4"  data-swiper-parallax-y="-25"  data-swiper-parallax-opacity="0" data-swiper-parallax-duration="400"><?= $badge; ?></span>
                                    <?php endif; ?>
                                    <div class="text-4xl md:text-5xl leading-none font-medium mb-6" data-swiper-parallax-y="-25" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="400">
                                        <?php the_sub_field('title'); ?>
                                    </div>
                                    <?php if ($subtitle) : ?>
                                        <div class="text-gray-500 md:text-gray-400" data-swiper-parallax-y="-25" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="600"><?php the_sub_field('subtitle'); ?></div>
                                    <?php endif; ?>
                                    <div class="md:text-xl leading-6 font-medium mb-4" data-swiper-parallax-y="-25" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="700">
                                        <?php the_sub_field('description'); ?>
                                    </div>
                                    <?php if ($link) : ?>
                                        <a href="<?= $link['url']; ?>" aria-label="<?= $link['title']; ?>" data-swiper-parallax-y="25" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="800" class="text-purple-100 text-sm font-medium leading-none px-5 py-3 bg-purple-500 hover:bg-purple-600 rounded inline-block transition-all duration-500 ease-in-out"><?= $link['title']; ?> <i class="fas fa-chevron-right ml-2" aria-hidden="true"></i></a>
                                    <?php endif; ?>
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

<?php elseif ( get_field('home_hide_show_media') == 'video' ) : ?>

    <div class="w-full py-64 relative">
        <video playsinline autoplay muted loop  preload="auto" oncontextmenu="return false;" class="w-full h-full absolute inset-0 object-cover">
            <source src="<?php the_field('home_video_background'); ?>" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>

        <div class="w-full h-full flex items-center justify-center bg-black bg-opacity-50 absolute inset-0 z-10">
            <div class="text-white font-belmist text-4xl lg:text-6xl leading-none relative z-20">
                <?php the_field('home_video_title'); ?>
            </div>
        </div>
    </div>

<?php endif; ?>