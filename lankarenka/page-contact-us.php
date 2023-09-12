<?php get_header(); ?>

    <section class="contact-us px-6 py-12 md:py-20">
        <div class="container">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/3 text-center md:text-left md:pr-6 mb-6">
                    <h1 class="text-3xl font-medium md:mb-1"><?php the_title(); ?></h1>
                    <p><?php the_field('contact_us_title'); ?></p>
                </div>
                <div class="w-full md:w-2/3">
                    <?php the_field('contact_us_form'); ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <?php get_template_part('partials/partial-get-in-touch'); ?>
    <!-- Newsletter Section -->

<?php get_footer(); ?>