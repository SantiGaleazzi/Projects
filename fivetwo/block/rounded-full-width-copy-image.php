<?php
	$heading_rounded_full_width = get_field('heading_rounded_full_width');
	$copy_rounded_full_width = get_field('copy_rounded_full_width');
	$image_rounded_full_width = get_field('image_rounded_full_width');
?>
<section class="rounded-full-w-copy-image-section">
	<div class="light-blue-bg"></div>
	<div class="rounded-full-w-copy-image-container">
		<div class="light-blue-rounded-clients collage-rounded-section">
			<?php if ($heading_rounded_full_width): ?>
				<h3><?= $heading_rounded_full_width; ?></h3>
			<?php endif ?>	
			<?php if ($copy_rounded_full_width): ?>
				<div><?= $copy_rounded_full_width; ?></div>
			<?php endif ?>	
		</div>
		<div class="rounded-full-w-image" style="background-image: url(<?php echo $image_rounded_full_width['url']; ?>);"></div>
	</div>
</section>