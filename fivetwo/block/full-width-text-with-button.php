<?php
	$heading = get_field('heading');
	$copy = get_field('copy');
?>
<section class="full-text-section">
	<div class="blue-bottom-rounded-section">
		<div class="new-main-container">
			<div class="max-w-850">
				<?php if ( $heading ) : ?>
			        <h2>
						<?= $heading; ?>
					</h2>
			    <?php endif; ?>		

			    <div class="copy-and-btn-container">
			    	<?php if ( $copy ) : ?>
				        <div>
							<?= $copy; ?>
						</div>
				    <?php endif; ?>

				    <div class="align-right-text">
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
		</div>
	</div>
</section>
