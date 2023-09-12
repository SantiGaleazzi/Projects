<?php
    
    /**
     *  Template Name: Virtuous Embed Template (OMUSA)
    */

    get_header('no-menu');
    
?>

    <?php if ( has_block('acf/tite-with-button') || has_block('acf/tite-with-copy') ) : ?>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; endif; ?>

    <?php else : ?>

        <section class="section-quoted text-default px-6 py-16">
            <div class="container">
                <?php if ( get_field('internships_template_title') ) : ?>
                    <div class="headline mx-auto">
                        <?php the_field('internships_template_title'); ?>
                    </div>
                <?php endif; ?>
                
                <?php if ( get_field('internships_template_title') ) : ?>
                    <div class="sm:text-xl text-center mb-6">
                        <?php the_field('internships_template_description'); ?>
                    </div>
                <?php endif; ?>

                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile; endif; ?>
            </div>
        </section>

    <?php endif; ?>

<?php get_footer();
