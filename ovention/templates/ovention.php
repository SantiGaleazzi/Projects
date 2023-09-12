<?php

	/*
	* Template Name: Why Ovention
	*/

	get_header();

?>

	<?php get_template_part('partials/general-banner'); ?>

	<section class="tw-px-6 tw-py-16 md:tw-py-24 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center">
				<div class="tw-w-full md:tw-w-1/2">
					<?php if ( have_rows('template_why_ovention_links') ) : ?>
						<div class="tw-flex tw-flex-wrap tw-flex-col md:tw-flex-row tw-items-center md:tw-items-stretch">
							<?php
								
								while ( have_rows('template_why_ovention_links') ) : the_row();

								$link = get_sub_field('link');

							?>
								<div class="tw-w-full md:tw-w-1/2 tw-max-w-md tw-flex tw-mb-6 md:tw-pr-6">
									<a class="tw-w-full tw-text-center tw-text-white hover:tw-text-white tw-font-semibold tw-leading-none tw-px-8 tw-py-6 tw-bg-gradient-to-r tw-from-orange-600 tw-to-orange-900 tw-rounded-2xl tw-inline-flex tw-items-center tw-justify-center" href="<?= $link['url']; ?>">
										<?= $link['title']; ?>
									</a>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="tw-w-full md:tw-w-1/2 tw-text-center">
					<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
				</div>
			</div>
		</div>
	</section>

	<section class="tw-px-6 tw-py-16 md:tw-py-24">
		<div class="tw-container">
			<div class="tw-flex tw-flex-col md:tw-flex-row">
				<div class="tw-w-full md:tw-w-1/2 md:tw-pr-8 has-wysiwyg">
					<?php the_field('template_content_left_side'); ?>
				</div>

				<div class="tw-w-full md:tw-w-1/2 md:tw-pl-8 has-wysiwyg">
					<?php the_field('template_content_right_side'); ?>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer();
