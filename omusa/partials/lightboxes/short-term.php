<?php

    $no_citizen_link = get_field('long_term_settings_without_us_citizenship', 'option');
    $no_citizen_link_target = $no_citizen_link['target'] ? $no_citizen_link['target'] : '_self';

?>

<!-- Lightbox -->
<section class="ask-a-question-lightbox w-full h-full px-6 py-6 inset-0 fixed flex items-center justify-center z-50">

    <div class="close-ligtbox w-full h-full bg-lightbox absolute z-50"></div>

    <div class="question-working-om w-full max-w-2xl p-4 md:px-12 md:py-8 bg-white-pure border-t-8 border-b-8 border-red-500 rounded relative z-50">
        <div class="close-ligtbox w-8 h-8 flex items-center justify-center bg-black-700-new rounded-full absolute top-0 right-0 -mt-4 -mr-4 cursor-pointer z-10">
            <i class="fas fa-times text-white-pure"></i>
        </div>

        <div>
            <div class="flex items-center justify-center p-8 bg-gray-150-new rounded">
                <div class="mr-8">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/ask-a-question-icon.png" alt="Ask a Question Icon">
                </div>

                <div class="text-2xl font-roboto font-light leading-none">
                    Ask Us a Question
                </div>
            </div>

            <?php the_field('short_term_settings_question_form', 'options'); ?>

            
        </div>
    </div>

</section>
<!-- Lightbox -->