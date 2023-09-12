<?php
	$heading = get_field('heading');
	$copy = get_field('copy');
	$client_item = get_field('client_item');
?>
<section>
	<div class="client-container">
		<div class="light-blue-rounded-clients">
			<?php if ($heading): ?>
				<h3><?= $heading; ?></h3>
			<?php endif ?>	
			<?php if ($copy): ?>
				<div><?= $copy; ?></div>
			<?php endif ?>	
		</div>
		<div class="client-repeater">
			<?php
	            if( have_rows('client_item') ):
	                while ( have_rows('client_item') ) : the_row();
	                    $link  = get_sub_field('link');
	                    $image   = get_sub_field('image');
	            ?>
	                <div class="client-logo">
	                    <?php if ($image): ?>
					        <a href="<?= $link; ?>">
					        	<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" />
					        </a>
					    <?php endif ?>
	                </div>
	            <?php
	                endwhile;
	            endif;
	        ?>
		</div>
	</div>
</section>