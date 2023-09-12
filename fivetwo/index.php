<?php
  get_header();
?>
<div class="full">
    <div class="grid-cotainer">
        <div class="grid-x grid margin-x">
            <div class="cell auto">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile;?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>
