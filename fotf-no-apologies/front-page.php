<?php
	$user = wp_get_current_user();

	if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ) {
		get_header();
	} else {
		get_header('website');
	}

	$heading_banner = get_field('heading_banner');
	$copy_banner = get_field('copy_banner');
	$image_banner = get_field('image_banner');
	$main_title_hightlights = get_field('main_title_hightlights');
	$copy_highlights = get_field('copy_highlights');
	$subtitle_highlights = get_field('subtitle_highlights');
	$image_start_now = get_field('image_start_now');
	$title_start_now = get_field('title_start_now');
	$copy_start_now = get_field('copy_start_now');
	$title_contact_us = get_field('title_contact_us');
	$copy_contact_us = get_field('copy_contact_us');
	$subtitle_contact_us = get_field('subtitle_contact_us');
	$contact_email_contact_us = get_field('contact_email_contact_us');
	$logos_section = get_field('logos_section');
	$title_evidence = get_field('title_evidence');
	$copy_evidence = get_field('copy_evidence');
?>

    <section class="pt-20 -mt-28 md:-mt-44 relative bg-no-repeat bg-cover bg-teal-400 bg-bottom overflow-hidden">
       <div class="main-container flex flex-col md:flex-row pt-8 md:pt-24">
       		<div class="max-w-[630px] w-full mx-auto md:mx-0 lg:mr-6 pt-8 lg:pt-24 relative z-10 pb-4 lg:pb-64 xl:pb-80">
       			<div class="relative block mb-4">
       				<h1 class="text-5xl text-6xl xl:text-7xxl sup-heading font-noto-extra-cond-black-italic text-center md:text-left font-normal leading-tight text-white blue-bold-stroke blue-text-shadow absolute w-full"><?= $heading_banner; ?></h1>
       				<h1 class="text-5xl text-6xl xl:text-7xxl sup-heading font-noto-extra-cond-black-italic text-center md:text-left font-normal leading-tight text-white relative w-full"><?= $heading_banner; ?></h1>
       			</div>       			
       			<div class="font-noto-sans-cond text-2xxl sm:text-xl text-blue-500 text-center md:text-left mt-5 pb-6 md:pb-10">
       				<?= $copy_banner; ?>
       			</div>
				<?php
					if ( is_user_logged_in() ) {
					?>
						<div class="relative h-10 text-center md:text-left">
		       				<a href="<?php echo wp_logout_url( get_permalink() ); ?>" class="w-40 text-center bg-purple-400 text-white font-noto-cond-bold text-base leading-none py-3 inline-block button-animation relative cursor-pointer no-underline mx-auto md:mx-0">Log Out</a>
		       			</div>
					<?php
					} else {
					?>
						<div class="relative h-10 text-center md:text-left">
		       				<div class="w-40 text-center bg-purple-400 text-white font-noto-cond-bold text-base leading-none py-3 inline-block button-animation relative cursor-pointer no-underline mx-auto md:mx-0 open-login">Log in</div>
		       			</div>
					<?php
					}
				?>       			
       		</div>    	
       		<?php 
    			if($image_banner){
    				?>
    					<div class="banner-image mx-auto md:mx-0">
    						<img src="<?php echo esc_url($image_banner['url']); ?>" alt="<?php echo esc_attr($image_banner['alt']); ?>" >
    					</div>
    				<?php
    			}
    		?>
       </div>
       <div class="triangle-bottom-yellow"></div>
       <div class="triangle-bottom-yellow-left"></div>
       <div class="triangle-bottom-orange"></div>
       <div class="triangle-bottom-purple"></div>
       <div class="triangle-bottom-white"></div>
       <div class="grainy-bg"></div>
    </section>
    <section class="pt-20 lg:pt-10 bg-blue-400 relative">
    	<div class="grainy-bg"></div>
    	<div class="main-container">
    		<div class="max-w-[960px] w-full mx-auto lg:px-4 pb-6 md:pb-20 relative">
    			<?php 
	    			if($main_title_hightlights){
	    				?>
	    					<h1 class="max-w-2xl mx-auto text-white text-5xl sm:text-6xl font-noto-extra-cond-black-italic text-center lg:px-10">
	    						<span class="leading-tight"><?= $main_title_hightlights; ?></span>
	    					</h1>
	    				<?php
	    			}
	    		?>
	    		<?php 
	    			if($copy_highlights){
	    				?>
	    					<div class="max-w-2xl mx-auto text-white text-center pt-7 ld:px-8 text-styles text-2xbase sm:text-base">
	    						<?= $copy_highlights; ?>
	    					</div>
	    				<?php
	    			}
	    		?>
	    		<?php 
	    			if($subtitle_highlights){
	    				?>
	    					<h1 class="max-w-2xl mx-auto text-white text-5xl sm:text-6xl font-noto-extra-cond-black-italic text-center py-10 lg:py-20 lg:px-10">
	    						<?= $subtitle_highlights; ?>
	    					</h1>
	    				<?php
	    			}
	    		?>
	    		<?php if( have_rows('list') ): ?>
				    <?php
				        while( have_rows('list') ): the_row();

				            $title = get_sub_field('title');
				            $copy = get_sub_field('copy');
				            $image = get_sub_field('image');
				    ?>
				        <div class="w-full flex flex-col lg:flex-row hightlights-card justify-between items-center mb-14 lg:mb-28 noto-sans-cond">				        	
				        	<div class="max-w-md text-center w-full mb-4 lg:mb-0 mt-4 md:mt-0">
				        		<?php 
					        		if($title){
					        			?>
					        				<img class="mx-auto" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" >
					        			<?php
					        		}
					        	?>
				        	</div>
				        	<div class="max-w-400 w-full text-center">
				        		<?php 
					        		if($title){
					        			?>
					        				<div class="mx-auto pb-7 relative bottom-bar-deco md:px-8">
					        					<h3 class="text-yellow-200 leading-tight font-noto-extra-cond-black-italic text-4xxl relative z-10"><?= $title; ?></h3>					        					
					        				</div>
					        			<?php
					        		}
					        		if($copy){
					        			?>
					        				<img src="<?php echo bloginfo('template_url'); ?>/assets/images/deco-bar.png" alt="">
					        				<div class="font-noto-sans-cond text-2xbase sm:text-base leading-6 text-white mt-7"><?= $copy; ?></div>
					        			<?php
					        		}
					        	?>
				        	</div>
				        </div>
				    	<?php endwhile; ?>
				<?php endif; ?>
	    	</div>
    	</div>
    </section>
    <section class="bg-orange-500 relative">
    	<div class="grainy-bg bg-left"></div>
    	<div class="main-container relative">
    		<div class="max-w-6xl w-full mx-auto flex flex-col-reverse lg:flex-row items-center lg:items-end lg:flex-end justify-between relative z-10">
    			<?php 
    				if($image_start_now){
    					?>
    						<div class="max-w-md w-full mt-10 lg:mt-0 lg:ml-16">
    							<img src="<?php echo esc_url($image_start_now['url']); ?>" alt="<?php echo esc_attr($image_start_now['alt']); ?>" >
    						</div>
    					<?php
    				}
    			?>
    			<?php 
    				if($title_start_now){
    					?>
    						<div class="max-w-[615] w-full pt-20 lg:pb-20 relative text-center md:text-left lg:pl-12">
    							<div>
    								<h3 class="font-noto-extra-cond-black-italic text-white text-6xxl uppercase"><?= $title_start_now; ?></h3>
	    							<div class="text-white text-2xxl sm:text-xl font-noto-sans-condensed mt-3 mb-4 list-styles">
	    								<?= $copy_start_now; ?>
	    							</div>
    							</div> 
    							<div class="swiper mySwiper testimonial-swipper relative">
							      <div class="swiper-wrapper">
							      	<?php if( have_rows('testimonial_section') ): ?>
									    <?php
									        while( have_rows('testimonial_section') ): the_row();

									            $quote = get_sub_field('quote');
									            $author = get_sub_field('author');
									            $image_testimonial = get_sub_field('image_testimonial');
									    ?>
									        <div class="swiper-slide w-full rounded bg-yellow-150 py-5 px-6 text-gray-500 mb-2">
									        	<div class="w-full flex flex-col md:flex-row justify-start items-center md:items-start content-start">
									        		<?php 
									    				if($image_testimonial){
									    					?>
									    						<div class="w-20 mr-6">
									    							<img src="<?php echo esc_url($image_testimonial['url']); ?>" alt="<?php echo esc_attr($image_testimonial['alt']); ?>" >
									    						</div>
									    					<?php
									    				}
									    			?>
									        		<div class="max-w-[460px] pt-4 md:pt-0">
									        			<?php
									    					if($quote){
														        ?>
														        	<div class="mb-1 text-2xbase sm:text-base">
														        		<?= $quote; ?>
														        	</div>
														        <?php
														    }
														?>
														<?php
									    					if($author){
														        ?>
														        	<div class="font-bold">
														        		– <?= $author; ?>
														        	</div>
														        <?php
														    }
														?>
									        		</div>
									        	</div>
									        </div>
									    	<?php endwhile; ?>
									<?php endif; ?>
							      </div>
							      <div class="w-full text-center flex justify-center content-center">							      	
    							    <div class="swiper-button-prev home-prev"></div>
    							    <div class="swiper-button-next home-next"></div>
							      </div>
							    </div>
    						</div>
    					<?php
    				}
    			?>
    		</div>
    	</div>
    </section>
    <?php 
    	if($title_contact_us){
    		?>
    			<section class="bg-yellow-500">
			    	<div class="main-container">
			    		<div class="max-w-6xl w-full mx-auto flex flex-col lg:flex-row items-center lg:items-start justify-between py-20 md:pt-28 md:pb-24 lg:pr-10 lg:pl-8">
			    			<div class="max-w-446 w-full text-center md:text-left">
			    				<?php
			    					if($title_contact_us){
								        ?>
								        	<div class="w-300 text-center mb-14 relative mx-auto md:mx-0">
								        		<h3 class="text-white leading-tight font-noto-extra-cond-black-italic text-4xxl relative z-10"><?= $title_contact_us; ?></h3>
								        		<div class="navy-dialog-after w-full bg-blue-500 absolute left-0"></div>
								        	</div>
								        <?php
								    }
								?>
								<?php
			    					if($copy_contact_us){
								        ?>
								        	<div class="text-white font-noto-sans-cond text-2xxl sm:text-xl">
								        		<?= $copy_contact_us; ?>
								        	</div>
								        <?php
								    }
								?>
								<?php
			    					if($subtitle_contact_us){
								        ?>
								        	<div class="text-white font-noto-extra-cond-black-italic text-3xxl mt-6">
								        		<?= $subtitle_contact_us; ?>
								        	</div>
								        <?php
								    }
								?>
								<?php
			    					if($contact_email_contact_us){
								        ?>
								        	<div class="flex items-center font-noto-sans-medium text-white text-cl md:text-2xxl sm:text-xl mt-8">
								        		<img src="<?php echo bloginfo('template_url'); ?>/assets/images/email-icon.png"><div class="ml-2 md:ml-7"><a href="mailto:<?= $contact_email_contact_us; ?>" class="no-underline text-white"><?= $contact_email_contact_us; ?></a></div>
								        	</div>
								        <?php
								    }
								?>
			    			</div>
			    			<div class="max-w-446 w-full mt-4 lg:mt-0 pt-14 lg:pt-6">
			    				<?php if( have_rows('logos_section') ): ?>
								    <?php
								        while( have_rows('logos_section') ): the_row();

								            $title = get_sub_field('title');
								            $logos = get_sub_field('logos');
								    ?>
								       	<div class="mb-14">
								       		<p class="font-noto-extra-cond-bold text-white text-basenoto-extra-cond-bold mb-5"><?= $title; ?></p>
								       		<div class="flex items-center justify-center md:justify-start">
								       			<?php
									       			if($logos){
									       				if( have_rows('logos') ): ?>
														    <?php
														        while( have_rows('logos') ): the_row();

														            $image = get_sub_field('image');
														    ?>
														       	<div class="mr-4 logo-images">
														       		<img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" >
														       	</div>
														    	<?php endwhile; ?>
														<?php endif; 
									       			}
									       		?>
								       		</div>
								       	</div>
								    	<?php endwhile; ?>
								<?php endif; ?>
			    			</div>
			    		</div>
			    	</div>
			    </section>
    		<?php 
    	}
    ?>

    <?php 
    	if($title_evidence){
    		?>
    			<section class="bg-yellow-500 relative z-10">
    				<div class="main-container">
    					<div class="max-w-[913px] w-full mx-auto pt-20">
    						<div class="max-w-[730px] text-center relative mx-auto">
								<h3 class="text-white leading-tight font-noto-extra-cond-black-italic text-4xxl relative z-10"><?= $title_evidence; ?></h3>
								<div class="navy-dialog-after w-full bg-blue-500 absolute left-0"></div>
							</div>
							<?php
			    				if($copy_evidence){
								    ?>
								       	<div class="text-white home-text-styles text-2xbase sm:text-base pt-16 pb-16 lg:pb-20 relative">
								        	<?= $copy_evidence; ?>
								       	</div>
								    <?php
								}
							?>
    					</div>
    				</div>
    			</section>
    		<?php
    	}
    ?>

    <?php get_template_part('partials/lightbox-login'); ?>

<?php get_footer();
