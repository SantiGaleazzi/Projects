<?php
    
    $sliders = get_field('block_video_slider');

?>

<?php if ( $sliders ) : ?>
    
    <section class="has-video-swiper relative px-4  bg-gray-850 overflow-hidden">
        <div class="container my-12">
            <div class="text-white text-3xl font-bold leading-none lg:pl-2 mb-5">
                <?php the_field('block_section_name'); ?>
            </div>
        </div>
        <div class="video-swiper my-12 px-10">
            <div class="swiper-wrapper">

                <?php
                    foreach ( $sliders as $slide ) :

                        $excerpt = get_the_excerpt( $slide->ID );
                        $thumbnail = get_the_post_thumbnail_url( $slide->ID, 'medium' );

                ?>
                    <div class="swiper-slide px-2">
                        <div class="w-full h-48 relative group">
                            <a href="<?= esc_url( the_permalink( $slide->ID ) ); ?>" class="w-full block bg-gray-800 bg-cover bg-center bg-no-repeat absolute inset-0 z-20 md:group-hover:rounded-b-none rounded-xl transition-all duration-200 ease-in-out transform md:group-hover:-translate-y-1/2 translate-y-0" style="background-image: url('<?= $thumbnail; ?>');">
                            </a>

                            <a href="<?= esc_url( the_permalink( $slide->ID ) ); ?>" title="<?= get_the_title( $slide->ID ); ?>" class="w-full block px-4 py-3 md:group-hover:bg-gray-600 bg-transparent absolute inset-0 z-30 group-hover:rounded-t-none rounded-xl transition-all duration-200 ease-in-out transform md:group-hover:translate-y-12 translate-y-0 overflow-hidden">
                                <div class="text-white pb-6 opacity-0 md:group-hover:opacity-100 transition-all duration-200 ease-in-out">
                                    <div class="text-lg font-bold truncate">
                                       <?= get_the_title( $slide->ID ); ?>
                                    </div>

                                    <div class="text-sm font-light">
                                        <?= mb_strimwidth( $excerpt, 0, 180, ' ...' ); ?>
                                    </div>
                                </div>

                                <div class="w-full flex items-center justify-center px-4 bg-gold absolute bottom-0 left-0 right-0 z-10 group-hover:opacity-100 md:opacity-0">
                                    <div class="text-white text-2xl font-semibold">WATCH</div>

                                    <div>
                                        <img src="<?php bloginfo('template_url'); ?>/assets/images/glowing-play-button.png" alt="Play Button" class="w-10">
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

    </section>

<?php endif;
