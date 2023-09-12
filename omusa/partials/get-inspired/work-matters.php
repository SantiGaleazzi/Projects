<?php

    $background_image = get_field('work_matters_background_image');
    $call_a_coach_link = get_field('coach_settings_link', 'option');
    $get_inspired_button_green = get_field('get_inspired_button_green');

?>

<section class="pt-24 md:pt-48 xl:pt-56 bg-gray-250-new overflow-hidden">
    <div class="container">
        <div class="lg:flex justify-between items-center px-6 xl:px-0">
            <div class="w-full max-w-md">
                <h1 class="text-4xl lg:text-5xl text-red-500 font-roboto font-light leading-none mb-3 tracking-wide">
                    <?php the_field('get_inspired_title'); ?>
                </h1>
				
                <div class="has-wysiwyg has-gray-bg leading-loose tracking-wide">
                    <?php the_field('get_inspired_description'); ?>
                </div>

                <?php if ( $get_inspired_button_green) : ?>
                    <a class="text-center text-white-pure text-lg font-black leading-none px-5 py-3 bg-green-500 inline-block mt-6" href="<?= $get_inspired_button_green['url']; ?>" target="<?= esc_attr(  $get_inspired_button_green['target'] ?: '_self' ); ?>">
                        <?= $get_inspired_button_green['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="mt-6 lg:mt-0 relative max-w-4xxl">
                <div class="mb-8 lg:mb-0 relative flex flex-wrap">
                    <div class="mb-8 lg:mb-0">
                        <img src="<?php echo bloginfo('template_url'); ?>/assets/images/world-map.png" usemap="#worldmap">
                    </div>

                    <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
                        <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new north-america arrow-down-red lg:absolute z-0">
                            <div class="text-xl text-red-500 font-light font-roboto number-country">376</div>
                            <div class="text-xs text-black-700-new font-semibold font-roboto text-left leading-none pl-4">North America</div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
                        <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new latin-america-2 arrow-down-red lg:absolute">
                            <div class="text-xl text-red-500 font-light font-roboto number-country">154</div>
                            <div class="text-xs text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Latin America</div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
                        <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new ships-2 arrow-down-red lg:absolute">
                            <div class="text-xl text-red-500 font-light font-roboto number-country">372</div>
                            <div class="text-xs text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Ships</div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
                        <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new africa-2 arrow-down-red lg:absolute">
                            <div class="text-xl text-red-500 font-light font-roboto number-country">601</div>
                            <div class="text-xs text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Africa</div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
                        <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new middle-east arrow-down-red lg:absolute">
                            <div class="text-xl text-red-500 font-light font-roboto number-country">347</div>
                            <div class="text-xs text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Middle East<br class="hidden lg:block"> North Africa</div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
                        <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new central-asia-2 arrow-down-red lg:absolute">
                            <div class="text-xl text-red-500 font-light font-roboto number-country">283</div>
                            <div class="text-xs text-black-700-new font-semibold font-roboto text-left leading-none pl-4">West, Central, and South Asia</div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
                        <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new europe-2 arrow-down-red lg:absolute">
                            <div class="text-xl text-red-500 font-light font-roboto number-country">1067</div>
                            <div class="text-xs text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Europe</div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
                        <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new india-2 arrow-down-red lg:absolute">
                            <div class="text-xl text-red-500 font-light font-roboto number-country">1500</div>
                            <div class="text-xs text-black-700-new font-semibold font-roboto text-left leading-none pl-4">India Partner</div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
                        <div class="flex-grow lg:w-48 flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new east-asia-2 arrow-down-red lg:absolute">
                            <div class="text-xl text-red-500 font-light font-roboto number-country">415</div>
                            <div class="text-xs text-black-700-new font-semibold font-roboto text-left leading-none pl-4">East Asia</div>
                        </div>
                    </div>

                    <div class="w-full sm:w-1/3 lg:w-48 px-3 py-2 lg:px-0">
                        <div class="flex justify-start items-center px-3 py-1 bg-white-200-new rounded shadow-lg border-b-4 border-red-200-new pacific arrow-down-red lg:absolute">
                            <div class="text-xl text-red-500 font-light font-roboto number-country">82</div>
                            <div class="text-xs text-black-700-new font-semibold font-roboto text-left leading-none pl-4">Pacific</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="relative pt-24 pb-40 sm:pb-56">
        <div class="container text-center relative z-10 px-6 xl:px-0">
            <div class="mb-8">
                <div class="text-4xl lg:text-5xl text-red-500 font-roboto font-light leading-none mb-3">
                    <?php the_field('work_matters_title'); ?>
                </div>

                <div class="text-xl font-bold leading-none mt-6">
                    <?php the_field('work_matters_sub_title'); ?>
                </div>
            </div>
            <div class="md:w-4/6 has-wysiwyg has-gray-bg mx-auto leading-loose tracking-wide">
                <?php the_field('work_matters_description'); ?>
            </div>
            <div class="md:w-4/6 work-matters-more-description mx-auto">
                <div class="has-wysiwyg has-gray-bg">
                    <?php the_field('work_matters_more_description'); ?>
                </div>

                <div>
                    <a href="<?= $call_a_coach_link['url']; ?>" target="<?= esc_attr( $call_a_coach_link['target'] ?: '_self' ); ?>" class="text-center text-white-pure text-xl font-black leading-none px-8 py-3 bg-teal-500 inline-block"><?= $call_a_coach_link['title']; ?></a>
                </div>
            </div>
        </div>
        <div class="truck-background w-full h-full absolute bottom-0 left-0 right-0 bg-contain xl:bg-cover bg-left-bottom bg-no-repeat" style="background-image: url('<?= $background_image['url']; ?>');"></div>
    </div>
</section>
