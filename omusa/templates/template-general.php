<?php

    /**
     * Template Name: General Styles
    */

    get_header();
?>

    <section class="default-template">
        <div class="template-header px-6 bg-red-500">
            <div class="container">
                <h1 class="text-white-pure"><?php the_title(); ?></h1>
            </div>
        </div>

        <div class="px-6 py-16">
            <div class="container">

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>

            </div>
        </div>
    </section>

<?php get_footer();
