
<?php

    $side_image = get_field('get_involded_intro_image');

    $call_a_coach_link = get_field('coach_settings_link', 'option');
    $call_a_coach_target = $call_a_coach_link['target'] ? $call_a_coach_link['target'] : '_self';

?>

<section class="section-quoted pt-24 pb-12 md:pb-0 md:pt-48 xl:pt-56 bg-gradient-fade">
	<div class="container relative md:pb-12 lg:pb-14">
		<div class="headline text-default mx-auto">
			<?php the_field('get_involded_intro_quote'); ?>
		</div>

        <div class="flex lg:items-center flex-col md:flex-row">
            <div class="w-full md:w-2/5 lg:w-1/2 md:mt-8 lg:mt-0 mb-8 md:mb-0">
                <div class="text-2xl lg:text-3xl text-default font-roboto leading-none font-bold mb-3">
                    <?php the_field('get_involded_intro_title'); ?>
                </div>

                <div class="text-default lg:text-xl">
                    <?php the_field('get_involded_intro_description'); ?>
                </div>
            </div>

            <div class="w-full md:w-3/5 lg:w-1/2">
                <div>
                    <img src="<?= $side_image['url'];?>" alt="<?= $side_image['alt'];?>" />
                </div>
            </div>
        </div>

        <div class="w-full md:absolute bottom-0 left-0 right-0 md:-mb-12 lg:-mb-14 z-30">
            <div class="md:w-3/4 flex flex-col lg:flex-row items-center p-4 lg:px-8 lg:py-6 bg-page rounded md:mx-auto -mt-8 sm:-mt-0 md:-mb-10 relative z-10">
                <div class="lg:w-2/5 xl:w-auto text-default text-xl leading-none font-roboto sm:mb-4 lg:mb-0 lg:pr-10">
                    <?php the_field('get_involved_buttons_title'); ?>
                </div>
                
                <div class="w-full flex-1 flex flex-col sm:flex-row justify-between">
                    <a href="<?= $call_a_coach_link ? $call_a_coach_link['url'] : '#'; ?>" target="<?= esc_attr( $call_a_coach_target ); ?>" class="w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-teal-500 inline-block sm:mx-2 mt-3 sm:mt-0"><?= $call_a_coach_link['title']; ?></a>
                        
                    <button type="button" class="quiz-lightbox-btn w-full xl:w-1/2 leading-none text-center text-white-pure font-black py-3 bg-orange-500 inline-block sm:mx-2 mt-3 sm:mt-0">Take the Readiness Quiz</button>
                </div>
            </div>

            <?php if ( have_rows('get_involved_steps_repeater') ) : $counter = 0; ?>
                <div class="w-full flex flex-col md:flex-row md:items-center justify-around md:justify-between pt-4 md:pt-14 px-6 pb-5 lg:px-12 xl:px-16 bg-red-500 rounded mt-4 md:mt-0">
                    <?php while ( have_rows('get_involved_steps_repeater') ) : the_row(); $counter++; ?>
                        <div class="flex items-end mt-2 sm:mt-0">
                            <div class="text-2xl lg:text-4xl leading-none font-bold text-orange-500">
                                <?= $counter; ?>.
                            </div>

                            <div class="lg:text-xl leading-snug font-bold text-white-pure pl-1">
                                <?php the_sub_field('description'); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
	</div>
</section>