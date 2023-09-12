<?php
	$user = wp_get_current_user();
		if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ){
				get_header(); 
			?>
				<section class="pt-28 lg:pt-16 bg-yellow-100">
					<div class="main-container">
						<h2 class="font-noto-extra-cond-black-italic text-orange-500 text-3xl md:text-6xl mb-6"><?php the_title(); ?></h2>
						<a href="<?php bloginfo('url'); ?>/my-notes" class="w-60 bg-blue-400 text-center text-white font-noto-cond-bold text-xl no-underline block mb-7 py-3 px-3 platform-hover">
							Back to All Notes
						</a>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</div>
				</section>
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
