<?php

	get_header();

	$header_donation_button = get_field('header_donation_button', 'options');
	$header_donation_button_target = $header_donation_button['target'] ? $header_donation_button['target'] : '_self';

?>

<main>

	<div class="w-full sm:hidden text-center px-4 pt-20 md:pt-0">
		<a href="<?= esc_url( $header_donation_button['url'] ); ?>" target="<?= esc_url($header_donation_button_target); ?>" rel="nofollow" class="text-xl xl:text-2xl leading-none text-center text-white-200-new font-roboto font-semibold px-8 py-3 bg-red-500 block">
			<?= $header_donation_button['title']; ?>												
		</a>
	</div>

	<?php get_template_part('partials/home/intro'); ?>

	<?php get_template_part('partials/home/ways-to-help'); ?>

	<?php get_template_part('partials/home/explore'); ?>

</main>

<?php get_footer();
