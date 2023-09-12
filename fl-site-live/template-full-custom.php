<?php

	/** 
	*Template Name: Full Custom Template
	*/
	
	get_header();

?>

	<section class="custom-blocks">
		<div class="container">
			<?php while( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>

		<div>
			<?php
				if ( have_rows('custom_blocks') ) :
			
					while ( have_rows('custom_blocks') ) : the_row();

						if ( get_row_layout() == 'custom_blocks_one_column' ) :

							get_template_part('partials/custom-blocks/full-content-one-column');

						elseif ( get_row_layout() == 'custom_blocks_two_columns' ) :

							get_template_part('partials/custom-blocks/full-content-two-columns');

						elseif ( get_row_layout() == 'custom_blocks_two_columns_with_numeration' ) :

							get_template_part('partials/custom-blocks/full-content-two-column-with-numeration');

						elseif ( get_row_layout() == 'custom_blocks_three_columns' ) :

							get_template_part('partials/custom-blocks/full-content-three-columns');

						elseif ( get_row_layout() == 'simple_content' ) :

							get_template_part('partials/custom-blocks/full-content-simple-content');		           
								
						elseif ( get_row_layout() == 'custom_blocks_quotes' ) :

							get_template_part('partials/custom-blocks/full-content-quotes');

						elseif ( get_row_layout() == 'custom_blocks_cards_quotes' ) :

							get_template_part('partials/custom-blocks/full-content-cards-quotes');

						elseif ( get_row_layout() == 'custom_blocks_external_posts' ) :

							get_template_part('partials/custom-blocks/full-content-external-posts');

						elseif ( get_row_layout() == 'custom_blocks_video' ) :

							get_template_part('partials/custom-blocks/full-content-video');

						elseif ( get_row_layout() == 'custom_blocks_images_width_link' ) :

							get_template_part('partials/custom-blocks/full-content-images-with-link');

						elseif ( get_row_layout() == 'custom_blocks_separator' ) :

							get_template_part('partials/custom-blocks/full-content-separator');

						endif;
					endwhile;
				endif;
			?>
		</div>
</section>

<?php get_footer();
