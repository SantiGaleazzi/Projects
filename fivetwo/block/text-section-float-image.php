<?php
	$heading_text_and_float_image = get_field('heading_text_and_float_image');
	$copy_text_and_float_image = get_field('copy_text_and_float_image');
	$image_text_and_float_image = get_field('image_text_and_float_image');
?>
<section id="learn-more" class="float-image-section">
	<div class="new-main-container">
		<div class="float-image-container copy-styles">
				<?php if ($heading_text_and_float_image): ?>
		            <div class="heading-text">
		            	<?= $heading_text_and_float_image; ?>
		            </div>
		        <?php endif ?>	 
				<?php if ($copy_text_and_float_image): ?>
		           <div class="copy-float-image">
		           	<?= $copy_text_and_float_image; ?>
		           </div>
		        <?php endif ?>	 
		</div>
		<div class="float-image-right" style="background-image: url(<?php echo $image_text_and_float_image['url']; ?>);"></div>
	</div>	
</section>