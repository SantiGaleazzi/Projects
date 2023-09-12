<?php
 /*
  * Template name: Incubator Template
  */
 ?>
<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>

		<!-- START NEW FAQ -->
		<div class="startNew__faq">
			<div class="grid-container">
				<h6 class="big subtitle text-center">General Questions and Answers</h6>
				<h2 class="title text-center">FAQ</h2>
				<div class="grid-x">
					<?php
					if( have_rows('column') ):
					    while ( have_rows('column') ) : the_row();
					?>
						<div class="cell large-6">
							<?php the_sub_field('half_column'); ?>
						</div>
					<?php
					    endwhile;
					endif;
					?>
				</div>
			</div>
		</div>
		<!-- /START NEW FAQ -->
    <?php endwhile;?>
<?php endif; ?>
<?php get_footer();
