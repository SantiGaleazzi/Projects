<?php
	$heading = get_field('heading');
	$step = get_field('step');
	$button = get_field('button');
?>
<section class="dark-blue-bottom-rounded-section">
	<div class="new-main-container">
		<?php if ($heading): ?>
			<h2><?= $heading; ?></h2>
		<?php endif ?>
		<div class="heading-step-list-container">
			<?php
	            if( have_rows('step') ):
	                while ( have_rows('step') ) : the_row();
	                    $number  = get_sub_field('number');
	                    $copy   = get_sub_field('copy');
	            ?>
	                <div class="heading-step-list-item">
	                    <?php if ($number): ?>
							<span><?= $number; ?></span>
						<?php endif ?>
						<?php if ($copy): ?>
							<p><?= $copy; ?></p>
						<?php endif ?>
	                </div>
	            <?php
	                endwhile;
	            endif;
	        ?>
		</div>
		<?php if ($button): ?>
	        <div class="pink-button-ffz"><?php echo $button; ?></div>
	    <?php endif ?>	
	</div>
</section>