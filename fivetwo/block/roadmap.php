<?php
	$heading = get_field('heading');
	$map_item = get_field('map_item');
?>
<section class="roadmap-section">
	<div class="new-main-container">
		<?php if ( $heading ) : ?>
	        <h2>
				<?= $heading; ?>
			</h2>
	    <?php endif; ?>	

	    <div class="roadmap-flex-container">
	    	<?php if ( have_rows('map_item') ) : ?>
	            <?php 
					while ( have_rows('map_item') ) : the_row();
	                    $title  = get_sub_field('title');
	                    $number = get_sub_field('number');
	                    $copy = get_sub_field('copy');
	            ?>
	                <div class="roadmap-item <?= get_sub_field('looks_like_flag') !== 'no' ? 'has-flag' : ''; ?>">
						<?php if ( get_sub_field('looks_like_flag') !== 'no' ) : ?>
							<div class="flag">
								<img src="<?php bloginfo('template_url'); ?>/assets/img/pink-flag.png" alt="Pink Flag">
							</div>
						<?php endif; ?>

	                    <?php if ( $title ) : ?>
					        <strong><?= $title; ?></strong>
					    <?php endif; ?>

					    <?php if ( $number ) : ?>
					        <div>
								<?= $number; ?>
							</div>
					    <?php endif; ?>

					    <?php if ( $copy ) : ?>
					        <p>
								<?= $copy; ?>
							</p>
					    <?php endif; ?>	
	                </div>
	            <?php endwhile; ?>
	        <?php endif; ?>
	    </div>

		<?php if ( have_rows('banner_button_layout') ) : ?>
			<div class="call-to-action">
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
			</div>
		<?php endif; ?>
	</div>
</section>
