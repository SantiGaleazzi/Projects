<?php

    $intro_side_image = get_field('where_works_side_image');

    $call_a_coach_link = get_field('coach_settings_link', 'option');
    $call_a_coach_target = $call_a_coach_link['target'] ? $call_a_coach_link['target'] : '_self';

?>

<section class="section-quoted pt-32 sm:pt-24 md:pt-56 pb-16 md:pb-24 relative">
	<div class="container">
		<div class="flex items-center justify-between relative z-10">
            <div class="md:w-3/5 text-default lg:pl-12 xl:pl-24 ">
                <div class="headline mb-8">
                    <?php the_field('where_works_title'); ?>
                </div>

                <div class="sm:w-2/3 md:w-auto xl:w-2/3">
                    <div class="leading-7 mb-8">
                        <?php the_field('where_works_description'); ?>
                    </div>

                    <div class="text-xl font-roboto font-light mb-2">
                        <?php the_field('where_works_quiz_title') ?>
                    </div>

                    <div class="w-full flex-1 flex flex-col sm:flex-row justify-between">
                        <a href="<?= $call_a_coach_link['url']; ?>" target="<?= esc_attr( $call_a_coach_target ); ?>" class="w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-teal-500 inline-block"><?= $call_a_coach_link['title']; ?></a>

                        <button type="button" class="quiz-lightbox-btn w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-orange-500 inline-block sm:mx-2 mt-3 sm:mt-0">Take the Readiness Quiz</button>
                    </div>
                </div>
            </div>
		</div>
	</div>

    <div class="hidden sm:block sm:w-3/5 h-full bg-cover xl:bg-left-bottom bg-no-repeat absolute top-0 right-0 z-0" style="background-image: url('<?= $intro_side_image['url']; ?>');"></div>
</section>
