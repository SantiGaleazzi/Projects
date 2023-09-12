<?php

	$heading = get_field('heading_banner');
	$copy = get_field('copy_banner');
	$white_button_banner = get_field('white_button_banner');
	$pink_button_banner = get_field('pink_button_banner');
	$image_banner = get_field('image_banner');
    $className = '';

    if ( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
	
?>
<section class="dark-blue-banner <?= esc_attr( $className ); ?>">
	<div>
		<div class="new-main-container">
			<div class="banner-image-shape" style="background-image: url(<?= $image_banner['url']; ?>);"></div>
			<div class="white-dialog">			
				<div class="middle-wrapper">
					<div class="middle-wrapper-content">
						<?php if ($heading): ?>
							<h1><?= $heading; ?></h1>
						<?php endif; ?>
		
						<?php if ($copy): ?>
							<p><?= $copy; ?></p>
						<?php endif; ?>
					</div>
				</div>
				
				<div class="banner-actions">
					<?php if ( $white_button_banner ) : ?>
						<a class="white-blue-button margin-right-25" href="<?= $white_button_banner['url']; ?>">
							<?= $white_button_banner['title']; ?>
						</a>
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
	</div>
</section>
