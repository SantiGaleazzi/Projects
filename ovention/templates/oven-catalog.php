<?php

	/*
	* Template Name: Oven Catalog
	* 
	* JS: src/js/catalog.js
	*
	*/

	get_header(); 

?>

	<section class="tw-text-center tw-text-white tw-px-6 tw-py-32 lg:tw-py-64 tw-bg-cover tw-bg-center tw-bg-no-repeat tw-relative" <?= get_field('oven_catalog_intro_background') ? 'style="background-image: url(' . get_field('oven_catalog_intro_background') .');"' : ''; ?>>
		<div class="tw-container tw-max-w-6xl tw-relative tw-z-30">
			<div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
				<button class="js-catalog-video-media tw-w-[70px] lg:tw-w-[100px] tw-h-[70px] lg:tw-h-[100px] tw-bg-[#F2F2F2]/40 tw-flex tw-items-center tw-justify-center tw-rounded-full tw-cursor-pointer tw-mb-12" data-video-id="<?php the_field('oven_catalog_intro_video_id'); ?>" aria-label="Play">
					<i class="fa-solid fa-play tw-text-white tw-text-5xl lg:tw-text-7xl -tw-mr-2"></i>
				</button>

				<div class="tw-text-[40px] lg:tw-text-[60px] tw-font-bold tw-leading-none tw-mb-8 lg:tw-mb-12">
					<?php the_title(); ?>
				</div>

				<div class="lg:tw-text-[22px]">
					<?php the_field('oven_catalog_intro_description'); ?>
				</div>
			</div>
		</div>
		<div class="tw-w-full md:tw-w-3/5 tw-h-full tw-absolute tw-bg-cover tw-bg-left-top tw-bg-no-repeat tw-top-0 tw-right-0 tw-z-20" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/orange-flare.png');"></div>
		<div class="tw-bg-gray-800/80 tw-absolute tw-inset-0 tw-z-10"></div>

		<div class="js-catalog-video-player">
			<button class="js-close-player tw-w-16 tw-h-16 tw-bg-orange-400 tw-flex tw-items-center tw-justify-center tw-rounded-full tw-absolute tw-cursor-pointer tw-top-8 tw-right-8 tw-z-10" aria-label="Close">
				<i class="fa-solid fa-xmark tw-text-white tw-text-4xl"></i>
			</button>

			<div id="js-catalog-video"></div>
		</div>
	</section>

	<section class="tw-text-center tw-text-white tw-px-6 tw-py-20 tw-bg-gray-900">
		<div class="tw-container">
			<div class="tw-text-[30px] tw-font-semibold tw-leading-none tw-mb-5">
				<?php the_field('oven_catalog_banner_title'); ?>
			</div>

			<div class="tw-font-medium">
				<?php the_field('oven_catalog_banner_description'); ?>
			</div>
		</div>
	</section>

	<?php

		$featured_ovens = new WP_Query( array(
			'post_type' => 'oven',
			'posts_per_page' => 1,
			'tax_query' => array(
				array(
					'taxonomy' => 'category-oven',
					'terms' => 'featured',      
					'field' => 'slug',
					'operator' => 'IN'
				)
			)
		));
		
		if ( $featured_ovens->have_posts() ) :
		
	?>
		<section class="tw-text-center md:tw-text-left tw-px-6 tw-pb-20 tw-bg-cover tw-bg-center tw-bg-no-repeat tw-relative" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/featured-bg.jpg');">
			<div class="tw-container tw-max-w-7xl tw-relative tw-z-10">
				<div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center">
					<?php while ( $featured_ovens->have_posts() ) : $featured_ovens->the_post(); ?>
						<div class="tw-w-full md:tw-w-1/2 tw-relative tw-mb-12 md:tw-mb-0">
							<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="-tw-translate-y-10">
						</div>

						<div class="tw-text-white tw-w-full md:tw-w-1/2">
							<div class="tw-flex tw-items-center tw-justify-center md:tw-justify-end">
								<div class="tw-w-16 tw-h-16 tw-flex tw-items-center tw-justify-center tw-bg-white tw-rounded-full tw-mr-4" aria-label="Star">
									<i class="fa-solid fa-star tw-text-4xl tw-leading-none tw-text-orange-500"></i>
								</div>

								<div class="tw-text-[23px] tw-font-bold">
									NEW
								</div>
							</div>

							<div class="tw-text-[30px] tw-font-semibold tw-leading-none tw-my-6">
								<?php the_title(); ?>
							</div>

							<div class="tw-font-medium tw-mb-6">
								<?php the_field('intro'); ?>
							</div>

							<div>
								<a class="tw-text-orange-500 hover:tw-text-orange-500 tw-font-bold tw-px-10 tw-py-5 tw-bg-white tw-rounded-2xl tw-inline-flex tw-items-center tw-group" href="<?php the_permalink(); ?>">
									Learn More <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
								</a>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
			<div class="tw-bg-orange-500/90 tw-absolute tw-inset-0"></div>
		</section>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<section class="tw-px-6 tw-pt-48 tw-pb-20 md:tw-pb-0 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-flex tw-flex-wrap">
				<?php

					$ovens = new WP_Query( array(
						'post_type' => 'oven',
						'posts_per_page' => -1,
						'order'   => 'DESC',
						'orderby' => 'post_date',
						'tax_query' => array(
							array(
								'taxonomy' => 'category-oven',
								'terms' => 'featured',      
								'field' => 'slug',
								'operator' => 'NOT IN'
							)
						)
					));
					
					if ( $ovens->have_posts() ) :
					
				?>
					<?php while ( $ovens->have_posts() ) : $ovens->the_post(); ?>
						<div class="tw-w-full md:tw-w-1/2 md:tw-px-4 tw-flex tw-mb-48 last:tw-mb-0 md:last:tw-mb-48">
							<div class="tw-text-center tw-flex tw-flex-col tw-p-12 md:tw-p-16 xl:tw-px-24 md:tw-py-20 tw-bg-white tw-rounded-2xl tw-shadow-lg">
								<div class="tw-flex-auto">
									<div class="-tw-mt-48">
										<img src="<?php the_field('oven_catalog_Image'); ?>" alt="<?php the_title(); ?>">
									</div>

									<div class="tw-text-[30px] tw-font-semibold tw-leading-none tw-my-8">
										<?php the_title(); ?>
									</div>

									<div class="tw-font-medium tw-mb-8">
										<?php the_field('intro'); ?>
									</div>
								</div>

								<div>
									<a class="tw-text-white hover:tw-text-white tw-font-bold tw-px-10 tw-py-5 tw-bg-orange-500 tw-rounded-2xl tw-inline-flex tw-items-center tw-group" href="<?php the_permalink(); ?>">
										Learn More <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
									</a>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="tw-px-6 tw-pt-20">
		<div class="tw-text-center tw-container tw-max-w-7xl">
			<div class="tw-text-[42px] tw-font-semibold tw-leading-none tw-mb-8">
				<?php the_field('oven_catalog_testimonial_title'); ?>
			</div>

			<div class="tw-text-[18px]">
				<?php the_field('oven_catalog_testimonial_description'); ?>
			</div>
		</div>
	</section>
	
	<section>
		<?php if ( have_rows('oven_catalog_testimonials') ) : ?>
			<div class="swiper catalog-testimonials tw-py-20">
				<div class="swiper-wrapper">
					<?php
					
						while( have_rows('oven_catalog_testimonials') ) : the_row();
							
						$oven_image = get_sub_field('oven_image');
						
					?>
						<div class="swiper-slide">
							<div class="testimony tw-p-8 md:tw-p-12 xl:tw-p-32 tw-flex tw-flex-col lg:tw-flex-row tw-items-center tw-bg-white tw-rounded-2xl tw-shadow-2xl">
								<div class="t-w-full lg:tw-w-1/2 tw-mb-8 lg:tw-mb-0 lg:tw-mr-12 tw-text-center">
									<img src="<?= $oven_image['url']; ?>" alt="<?= $oven_image['alt']; ?>">
								</div>
			
								<div class="t-w-full lg:tw-w-1/2 tw-text-gray-900">
									<div class="tw-text-[24px] md:tw-text-[30px] tw-font-semibold tw-leading-none tw-mb-5">
										<?php the_sub_field('title'); ?>
									</div>
			
									<div>
										"<?php the_sub_field('description'); ?>"
									</div>
			
									<?php if ( get_sub_field('full_name') ) : ?>
										<div class="tw-mt-12">
											<div class="tw-font-bold">
												- <?php the_sub_field('full_name') ?>
											</div>
			
											<?php if ( get_sub_field('information_repeater') ) : ?>
												<div class="tw-text-xs tw-uppercase tw-pl-5 info-field">
													<?php the_sub_field('information_repeater') ?>
												</div>
											<?php endif; ?>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		<?php endif; ?>
	</section>

<?php get_footer();
