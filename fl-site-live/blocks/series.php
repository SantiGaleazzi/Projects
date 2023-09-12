<section class="has-series-slider px-4 py-12 relative overflow-hidden">
	<div class="container z-20">
		<div class="text-3xl font-roboto-condensed font-bold mb-6 relative z-10">
			<?php the_field('block_series_title'); ?>
		</div>

		<?php

			$series_terms = get_terms( array(
				'taxonomy' => 'series',
                'orderby' => 'post_date',
				'hide_empty' => false,
			) );
				
		?>

		<?php if ( !empty( $series_terms ) && !empty( get_field('block_series_term') ) ) : ?>
            <div class="series-swiper overflow-hidden">
                <div class="swiper-wrapper">
                    <?php
                        foreach ( get_field('block_series_term') as $serie ) :
                                    
                            $series_link = get_term_link( $serie );
                            $cover_picture = get_field( 'series_name_cover_image', $serie );
                    ?>
                    <a href="<?= $series_link; ?>" class="swiper-slide">
                        <img src="<?= $cover_picture; ?>" alt="Series Cover" class="h-full top-0 rounded-lg w-full">
                    </a>
                    <?php endforeach; ?>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
		<?php endif; ?>
	</div>

    <div class="hidden md:block w-full bg-gray-850 absolute top-0 left-0" style="height: 50%;"></div>
</section>
