<?php

$user = wp_get_current_user();

if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ){
		get_header(); 
	?>
		<div class="w-full bg-yellow-100 notes-template">
			<div class="container text-center pt-28 md:pt-16 pb-20 min-h-screen">
				<?php echo do_shortcode('[learndash_my_notes]');  ?> 
			</div>
		</div>
		<!-- Get Help Widget -->
			<?php get_template_part('partials/get-help-widget'); ?>
		<!-- Get Help Widget -->
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
