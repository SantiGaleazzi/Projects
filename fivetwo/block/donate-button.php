<?php
	$button_donate = get_field('button_donate');
?>
<div class="new-main-container">
	<div class="donate-button">
		<?php if ($button_donate): ?>
			<div class="pink-button-ffz"><?php echo $button_donate; ?></div>
		<?php endif ?>
	</div>
</div>
