<?php 	
    $logo = get_field('logo','options');
    $user = wp_get_current_user();
?>
<nav class="w-full bg-blue-400 relative z-50 menu nav-shape">
	<div class="grainy-bg"></div> 
	<div class="main-container py-5 flex justify-between items-center header-navigation relative">
		<?php 
			if($logo){
				?>
					<a href="<?php bloginfo('url'); ?>" aria-label="<?= $logo['alt']; ?>" no-underline>
						<img src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>" class="header-logo">
					</a> 
				<?php
			}
		?>		
		<div class="platform-nav bg-blue-400 md:bg-transparent w-full absolute md:relative left-0 hidden md:block pb-6 md:pb-0 pt-12 md:pt-0 px-6 md:px-0 mobile-menu">
			<div class="grainy-bg block md:hidden"></div>
			<?php
				$user = wp_get_current_user();
				if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ) {
				    ?>
				    	<div class="coach-menu flex flex-col md:flex-row justify-between w-full lg:pr-4 xl:pr-12 relative">
				    		<?php 
				    			$defaults = array(
				                    'theme_location'  => 'footer_menu',
				                    'menu'            => '',
				                    'container'       => '',
				                    'container_class' => '',
				                    'container_id'    => '',
				                    'menu_class'      => '',
				                    'menu_id'         => '',
				                    'echo'            => true,
				                    'fallback_cb'     => 'wp_page_menu',
				                    'before'          => '',
				                    'after'           => '',
				                    'link_before'     => '',
				                    'link_after'      => '',
				                    'items_wrap' => '%3$s',
				                    'depth'           => 0,
				                    'walker'        => new themeslug_walker_nav_menu_header
				                );
				            	wp_nav_menu($defaults); 
				    		?>	
				    	</div>
				    <?php
				}
				else{
					?>
						<div class="student-menu flex flex-col md:flex-row justify-start w-full lg:pr-4 xl:pr-12 md:pl-6 relative">
							<?php 
								$defaults = array(
				                    'theme_location'  => 'header_menu',
				                    'menu'            => '',
				                    'container'       => '',
				                    'container_class' => '',
				                    'container_id'    => '',
				                    'menu_class'      => '',
				                    'menu_id'         => '',
				                    'echo'            => true,
				                    'fallback_cb'     => 'wp_page_menu',
				                    'before'          => '',
				                    'after'           => '',
				                    'link_before'     => '',
				                    'link_after'      => '',
				                    'items_wrap' => '%3$s',
				                    'depth'           => 0,
				                    'walker'        => new themeslug_walker_nav_menu_header
				                );
				            	wp_nav_menu($defaults);
							?>
						</div>
					<?php
				}
            ?>
            <?php
				if ( is_user_logged_in() ) {
				    ?>
				    	<div class="relative h-11 px-5 pt-4 block md:hidden">
				    		<a href="<?php echo wp_logout_url( home_url() ); ?>" class="w-14 text-center text-white font-noto-cond-bold text-base leading-none py-3 relative left-0 top-0 mt-1 no-underline">Log Out</a>
				    	</div>
				    <?php
				}
			?>
		</div>	
		<div class="max-w-xs lg:pl-6 lg:mb-2 flex justify-between items-end platform-language">
			<?php echo do_shortcode('[language-switcher] '); ?>			
			<?php
				if ( is_user_logged_in() ) {
				    ?>
				    	<div class="relative h-11 w-14 hidden md:inline-block">
				    		<a href="<?php echo wp_logout_url( home_url() ); ?>" class="w-14 text-center text-white font-noto-cond-bold text-base leading-none py-3 absolute left-0 top-0 mt-1 no-underline">Log Out</a>
				    	</div>
				    <?php
				} else {
				    ?>
				    	<div class="relative h-11 w-14 hidden md:inline-block">
				    		<div class="w-14 text-center text-white font-noto-cond-bold text-base leading-none py-3 absolute left-0 top-0 mt-1 cursor-pointer no-underline open-login">Log In</div> 
				    	</div>
				    <?php
				}
			?>
			<div class="mt-2 block md:hidden mobile-hamburguer">
				<div class="bg-white border-t-2 border-white h-1 w-8 mb-1 ml-auto"></div>
				<div class="bg-white border-t-2 border-white h-1 w-6 mb-1 ml-auto"></div>
				<div class="bg-white border-t-2 border-white h-1 w-4 mb-1 ml-auto"></div>
			</div>
		</div>
	</div>
</nav>
