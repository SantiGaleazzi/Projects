<?php
    $title      = get_field('title_partner');
    $preFooter  = get_field('preFooter_partner');
    
?>
<div class="partner">
	<div class="grid-container">
        <div class="grid-x">
            <div class="cell large-12 flex-container flex-dir-column">
                <div class="grid-container">
                    <div class="grid-x">
                        <div class="cell large-9 flex-container flex-dir-column">
                    	<?php if ($subtitle): ?>
                    	    <h6 class="subtitle"><?php echo $subtitle; ?></h6>
                    	<?php endif ?>
                    </div>
                </div>
            </div>
        	<?php
        	if( have_rows('partner_single') ):
        	?>
            <div class="grid-container">
                <div class="grid-x align-center">
                    <div class="cell large-9 flex-container flex-dir-row">
        	<div class="partner__wrapper flex-container flex-dir-row flex-wrap align-spaced">
        	<?php
        	    while ( have_rows('partner_single') ) : the_row();
                    $link          = get_sub_field('link_partner_single');
        	    	$logo 			= get_sub_field('logo_partner_single');
        	?>
        		<div class="partner__single flex-container flex-dir-row align-center-middle">
        			<?php if(!empty($logo)): ?>
        				<div class="partner__logo">
                            <a href="<?php echo $link;?>" target="_blank">
                                <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                            </a>
        				</div>
        			<?php endif ?>
        		</div>
        	<?php
        	    endwhile;
        	?>
                    </div>
                </div>
            </div>
        	</div>
        	<?php
        	endif;
        	?>
            <?php if ($preFooter): ?>
                <?php echo  $preFooter; ?>
            <?php endif ?>
            </div>
        </div>
    </div>    
</div>