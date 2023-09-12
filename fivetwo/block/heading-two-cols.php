<?php
	$heading = get_field('heading');
	$image = get_field('image');
	$copy = get_field('copy');
?>
<section class="dark-blue-bg">
	<div class="offset-heading">
		<div class="white-rounded-heading">
			<?php if ( $heading ) : ?>
				<div>
					<?= $heading; ?>
				</div>
			<?php endif; ?>	
		</div>
	</div>

	<div class="new-main-container">
		<div class="two-cols-section">
			<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" />
		
			<div class="copy-two-cols-container">
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
	</div>
</section>
