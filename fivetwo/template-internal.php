<?php
 /*
  * Template name: Internal Template
  */
 ?>
<?php get_header(); ?>
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>

        <!-- CONTENT SHOP -->
        <?php get_template_part( 'partials/content', 'shop' ); ?>
        <!-- /CONTENT SHOP -->
    <?php endwhile;?>
<?php endif; ?>
<?php get_footer();
