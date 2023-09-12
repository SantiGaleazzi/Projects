<?php
	$heading_donor_banner = get_field('heading_donor_banner');
	$copy_donor_banner = get_field('copy_donor_banner');
	$pink_button_donors = get_field('pink_button_donors');
	$white_button_donors = get_field('white_button_donors');
	$background_image_donor_banner = get_field('background_image_donor_banner');
	$blue_boxes = get_field('blue_boxes');
?>
<section class="donor-banner">
	<div class="donor-main-container" style="background-image: url(<?php echo $background_image_donor_banner['url']; ?>);">
		<div class="new-main-container">
			<div class="white-dialog-donor">			
				<?php if ($heading_donor_banner): ?>
	                <h1><?= $heading_donor_banner; ?></h1>
	            <?php endif ?>		
	            <?php if ($copy_donor_banner): ?>
	                <p><?= $copy_donor_banner; ?></p>
	            <?php endif ?>	
	            <?php if ($pink_button_donors): ?>
	            	<div class="pink-button-ffz margin-right-25"><?php echo $pink_button_donors; ?></div>
	            <?php endif ?>	
	            <?php if ($white_button_donors): ?>
	                 <a href="<?= $white_button_donors['url']; ?>" target="<?= $white_button_donors['target']; ?>" class="white-blue-button"><?= $white_button_donors['title']; ?></a>
	            <?php endif ?>		
			</div>
		</div>
	</div>
	<div class="new-main-container">
		<div class="blue-boxes">
			<?php
	            if( have_rows('blue_boxes') ):
	                while ( have_rows('blue_boxes') ) : the_row();
	                    $copy_blue_box  = get_sub_field('copy_blue_box');
	            ?>
	                <div class="blue-box">
	                    <?php if ($copy_blue_box): ?>
					        <div><?= $copy_blue_box; ?></div>
					    <?php endif ?>	
	                </div>
	            <?php
	                endwhile;
	            endif;
	        ?>
		</div>
	</div>
</section>