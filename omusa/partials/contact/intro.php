<?php

    $intro_side_image = get_field('contact_intro_side_image');

?>

<section class="section-quoted pt-24 md:pt-48">
	<div class="container">
		<div class="flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 lg:w-2/5 lg:pl-24 mb-8 md:mb-0">
                <div class="headline text-default mx-auto md:mx-0">
                    <?php the_field('contact_intro_title'); ?>
                </div>

                <div class="text-default leading-7 mt-10 lg:mt-14">
                    <?php the_field('contact_intro_description'); ?>
                </div>
            </div>

			<div class="md:w-1/2 flex justify-center relative">
				<img src="<?= esc_url( $intro_side_image['url'] ); ?>" alt="<?= esc_attr( $intro_side_image['alt'] ); ?>">
				<div class="text-center text-white-pure py-1 px-4 bg-black-700-new rounded absolute bottom-0 right-0 mb-5">
					<?php the_field('contact_intro_image_text'); ?>
			    </div>
			</div>
		</div>
	</div>
</section>