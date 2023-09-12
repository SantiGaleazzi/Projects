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
            <div class="text-center text-xl md:text-2xl font-roboto font-light leading-none mb-5">
                <span class="font-bold">Ask</span> a Question about <span class="font-bold">Working with OM</a>
            </div>

            <div class="long-us-citizen flex items-center px-4 sm:px-8 py-6 bg-gray-150-new rounded mb-2 cursor-pointer">
                <div class="flex-none mr-4 md:mr-8">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/form-location-us.png" alt="Serve in the US Icon" class="w-8 md:w-auto">
                </div>

                <div class="md:text-2xl font-roboto font-light leading-none">
                    Serve in the US
                </div>
            </div>

            <div class="long-international flex items-center px-4 sm:px-8 py-6 bg-gray-150-new rounded mb-2 cursor-pointer">
                <div class="flex-none mr-4 md:mr-8">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/international-icon.png" alt="Serve outside the US Icon" class="w-8 md:w-auto">
                </div>

                <div class="md:text-2xl font-roboto font-light leading-none">
                    Serve outside the US
                </div>
            </div>

            <div>
                <a href="<?= $no_citizen_link['url']; ?>" target="<?= esc_attr( $no_citizen_link_target ); ?>" class="flex items-center px-4 sm:px-8 py-6 bg-gray-150-new rounded cursor-pointer">
                    <div class="flex-none mr-4 md:mr-8">
                        <img src="<?php bloginfo('template_url'); ?>/assets/images/without-us-citizenship.png" alt="Without US Citizenship Icon" class="w-8 md:w-auto">
                    </div>

                    <div class="md:text-2xl font-roboto font-light md:leading-8">
                        <?= $no_citizen_link['title']; ?>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div class="long-us-citizen-form w-full max-w-2xl h-full md:h-auto p-4 md:px-10 md:py-8 bg-white-pure border-t-8 border-b-8 border-red-500 rounded relative z-50 hidden">
        <div class="close-ligtbox w-8 h-8 flex items-center justify-center bg-black-700-new rounded-full absolute top-0 right-0 -mt-4 -mr-4 cursor-pointer z-10">
            <i class="fas fa-times text-white-pure"></i>
        </div>

        <div class="h-full overflow-y-auto md:overflow-auto">
            <div class="back-to-questionare text-xs text-red-500 mb-2">
                < BACK
            </div>

            <div class="flex items-center justify-center p-8 bg-gray-150-new rounded">
                <div class="mr-8">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/ask-a-question-icon.png" alt="Ask a Question Icon">
                </div>

                <div class="text-2xl font-roboto font-light leading-none">
                    Ask Us a Question
                </div>
            </div>

            <?php the_field('long_term_settings_us_citizen', 'options'); ?>
        </div>
    </div>

    <div class="long-international-form w-full max-w-2xl h-full md:h-auto p-4 md:px-10 md:py-8 bg-white-pure border-t-8 border-b-8 border-red-500 rounded relative z-50 hidden">
        <div class="close-ligtbox w-8 h-8 flex items-center justify-center bg-black-700-new rounded-full absolute top-0 right-0 -mt-4 -mr-4 cursor-pointer z-10">
            <i class="fas fa-times text-white-pure"></i>
        </div>

        <div class="h-full overflow-y-auto md:overflow-auto">
            <div class="back-to-questionare text-red-500 mb-3">
                < BACK
            </div>

            <div class="flex items-center justify-center p-8 bg-gray-150-new rounded">
                <div class="mr-8">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/ask-a-question-icon.png" alt="Ask a Question Icon">
                </div>

                <div class="text-2xl font-roboto font-light leading-none">
                    Ask Us a Question
                </div>
            </div>

            <?php the_field('long_term_settings_international', 'options'); ?>
        </div>
    </div>
    
</section>
<!-- Lightbox -->