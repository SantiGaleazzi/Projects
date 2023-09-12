<?php
	$heading_copy_image_dialog = get_field('heading_copy_image_dialog');
	$copy_copy_image_dialog = get_field('copy_copy_image_dialog');
	$image_copy_image_dialog = get_field('image_copy_image_dialog');
	$dialog_text_copy_image_dialog = get_field('dialog_text_copy_image_dialog');
	$dialog_button_copy_image_dialog = get_field('dialog_button_copy_image_dialog');
?>
<section class="pad-b-80">
	<div class="copy-dialog-section">
		<div class="new-main-container copy-dialog-container">
			<?php if ($heading_copy_image_dialog): ?>
		        <h2><?= $heading_copy_image_dialog; ?></h2>
			<?php endif ?>	
			<?php if ($copy_copy_image_dialog): ?>
		        <div><?= $copy_copy_image_dialog; ?></div>
			<?php endif ?>		
		</div>
	</div>
	<div class="dialog-section">
		<div class="new-main-container dialog-container">
			<?php if ($image_copy_image_dialog): ?>
				<img src="<?= $image_copy_image_dialog['url']; ?>" alt="<?= $image_copy_image_dialog['alt']; ?>" />
			<?php endif ?>
			<div class="white-dialog-box">
				<?php if ($dialog_text_copy_image_dialog): ?>
			        <div class="text-white-dialog"><?= $dialog_text_copy_image_dialog; ?></div>
				<?php endif ?>	
				<?php if ($dialog_button_copy_image_dialog): ?>
		            <div class="pink-button-ffz"><?php echo $dialog_button_copy_image_dialog; ?></div>
		        <?php endif ?>	
			</div>
		</div>
	</div>
</section>