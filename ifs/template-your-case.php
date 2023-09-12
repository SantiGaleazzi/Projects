<?php
    /*
    * Template name: Tell us about your case
    */

	$related = get_field('related');
    $side_image = get_field('side_image');

    get_sidebar('banner');
    
    get_header();

?>

	<div class="your-case-form">
		<div class="row" data-equalizer>
			<div class="large-9 columns" data-equalizer-watch>
				<?php gravity_form( 4, false, false, false, '', true );?>
			</div>
			
			<div class="large-3 columns show-for-large" data-equalizer-watch>
				<?php if ( $side_image ) : ?>
					<img src="<?= $side_image['url']; ?>" alt="<?= $side_image['alt']; ?>">
				<?php endif; ?>
			</div>
		</div>
	</div>

	<!-- DONATION FORM-->
	<?php get_sidebar('donation'); ?>
	<!-- /DONATION FORM-->

<?php get_footer();
