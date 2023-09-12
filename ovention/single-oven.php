<?php 

	/**
	 * 
	 * PHP: functions/oven-requests.php -> get_oven_by_slug()
	 * JS:  src/js/single-oven.js
	 * CSS: src/sass/pages/_single-oven.sass
	 * Info: 'data-oven-info-to-search' fetch the oven data and display it in the 'js-oven-overall-info'.
	 * 		 It also corresponds to the field on the database. The 'oven_' is appended in the backend.
	 *       'data-info-type' is used to conditionally render content on the client side.
	 */

	$gallery_images = get_field('oven_gallery');

	get_header();

?>

	<section class="tw-px-6 tw-py-16 md:tw-py-24 lg:tw-pt-0 tw-bg-gradient-to-tr tw-from-gray-800/10">
		<div class="tw-container lg:tw-pt-48 lg:tw-pb-72 tw-relative">
			<div class="tw-flex tw-flex-col lg:tw-flex-row tw-items-center lg:tw-gap-x-12">
				<div class="tw-w-full lg:tw-w-1/2 tw-mb-12 lg:tw-mb-0">
					<div class="tw-text-center lg:tw-text-left tw-text-gray-900">
						<div class="tw-text-[40px] lg:tw-text-[60px] tw-leading-none tw-font-bold tw-mb-8">
							<?php the_title(); ?>
						</div>

						<div class="tw-font-medium tw-mb-6">
							<?php the_field('intro'); ?>
						</div>

						<div>
							<a class="tw-text-white hover:tw-text-white tw-font-semibold tw-px-12 tw-py-6 tw-bg-orange-500  tw-rounded-2xl tw-inline-flex tw-items-center tw-group" href="<?= wc_get_page_permalink( 'shop' ); ?>">
								Visit our Online Store <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
							</a>
						</div>
					</div>
				</div>

				<?php if ( get_field('oven_gif') ) : ?>
					<div class="tw-w-full lg:tw-w-1/2">
						<img src="<?php the_field('oven_gif'); ?>" alt="<?php the_title(); ?>">
					</div>
				<?php endif; ?>
			</div>
			
			<?php if ( $gallery_images ) : ?>
				<div class="tw-flex tw-justify-center lg:tw-justify-start tw-gap-x-6 lg:tw-absolute lg:tw-bottom-0 lg:tw-left-0">
					<?php foreach ( $gallery_images as $image ) : ?>
						<div class="js-gallery-thumbnail tw-w-[100px] tw-h-[70px] tw-border-2 tw-border-solid tw-border-white tw-drop-shadow-lg tw-rounded-lg tw-overflow-hidden tw-group tw-cursor-pointer">
							<img class="tw-w-full tw-h-full tw-object-cover tw-rounded-md tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-scale-110" src="<?= esc_url( $image['sizes']['thumbnail'] ); ?>" alt="<?= esc_attr( $image['alt'] ); ?>">
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="tw-px-6 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-flex tw-flex-col">
				<div class="js-single-oven-info-list tw-w-full tw-flex tw-flex-row tw-items-center tw-justify-between tw-divide-x tw-divide-solid tw-divide-gray-100/20 tw-rounded-2xl lg:-tw-mt-10 tw-overflow-x-scroll xl:tw-overflow-visible" data-oven-id="<?= $post->ID; ?>" data-oven-slug="<?= $post->post_name; ?>">
					<div class="js-single-oven-data is-active" data-oven-info-to-search="about_info" data-info-type="about">
						About
					</div>
					<div class="js-single-oven-data" data-oven-info-to-search="training_videos" data-info-type="video">
						Training Videos
						<div class="js-single-oven-count"></div>
					</div>
					<div class="js-single-oven-data" data-oven-info-to-search="tech_specs_files" data-info-type="file">
						Tech Specs
						<div class="js-single-oven-count"></div>
					</div>
					<div class="js-single-oven-data" data-oven-info-to-search="manuals" data-info-type="file">
						Product Manual
						<div class="js-single-oven-count"></div>
					</div>
					<div class="js-single-oven-data" data-oven-info-to-search="catalogs" data-info-type="file">
						Accessory Catalog
						<div class="js-single-oven-count"></div>
					</div>
					<div class="js-single-oven-data" data-oven-info-to-search="certifications" data-info-type="file">
						Ventless Certifications
						<div class="js-single-oven-count"></div>
					</div>
					<div class="js-request-demo-trigger">
						Request a Demo
					</div>
				</div>

				<div class="js-oven-overall-info tw-w-full tw-flex tw-flex-wrap tw-justify-center tw-py-20">
					<?php if ( have_rows( 'oven_about_info' ) ) : ?>
						<?php
							while ( have_rows( 'oven_about_info' ) ) : the_row();
								$icon = get_sub_field( 'icon' );
						?>
							<div class="tw-w-full tw-mb-8 last:tw-mb-0 has-wysiwyg">
								<div class="tw-w-full lg:tw-max-w-7xl tw-mx-auto">
									<div class="tw-flex tw-flex-row">
										<div class="tw-w-[50px] tw-text-center tw-flex-none tw-mb-8">
											<img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>">
										</div>
										
										<div class="tw-flex-1 tw-text-[14px] tw-text-gray-900 tw-font-medium tw-pl-10 md:tw-pr-10">
											<?php the_sub_field('text'); ?>
										</div>
									</div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php else : ?>
						<div class="tw-w-full has-wysiwyg">
							<?php the_content(); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

	<section class="tw-text-center tw-px-6 tw-py-20 tw-relative">
		<div class="tw-container tw-relative tw-z-10">
			<div class="tw-text-gray-800 tw-text-[42px] tw-font-bold tw-mb-12">
				<?php the_field('oven_video_title'); ?>
			</div>

			<div class="tw-max-w-6xl tw-mx-auto">
				<div class="js-has-vimeo-player tw-border-8 tw-border-solid tw-border-white tw-shadow-xl tw-relative" data-video-id="<?php the_field('oven_video_id'); ?>">
					<img class="tw-w-full tw-object-cover" src="<?= get_field('oven_video_cover') ?: 'https://vumbnail.com/' . get_field('oven_video_id') . '.jpg'; ?>" alt="<?php the_title(); ?>">
				</div>
			</div>
		</div>
		<div class="tw-w-full tw-h-1/2 tw-absolute tw-bottom-0 tw-left-0 tw-right-0 tw-bg-gray-100"></div>
	</section>

	<?php 

		$ovens = new WP_Query(array(
			'post_type' => 'oven',
			'posts_per_page' => -1,
			'order' => 'ASC',
			'orderby' => 'menu_order',
			'post__not_in' => array( $post->ID )
		));
	
		if ( $ovens->have_posts() ) :
	?>
		<section class="tw-text-center tw-px-6 tw-bg-gray-100">
			<div class="tw-container tw-max-w-6xl tw-text-gray-800">
				<div class="tw-text-[42px] tw-font-bold tw-leading-none tw-mb-12">
					<?php the_field('settings_single_oven_title', 'option'); ?>
				</div>

				<div class="tw-font-medium">
					<?php the_field('settings_single_oven_description', 'option'); ?>
				</div>
			</div>
		</section>

		<section class="swiper single-oven-swiper tw-pt-32 tw-pb-24 tw-bg-gray-100 tw-relative">
			<div class="swiper-wrapper">
				<?php while ( $ovens->have_posts() ) : $ovens->the_post(); ?>
					<div class="swiper-slide">
						<div class="oven tw-flex tw-p-8 md:tw-p-12 tw-bg-white tw-rounded-2xl tw-shadow-2xl swiper-zoom-container">
							<div class="text-center">
								<div class="-tw-mt-32">
									<img src="<?php the_field('oven_catalog_Image'); ?>" alt="<?php the_title(); ?>">
								</div>

								<div class="tw-text-[24px] md:tw-text-[28px] tw-font-semibold tw-leading-none tw-my-6">
									<?php the_title(); ?>s
								</div>
				
								<div class="oven-description tw-font-medium tw-mb-6">
									<?php the_field('intro'); ?>
								</div>

								<?php
									if ( get_field('carrousel_link') ) :

										$oven_link = get_field('carrousel_link');
								?>
									<div>
										<a class="link tw-text-white hover:tw-text-white tw-font-semibold tw-px-10 tw-py-6 tw-bg-orange-500 tw-rounded-2xl tw-inline-flex tw-items-flex tw-items-center tw-group" href="<?= $oven_link['url']; ?>" target="<?= esc_attr( $oven_link['target'] ?: '_self' ); ?>">
											<?= $oven_link['title']; ?> <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<div class="swiper-button-next nav-button-next"></div>
      		<div class="swiper-button-prev nav-button-prev"></div>
		</section>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<?php get_template_part('partials/resources'); ?>

	<?php get_template_part('partials/lightboxes/gallery', null, array( 'images' => $gallery_images ?: array() ) ); ?>

	<?php get_template_part( 'partials/lightboxes/video' ); ?>

<?php get_footer();

