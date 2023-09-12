<?php

	/*
	* Template Name: Culinary Consultation
	*/

	$culinary_consultation = get_field('culinary_consultation');

	get_header();

?>

	<?php get_template_part('partials/general-banner'); ?>


	<section class="tw-px-6 tw-py-24 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-p-8 md:tw-p-12 tw-bg-white tw-rounded-2xl has-wysiwyg">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content();?>
					<?php endwhile; ?>
				<?php endif; ?>

				<div class="tw-my-10">
					<div class="tw-text-center tw-text-[32px] tw-font-bold tw-leading-none tw-mb-10">
						<?php the_field('template_culinary_consultation_title'); ?>
					</div>

					<div class="tw-flex tw-flex-wrap tw-items-center">
						<?php if ( have_rows('template_culinary_consultation_icons') ) : ?>
							<?php
								
								while ( have_rows('template_culinary_consultation_icons') ) : the_row();
								
								$icon = get_sub_field('icon');

							?>
								<div class="tw-w-full md:tw-w-1/2 lg:tw-w-1/3 tw-flex tw-items-center tw-p-4">
									<div class="tw-flex-none">
										<img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>">
									</div>

									<div class="tw-pl-8">
										<?php the_sub_field('description'); ?>
									</div>
								</div>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>

					<div class="has-mautic-form">
						<?php the_field('template_culinary_consultation_form'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer();
