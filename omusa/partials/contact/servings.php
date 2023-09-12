<section class="px-4 mb-14">
    <div class="container py-8 px-6 md:py-10 lg:pt-16 lg:pb-14 md:px-10 lg:px-20 xl:pl-32 xl:pr-12 bg-gray-150-new rounded">
		<div class="flex flex-col md:flex-row justify-between">
		    <div class="md:w-1/3 text-center md:text-left font-roboto text-black-400-new text-2xl leading-8 mb-6 md:mb-0">
				<?php the_field('contact_servings_title'); ?>
			</div>

			<div class="text-center md:text-left md:pr-4 mb-6 md:mb-0">
                <?php if ( have_rows('serving_links') ) : ?>
                    <?php
                        while ( have_rows('serving_links') ) : the_row();
                        $link = get_sub_field('link');
                        $link_target = $link['target'] ? $link['target'] : '_self';
                        $call_a_coach_link = get_field('coach_settings_link', 'option');
                    ?> 
                        <?php if ( strpos($link['title'], 'Quiz') !== false ) : ?>
                            <div>
                                <a href="<?= esc_url( $link['url'] ); ?>" target="<?= esc_attr( $link_target ); ?>" class="quiz-lightbox-btn text-wysiwyg font-black underline"><?= $link['title']; ?></a>
                            </div>
                        <?php elseif ( strpos($link['title'], 'Coach') !== false ) : ?>
                            <div>
                                <a href="<?= esc_url( $call_a_coach_link['url'] ); ?>" target="<?= esc_attr( $link_target ); ?>" class="text-wysiwyg font-black underline"><?= $link['title']; ?></a>
                            </div>
                        <?php else : ?>
                            <div>
                                <a href="<?= esc_url( $link['url'] ); ?>" target="<?= esc_attr( $link_target ); ?>" class="text-wysiwyg font-black underline"><?= $link['title']; ?></a>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
				<?php endif; ?>
			</div>

			<div class="map-img mx-auto"></div>
		</div>
	</div>
</section>