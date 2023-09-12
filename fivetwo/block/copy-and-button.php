<?php
	$copy_copy_and_button = get_field('copy_copy_and_button');
	$button_copy_and_button = get_field('button_copy_and_button');
?>
<section class="copy-button-section">
	<div class="copy-button-container">
		<?php if ($copy_copy_and_button): ?>
		       <div class="copy-button-heading">
		       		<?= $copy_copy_and_button; ?>
		       </div>
		<?php endif ?>	 
		<?php if ($button_copy_and_button): ?>
	        <div class="pink-button-ffz"><?php echo $button_copy_and_button; ?></div>
	    <?php endif ?>		
	</div>
</section>