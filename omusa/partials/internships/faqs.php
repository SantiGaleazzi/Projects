<?php

    $faqs_background_image = get_field('internships_faqs_image');

?>

<section class="section-quoted block md:hidden">
    <div class="container">
        <div class="headline text-2xl md:text-3xl text-default font-roboto relative z-10 mx-auto">
            <?php the_field('internships_faqs_title'); ?>
        </div>
    </div>
</section>

<section class="section-quoted px-4 pb-8">
    <div class="container">
        <div class="bg-pageshadow-2xl">
            <div class="py-16 md:py-20 bg-red-500"></div>
            
            <div class="px-4 md:px-12 lg:px-24 -mt-24">
                <div class="bg-page">
                    <div class="px-6 md:px-12 py-24 md:py-32 bg-cover bg-center md:bg-right-top md:bg-contain bg-no-repeat relative" style="background-image: url('<?= $faqs_background_image['url']; ?>');">
                        <div class="headline text-xl sm:text-2xl md:text-3xl text-default font-roboto relative z-10 hidden md:block">
                            <?php the_field('internships_faqs_title'); ?>
                        </div>

                        <div class="w-full sm:w-3/4 h-full bg-gradient-to-r from-page sm:via-page to-transparent absolute top-0 left-0 hidden md:block"></div>
                    </div>
                    
                    <?php if ( have_rows('internships_faqs_questions') ) : ?>
                        <div>
                            <?php while ( have_rows('internships_faqs_questions') ) : the_row(); ?>
                                <div class="list-of-questions md:px-24 py-6 md:py-12">
                                    <div class="text-default text-2xl font-bold mb-5">
                                        <?php the_sub_field('section_title'); ?>
                                    </div>

                                    <div class="text-default mb-8">
                                        <?php the_sub_field('section_description'); ?>
                                    </div>

                                    <?php if ( have_rows('questions_lists') ) : ?>
                                        <div>
                                            <?php while ( have_rows('questions_lists') ) : the_row(); ?>
                                                <div class="individual-question border border-red-500">
                                                    <div class="question text-white-pure font-bold px-4 py-2 bg-red-500 flex items-center justify-between">
                                                        <div class="w-full flex-1 truncate">
                                                            <?php the_sub_field('question'); ?>
                                                        </div>

                                                        <div class="close-icon flex-none">
                                                            <i class="fas fa-plus"></i>
                                                        </div>
                                                    </div>

                                                    <div class="answer text-default has-wysiwyg has-red-links">
                                                        <?php the_sub_field('answer'); ?>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="py-10 bg-gray-150-new border-b-4 border-red-500 ">
            <div class="text-center text-3xl text-wysiwyg font-roboto font-light">
                <?php the_field('internships_faqs_school_title'); ?>
            </div>

            <div class="p-6 md:px-20 xl:px-56 has-wysiwyg text-default">
                <?php the_field('internships_faqs_schools'); ?>
            </div>
        </div>
    </div>
</section>
