<?php
	$title = get_field('title');
	$reader_item = get_field('reader_item');
	$button_text = get_field('button_text');
	$block_id    = get_field('block_id');
?>
<section id="<?= $block_id; ?>" class="readers-slider-section">
	<div class="faith-work-container">
		<?php 
			if($title){
				?>
					<h2><?= $title; ?></h2>
				<?php
			}
		?>
		<div id="reader-slider" class="reader-slider readers-slider">
			<?php
	            if( have_rows('reader_item') ):
	                while ( have_rows('reader_item') ) : the_row();
	                    $quote  = get_sub_field('quote');
	                    $reader_name   = get_sub_field('reader_name');
	            ?>
	                <div class="readers-item">
	                   <div>
	                   		<?php 
								if($quote){
									?>
										<div><?= $quote; ?></div>
									<?php
								}
							?>
							<?php 
								if($reader_name){
									?>
										<div class="pink-hightlight"><?= $reader_name; ?></div>
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
		<div class="readers-slider-button">
			<?php if ($button_text): ?>
		        <div class="copy-button-slider-pink-button open-faith-work-lightbox"><?= $button_text; ?></div>
		    <?php endif ?>
		</div>
	</div>
</section>