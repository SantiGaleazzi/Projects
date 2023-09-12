<?php 
	$user = wp_get_current_user();

	if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ){
			get_header(); 
		?>
			<section class="pt-28 md:pt-16 pb-28 relative bg-blue-500"> 
				<div class="main-container">
					<div class="max-w-825 course-container archive-course-container">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</div>
				</div>
				<!-- Get Help Widget -->
					<?php get_template_part('partials/get-help-widget'); ?>
				<!-- Get Help Widget -->
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
