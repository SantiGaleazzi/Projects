<section class="new-arrivals px-6 py-12 md:py-20 bg-gray-100">
    <div class="container">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-4xl font-medium mb-2"><?php the_field('home_como_lo_usas_title'); ?></h2>

            <?php if ( get_field('home_como_lo_usas_description') ) : ?>
                <div class="text-gray-600">
                    <?php the_field('home_como_lo_usas_description'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="arrival-container">
            <div class="swiper-wrapper mb-4">
                <?php if ( have_rows('home_dinos_como_lo_usas_repeater') ) : ?>
                    <?php while ( have_rows('home_dinos_como_lo_usas_repeater') ) : the_row(); ?>
                        <div class="w-1/2 md:w-1/3 lg:w-1/5 swiper-slide px-2 md:px-3 group">
                            <a href="<?php the_sub_field('social_network_link'); ?>" target="_blank" rel="noopener noreferrer" class="w-full py-32 bg-red-500 bg-cover bg-no-repeat rounded-md overflow-hidden relative inline-block" style="background-image: url('<?php the_sub_field('image'); ?>');">
                                <div class="w-full text-white flex items-center px-5 py-3 absolute bottom-0 left-0 right-0 trasition-all duration-200 ease-in-out transform translate-y-full group-hover:translate-y-0">
                                    <div class="pt-1 pr-3">
                                        <i class="fab <?php the_sub_field('social_network'); ?> text-2xl leading-none"></i>
                                    </div>

                                    <div class="text-lg leading-none">
                                        <?php the_sub_field('user'); ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div>
</section>