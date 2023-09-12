<?php

	/*
	*Template Name: Full Width
	*/

	get_header();

?>

	<div class="full-width-page gray-bgrd">
		<div class="row">
			<div class="columns small-12">
				<div class="small-centered ">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<?php the_content(); ?>
					<?php endwhile;  endif; ?>
				</div>

			</div>
		</div>
	</div>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer(); ?>
