<?php
	$background_image = get_field('background_image');
	$image = get_field('image');
	$title = get_field('title');
	$highlighted_text = get_field('highlighted_text');
	$subtitle = get_field('subtitle');
	$copy = get_field('copy');
	$button_text  = get_field('button_text'); 
	$block_id    = get_field('block_id');
?>
<section id="<?= $block_id; ?>"  class="bio-section" style="background-image: url(<?php echo $background_image['url']; ?>);">
	<div class="faith-work-container">
		<div class="bio-section-container <?php if($image){ echo ("shape-image-margin"); } ?>">
			<div class="bio-section-flex">
				<?php 
                    if($image){
                        ?>
                            <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" />
                        <?php
                    }
                ?>
				<div>
					<?php 
						if($title){
							?>
								<div class="bio-title-text"><?= $title; ?></div>
							<?php
						}
					?>
					<?php 
						if($highlighted_text){
							?>
								<div class="bio-highlighted-text"><?= $highlighted_text; ?></div>
							<?php
						}
					?>
					<?php 
						if($subtitle){
							?>
								<div class="bio-subtitle-text"><?= $subtitle; ?></div>
							<?php
						}
					?>
					<?php 
						if($copy){
							?>
								<div class="bio-copy-text"><?= $copy; ?></div>
							<?php
						}
					?>
					<div class="shape-button-lb">
						<?php if ($button_text): ?>
					        <div class="copy-button-slider-pink-button open-faith-work-lightbox"><?= $button_text; ?></div>
					    <?php endif ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>