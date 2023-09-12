<?php

    get_header();

    $survey_intro_side_image = get_field('survey_intro_side_image');
    $survey_tools_logo = get_field('survey_tools_logo');

    $survey_tools_button = get_field('survey_tools_button');
    $survey_tools_button_target = $survey_tools_button['target'] ? $survey_tools_button['target'] : '_self';
    $survey_tools_side_image = get_field('survey_tools_side_image');
    
?>

    <section class="section-quoted pt-24 md:pt-64 pb-16 md:pb-24 relative">
        <div class="container relative z-10">
            <div class="sm:w-3/5 text-default xl:pr-12">
                <div class="headline text-left mb-8">
                    <?php the_field('survey_intro_title'); ?>
                </div>

                <div>
                    <div class="has-wysiwyg">
                        <?php the_field('survey_intro_description'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden sm:block sm:w-3/5 lg:w-1/2 h-full bg-cover xl:bg-left-top bg-no-repeat absolute bottom-0 right-0 z-0" style="background-image: url('<?= $survey_intro_side_image['url']; ?>');"></div>
    </section>

    <section class="text-default px-6 bg-gray-150-new">
        <div class="container">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/4 text-center pt-12 lg:pt-16 md:pr-10">
                    <img src="<?= $survey_tools_logo['url']; ?>" alt="<?= $survey_tools_logo['alt']; ?>" class="inline-block">
                </div>

                <div class="flex-1 flex flex-col lg:flex-row pt-12 lg:pt-16 md:pl-16 pb-10 md:border-l-20 border-white-pure">
                    <div class="flex-1 lg:w-3/5 lg:pr-16 xl:pr-32 mb-8">
                        <div class="has-wysiwyg mb-6">
                            <?php the_field('survey_tools_description'); ?>
                        </div>

                        <div>
                            <a href="<?= $survey_tools_button['url'] ?>" target="<?= esc_attr( $survey_tools_button_target ); ?>" class="text-white-pure text-lg font-black leading-none px-8 py-3 bg-orange-500 inline-block"><?= $survey_tools_button['title'] ?></a>
                        </div>
                    </div>

                    <div>
                        <img src="<?= $survey_tools_side_image['url']; ?>" alt="<?= $survey_tools_side_image['alt']; ?>">
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();
