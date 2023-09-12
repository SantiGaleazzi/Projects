<?php get_header(); ?>

	<section class="tw-text-center tw-text-white tw-px-6 tw-py-32 lg:tw-py-64 tw-bg-cover tw-bg-center tw-bg-no-repeat tw-relative" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/default-banner-background.jpg');">
		<div class="tw-container tw-max-w-6xl tw-relative tw-z-30">
			<div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
				<div class="tw-text-[40px] lg:tw-text-[60px] tw-font-bold tw-leading-none tw-mb-8 lg:tw-mb-12">
					<?php the_field('settings_archive_videos_title', 'option'); ?>
				</div>

				<div class="lg:tw-text-[22px]">
					<?php the_field('settings_archive_videos_description', 'option'); ?>
				</div>
			</div>
		</div>
		<div class="tw-w-full md:tw-w-3/5 tw-h-full tw-absolute tw-bg-cover tw-bg-left-top tw-bg-no-repeat tw-top-0 tw-right-0 tw-z-20" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/orange-flare.png');"></div>
		<div class="tw-bg-gray-800/80 tw-absolute tw-inset-0 tw-z-10"></div>
	</section>

	<section class="tw-px-6 tw-py-24 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-flex tw-flex-col lg:tw-flex-row">
				<div class="tw-full lg:tw-w-3/4 tw-mb-10 lg:tw-mb-0 lg:tw-pr-4">
					<?php if ( have_posts() ) : ?>
						<div class="tw-flex tw-flex-wrap tw-gap-y-8">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="tw-w-full md:tw-w-1/2 md:tw-px-4 tw-flex">
									<div class="tw-flex tw-flex-col tw-bg-white tw-rounded-2xl tw-shadow-lg tw-overflow-hidden">
										<div class="tw-flex-auto">
											<div>
												<div class="tw-relative">
													<img class="tw-w-full tw-object-cover" src="https://vumbnail.com/<?php the_field('video_id'); ?>.jpg" alt="<?php the_title(); ?>">
													<button class="js-video-media-play tw-w-[100px] tw-h-[100px] tw-bg-gray-900/40 tw-absolute tw-top-1/2 tw-right-1/2 tw-translate-x-1/2 -tw-translate-y-1/2 tw-backdrop-blur-sm tw-flex tw-items-center tw-justify-center tw-rounded-full tw-cursor-pointer tw-z-10 tw-shadow-lg" data-video-id="<?php the_field('video_id'); ?>" aria-label="Open Video Lightbx">
														<i class="fa-solid fa-play tw-text-white tw-text-5xl lg:tw-text-6xl -tw-mr-2"></i>
													</button>
												</div>
											</div>

											<div class="tw-p-8">
												<?php

													$video_categories = wp_get_post_terms($post->ID, 'category-videos', array("fields" => "all"));

													if ( $video_categories ) :

												?>
													<div class="tw-mb-4">
														<a class="tw-text-[12px] tw-text-white hover:tw-text-white tw-font-bold tw-px-4 tw-py-2 tw-bg-orange-900 tw-inline-block tw-rounded-2xl" href="<?= esc_url( get_category_link( $video_categories[0]->term_id ) ); ?>">
															<?= esc_html( $video_categories[0]->name ); ?>
														</a>
													</div>
												<?php else: ?>
													<div class="tw-mb-4">
														<a class="tw-text-[12px] tw-text-white hover:tw-text-white tw-font-bold tw-px-4 tw-py-2 tw-bg-orange-900 tw-inline-block tw-rounded-2xl" href="<?= site_url(); ?>/videos/">
															All
														</a>
													</div>
												<?php endif; ?>

												<div class="tw-text-orange-600 tw-text-[30px] tw-font-semibold tw-leading-none tw-mb-4">
													<?php the_title(); ?>
												</div>

												<div class="tw-text-gray-400 tw-font-semibold">
													<?= get_the_date('M d, Y'); ?>
												</div>
											</div>
										</div>									
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="tw-w-full lg:tw-w-1/4 tw-max-w-lg">
					<?php get_template_part( 'partials/category-videos' ); ?>
				</div>
			</div>
			
			<?php get_template_part( 'partials/paginator' ); ?>
		</div>
	</section>

	<?php get_template_part( 'partials/lightboxes/video' ); ?>

<?php get_footer();
