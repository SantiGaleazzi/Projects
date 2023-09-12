<?php get_header(); ?>

    <section class="py-20 md:py-24 px-6">
        <div class="container w-full md:w-1/2 lg:w-1/2 xl:w-2/5 text-center mx-auto">
            <h1 class="font-serif text-5xl lg:text-6xl leading-none text-gray-700 mb-4"><?php the_field('faqs_title'); ?></h1>

            <div class="text-gray-600 mb-10 md:mb-0">
                <?php the_field('faqs_description'); ?>
            </div>
        </div>
    </section>

    <section class="py-20 md:py-24 bg-gray-150 px-6">
        <div class="container w-full md:w-4/5 lg:w-1/2 mx-auto">

            <?php if( have_rows('faqs_questions_repeater') ): ?>

                <div class="faqs-questions">

                    <?php while( have_rows('faqs_questions_repeater') ): the_row(); ?>
                        <div class="question">
                            <div class="header">
                                <div class="the-question">
                                    <?php the_sub_field('question'); ?>
                                </div>
                                <div class="action">
                                    <i class="fas fa-times text-sm leading-none"></i>
                                </div>
                            </div>

                            <div class="expandable">
                                <?php the_sub_field('answer'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>

                </div>

            <?php endif; ?>

        </div>
    </section>

<?php get_footer(); ?>