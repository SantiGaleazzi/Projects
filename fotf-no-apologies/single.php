<?php 
	$resource = get_field('resource');
	$user = wp_get_current_user();

	$current_queried_post_type = get_post_type( get_queried_object_id() );
?>

	<?php
		if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ){
				get_header(); 
			?>
				<section class="single-post pt-28 lg:pt-16 bg-yellow-100 min-h-screen">
					<div class="main-container">
						<?php 
							if($current_queried_post_type == 'students'){
								?>
									<span class="font-noto-extra-cond-bold text-sm md:text-xl text-orange-500">« <a href="<?php bloginfo('url'); ?>/students" class="underline">See all Articles</a></span>
								<?php
							}
							elseif($current_queried_post_type == 'coaches'){
								?>
									<span class="font-noto-extra-cond-bold text-sm md:text-xl text-orange-500">« <a href="<?php bloginfo('url'); ?>/facilitators-guide" class="underline">See all Articles</a></span>
								<?php
							}
						?>
					</div>
					<div class="max-w-2xl mx-auto px-7 mt-14 pb-20">
						<div class="font-noto-extra-cond-bold text-sm text-center uppercase text-orange-500 flex items-center justify-center mb-7">
							<?php 
								$term_list_coach = get_the_terms($post->ID, 'coaches-topic');
								if ( !empty( $term_list_coach ) ){
									$types_coach ='';
									foreach($term_list_coach as $term_single) {
										?>
											<a href="<?php bloginfo('url'); ?>/facilitators-guide" class="mr-5 no-underline hover:text-yellow-500 hover:underline post-terms">
												<?php echo $term_single->name; ?>
											</a>
										<?php
									}									
								}

								$term_list_student = get_the_terms($post->ID, 'students-topic');
								if ( !empty( $term_list_student ) ){
									$types_student ='';
									foreach($term_list_student as $term_single) {
									    ?>
											<a href="<?php bloginfo('url'); ?>/<?php echo $current_queried_post_type; ?>#<?php echo $term_single->slug; ?>" class="mr-5 no-underline hover:text-yellow-500 hover:underline post-terms">
												<?php echo $term_single->name; ?>
											</a>
										<?php
									}
								}								
							?>
						</div>
						<h1 class="font-noto-extra-cond-black-italic text-orange-500 text-4xxl md:text-6xl text-center mb-3"><?php the_title(); ?></h1>
						<img src="<?php echo bloginfo('template_url'); ?>/assets/images/deco-bar-big.png">
						<div class="mt-5 mb-10 md:mb-24 text-styles text-gray-500">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
						</div>			
						<?php 
							if(is_singular( 'students' )){
								if($resource){
									?>
										<img src="<?php echo bloginfo('template_url'); ?>/assets/images/deco-bar-big.png">	
										<div class="pt-7">
											<p class="text-xl font-noto-extra-cond-bold text-blue-500">Resource</p>
											<p class="text-xl font-noto-extra-cond-bold text-gray-400"><?= $resource; ?></p>
										</div>	
									<?php
								}
							}
						?>				
						<div class="flex flex-row justify-between align-center items-start sm:items-center text-blue-500 pt-6">
								<?php
									$next_post = get_adjacent_post(false, '', false);
									if(!empty($next_post)) {
									echo '<a class="text-lg cursor-pointer no-underline font-bold" href="' . get_permalink($next_post->ID) . '" title="' . $next_post->post_title . '">' . '« Previous article</a>'; }
									$prev_post = get_adjacent_post(false, '', true);
									if(!empty($prev_post)) {
									echo '<a class="text-blue text-lg cursor-pointer no-underline font-bold" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_post->post_title . '">' . 'Next article »</a>'; }
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

<?php get_footer(); ?>

