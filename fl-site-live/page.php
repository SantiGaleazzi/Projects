<?php get_header(); ?>

	<section class="px-5 py-12">
		<div class="container has-wysiwyg">		
			<?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
				    <?php the_content(); ?>
			    <?php endwhile; ?>
            <?php endif; ?>
		</div>
	</section>

<?php get_footer();
