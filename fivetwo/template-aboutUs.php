<?php

	/*
	* Template name: About Us Template
	*/

	$do_you_want_to_hide_partners = get_field('do_you_want_to_hide_partners');
	
	get_header();

 ?>

	<?php get_template_part( 'partials/content', 'menu-secondary' ); ?>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php the_content(); ?>

		<?php endwhile; ?>
	<?php endif; ?>

	<?php if ( !$do_you_want_to_hide_partners ) : ?>
		<?php get_template_part( 'partials/content', 'partners' ); ?>
	<?php endif; ?>

<?php get_footer();
