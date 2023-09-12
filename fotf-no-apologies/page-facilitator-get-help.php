<?php
	$user = wp_get_current_user();
	$more_title = get_field('more_title');
	$file = get_field('file');
?>
<?php
	if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ){
			get_header(); 
		?>
			<section class="single-post bg-yellow-100 pt-28 lg:pt-16">
				<div class="max-w-3xl mx-auto px-4 lg:px-6 tex-center pb-96">
					<h3 class="font-noto-extra-cond-black-italic text-orange-500 text-3xxl md:text-6xl text-center mt-3 mb-6">Get Help</h3>
					<img src="<?php echo bloginfo('template_url'); ?>/assets/images/deco-bar.png" alt="" class="mx-auto">
					<div class="w-full sm:w-96 lg:px-3 mx-auto get-help-form pb-12 pt-14">
						<?php  
							echo do_shortcode('[gravityform id="6" title="false" description="true" ajax="false"]');
						?>
					</div>
					<?php 
						if($more_title){
							?>
								<h3 class="font-noto-extra-cond-black-italic text-orange-500 text-3xxl md:text-6xl text-center mt-10 mb-6">
									<?= $more_title; ?>										
								</h3>
							<?php
						}
					?>
					<?php 
						if($file){
							?>
								<div class="w-100 relative h-10 text-center md:pt-4">
									<a href="<?php echo $file['url']; ?>" target="_blank" class="w-[190px] text-center bg-blue-500 text-white font-noto-cond-bold text-base leading-none py-3 leading-tight inline-block button-animation relative cursor-pointer no-underline mx-auto">Download PDF</a>
								</div>
							<?php
						}
					?>
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
