<?php 
	$user = wp_get_current_user();
		if ( in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles )) {
			?>
				<?php 
					get_header();  
				?>
			   	    <section class="w-full pt-28 md:pt-16 pb-8 bg-blue-300 relative">
			   	    	<div class="grainy-bg"></div>
						<div class="max-w-2xl mx-auto px-7 mb-14 relative">
							<h1 class="font-noto-extra-cond-black-italic white-stroke text-blue-300 text-5xl md:text-6xl text-center mb-4">STUDENTS ARTICLES</h1>
							<img src="<?php echo bloginfo('template_url'); ?>/assets/images/deco-bar-white.png">
							<div class="mb-24 flex justify-center items-center flex-wrap pt-10">
								<?php
								   $args = array(
								               'taxonomy' => 'students-topic',
								               'orderby' => 'name',
								               'order'   => 'ASC'
								           );

								   $cats = get_categories($args);

								   foreach($cats as $cat) {
								?>
								      <a href="#<?php echo($cat->slug); ?>" class="bg-orange-500 text-center text-white text-base font-noto-cond-bold terms-item no-underline">
								           <?php echo $cat->name; ?>
								      </a>
								<?php
								   }
								?>				
							</div>			
						</div>
						<div class="main-container">
							<div class="px-4 sm:px-10 xl:px-0">
								<?php 

									$cat_args = array (
										'taxonomy' => 'students-topic',
									);
									
									$categories = get_categories ( $cat_args );

									foreach ( $categories as $category ) {
										$cat_query = null;
										$args = array (
										    'order' => 'ASC',
										    'orderby' => 'title',
										    'posts_per_page' => -1,
										    'post_type' => 'students',
										    'taxonomy' => 'students-topic',
										    'term' => $category->slug
										);

										$cat_query = new WP_Query( $args );
										

										if ( $cat_query->have_posts() ) {					

											$category_image = get_field('category_image',$category);	
											$bg_image = $category_image['url'];

											echo "<div class='w-full font-noto-extra-cond-black-italic bg-orange-500 text-3xl sm:text-4xxl leading-none text-white category-title py-3 relative category-title'>". $category->name ."<div id='$category->slug' class='absolute trigger-marker left-0 w-100 h-1'></div><div class='topic-image' style='background-image: url($bg_image);'></div></div>";			
											echo "<div class='flex flex-wrap justify-start items-start mt-20 mb-24'>";
											    while ( $cat_query->have_posts() ) {
											        $cat_query->the_post();		

											        ?>
											        	<?php 
															?>
																<div class="post-item-container w-full font-noto-extra-cond-bold text-white text-2xbase sm:text-base text-center mx-2 sm:mx-6 relative mb-14 bg-purple-500 py-2">
																   	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="w-full block no-underline px-10">
															            <?php the_title(); ?>
															        </a>
															    </div>														        
															<?php
											        	?>										            
											        <?php
											    }
											echo "</div>";
										}
										wp_reset_postdata();
									}
								?>
							</div>
						</div>
				    </section>
			<?php 	
		}
		elseif ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ) {
			?>
				<?php 
					get_header();  
				?>
			   	    <section class="w-full pt-28 md:pt-16 pb-8 bg-blue-300 relative">
			   	    	<div class="grainy-bg"></div>
						<div class="max-w-2xl mx-auto px-7 relative">
							<h1 class="font-noto-extra-cond-black-italic white-stroke text-blue-300 text-5xl md:text-6xl text-center mb-4">STUDENTS ARTICLES</h1>
							<img src="<?php echo bloginfo('template_url'); ?>/assets/images/deco-bar-white.png">
							<div class="mb-24 flex justify-center items-center flex-wrap pt-10">
								<?php
								   $args = array(
								               'taxonomy' => 'students-topic',
								               'orderby' => 'name',
								               'order'   => 'ASC'
								           );

								   $cats = get_categories($args);

								   foreach($cats as $cat) {
								?>
								      <a href="#<?php echo($cat->slug); ?>" class="bg-orange-500 text-center text-white text-base font-noto-cond-bold terms-item no-underline">
								           <?php echo $cat->name; ?>
								      </a>
								<?php
								   }
								?>				
							</div>			
						</div>
						<div class="main-container">
							<div class="px-4 sm:px-10 xl:px-0">
								<?php 

									$cat_args = array (
										'taxonomy' => 'students-topic',
									);
									
									$categories = get_categories ( $cat_args );

									foreach ( $categories as $category ) {
										$cat_query = null;
										$args = array (
										    'order' => 'ASC',
										    'orderby' => 'title',
										    'posts_per_page' => -1,
										    'post_type' => 'students',
										    'taxonomy' => 'students-topic',
										    'term' => $category->slug
										);

										$cat_query = new WP_Query( $args );
										

										if ( $cat_query->have_posts() ) {					

											$category_image = get_field('category_image',$category);	
											$bg_image = $category_image['url'];

											echo "<div class='w-full font-noto-extra-cond-black-italic bg-orange-500 text-3xl sm:text-4xxl leading-none text-white pl-20 sm:pl-36 category-title py-3 relative category-title'>". $category->name ."<div id='$category->slug' class='absolute trigger-marker left-0 w-100 h-1'></div><div class='topic-image' style='background-image: url($bg_image);'></div></div>";		
											echo "<div class='flex flex-wrap justify-start items-start mt-20 mb-24'>";
											    while ( $cat_query->have_posts() ) {
											        $cat_query->the_post();		

											        ?>
											        	
												        <div class="post-item-container w-full font-noto-extra-cond-bold text-white text-base text-2xbase sm:text-center mx-2 sm:mx-6 relative mb-14 bg-purple-500 py-2">
												        	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="w-full block no-underline px-10">
															    <?php the_title(); ?>
															</a>				            
														</div>																			
											        <?php
											    }
											echo "</div>";
										}
										wp_reset_postdata();
									}
								?>
							</div>
						</div>
				    </section>
			<?php 	
		}
		else{
			?>
				<?php 
					get_header('website');  
				?>
					<?php get_template_part('partials/404-not-found'); ?>
			<?php
		}
	?>

<?php get_footer();
