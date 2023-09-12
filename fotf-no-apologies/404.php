<?php 
	$user = wp_get_current_user();
?>
	<?php
		if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles )  ){
				get_header(); 
			?>
			<?php
		}
		else{
			get_header('website');  
		}
	?>
    <section class="px-5 text-center bg-yellow-100 relative z-10 <?php if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ){ echo "pt-36";} else{ echo("pt-36");}?>">
        <div class="main-container text-center pb-40 md:pb-72 mt-10 md:mt-0">
            <h1 class="font-noto-extra-cond-black-italic text-orange-500 text-5xl md:text-6xl mt-4 mb-14">
                Oops! This page doesn’t exist.
            </h1>
            <img src="<?php echo bloginfo('template_url'); ?>/assets/images/404-error-page-image.png" class="mx-auto">
            <div class="mt-16 relative h-14 mx-auto w-full sm:w-56">
                <a href="<?= get_home_url(); ?>" class="w-full sm:w-56 bg-purple-400 text-center leading-none font-noto-cond-bold no-underline text-white text-base py-4 block mx-auto button-animation absolute left-0 top-0">Go Back to the Homepage</a>
            </div>
        </div>
    </section>

    <?php get_template_part('partials/lightbox-login'); ?>
    
<?php get_footer();
