<section class="overflow-x-hidden">
	<div class="container">
		<div class="text-center text-white text-2xl md:text-3xl font-bold leading-none p-4">
			<?php the_field('blocks_main_slider_title'); ?>
		</div>
	</div>

    <?php if ( have_rows('blocks_main_slider') ) : ?>
        <div class="has-main-swiper">
            <div class="h-full relative">
                <div class="main-swiper h-full">
                    <div class="swiper-wrapper">
                        <?php while ( have_rows('blocks_main_slider') ) : the_row();
                                if ( get_sub_field('button') ) {
                                    $link = get_sub_field('button');
                                    $link_target = $link['target'] ? $link['target'] : '_self';
                                }
                        ?>
                        <div class="swiper-slide">
                            <a href="<?= $link['url']; ?>" class="w-full h-full flex items-center">
                            <div class="w-full h-full px-6 sm:px-12 bg-cover bg-center md:bg-right-top bg-no-repeat flex items-center <?=  get_sub_field('copy_position') == 'left' ? 'justify-start bg-right-top' : 'justify-end bg-left-top'; ?> relative" style="background-image: url('<?php the_sub_field( 'background_image' ); ?>');">

                                    <div class="main-slider-copy left-0 bottom-0 px-5 pb-5 text-white z-20 absolute lg:relative">

                                        <?php if ( get_sub_field('title') ) : ?>
                                            <div class="text-4xl md:text-5xl lg:text-5xxxl font-bold leading-tight mb-5">
                                                <?php the_sub_field('title'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( get_sub_field('description') ) : ?>
                                            <div class="text-xl lg:text-2xl font-light leading-tight mb-6 md:mb-8">
                                                <?php the_sub_field('description'); ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ( !empty($link) ) : ?>
                                            <div>
                                                <span class="text-center text-lg font-bold leading-none px-12 py-3 bg-red-500 inline-block rounded"><?= $link['title']; ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if ( get_sub_field('title') || get_sub_field('description') ) : ?>
                                        <div class="bottom-0 md:bottom-auto w-full md:w-4/5 lg:w-3/4 h-full <?= get_sub_field('copy_position') == 'left' ? 'bg-gradient-to-l left-0' : 'bg-gradient-to-r right-0'; ?> from-transparent to-black absolute"></div>
                                    <?php endif; ?>
                            </div>
                            </a>
                        </div>
                        <?php endwhile; ?>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>
