<?php get_header(); ?>

    <div class="grid-container">
        <div class="grid-x">
            <div class="cell medium-8 large-6">

                <h1 class="title_bpm"><?php the_title(); ?></h1>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>

            </div>
        </div>
    </div>

<?php get_footer(); ?>