<?php
	$title_contact_us = get_field('title_contact_us');
	$copy_contact_us = get_field('copy_contact_us');
	$form_contact_us = get_field('form_contact_us');
?>
<section class="contact-us-section">
	<div class="heading-contact-us">
		<?php if ($title_contact_us): ?>
	        <?= $title_contact_us; ?>
	    <?php endif ?>	
	</div>
	<div class="contact-us-container">
		<?php if ($copy_contact_us): ?>
	        <div class="copy-contact-us">
	        	<?= $copy_contact_us; ?>
	        </div>
	    <?php endif ?>	
	    <?php if ($form_contact_us): ?>
	        <div class="form-style-container">
	        	<?= $form_contact_us; ?>
	        </div>
	    <?php endif ?>	
	</div>
</section>