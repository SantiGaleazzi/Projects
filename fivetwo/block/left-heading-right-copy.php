<?php
	$heading = get_field('heading');
	$copy = get_field('copy');
	$button = get_field('button');
?>
<section class="pad-b-50">
	<div class="darker-blue-bg">
		<div class="new-main-container left-heading-right-copy-container">
			<?php if ( $heading ) : ?>
				<h2>
					<?= $heading; ?>
				</h2>
			<?php endif; ?>	

			<?php if ( $copy ) : ?>
				<div class="text-right-cont">
					<p>
						<?= $copy; ?>
					</p>

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
			<?php endif ?>	
		</div>
	</div>
</section>
