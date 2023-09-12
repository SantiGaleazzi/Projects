<?php

	/**
	 * Template Name: Industry Leaders
	 */

	get_header();

?>

	<?php get_template_part('partials/general-banner'); ?>

	<?php if ( have_rows('industry_leaders_testimonials') ) : ?>
		<section class="tw-px-6 tw-pt-24">
			<div class="tw-container">
				<?php if ( get_field('industry_leaders_title') ) : ?>
					<h2 class="tw-text-center tw-text-6xl tw-font-bold tw-mb-8">
						<?php the_field('industry_leaders_title'); ?>
					</h2>
				<?php endif; ?>

				<div class="tw-flex tw-flex-wrap">
					<?php while ( have_rows('industry_leaders_testimonials') ) : the_row(); ?>
						<div class="tw-w-full lg:tw-w-1/2 tw-p-4 tw-flex">
							<div class="tw-flex tw-flex-col sm:tw-flex-row tw-items-stretch tw-bg-white tw-rounded-2xl tw-overflow-hidden tw-shadow-lg">
								<div class="tw-w-full sm:tw-w-2/5 tw-flex tw-items-center tw-justify-center tw-px-6 tw-py-10 sm:tw-py-0 tw-bg-[#eeeeee]">
									<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
								</div>

								<div class="tw-flex-1 tw-px-8 md:tw-px-10 tw-py-12 tw-flex tw-flex-col tw-justify-center">
									<div class="tw-text-orange-600 tw-text-[28px] tw-font-bold tw-leading-none tw-mb-5">
										<?php the_sub_field('title'); ?>
									</div>

									<div class="tw-italic tw-mb-3">
										<?php the_sub_field('content'); ?>
									</div>

									<div class="tw-text-gray-400 tw-mb-8">
										<?php the_sub_field('author'); ?>
									</div>

									<div>
										<a href="<?php the_sub_field('file'); ?>" target="_blank" class="tw-text-white hover:tw-text-white tw-font-semibold tw-px-12 tw-py-6 tw-bg-gradient-to-r tw-from-orange-600 tw-to-orange-900 tw-rounded-2xl tw-inline-flex tw-items-center tw-group">
											Download <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if ( get_post()->post_content !== '' ) : ?>
		<section class="tw-px-6 tw-py-24 tw-bg-gray-100">
			<div class="tw-container tw-max-w-7xl">
				<div class="tw-p-8 md:tw-p-12 tw-bg-white tw-rounded-2xl has-wysiwyg has-mautic-form">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content();?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="tw-px-6 tw-py-24">
		<div class="tw-container">
			<?= do_shortcode( '[wpbr_collection]' ); ?>
		</div>
	</section>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer();
