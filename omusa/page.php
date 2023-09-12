<?php get_header(); ?>

<section>
	<div class="container text-center pt-64">		
		<div>
			<?php if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer();
