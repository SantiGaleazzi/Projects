<?php
	$image_horizontal_section = get_field('image_horizontal_section');
	$heading_horizontal_section = get_field('heading_horizontal_section');
	$text_horizontal_section = get_field('text_horizontal_section');
	$button_text_horizontal = get_field('button_text_horizontal');
	$virtuous_form = get_field('virtuous_form');
?>
<section class="horizontal-image-copy-button-section">
	<div class="new-main-container">
		<div class="horizontal-image-copy-button-container">
			<?php if ($image_horizontal_section): ?>
	            <img src="<?= $image_horizontal_section['url']; ?>" alt="<?= $image_horizontal_section['alt']; ?>" />
	        <?php endif ?>		
	        <div class="text-horizontal-section">
	        	<?php if ($heading_horizontal_section): ?>
					<div class="heading-horizontal"><?= $heading_horizontal_section; ?></div>
				<?php endif ?>	
				<?php if ($text_horizontal_section): ?>
					<div><?= $text_horizontal_section; ?></div>
				<?php endif ?>	
	        </div>
	        <?php if ($button_text_horizontal): ?>
	            <div class="dark-blue-button open-virtuous-lightbox-horizontal"><?= $button_text_horizontal; ?></div>
	        <?php endif ?>		
		</div>
	</div>
</section>

<div class="homepage-lightbox virtuous-contact-form-horizontal">
    <div class="container-virtuous-form form-style-container">
        <div class="close-lightbox-form">
            <span aria-hidden="true">×</span>
        </div>
        <?php if ($virtuous_form): ?>
			<?= $virtuous_form; ?>
		<?php endif ?>
    </div>
</div>