<?php
	$background_image = get_field('background_image');
	$logo             = get_field('logo');
	$title            = get_field('title');
	$copy             = get_field('copy');
	$button_text      = get_field('button_text');
	$slider           = get_field('slider');
	$mobile_images    = get_field('mobile_images');
	$block_id         = get_field('block_id');
?>
<section id="<?= $block_id; ?>" class="copy-button-slider-section" style="background-image: url(<?php echo $background_image['url']; ?>);">
	<div class="faith-work-container">
		<?php 
			if($logo){
				?>
					<div class="copy-button-slider-logo">
						<img src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>" />
					</div>
				<?php
			}
		?>
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
					<p class="copy-button-slide-text"><?= $copy; ?></p>
				<?php
			}
		?>
		<?php if ($button_text): ?>
	        <div class="copy-button-slider-pink-button open-faith-work-lightbox"><?= $button_text; ?></div>
	    <?php endif ?>
	    <div id="copy-button-slider-container" class="copy-button-slider-container copy-slider <?php if(get_field('mobile_images')) { echo ("mobile-slider"); } ?>">
			<?php
	            if( have_rows('slider') ):
	                while ( have_rows('slider') ) : the_row();
	                    $slider_image  = get_sub_field('slider_image');
	            ?>
	                <div>
	                   <div>
	                   		<?php 
								if($slider_image){
									?>
										<img src="<?= $slider_image['url']; ?>" alt="<?= $slider_image['alt']; ?>" />
									<?php
								}
							?>
	                   </div>
	                </div>
	            <?php
	                endwhile;
	            endif;
	        ?>
		</div>
		<?php
	        if( have_rows('mobile_images') ):
	            while ( have_rows('mobile_images') ) : the_row();
	                $image  = get_sub_field('image');
	        ?>
	                <?php 
						if($image){
							?>
								<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="slider-mobile-images"/>
							<?php
						}
					?>
	        <?php
	            endwhile;
	        endif;
	    ?>
	</div>
</section>