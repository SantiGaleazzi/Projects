<?php

    /**
     * Template Name: General Styles
     * 
     */    

    get_header();
    
?>

    <section class="py-12 md:py-20">
        <div class="container w-full md:w-3/5 lg:w-2/5 px-6 text-center">
            <h1 class="font-serif leading-none text-4xl md:text-5xl mb-3"><?php the_field('general_styles_title'); ?></h1>
            <p class="text-gray-500"><?php the_field('general_styles_description'); ?></p>
        </div>
    </section>

    <section class="general-styles py-12 md:py-20 bg-gray-150">
        <div class="container w-full md:w-3/5 px-6">
            <?php if (have_posts()) :while (have_posts()) : the_post(); ?>

                <?php the_content(); ?>

            <?php endwhile; endif; ?>
        </div>
    </section>

<?php get_footer(); ?>