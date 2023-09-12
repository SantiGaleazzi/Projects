<?php 
	$user = wp_get_current_user();

	if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ){
			get_header();  
		?>
			<section class="pt-96 md:pt-12 pb-28 w-full relative topic-single-page"> 
				<div class="main-container pt-32 md:pt-0 <?php if ( in_array( 'subscriber', (array) $user->roles ) ){ echo "pt-0";} ?>">
					<div class="course-progress-bar text-left mb-6 lg:mb-16">
						<?php echo do_shortcode('[learndash_course_progress]'); ?>
					</div>
					<div class="flex flex-col lg:flex-row items-center lg:items-start">
						<div class="course-sidebar">
							<?php echo do_shortcode('[course_content]'); ?> 
						</div>						
						<div class="course-container course-content quiz-single-content text-styles w-full ml-6">
							<div class="border-b border-gray-400 mb-3">
								<a href="javascript:history.back()" class="back-to-course mb-4 block">« Back to Course Listing</a>
							</div>
							<h2 class="topic-title"><?php the_title(); ?></h2>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
						</div>
					</div>
				</div>
				<?php get_template_part('partials/get-help-widget'); ?>
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
