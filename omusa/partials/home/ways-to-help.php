<?php

    $left_background = get_field('home_left_background');
    $right_background = get_field('home_right_background');

    $right_form_button = get_field('home_right_form_button');
    $right_form_button_target =  isset($right_form_button['target']) ? $right_form_button['target'] : '_self';

    $call_a_coach_link = get_field('coach_settings_link', 'option');
    $call_a_coach_target = isset($call_a_coach_link['target']) ? $call_a_coach_link['target'] : '_self';

    $form_data = array();

    if ( have_rows('home_default_form_data') ) {
        
        while( have_rows('home_default_form_data') ) { the_row();

            $form_data[get_sub_field('key')] = get_sub_field('value');

        }

    }

?>

<section class="relative">
    <div class="w-full h-full hidden md:flex absolute">
        <div class="w-1/2 md:block p-1 bg-cover bg-center md:bg-right-bottom bg-no-repeat relative overflow-hidden" style="background-image:url('<?= $left_background['url']; ?>');">
            <div class="w-full h-full absolute inset-0 bg-gradient-ways-to-help from-transparent to-black-700-new"></div>
        </div>

        <div class="w-1/2 md:block p-1 bg-cover bg-center bg-no-repeat relative overflow-hidden" style="background-image:url('<?= $right_background['url']; ?>');">
            <div class="w-full h-full absolute inset-0 bg-gradient-to-tl from-transparent via-transparent to-red-500"></div>
        </div>
    </div>

    <div class="container relative z-10">
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 flex flex-col justify-between px-4 md:px-12 xl:pl-14 xl:pr-14 pt-16 md:pt-40 xl:pt-48 pb-64 md:pb-56 remove-bg-image bg-cover bg-bottom sm:bg-right-top bg-no-repeat relative lg:mb-24" style="background-image: url('<?= $left_background['url']; ?>');">
                <div class="block md:hidden w-full h-full absolute inset-0 bg-gradient-to-t from-transparent to-black-700-new"></div>

                <div class="relative z-10 -mt-40 md:-mt-64">
                    <div class="p-6 bg-page rounded relative z-10  mb-6 md:mb-8 shadow-big">
                        <div class="text-xl text-default text-center font-roboto mb-4">
                            <?php the_field('home_left_box_title'); ?>
                        </div>

                        <div class="flex flex-col lg:flex-row items-center justify-between">
                            <a href="<?= $call_a_coach_link ? $call_a_coach_link['url'] : '#'; ?>" target="<?= esc_attr( $call_a_coach_target ); ?>" class="w-full lg:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-teal-500 inline-block lg:mr-2 mb-3 lg:mb-0"><?= $call_a_coach_link['title']; ?></a>
                            
                            <button type="button" class="quiz-lightbox-btn w-full lg:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-orange-500 inline-block lg:mr-2 mb-3 lg:mb-0">Take the Readiness Quiz</button>
                        </div>
                    </div>

                    <div class="text-white-pure font-roboto font-light leading-none text-4xl lg:text-5xl mb-4 md:mb-6">
                        <?php the_field('home_left_title'); ?>
                    </div>

                    <div class="text-white-pure xl:pr-10">
                        <?php the_field('home_left_description'); ?>
                    </div>
                </div>
            </div>

            <div class="md:w-1/2 flex flex-col justify-between px-4 md:px-12 xl:pl-14 xl:pr-0 pt-16 md:pt-40 xl:pt-48 pb-64 md:pb-56 remove-bg-image bg-cover bg-bottom sm:bg-right-top bg-no-repeat relative mt-32 md:mt-0" style="background-image:url('<?= $right_background['url']; ?>');">
                <div class="block md:hidden w-full h-full absolute inset-0 bg-gradient-to-b md:bg-gradient-to-tl from-red-500 md:from-transparent to-transparent md:to-red-500"></div>

                <div class="relative z-10 -mt-40 md:-mt-64">
                    <div class="p-6 bg-page rounded relative z-10 mb-6 md:mb-8 shadow-big">
                        <div class="text-xl text-default text-center font-roboto mb-4">
                            <?php the_field('home_right_box_title'); ?>
                        </div>

                        <div class="flex item-center flex-col lg:flex-row home-help-form">
                            <div class="w-full lg:w-1/2 relative mb-3 lg:mb-0 lg:mr-2">
                                <input type="number" name="donation" id="donation-amount" value="<?php the_field('home_default_form_amount'); ?>" <?php if ( get_field('home_default_form_data') ) : ?>data-params='<?= json_encode($form_data); ?>'<?php endif; ?> placeholder="0" class="w-full text-default pl-8 pr-4 py-2 bg-gray-150-new block">
                                <i class="fas fa-dollar-sign absolute top-0 left-0 mt-3 ml-3"></i>
                            </div>

                            <div class="w-full lg:w-1/2">
                                <a href="<?= esc_url( $right_form_button['url'] ); ?>" target="<?= esc_attr( $right_form_button_target ); ?>" class="help-button leading-none text-center text-white-pure font-black py-3 bg-red-500 block"><?= $right_form_button['title']; ?></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-white-pure font-roboto font-light leading-none text-4xl lg:text-5xl mb-4 md:mb-6 pr-6 sm:pr-0">
                        <?php the_field('home_right_title'); ?>
                    </div>

                    <div class="text-white-pure w-3/5 md:w-11/12 xl:pr-24">
                        <?php the_field('home_right_description'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
