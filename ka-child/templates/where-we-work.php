<?php

	/**
	 * Template Name: Where We Work
	*/

	get_header();

?>

	<?php get_template_part('partials/breadcrumbs'); ?>

	<section class="tw-px-5 tw-pt-10 tw-pb-32 tw-bg-beige-500">
		<div class="tw-container">
			<div class="text-center tw-text-42 tw-text-blue-900 tw-font-extrabold">
				<?php the_title(); ?>
			</div>
		</div>
	</section>

	<section class="tw-px-5 tw-pb-8 tw-drop-shadow-lg tw-relative">
		<div class="tw-container tw-max-w-4xl tw-mb-10 -tw-mt-20">
			<div class="tw-py-32 tw-bg-cover tw-bg-center tw-bg-no-repeat tw-drop-shadow-lg" style="background-image: url('<?= get_the_post_thumbnail_url(); ?>');"></div>
		</div>

		<div class="tw-container tw-max-w-3xl">
			<div class="has-wysiwyg">
				<?php the_content(); ?>
			</div>
		</div>
	</section>

	<div id="areas-map" class="js-map tw-z-10"></div>

<?php get_footer();
