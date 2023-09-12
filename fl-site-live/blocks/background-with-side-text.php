<section class="block-image text-center text-white px-4 py-4 md:py-20 bg-cover bg-center relative lg:bg-top bg-no-repeat" style="background-image: url(<?php the_field('block_background_with_text_background'); ?>);">
    <img src="<?php the_field('block_background_with_text_background'); ?>" alt="" class="block md:hidden mb-4">
	<div class="container z-20 relative">
		<div class="flex <?php if ( get_field('block_background_with_text_alignment') == 'right' ) { echo 'justify-end'; } ?> <?php if ( get_field('block_background_with_text_alignment') == 'center' ) { echo 'justify-center'; } ?>">
			<div class="w-full md:w-1/2 xl:w-2/5">
				<?php
					if ( get_field('block_background_with_text_logo') ) :
								
						$logo_image = get_field('block_background_with_text_logo');
				?>
					<div class="mb-8">
						<img src="<?= $logo_image['url']; ?>" alt="<?= $logo_image['alt']; ?>" class="mx-auto">
					</div>
				<?php endif; ?>

				<div>
					<div class="text-4xl lg:text-5xl font-bold leading-none uppercase mb-4">
						<?php the_field('block_background_with_text_title'); ?>
					</div>

					<div class="text-xl lg:text-2xl">
						<?php the_field('block_background_with_text_description'); ?>
					</div>

					<?php
						if ( get_field('block_background_with_text_button') ) :

							$button = get_field('block_background_with_text_button');
							$button_target = $button['target'] ? $button['target'] : '_self';
					?>
						<div class="mt-4">
							<a href="<?= esc_url( $button['url'] ); ?>" target="<?= esc_attr( $button_target ); ?>" class="text-center text-lg font-bold leading-none px-12 py-3 bg-red-500 inline-block rounded"><?= $button['title']; ?></a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</section>
