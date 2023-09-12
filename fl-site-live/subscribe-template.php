<?php

	/** 
	* Template Name: Subscribe Template 
	*/ 

	$banner_image = get_field('banner_image');

	get_header();

?>

	<div>
		<div class="subscribe-banner text-center py-24 px-6" style="background-image: url(<?php echo $banner_image['url']; ?>);"></div>
		<div class="container mx-auto pb-12 lg:pb-16 full-width-container text-white">
			<div class="max-w-4xl mx-auto form-styles pt-12 px-6 lg:px-2">
				<?php the_content(); ?>
			</div>
		</div>
	</div>

<?php get_footer();
