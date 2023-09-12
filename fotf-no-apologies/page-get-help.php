<?php
	$user = wp_get_current_user();
?>
<?php
	if ( in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ){
			get_header(); 
		?>
			<section class="single-post bg-yellow-100 pt-28 lg:pt-16">
				<div class="max-w-3xl mx-auto px-4 lg:px-6 tex-center pb-96">
					<h3 class="font-noto-extra-cond-black-italic text-orange-500 text-3xxl md:text-6xl text-center mt-3 mb-6">Get Help</h3>
					<img src="<?php echo bloginfo('template_url'); ?>/assets/images/deco-bar.png" alt="" class="mx-auto">
					<div class="w-full sm:w-96 lg:px-3 mx-auto get-help-form pb-12 pt-14">
						<?php  
							echo do_shortcode('[gravityform id="4" title="false" description="true" ajax="false"]');
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
