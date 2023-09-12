<?php
	$single_view_group = get_field('single_view_group');
	if($single_view_group):
		$testimonials = $single_view_group['testimonials']; 
	endif;


  	$double_view_group = get_field('double_view_group');
  	if($double_view_group):
    	$testimonials = $double_view_group['testimonials'];
    endif;

	?>
<?php if(isset($_COOKIE['FirstAnswer'])): ?>
  <div class="row">
  	<div class="large-8 large-centered columns relative">
  	    <div class="intro-oven__reviews-arrow intro-oven__reviews-arrow--prev">
  		    	<i class="fas fa-chevron-left"></i>
  		</div>
  		<div class="intro-oven__reviews relative">
  		    <img src="<?php bloginfo( 'template_url' ) ?>/assets/img/quote.png" alt="quote">
  		    <div class="intro-oven__reviews-content">
  		   <?php $rows = $testimonials['testimonials'];
					if($rows): 
					?>
						<?php foreach($rows as $row): 
								$testimonial = $row['testimonial'];
								$author = $row['author'];
								$company = $row['company'];
								$segment_of_bussines = $row['segment_of_bussines'];
								if(strnatcasecmp($segment_of_bussines, $_COOKIE['FirstAnswer']) === 0):
						?>
							    <div class="intro-oven__single-review text-center">
						  				<?=$testimonial;?>
						  				<span>
						  					<b><?=$author;?></b>
						  					<br>
						  					<?=$company;?>
						  				</span>
						  			</div>
							<?php endif; ?>
						<?php endforeach; ?>
			<?php	endif; ?>
  		    </div>
  		</div>
  		<div class="intro-oven__reviews-arrow intro-oven__reviews-arrow--next">
  		    	<i class="fas fa-chevron-right"></i>
  		</div>
  	</div>
  </div>
<?php endif; ?>