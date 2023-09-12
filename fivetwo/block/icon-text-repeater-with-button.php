<?php
	$heading_icon_copy_w_button = get_field('heading_icon_copy_w_button');
	$item_icon_copy_w_button = get_field('item_icon_copy_w_button');
	$button_icon_copy_w_button = get_field('button_icon_copy_w_button');
?>
<section class="icon-repater-button-section">
	<div class="blue-rounded-bg">
		<div class="icon-repater-button-container">
			<?php if ($heading_icon_copy_w_button): ?>
	            <div class="heading-icon-repeater"><?= $heading_icon_copy_w_button; ?></div>
	        <?php endif ?>	
	        <div class="icon-text-container">
				<?php
		            if( have_rows('item_icon_copy_w_button') ):
		                while ( have_rows('item_icon_copy_w_button') ) : the_row();
		                    $icon_icon_copy_w_button  = get_sub_field('icon_icon_copy_w_button');
		                    $copy_icon_copy_w_button   = get_sub_field('copy_icon_copy_w_button');
		            ?>
		                <div class="icon-button-item">
		                    <?php if ($icon_icon_copy_w_button): ?>
						    	<img src="<?= $icon_icon_copy_w_button['url']; ?>" alt="<?= $icon_icon_copy_w_button['alt']; ?>" />
						    <?php endif ?>
						    <?php if ($copy_icon_copy_w_button): ?>
						        <div><?= $copy_icon_copy_w_button; ?></div>
						    <?php endif ?>	
		                </div>
		            <?php
		                endwhile;
		            endif;
		        ?>
			</div>
			<div class="centered-button-container">
				<?php if ($button_icon_copy_w_button): ?>
	                <div class="pink-button-ffz"><?php echo $button_icon_copy_w_button; ?></div>
	            <?php endif ?>	
			</div>
		</div>
	</div>
</section>
