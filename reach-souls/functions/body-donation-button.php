<?php

	function add_header_donation_link_to_body() {

?>

	<div class="block lg:hidden">
		<?php
			if ( get_field('settings_header_donation_type', 'option') === 'link' ) :
				$donation_link = get_field('settings_header_donation_link', 'option');
		?>
			
			<a class="button squared" href="<?= $donation_link['url']; ?>" target="<?= esc_attr( $donation_link['target'] ?: '_self' ); ?>">
				<?= $donation_link['title']; ?>
			</a>

		<?php else : ?>

			<?php the_field('settings_header_donation_flexformz', 'option'); ?>

		<?php endif; ?>
	</div>
	
<?php

	}
	add_action('wp_body_open', 'add_header_donation_link_to_body');
