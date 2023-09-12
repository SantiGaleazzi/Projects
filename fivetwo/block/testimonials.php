<?php
	$heading = get_field('heading');
	$testimonial = get_field('testimonial');
?>
<section class="testimonials-section">
	<div class="new-main-container partners">
		<?php if ($heading): ?>
			<h2><?= $heading; ?></h2>
		<?php endif ?>
		<div id="testimonial-slider-section" class="testimonial-slider-section">
			<?php
	            if( have_rows('testimonial') ):
	                while ( have_rows('testimonial') ) : the_row();
	                    $name  = get_sub_field('name');
	                    $affiliation   = get_sub_field('affiliation');
	                    $copy   = get_sub_field('copy');
	                    $photo   = get_sub_field('photo');
	            ?>
	                <div>
	                    <div class="testimonial-item">
	                    	<?php if ($photo): ?>
							<div class="testimonial-photo" style="background-image: url(<?php echo $photo['url']; ?>);"></div>
							<?php endif ?>
							<?php if ($affiliation): ?>
								<div class="testimonial-bio">
									<div class="testimonial-name">
										<?= $name; ?>
									</div>
									<div class="occ-testimonial">
										<?= $affiliation; ?>
									</div>
									<div>
										<?= $copy; ?>
									</div>
								</div>
							<?php endif ?>
	                    </div>
	                </div>
	            <?php
	                endwhile;
	            endif;
	        ?>
		</div>
	</div>
</section>