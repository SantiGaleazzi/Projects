<?php
	$user = wp_get_current_user();

	if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ){
			get_header(); 
		?>
			<section class="pt-28 md:pt-16 pb-32 md:pb-64 group-management bg-yellow-100">
				<div class="main-container">
					<?php echo do_shortcode('[wdm_group_users]');  ?> 
				</div>
				<!-- Get Help Widget -->
					<?php get_template_part('partials/get-help-widget'); ?>
				<!-- Get Help Widget -->
			</section> 

			<!-- Enroll new users -->
				<?php get_template_part('partials/lightbox-enroll-users'); ?>
			<!-- Enroll new users -->
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
