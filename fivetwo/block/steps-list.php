<section>
	<div class="new-main-container">
		<div class="flex-container-list pad-t-70">
			<?php
	            if( have_rows('list_item') ):
	                while ( have_rows('list_item') ) : the_row();
	                    $number_steps  = get_sub_field('number_steps');
	                    $text_steps   = get_sub_field('text_steps');
	            ?>
	                <div class="w33-container">
	                    <?php if ( $number_steps ) : ?>
					        <div class="step-number">
								<?= $number_steps; ?>
							</div>
					    <?php endif; ?>
						
					    <?php if ( $text_steps ) : ?>
					        <div>
								<?= $text_steps; ?>
							</div>
					    <?php endif ?>	
	                </div>
	            <?php
	                endwhile;
	            endif;
	        ?>
		</div>
	</div>
</section>
