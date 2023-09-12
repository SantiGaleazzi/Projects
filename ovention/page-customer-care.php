<?php

	$find_rep_link = get_field('custom_care_service_partner');

	get_header();
	
?>

	<?php get_template_part('partials/general-banner'); ?>

	<section class="tw-px-6 tw-py-24 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-text-center tw-mb-10">
				<a class="tw-text-white hover:tw-text-white tw-font-semibold tw-px-12 tw-py-6 tw-bg-gradient-to-r tw-from-orange-600 tw-to-orange-900 tw-rounded-2xl tw-inline-flex tw-items-center tw-justify-center tw-group" href="<?= $find_rep_link['url']; ?>" target="<?= esc_attr( $find_rep_link['target'] ?: '_self' ); ?>">
					<?= $find_rep_link['title']; ?> <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
				</a>
			</div>

			<div class="tw-flex tw-flex-col md:tw-flex-row">
				<div class="tw-w-full md:tw-w-1/2 tw-flex tw-mb-10 md:tw-mb-0 md:tw-pr-6">
					<div class="tw-p-8 md:tw-p-12 tw-bg-white tw-rounded-2xl">
						<div class="tw-text-orange-600 tw-text-[42px] tw-font-bold tw-leading-none tw-mb-10">
							<?php the_field('custom_care_tech_title'); ?>
						</div>

						<div class="tw-text-[22px] tw-font-medium tw-mb-10 has-wysiwyg">
							<?php the_field('custom_care_tech_description'); ?>
						</div>

						<div class="has-mautic-form">
							<?php the_field('custom_care_tech_mautic_form'); ?>
						</div>
					</div>
				</div>

				<div class="tw-w-full md:tw-w-1/2 tw-flex md:tw-pl-6">
					<div class="tw-p-8 md:tw-p-12 tw-bg-white tw-rounded-2xl">
						<div class="tw-text-orange-600 tw-text-[42px] tw-font-bold tw-leading-none tw-mb-10">
							<?php the_field('custom_care_culinary_title'); ?>
						</div>

						<div class="tw-text-[22px] tw-font-medium tw-mb-10 has-wysiwyg">
							<?php the_field('custom_care_culinary_description'); ?>
						</div>

						<div class="has-mautic-form">
							<?php the_field('custom_care_culinary_mautic_form'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer();
