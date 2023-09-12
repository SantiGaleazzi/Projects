<?php 
    $logo_footer = get_field('logo_footer','options');
    $copy_footer = get_field('copy_footer','options');
?>

	<section class="bg-teal-400 py-12 relative footer-section z-5">
		<div class="main-container mx-auto text-center flex flex-col lg:flex-row justify-between items-center">
			<?php 
				if($logo_footer){
					?>
						<a href="<?php bloginfo('url'); ?>" aria-label="<?= $logo_footer['alt']; ?>" class="no-underline">
						    <img src="<?= $logo_footer['url']; ?>" alt="<?= $logo_footer['alt']; ?>">
						</a> 
					<?php
				}
			?>
			<div class="max-w-5xl w-full flex flex-col lg:flex-row md:ml-12">
				<div class="font-noto-sans-medium text-white text-xs sm:text-xxs text-center lg:text-left remove-underline lg:mr-24 xl:mr-40 py-6 lg:pt-4 lg:pb-0"> 
					<?= $copy_footer; ?>
				</div>
				<div class="flex justify-center items-center transparent-style text-center remove-underline h-12">
					<?php echo do_shortcode('[language-switcher] '); ?>	<div class="divider-footer"></div>
					<?php
						if ( is_user_logged_in() ) {
						    ?>
						    	<a href="<?php echo wp_logout_url( home_url() ); ?>" class="text-center text-white font-helvetica-neue-bold pl-6 no-underline">Log Out</a>
						    <?php
						} else {
						    ?>
						    	<div class="text-center text-white font-helvetica-neue-bold pl-6 no-underline cursor-pointer open-login">Log In</div>
						    <?php
						}
					?>
				</div>							
			</div>					
		</div>		
	</section>	

    <?php wp_footer(); ?>
        
    </body>
</html>
