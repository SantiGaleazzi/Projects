<?php
	$heading_left_column = get_field('heading_left_column');
	$copy_left_column = get_field('copy_left_column');
	$background_image_left_column = get_field('background_image_left_column');
?>
<section class="dark-blue-bg">
	<div class="blue-bg-image" style="background-image: url(<?php echo $background_image_left_column['url']; ?>);">
		<?php if ( get_field('show_made_for_impact') !== 'no' ) : ?>
			<div class="bg-text-section">
				<div>made for</div>
				<span>i</span><span>m</span><span>p</span><span>a</span><span>c</span><span class="highlighted-letter">t</span>
			</div>
		<?php endif; ?>

		<div class="new-main-container">
			<div class="left-col-section">
				<?php if ( $heading_left_column ) : ?>
		            <h2>
						<?= $heading_left_column; ?>
					</h2>
		        <?php endif; ?>

		        <?php if ( $copy_left_column ) : ?>
		            <p>
						<?= $copy_left_column; ?>
					</p>
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
