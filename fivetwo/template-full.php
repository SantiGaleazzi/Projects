<?php
 /*
  * Template name: FULL Template
  */

  get_header();
?>
<div class="full">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell large-9">
              <!-- If is the MULTIPLY Your Impact for Jesus page I need a wrapper for apply styles to form-->
              <?php if (get_the_ID() == 2303 || get_the_ID() == 2297): ?>
                <div class="assessment__multiply-form">
              <?php endif ?>
              
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile;?>
                <?php endif; ?>

              <?php if (get_the_ID() == 2303 || get_the_ID() == 2297): ?>
                </div>
              <?php endif ?>

            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>
