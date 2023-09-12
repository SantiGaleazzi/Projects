<?php

    $for_churches_intro_side_image = get_field('for_churches_intro_side_image');

    $for_churches_intro_left_button = get_field('for_churches_intro_left_button');
    $for_churches_left_button_target = $for_churches_intro_left_button['target'] ? $for_churches_intro_left_button['target'] : '_self';

    $for_churches_intro_right_button = get_field('for_churches_intro_right_button');
    $for_churches_right_button_target = $for_churches_intro_right_button['target'] ? $for_churches_intro_right_button['target'] : '_self';

?>

<section class="section-quoted pt-32 sm:pt-24 md:pt-56 lg:pt-64 pb-8 relative">
	<div class="container">
		<div class="flex items-center justify-between relative z-10">
            <div class="md:w-3/5 xl:w-1/2 text-default lg:pl-12 xl:pl-24 ">
                <div class="headline small mb-8">
                    <?php the_field('for_churches_intro_title'); ?>
                </div>

                <div>
                    <div class="leading-7 mb-4">
                        <?php the_field('for_churches_intro_description'); ?>
                    </div>

                    <div class="w-full flex-1 flex flex-col sm:flex-row justify-between">
                        <a href="<?= $for_churches_intro_left_button['url']; ?>" data-form-option="0" target="<?= esc_attr( $for_churches_left_button_target ); ?>" class="w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-teal-500 inline-block for-churches-btn"><?= $for_churches_intro_left_button['title']; ?></a>

                        <a href="<?= $for_churches_intro_right_button['url']; ?>" data-form-option="1" target="<?= esc_attr( $for_churches_right_button_target ); ?>" class="w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-orange-500 inline-block sm:mx-2 mt-3 sm:mt-0 for-churches-btn"><?= $for_churches_intro_right_button['title']; ?></a>
                    </div>
                </div>
            </div>
		</div>
	</div>

    <div class="hidden sm:block sm:w-1/2 lg:w-3/5 pt-40 pb-32 bg-cover xl:bg-left-top bg-no-repeat absolute bottom-0 right-0 z-0" style="background-image: url('<?= $for_churches_intro_side_image['url']; ?>');"></div>
</section>