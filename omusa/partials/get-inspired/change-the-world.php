<?php
    
    $change_world_side_image = get_field('get_inspired_coach_side_image');

    $call_a_coach_link = get_field('coach_settings_link', 'option');

?>

<section class="px-6 bg-red-500">
    <div class="container py-12 relative">
        <div class="flex relative z-10">
            <div class="w-full lg:w-3/5">
                <div class="text-white-pure">
                    <div class="text-4xl lg:text-5xl font-roboto font-light leading-none">
                        <?php the_field('get_inspired_change_title'); ?>
                    </div>

                    <div class="text-xl lg:text-2xl font-bold mb-8">
                        <?php the_field('get_inspired_change_sub_title'); ?>
                    </div>
                </div>

                <div class="lg:w-4/5 text-white-pure font-medium">
                    <div class="mb-5">
                        <?php the_field('get_inspired_change_description'); ?>
                    </div>

                    <div class="mb-10">
                        <span class="text-2xl font-bold"><?php the_field('get_inspired_change_descri_title'); ?></span>
                        <span><?php the_field('get_inspired_change_extra_descri'); ?></span>
                    </div>

                    <div class="px-6 py-5 bg-page rounded relative z-10">
                        <?php if ( get_field('get_inspired_coach_subtitle') ) : ?>
                            <div class="text-sm uppercase font-bold font-lato text-gray-500-new mb-1">
								<?php the_field('get_inspired_coach_subtitle'); ?>
							</div>
                        <?php endif; ?>
						
                        <div class="text-xl text-default font-roboto leading-none mb-5">
                            <?php the_field('get_inspired_coach_title'); ?>
                        </div>

                        <div class="flex flex-wrap flex-col md:flex-row item-center justify-between">
                            <div class="w-full md:w-1/2">
                                <a  class="text-center text-white-pure font-black leading-none py-3 bg-teal-500 block md:mr-4 mb-3 md:mb-0" href="<?= $call_a_coach_link['url']; ?>" target="<?= esc_attr( $call_a_coach_link['target'] ?: '_self' ); ?>">
									<?= $call_a_coach_link['title']; ?>
								</a>
                            </div>

                            <div class="w-full md:w-1/2">
                                <button type="button" class="quiz-lightbox-btn w-full text-center text-white-pure font-black leading-none py-3 bg-orange-500 block">Take the Readiness Quiz</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="lg:w-4/5 xl:w-1/2 h-full absolute bg-contain lg:bg-right-bottom xl:bg-cover bg-no-repeat bottom-0 right-0 xl:-mr-5" style="background-image: url('<?= $change_world_side_image['url']; ?>');"></div>
    </div>
</section>
