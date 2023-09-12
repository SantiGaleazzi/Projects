<?php
	
	/*
	* Template Name: Testimonials
	*/

	get_header();

?>

	<?php get_template_part('partials/general-banner'); ?>

	<section class="tw-px-6 tw-py-16 md:tw-py-24 tw-bg-gray-100">
		<div class="tw-container tw-max-w-7xl">
			<?php if ( have_rows('template_testimonials') ) : ?>
				<div class="tw-flex tw-flex-col tw-gap-y-10">
					<?php while ( have_rows('template_testimonials') ) : the_row(); ?>
						<div class="tw-flex tw-flex-col sm:tw-flex-row tw-items-stretch content tw-bg-white tw-rounded-2xl tw-overflow-hidden tw-shadow-lg">
							<div class="tw-w-full sm:tw-w-2/5 tw-flex tw-items-center tw-justify-center tw-py-10 sm:tw-py-0 tw-bg-[#eeeeee]">
								<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>">
							</div>

							<div class="tw-flex-1 tw-px-8 md:tw-px-10 tw-py-12">
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
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer();
