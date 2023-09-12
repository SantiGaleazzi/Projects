<?php
	$item = get_field('item');
?>
<section>
	<div class="light-blue-rounded-section">
		<div class="new-main-container">
			<div class="icon-text-container">
				<?php
		            if( have_rows('item') ):
		                while ( have_rows('item') ) : the_row();
		                    $icon  = get_sub_field('icon');
		                    $text   = get_sub_field('text');
		            ?>
		                <div class="icon-text-item">
		                    <?php if ($icon): ?>
						    	<img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>" />
						    <?php endif ?>
						    <?php if ($text): ?>
						        <div><?= $text; ?></div>
						    <?php endif ?>	
		                </div>
		            <?php
		                endwhile;
		            endif;
		        ?>
			</div>
		</div>
	</div>
</section>