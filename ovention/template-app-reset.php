<?php

	/*
	* Template Name: Reset
	*/

	get_header();

?>

	<?php get_template_part( 'partials/content', 'general_banner' ); ?>

	<?php get_template_part( 'partials/content', 'pizza_calculator' ); ?>

	<!-- FULL PAGE -->
	<div class="full-page cloud-pattern">
		<div class="row">
			<div class="columns small-12 white-box">
				<div class="small-10 small-centered ">
					<?php if ( have_posts() ) : ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<!-- /FULL PAGE -->

	<?php get_template_part( 'partials/content', 'culinary_bar' ); ?>

<?php get_footer();
