<?php 
    $logo = get_field('logo','options');
?>
<nav class="w-full top-0 left-0 relative z-50 menu"> 
	<div class="main-container py-5 flex justify-between items-center header-navigation">
		<?php 
			if($logo){
				?>
					<a href="<?php bloginfo('url'); ?>" aria-label="<?= $logo['alt']; ?>" no-underline>
						<img src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>" class="header-logo">
					</a> 
				<?php
			}
		?>			
		<div class="max-w-xs pl-6 lg:mb-2 flex justify-between items-end">
			<?php echo do_shortcode('[language-switcher] '); ?>			
			<?php
				if ( is_user_logged_in() ) {
				    ?>
				    	<div class="relative h-11 w-40 hidden md:inline-block">
				    		<a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="w-40 text-center bg-purple-800 text-white font-noto-cond-bold text-base leading-none py-3 button-animation absolute left-0 top-0 mt-1 no-underline">Log Out</a>
				    	</div>
				    <?php
				} else {
				    ?>
				    	<div class="relative h-11 w-40 hidden md:inline-block">
				    		<div class="w-40 text-center bg-purple-800 text-white font-noto-cond-bold text-base leading-none py-3 button-animation absolute left-0 top-0 mt-1 cursor-pointer no-underline open-login">Log In</div> 
				    	</div>
				    <?php
				}
			?>
		</div>
	</div>
</nav>
