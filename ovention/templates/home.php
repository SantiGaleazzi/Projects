<?php

	/*
	* Template Name: Homepage
	* 
	* JS: src/js/ovens.js
	*
	*/

	get_header();

	// Quiz
	$quiz_oven_image = get_field('template_home_quiz_oven_image');

?>

	<?php 
		if ( check_range("13-06-2023", "13-06-2032") && ! isset( $_GET['elements'] ) || isset($_GET['elements']) && $_GET['elements'] == 'store' ) {

			get_template_part( 'partials/store-sticky-bar' );
			get_template_part( 'partials/lightboxes/store' );

		}
	?>

	<section class="tw-px-6 tw-pt-14 tw-bg-gradient-to-tr tw-from-gray-800/10 tw-relative tw-overflow-hidden">
		<div class="tw-w-auto md:tw-w-3/4 lg:tw-w-1/2 2xl:tw-w-2/5 tw-text-white tw-flex tw-flex-col sm:tw-flex-row tw-items-center sm:tw-justify-end tw-gap-x-6 tw-p-5 sm:tw-pl-10 tw-bg-gradient-to-r tw-from-orange-400 lg:tw-from-orange-400/20 tw-via-orange-500 lg:tw-via-orange-500 tw-to-orange-500 lg:tw-to-orange-500 sm:tw-absolute tw-top-16 lg:tw-top-24 tw-left-0 tw-rounded-2xl sm:tw-rounded-tl-none sm:tw-rounded-bl-none tw-z-30 tw-mb-12 sm:tw-mb-0">
			<div class="tw-w-full sm:tw-w-auto tw-flex tw-items-center tw-justify-between tw-mb-5 sm:tw-mb-0 sm:tw-mr-10">
				<div class="tw-flex-none sm:tw-mr-7 md:tw-mr-10">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/calendar.png" alt="Calendar Icon">
				</div>

				<div class="tw-flex-none tw-font-bold tw-leading-none sm:tw-mr-7 md:tw-mr-10">
					<?php the_field('template_home_intro_lead_time'); ?>
				</div>

				<div class="tw-flex-none tw-text-4xl lg:tw-text-[42px] tw-font-bold">
					<?php the_field('template_home_intro_week_time'); ?>
				</div>
			</div>

			<?php
					
				if ( get_field('template_home_intro_buy_now') ) :

					$give_now = get_field('template_home_intro_buy_now');

			?>
				<div class="tw-w-full sm:tw-w-auto sm:tw-flex-none">
					<a class="tw-w-full sm:tw-w-auto tw-text-white hover:tw-text-white tw-font-semibold tw-px-12 tw-py-6 tw-bg-orange-900 tw-rounded-2xl tw-inline-flex tw-items-center tw-justify-center tw-group" href="<?= $give_now['url']; ?>" target="<?= esc_attr( $give_now['target'] ?: '_self'); ?>">
						<?= $give_now['title']; ?> <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
					</a>
				</div>
			<?php endif; ?>
		</div>

		<div class="tw-container tw-pb-56 sm:tw-pt-56 lg:tw-py-64 xl:tw-py-56 tw-relative tw-z-20">
			<div class="tw-flex tw-flex-col lg:tw-flex-row tw-items-center tw-gap-x-12">
				<div class="tw-w-full lg:tw-w-1/2 tw-mb-20 lg:tw-mb-0">
					<div class="tw-text-center lg:tw-text-left tw-text-gray-900">
						<div class="tw-text-[40px] lg:tw-text-[60px] tw-leading-none tw-font-bold tw-mb-8">
							<?php the_field('template_home_intro_title'); ?>
						</div>

						<div class="tw-text-[22px] tw-mb-8">
							<?php the_field('template_home_intro_description'); ?>
						</div>

						<div class="tw-flex tw-flex-col md:tw-flex-row tw-justify-center lg:tw-justify-start tw-gap-y-6">
							<?php
								
								if ( get_field('template_home_intro_left_button') ) :

									$intro_lb = get_field('template_home_intro_left_button');
								
							?>
								<div class="tw-flex-none">
									<a class="js-quiz-lightbox-trigger lg:tw-w-full xl:w-auto tw-text-white hover:tw-text-white tw-font-semibold tw-px-12 tw-py-6 tw-bg-orange-500 tw-border-2 tw-border-solid tw-border-orange-500 tw-rounded-2xl tw-inline-flex tw-items-center tw-group" href="<?= $intro_lb['url']; ?>" target="<?= esc_attr( $intro_lb['target'] ?: '_self' ); ?>">
										<?= $intro_lb['title']; ?> <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
									</a>
								</div>
							<?php endif; ?>
							
							<?php
								
								if ( get_field('template_home_intro_right_button') ) :

									$intro_rb = get_field('template_home_intro_right_button');
								
							?>
								<div class="tw-flex-none md:tw-ml-6">
									<a class="lg:tw-w-full xl:w-auto tw-text-orange-500 hover:tw-text-orange-500 tw-font-semibold tw-px-12 tw-py-6 tw-bg-transparent tw-border-2 tw-border-solid tw-border-orange-500 tw-rounded-2xl tw-inline-flex tw-items-center tw-group" href="<?= $intro_rb['url']; ?>" target="<?= esc_attr( $intro_rb['target'] ?: '_self' ); ?>">
										<?= $intro_rb['title']; ?> <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
									</a>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="tw-w-full lg:tw-w-1/2 tw-relative">
					<div class="swiper oven-swiper">
						<div class="tw-text-center lg:tw-text-right tw-text-gray-900 lg:tw-absolute tw-mb-20 lg:tw-mb-0 lg:-tw-top-48 lg:tw-right-0 tw-z-10">
							<div class="tw-text-[30px] js-swiper-oven-name tw-font-bold"></div>

							<div class="tw-text-[18px] tw-font-medium">
								<a class="js-swiper-oven-link tw-text-gray-900 hover:tw-text-gray-900" href="">
									More About the <span class="js-swiper-oven-name"></span> Ovens »
								</a>
							</div>

							<div class="swiper-pagination ovens-pagination"></div>
						</div>

						<div class="swiper-wrapper tw-items-center">
							<?php
							
								$ovens_slides = new WP_Query( array(
									'post_type' => 'oven',
									'posts_per_page' => -1,
									'order'   => 'DESC',
									'orderby' => 'post_date'								    
								));
							
								if ( $ovens_slides->have_posts() ) :
							
							?>
									<?php while ( $ovens_slides->have_posts() ) : $ovens_slides->the_post(); ?>
										<div class="swiper-slide tw-text-center" data-slide-oven-name="<?php the_title(); ?>" data-slide-oven-link="<?php the_permalink(); ?>">
											<img class="lg:!tw-scale-110 lg:tw-translate-x-32" data-swiper-parallax-x="-100" data-swiper-parallax-opacity="0" data-swiper-parallax-duration="400" src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
										</div>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</div>
					</div>
					
					<div class="tw-flex tw-items-center tw-justify-center tw-absolute tw-inset-0 -tw-z-10">	
						<div class="tw-w-[600px] md:tw-w-[800px] tw-h-[600px] md:tw-h-[800px] tw-bg-orange-500/5 tw-rounded-full tw-flex tw-items-center tw-justify-center lg:tw-absolute lg:tw-top-0 lg:tw-left-0 lg:-tw-translate-y-1/3 2xl:tw-translate-y-0 2xl:tw-relative">
							<div class="tw-w-[400px] md:tw-w-[650px] tw-h-[400px] md:tw-h-[650px] tw-bg-orange-500/5 tw-rounded-full tw-flex tw-items-center tw-justify-center">
								<div class="tw-w-[300px] md:tw-w-[500px] tw-h-[300px] md:tw-h-[500px] tw-bg-orange-500/5 tw-rounded-full"></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="tw-text-center sm:tw-text-left tw-text-white tw-flex tw-items-end tw-justify-center lg:tw-justify-start tw-gap-x-5 tw-absolute tw-bottom-0 tw-left-0 tw-right-0 lg:tw-right-auto">
				<div class="tw-grow sm:tw-grow-0 tw-flex tw-flex-col sm:tw-flex-row tw-items-center tw-px-7 tw-py-4 tw-bg-gray-800 tw-rounded-tl-2xl tw-rounded-tr-2xl">
					<div class="tw-text-[24px] sm:tw-text-[48px] tw-font-semibold tw-leading-none tw-mr-4">
						57<sup class="tw-font-semibold">%</sup>
					</div>

					<div class="tw-font-medium">
						Cook Time<br>
						Reduction
					</div>
				</div>

				<div class="tw-grow sm:tw-grow-0 tw-flex tw-flex-col sm:tw-flex-row tw-items-center tw-px-7 tw-py-4 tw-bg-gray-800 tw-rounded-tl-2xl tw-rounded-tr-2xl">
					<div class="tw-text-[24px] sm:tw-text-[48px] tw-font-semibold tw-leading-none tw-mr-4">
						3X
					</div>

					<div class="tw-font-medium">
						Increased<br>
						Output
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="tw-px-6 tw-py-24 tw-bg-white">
		<div class="tw-container">
			<div class="tw-mb-10 md:tw-mb-40 xl:tw-mb-32">
				<div class="tw-text-orange-500 tw-text-[20px] tw-font-medium tw-mb-4">
					<?php the_field('template_home_ovens_pretitle'); ?>
				</div>

				<div class="tw-text-gray-800 tw-text-[42px] tw-font-bold tw-leading-none lg:tw-mb-[180px]">
					<?php the_field('template_home_ovens_title'); ?>
				</div>
			</div>

			<div class="tw-flex tw-flex-col md:tw-flex-row">
				<div class="tw-w-full md:tw-w-1/4 tw-mb-40 md:tw-mb-0">
					<div class="ovens-list">
						<div class="js-ovens-dropdown">
							<div class="js-selected-oven">
								Choose Your Oven
							</div>

							<div>
								<i class="fa-solid fa-angle-down"></i>
							</div>
						</div>

						<div class="js-ovens-options tw-bg-gray-800 tw-divide-y tw-divide-solid tw-divide-[#707070] tw-rounded-2xl md:tw-rounded-tr-none md:tw-rounded-br-none tw-relative tw-overflow-hidden md:tw-overflow-visible">
							<?php
	
								$ovens = new WP_Query( array(
									'post_type' => 'oven',
									'posts_per_page' => -1,
									'order' => 'ASC',
									'orderby' => 'menu_order'
								));
	
							?>
							<?php if ( $ovens->have_posts() ) : $counter = 1; ?>
								<?php while ( $ovens->have_posts() ) : $ovens->the_post(); ?>
									<div class="oven <?= $counter === 1 ? 'is-selected' : ''; ?> tw-text-white md:tw-text-[18px] tw-font-semibold hover:tw-bg-orange-500 tw-px-6 tw-py-3 md:tw-py-5 first:tw-rounded-tl-2xl last:tw-rounded-bl-2xl tw-cursor-pointer tw-relative" data-oven-id="<?php the_ID();?>">
										<?php the_title(); ?>
									</div>
								<?php $counter++; endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif; ?>
						</div>
					</div>
				</div>

				<div class="tw-w-full md:tw-w-3/4">
					<div class="tw-p-8 md:tw-p-24 tw-bg-gray-100 tw-rounded-2xl md:tw-rounded-tl-none tw-relative">
						<?php
						
							$initial_oven = new WP_Query( array(
								'post_type' => 'oven',
								'posts_per_page' => 1,
								'order' => 'ASC',
								'orderby' => 'menu_order'
							));

							if ( $initial_oven->have_posts() ) :

						?>
							<?php while ( $initial_oven->have_posts() ) : $initial_oven->the_post(); ?>
								<div class="-tw-mt-48 md:-tw-mt-56 lg:-tw-mt-80 tw-text-center">
									<img class="js-oven-image" src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
								</div>

								<div class="tw-flex-1 tw-flex tw-flex-col lg:tw-flex-row tw-mt-8">
									<div class="js-oven-title lg:tw-text-right tw-text-orange-500 tw-text-[30px] tw-font-semibold tw-leading-none tw-mb-6 lg:tw-mb-0 md:tw-mr-10">
										<?php the_title(); ?>
									</div>

									<div>
										<div class="js-oven-description tw-text-gray-900 tw-font-medium tw-mb-4">
											<?php the_field('intro'); ?>
										</div>

										<div>
											<a class="js-oven-link tw-text-orange-500 hover:tw-text-orange-500 tw-font-semibold tw-inline-flex tw-items-center tw-group" href="">
												<span class="js-link-text">Learn More the <?php the_field('single_oven_name'); ?> Ovens</span> <i class="fa-solid fa-right-long tw-text-4xl tw-text-orange-500 tw-pl-4 tw-transition-transform tw-duration-150 tw-ease-in-out tw-translate-x-0 group-hover:tw-translate-x-5"></i>
											</a>
										</div>
									</div>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
		
	<?php get_template_part('partials/resources'); ?>

	<section class="tw-px-6 tw-py-24 tw-bg-white tw-relative tw-overflow-hidden">
		<div class="tw-container">
			<div class="tw-text-center tw-max-w-5xl tw-mx-auto tw-mb-12">
				<div class="tw-text-gray-800 tw-text-[42px] tw-font-bold tw-leading-none sm:tw-leading-[54px]">
					<?php the_field('template_home_management_title'); ?>
				</div>
			</div>

			<div class="tw-text-center tw-max-w-6xl tw-mx-auto tw-mb-16">
				<div class="tw-font-medium">
					<?php the_field('template_home_management_description'); ?>
				</div>
			</div>
			
			<div class="tw-relative">
				<div class="tw-flex tw-flex-col lg:tw-flex-row tw-relative tw-z-20">
					<div class="tw-flex-auto tw-text-[14px] tw-flex tw-flex-col sm:tw-flex-row lg:tw-flex-col tw-justify-between sm:tw-gap-x-16 lg:tw-gap-x-0 tw-mb-12 lg:tw-mb-0">
						<div class="has-wysiwyg sm:tw-w-1/2 lg:tw-w-auto tw-text-center sm:tw-text-right lg:tw-text-right tw-font-medium tw-leading-10 tw-mb-12 sm:tw-mb-0">
							<?php the_field('template_home_management_lt_text'); ?>
						</div>

						<div class="has-wysiwyg sm:tw-w-1/2 lg:tw-w-auto tw-text-center sm:tw-text-left lg:tw-text-right tw-font-medium tw-leading-10">
							<?php the_field('template_home_management_lb_text'); ?>
						</div>
					</div>

					<div class="tw-flex-none tw-text-center tw-mb-12 lg:tw-mb-0">
						<img src="<?php the_field('template_home_management_devices'); ?>" alt="Devices">
					</div>

					<div class="tw-flex-auto tw-text-[14px] tw-flex tw-flex-col sm:tw-flex-row lg:tw-flex-col tw-justify-between sm:tw-gap-x-16 lg:tw-gap-x-0">
						<div class="has-wysiwyg sm:tw-w-1/2 lg:tw-w-auto tw-text-center sm:tw-text-right lg:tw-text-left tw-font-medium tw-leading-10 tw-mb-12 sm:tw-mb-0">
							<?php the_field('template_home_management_tr_text'); ?>
						</div>

						<div class="has-wysiwyg sm:tw-w-1/2 lg:tw-w-auto tw-text-center sm:tw-text-left lg:tw-text-left tw-font-medium tw-leading-10">
							<?php the_field('template_home_management_rb_text'); ?>
						</div>
					</div>
				</div>

				<div class="tw-flex tw-items-center tw-justify-center tw-absolute tw-inset-0 lg:tw-translate-y-1/2 tw-z-10">	
					<div class="tw-w-[500px] md:tw-w-[700px] lg:tw-w-[950px] tw-h-[500px] md:tw-h-[700px] lg:tw-h-[950px] tw-bg-orange-500/5 tw-rounded-full tw-flex tw-items-center tw-justify-center">
						<div class="tw-w-[400px] md:tw-w-[600px] lg:tw-w-[800px] tw-h-[400px] md:tw-h-[600px] lg:tw-h-[800px] tw-bg-orange-500/5 tw-rounded-full tw-flex tw-items-center tw-justify-center">
							<div class="tw-w-[300px] md:tw-w-[400px] lg:tw-w-[650px] tw-h-[300px] md:tw-h-[400px] lg:tw-h-[650px] tw-bg-orange-500/5 tw-rounded-full"></div>
						</div>
					</div>
				</div>
			</div>
			
			<?php
					
				if ( get_field('template_home_management_link') ) :
							
				$management_link = get_field('template_home_management_link');
							
			?>
				<div class="tw-text-center tw-mt-20 tw-relative tw-z-10">
					<a href="<?= $management_link['url']; ?>" target="<?= esc_attr( $management_link['target'] ?: '_self' ); ?>" class="tw-text-white hover:tw-text-white tw-font-semibold tw-px-12 tw-py-6 tw-bg-orange-500 tw-rounded-2xl tw-inline-flex tw-items-center tw-group">
						<?= $management_link['title']; ?> <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
					</a>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="tw-px-6 tw-py-16 tw-bg-gray-800">
		<div class="tw-container">
			<div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-justify-between">
				<div class="md:tw-w-1/2 2xl:tw-w-2/5 tw-text-center md:tw-text-left tw-mb-8 md:tw-mb-0">
					<div class="tw-text-[20px] tw-text-orange-500 tw-font-medium tw-mb-4">
						<?php the_field('template_home_quiz_pretitle'); ?>
					</div>

					<div class="tw-text-[30px] tw-leading-none tw-text-white tw-font-semibold tw-mb-6">
						<?php the_field('template_home_quiz_title'); ?>
					</div>

					<div class="tw-text-white tw-font-medium">
						<?php the_field('template_home_quiz_description'); ?>
					</div>
				</div>

				<div class="tw-flex-1 md:tw-w-1/2 2xl:tw-w-4/5 tw-flex tw-flex-col lg:tw-flex-row tw-items-center tw-justify-between">
					<div class="tw-mb-8 lg:tw-mb-0 lg:tw-mr-12">
						<img src="<?= $quiz_oven_image['url']; ?>" alt="<?= $quiz_oven_image['alt']; ?>">
					</div>

					<div class="tw-flex-none">
						<button class="js-quiz-lightbox-trigger tw-text-white tw-font-semibold tw-px-10 tw-py-6 tw-bg-orange-900 tw-rounded-2xl tw-cursor-pointer tw-inline-flex tw-items-center tw-group">
							<?php the_field('template_home_quiz_button_name'); ?> <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
						</button>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="tw-px-6 tw-py-24 lg:tw-py-44 tw-bg-orange-600">
		<div class="tw-container">
			<div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-gap-x-10">
				<div class="tw-w-full md:tw-w-2/5 tw-text-white tw-mb-12 md:mb-0">
					<div class="tw-text-[20px] tw-font-medium tw-mb-4">
						<?php the_field('template_home_video_pretitle'); ?>
					</div>

					<div class="tw-text-[42px] tw-font-bold tw-leading-none tw-mb-10">
						<?php the_field('template_home_video_title'); ?>
					</div>

					<div class="tw-text-[22px] tw-font-medium tw-mb-10">
						<?php the_field('template_home_video_description'); ?>
					</div>

					<?php
					
						if ( get_field('template_home_video_button') ) :
							
						$video_button = get_field('template_home_video_button');
							
					?>
						<div>
							<a class="tw-text-white hover:tw-text-white tw-font-semibold tw-px-12 tw-py-6 tw-bg-orange-900 tw-rounded-2xl tw-inline-flex tw-items-center tw-group" href="<?= $video_button['url']; ?>" target="<?= esc_attr( $video_button['target'] ?: '_self' ); ?>">
								<?= $video_button['title']; ?> <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
							</a>
						</div>
					<?php endif; ?>
				</div>

				<div class="tw-w-full md:tw-w-3/5">
					<div class="js-has-vimeo-player tw-border-8 tw-border-solid tw-border-white tw-shadow-xl tw-relative" data-video-id="<?php the_field('template_home_video_ide'); ?>">
						<img class="tw-w-full tw-object-cover" src="https://vumbnail.com/<?php the_field('template_home_video_ide'); ?>.jpg" alt="<?php the_title(); ?>">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="tw-px-6 tw-pb-24 tw-relative">
		<div class="tw-w-full tw-h-1/3 lg:tw-h-1/2 tw-bg-orange-600 tw-absolute tw-top-0 tw-left-0 tw-right-0"></div>
		<div class="tw-container tw-relative tw-z-10">
			<div class="tw-text-center tw-text-white tw-text-[30px] tw-font-semibold tw-mb-12">
				<?php the_field('template_home_culinary_title'); ?>
			</div>

			<?php
				$args = array (
					'post_type' => 'post',
					'posts_per_page'=> 3,
					'order' => 'DESC',
				);

				$get_post_query = new WP_Query( $args );

				if ( $get_post_query->have_posts() ) :
				
			?>
				<div class="tw-grid tw-grid-cols-1 sm:tw-grid-cols-2 lg:tw-grid-cols-3 tw-gap-6 tw-mb-12">
					<?php while ( $get_post_query->have_posts() ) : $get_post_query->the_post(); ?>
						<div class="tw-py-56 md:tw-py-64 tw-group tw-relative tw-rounded-2xl tw-drop-shadow-xl tw-overflow-hidden">
							<?php

								$categories = get_the_category();

								if ( ! empty( $categories ) ) :
							?>
								<div class="tw-absolute tw-top-6 tw-left-6 tw-z-10">
									<a class="tw-text-[12px] tw-text-white hover:tw-text-white tw-font-bold tw-px-4 tw-py-2 tw-bg-orange-900 tw-inline-block tw-rounded-2xl" href="<?= esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
										<?= esc_html( $categories[0]->name ); ?>
									</a>
								</div>
							<?php endif; ?>

							<div class="tw-absolute tw-inset-0 tw-bg-cover tw-bg-center tw-bg-repeat tw-transition-transform tw-duration-200 tw-ease-in-out tw-scale-100 group-hover:tw-scale-110" <?= get_the_post_thumbnail_url() ? 'style="background-image: url(' . get_the_post_thumbnail_url() .');"' : ''; ?>></div>

							<a class="tw-w-28 tw-h-28 tw-inline-flex tw-items-center tw-justify-center tw-bg-orange-500 tw-absolute tw-bottom-0 tw-right-0 tw-rounded-tl-2xl tw-rounded-br-2xl tw-z-10" href="<?php the_permalink(); ?>"  aria-label="View <?php the_title(); ?>">
								<i class="fa-solid fa-right-long tw-text-4xl tw-text-white"></i>
							</a>

							<div class="tw-w-3/4 tw-text-white tw-text-[20px] md:tw-text-[24px] tw-leading-10 tw-font-semibold tw-pr-3 tw-absolute tw-bottom-6 tw-left-6 tw-z-10">
								<?php the_title(); ?>
							</div>

							<div class="tw-w-full tw-py-40 tw-absolute tw-bottom-0 tw-bg-gradient-to-t tw-from-gray-900"></div>
						</div>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?> 
				</div>
			<?php endif; ?>
			
			<?php
			
				if ( get_field('template_home_culinary_read_more') ) :

				$read_more = get_field('template_home_culinary_read_more');
				
			?>
				<div class="tw-text-center tw-text-orange-500">
					<a class="tw-text-[22px] tw-text-orange-500 hover:tw-text-orange-500 tw-font-medium tw-underline" href="<?= $read_more['url']; ?>" target="<?= esc_attr(  $read_more['target'] ?: '_self' ); ?>">
						<?= $read_more['title']; ?>
					</a> »
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php get_footer();
