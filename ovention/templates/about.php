<?php

	/*
	* Template Name: About Us
	*/

	$oven = get_field('about_us_made_in_usa_oven');

	get_header();

?>

	<?php get_template_part('partials/general-banner'); ?>

	<section class="tw-text-center tw-px-6 tw-py-24">
		<div class="tw-container tw-max-w-7xl">
			<div class="tw-text-orange-600 tw-text-[34px] tw-font-semibold tw-leading-none tw-mb-8">
				<?php the_field('about_us_history_title'); ?>
			</div>

			<div class="has-wysiwyg">
				<?php the_field('about_us_history_description'); ?>
			</div>
		</div>
	</section>

	<section class="tw-px-6 tw-py-24 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-flex tw-flex-col md:tw-flex-row">
				<div class="tw-w-full md:tw-w-1/2 tw-mb-8 md:tw-mb-0 md:tw-pr-8">
					<div class="tw-text-[34px] tw-font-bold tw-leading-none tw-mb-10">
						<?php the_field('about_us_mnv_mission_title'); ?>
					</div>

					<div>
						<?php the_field('about_us_mnv_mission_description'); ?>
					</div>

				</div>

				<div class="tw-w-full md:tw-w-1/2 md:tw-pl-8">
					<div class="tw-text-[34px] tw-font-bold tw-leading-none tw-mb-10">
						<?php the_field('about_us_mnv_values_title'); ?>
					</div>

					<div>
						<?php the_field('about_us_mnv_values_description'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="tw-text-white tw-px-6 tw-py-24 tw-bg-cover tw-bg-fixed tw-bg-no-repeat tw-relative" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/Flag.jpg');">
		<div class="tw-container tw-relative tw-z-10">
			<div class="tw-flex tw-flex-col md:tw-flex-row-reverse tw-items-center">
				<div class="tw-w-full md:tw-w-1/2 tw-mb-8 md:tw-mb-0 md:tw-pr-8">
					<div class="tw-text-[20px] tw-font-medium tw-mb-4">
						<?php the_field('about_us_made_in_usa_pretitle'); ?>
					</div>

					<div class="tw-text-[42px] tw-font-bold tw-leading-none tw-mb-10">
						<?php the_field('about_us_made_in_usa_title'); ?>
					</div>

					<div class="tw-text-[22px] tw-font-medium">
						<?php the_field('about_us_made_in_usa_description'); ?>
					</div>

					<?php if ( get_field('about_us_made_in_usa_double_description') ) : ?>
						<div class="tw-text-[22px] tw-font-medium tw-mt-10">
							<?php the_field('about_us_made_in_usa_double_description'); ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="tw-w-full md:tw-w-1/2 tw-text-center md:tw-pl-8">
					<img src="<?= $oven['url']; ?>" alt="<?= $oven['alt']; ?>">
				</div>
			</div>
		</div>
		<div class="tw-absolute tw-inset-0 tw-bg-orange-600/90"></div>
	</section>

	<section class="tw-px-6 tw-py-24 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-text-center tw-text-[34px] tw-font-bold tw-leading-none tw-mb-10">
				<?php the_field('about_us_staff_title'); ?>
			</div>

			<div class="tw-flex tw-flex-wrap tw-gap-y-8">
				<?php if ( have_rows('about_us_staff_members') ) : ?>
					<?php while ( have_rows('about_us_staff_members') ) : the_row(); ?>
						<div class="tw-w-full md:tw-w-1/2 tw-px-4 tw-flex">
							<div class="tw-flex tw-flex-col lg:tw-flex-row tw-bg-white tw-rounded-2xl tw-overflow-hidden">
								<div class="tw-w-full lg:tw-w-2/5">
									<img class="tw-w-full tw-h-[350px] lg:tw-h-full tw-object-cover tw-object-left-top lg:tw-object-center" src="<?php the_sub_field('picture'); ?>" alt="<?php the_sub_field('name'); ?>">
								</div>
								
								<div class="tw-w-full lg:tw-w-3/5 tw-px-8 tw-py-12">
									<div class="tw-text-orange-600 tw-text-[24px] tw-font-semibold">
										<?php the_sub_field('name'); ?>
									</div>

									<div class="tw-text-gray-400 tw-mb-6">
										<?php the_sub_field('position'); ?>
									</div>

									<div>
										<?php the_sub_field('description'); ?>
									</div>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer();
