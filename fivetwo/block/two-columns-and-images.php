<?php
	$heading = get_field('heading');
	$subtitle = get_field('subtitle');
	$copy = get_field('copy');
	$left_image = get_field('left_image');
	$center_image = get_field('center_image');
	$right_image = get_field('right_image');
?>
<section class="pad-t-70">
	<div class="blue-rounded-section">
		<div class="new-main-container">
			<div class="two-columns-container">
				<div class="left-heading-col">
					<?php if ( $heading ) : ?>
						<h2>
							<?= $heading; ?>
						</h2>
					<?php endif; ?>

					<?php if ( $subtitle) : ?>
						<h4>
							<?= $subtitle; ?>
						</h4>
					<?php endif; ?>
				</div>

				<div class="copy-right-col">
					<?php if ( $copy ) : ?>
						<?= $copy; ?>
					<?php endif; ?>

					<?php if ( have_rows('banner_button_layout') ) : ?>
						<?php while ( have_rows('banner_button_layout') ) : the_row(); ?>
							<?php
								if ( get_row_layout() !== 'link' ) :
									$type = get_row_layout() === 'Gravity Forms' ? 'gravity-form' : 'virtuous-form';
									$block_id = str_replace('block_', '', $block['id']);
							?>

								<button class="<?= $type === 'gravity-form' ? 'pink-button' : 'sign-up-blue-button'; ?> js-form-trigger" data-block-id="<?= $block_id; ?>" data-form-type="<?= $type; ?>" data-form-id="<?= get_sub_field('form_id'); ?>" type="button">
									<?php the_sub_field('button_text'); ?>
								</button>

							<?php
								else :
								$link = get_sub_field('button_link');
							?>
								<a class="pink-button" href="<?= $link['url']; ?>" target="<?= esc_attr( $link['target'] ?: '_self' ); ?>">
									<?= $link['title']; ?>
								</a>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>	
				</div>
			</div>

			<div class="centered-image-bg <?= get_field('center_image_background_size') === 'contain' ? 'bg-contain' : 'cover'; ?>" style="background-image: url(<?= $center_image['url']; ?>);">
				<div class="centered-image-before" style="background-image: url(<?= $left_image['url']; ?>);"></div>
				<div class="centered-image-after" style="background-image: url(<?= $right_image['url']; ?>);"></div>
			</div>
		</div>
	</div>
</section>
