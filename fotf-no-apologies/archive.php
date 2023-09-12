<?php get_header(); ?>

    <section class="px-5">
        <div class="container">
            <h1 class="text-2xl">Archive Page</h1>

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

<?php get_footer();
