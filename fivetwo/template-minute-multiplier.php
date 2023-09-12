<?php
 /*
  * Template name: Minute Multiplier
  */
get_header(); ?>
    <div class="grid-cotainer minute-multiplier">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php the_content(); ?>
            <?php endwhile;?>
        <?php endif; ?>
    </div>
<?php get_footer();?>
