<?php 
	$title       = get_field('title');
	$copy        = get_field('copy');
	$button      = get_field('button');
	$image       = get_field('image');
	$block_id    = get_field('block_id');
?>
<section id="<?= $block_id; ?>" class="left-copy-right-image-section">
	<div class="faith-work-container">
		<div class="left-copy-right-image-container">
			<?php 
				if($title){
					?>
						<h1><?= $title; ?></h1>
					<?php
				}
			?>
			<?php 
				if($copy){
					?>
						<div class="left-copy-right-image-text"><?= $copy; ?></div>
					<?php
				}
			?>
			<?php if ($button): ?>
		        <div class="copy-button-slider-pink-button open-faith-work-lightbox"><?= $button; ?></div>
		    <?php endif ?>
		    <?php 
				if($image){
					?>
						<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="left-copy-right-image-right-image"/>
					<?php
				}
			?>
		</div>
	</div>
</section>