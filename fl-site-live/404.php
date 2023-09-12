<?php get_header(); ?>

<div class="w-full pt-3">
	<div class="container mx-auto pt-16 pb-20 text-white">
		<div class="flex justify-center md:justify-start items-end max-w-lg mx-auto">
			<div class="font-pt-serif text-yellow-500 text-6xl md:text-7xl mr-4">Oops!</div>
			<div>
				<img  alt="404" src="<?php echo bloginfo('template_url'); ?>/assets/images/404.png">
				<div class="font-roboto-condensed text-yellow-500 text-5xl md:text-5xxl mb-2 md:pb-7">404</div>
			</div>
		</div>
		<div class="max-w-lg mx-auto">
			<div class="max-w-xs font-roboto-condensed text-2xl text-left leading-relaxed">
				We can’t seem to find the page you’re looking for.
			</div>
		</div>
	</div>
</div>
<div class="w-full">
	<div class="container mx-auto pb-12">
		<div class="text-white font-roboto-condensed text-4xl text-left font-semibold tracking-widest uppercase pt-12 pb-7">you may be interested in</div>
		<div class="w-full flex flex-wrap justify-center archive-categ">
			<?php
                setup_postdata( $post ); 
				 	$args = array(
					'post_type' => 'resources',
					'post_status' => 'publish',
					'posts_per_page' => 3,
					'paged' => get_query_var( 'paged' ),					
					);  
				query_posts($args);
				if (have_posts()) : while (have_posts()) :the_post(); ?>							
							<div>
								<?php get_template_part('partials/post', 'item') ?>	
							</div>			
						<?php endwhile; ?>	
											
					<?php
					wp_reset_query();
				?>
				<?php endif;             
			?>
		</div>	
	</div>
</div>

<?php get_footer(); ?>