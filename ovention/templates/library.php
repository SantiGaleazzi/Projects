<?php

	/*
	*Template Name: Library
	*/

	get_header();

?>

	<?php get_template_part('partials/general-banner'); ?>

	<?php if ( '' !== get_post()->post_content ) : ?>
		<section class="tw-px-6 tw-py-24 tw-bg-gray-100">
			<div class="tw-container tw-max-w-7xl">
				<div class="tw-p-8 md:tw-p-12 tw-bg-white tw-rounded-2xl has-wysiwyg has-mautic-form">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content();?>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<section class="tw-px-6 tw-py-16 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-text-center tw-text-orange-600 tw-text-[32px] tw-font-bold tw-leading-none tw-mb-12">
				<?php the_field('library_specs_title'); ?>
			</div>

			<div class="tw-flex tw-flex-wrap">
				<?php if ( have_rows('library_specs_files') ) : ?>
					<?php while ( have_rows('library_specs_files') ) : the_row(); ?>
						<div class="tw-w-full sm:tw-w-1/2 lg:tw-w-1/4 tw-flex tw-flex-col tw-p-3 tw-group">
							<a class="tw-h-full tw-flex tw-flex-col tw-p-8 tw-bg-white tw-border-2 tw-border-solid tw-border-gray-200 hover:tw-border-orange-500 tw-rounded-2xl tw-transition-all tw-duration-150 tw-ease-in-out" href="<?php the_sub_field('file'); ?>" target="_blank">
								<div class="tw-flex-auto tw-mb-8">
									<i class="fa-solid fa-cloud-arrow-down tw-text-4xl tw-text-orange-500 tw-transition-transform tw-duration-100 tw-ease-in-out group-hover:tw-translate-y-1"></i>
								</div>

								<div>
									<div class="tw-text-gray-900 hover:tw-text-gray-900 tw-font-semibold">
										<?php the_sub_field('label'); ?>
									</div>

									<div class="tw-text-[14px] tw-text-gray-400 tw-font-medium">
										File
									</div>
								</div>
							</a>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="tw-px-6 tw-py-16 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-text-center tw-text-orange-600 tw-text-[32px] tw-font-bold tw-leading-none tw-mb-12">
				<?php the_field('library_operation_manuals_title'); ?>
			</div>

			<div class="tw-flex tw-flex-wrap">
				<?php if ( have_rows('library_operation_manuals_files') ) : ?>
					<?php while ( have_rows('library_operation_manuals_files') ) : the_row(); ?>
						<div class="tw-w-full sm:tw-w-1/2 lg:tw-w-1/4 tw-flex tw-flex-col tw-p-3 tw-group">
							<a class="tw-h-full tw-flex tw-flex-col tw-p-8 tw-bg-white tw-border-2 tw-border-solid tw-border-gray-200 hover:tw-border-orange-500 tw-rounded-2xl tw-transition-all tw-duration-150 tw-ease-in-out" href="<?php the_sub_field('file'); ?>" target="_blank">
								<div class="tw-flex-auto tw-mb-8">
									<i class="fa-solid fa-cloud-arrow-down tw-text-4xl tw-text-orange-500 tw-transition-transform tw-duration-100 tw-ease-in-out group-hover:tw-translate-y-1"></i>
								</div>

								<div>
									<div class="tw-text-gray-900 hover:tw-text-gray-900 tw-font-semibold">
										<?php the_sub_field('label'); ?>
									</div>

									<div class="tw-text-[14px] tw-text-gray-400 tw-font-medium">
										File
									</div>
								</div>
							</a>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="tw-px-6 tw-py-16 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-text-center tw-text-orange-600 tw-text-[32px] tw-font-bold tw-leading-none tw-mb-12">
				<?php the_field('library_bacp_title'); ?>
			</div>

			<div class="tw-flex tw-flex-wrap">
				<?php if ( have_rows('library_bacp_files') ) : ?>
					<?php while ( have_rows('library_bacp_files') ) : the_row(); ?>
						<div class="tw-w-full sm:tw-w-1/2 lg:tw-w-1/4 tw-flex tw-flex-col tw-p-3 tw-group">
							<a class="tw-h-full tw-flex tw-flex-col tw-p-8 tw-bg-white tw-border-2 tw-border-solid tw-border-gray-200 hover:tw-border-orange-500 tw-rounded-2xl tw-transition-all tw-duration-150 tw-ease-in-out" href="<?php the_sub_field('file'); ?>" target="_blank">
								<div class="tw-flex-auto tw-mb-8">
									<i class="fa-solid fa-cloud-arrow-down tw-text-4xl tw-text-orange-500 tw-transition-transform tw-duration-100 tw-ease-in-out group-hover:tw-translate-y-1"></i>
								</div>

								<div>
									<div class="tw-text-gray-900 hover:tw-text-gray-900 tw-font-semibold">
										<?php the_sub_field('label'); ?>
									</div>

									<div class="tw-text-[14px] tw-text-gray-400 tw-font-medium">
										File
									</div>
								</div>
							</a>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<section class="tw-px-6 tw-py-16 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-text-center tw-text-orange-600 tw-text-[32px] tw-font-bold tw-leading-none tw-mb-12">
				<?php the_field('library_ventless_title'); ?>
			</div>

			<div class="tw-flex tw-flex-wrap">
				<?php if ( have_rows('library_ventless_files') ) : ?>
					<?php while ( have_rows('library_ventless_files') ) : the_row(); ?>
						<div class="tw-w-full sm:tw-w-1/2 lg:tw-w-1/4 tw-flex tw-flex-col tw-p-3 tw-group">
							<a class="tw-h-full tw-flex tw-flex-col tw-p-8 tw-bg-white tw-border-2 tw-border-solid tw-border-gray-200 hover:tw-border-orange-500 tw-rounded-2xl tw-transition-all tw-duration-150 tw-ease-in-out" href="<?php the_sub_field('file'); ?>" target="_blank">
								<div class="tw-flex-auto tw-mb-8">
									<i class="fa-solid fa-cloud-arrow-down tw-text-4xl tw-text-orange-500 tw-transition-transform tw-duration-100 tw-ease-in-out group-hover:tw-translate-y-1"></i>
								</div>

								<div>
									<div class="tw-text-gray-900 hover:tw-text-gray-900 tw-font-semibold">
										<?php the_sub_field('label'); ?>
									</div>

									<div class="tw-text-[14px] tw-text-gray-400 tw-font-medium">
										File
									</div>
								</div>
							</a>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer(); ?>
