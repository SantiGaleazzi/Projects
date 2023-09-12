<?php

	$term = get_queried_object();

	get_header();
	
?>

	<?php get_template_part('partials/breadcrumbs'); ?>

	<section class="tw-px-5 tw-pt-10 tw-pb-32 tw-bg-beige-500">
		<div class="tw-container">
			<div class="text-center tw-text-42 tw-text-blue-900 tw-font-extrabold">
				<?= $term->name; ?>
			</div>
		</div>
	</section>

	<section class="tw-px-5 tw-pb-10 tw-drop-shadow-lg tw-relative">
		<div class="tw-container tw-max-w-4xl tw-mb-10 -tw-mt-20">
			<div class="tw-py-32 tw-bg-cover tw-bg-center tw-bg-no-repeat tw-drop-shadow-lg" style="background-image: url('<?php the_field( 'region_feature_image', $term ); ?>');"></div>
		</div>

		<div class="tw-container tw-max-w-3xl">
			<div class="has-wysiwyg">
				<?= term_description(); ?>
			</div>
		</div>
	</section>

	<div id="taxonomy-regions-map" class="js-map tw-z-10" data-term-id="<?= $term->term_id; ?>"></div>

<?php get_footer();
