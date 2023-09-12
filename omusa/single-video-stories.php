<?php
	get_header();

	$default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

?>

<section class="pt-16 md:pt-40 xl:pt-48">
	<div class="container bg-black-500-new shadow-2xl border-b-4 border-red-500">
		<div class="text-white-pure px-6 md:px-12 lg:px-24 pt-10 lg:pt-16 pb-32 bg-red-500">
			< <a href="/video-stories/" class="text-xs font-bold underline" >BACK TO VIDEO STORIES</a>
		</div>

		<div class="px-6 md:px-12 lg:px-24 -mt-32 pt-3">
			<div>	
				<!-- Post Copy -->
				<div class="bg-page shadow-2xl mb-12">

					<?php if ( get_field('video_stories_iframe') ) : ?>
						<div class="has-video mt-6">
							<?php the_field('video_stories_iframe'); ?>
						</div>
					<?php else: ?>
						<div>
							<img src="<?= get_the_post_thumbnail_url() ?: $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?> thumbnail" class="w-full" />
						</div>
					<?php endif; ?>
					

					<div id="story-section" class="px-6 sm:px-12 lg:px-24 pt-4">
						<div class="text-3xl md:text-4xl lg:text-5xl text-red-500 border-b border-separator font-roboto font-light leading-snug pb-4">
							<?php the_title(); ?>					
						</div>

						<div>
							<?php if ( get_the_content() ) : ?>
								<div class="text-default py-8 has-red-links has-wysiwyg border-b border-separator">
									<?php the_content(); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<div class="text-xs text-red-500 font-bold px-6 sm:px-12 lg:px-24 py-6 md:py-10">
						< <a href="/video-stories/" class="text-xs font-bold underline" >BACK TO VIDEO STORIES</a>
					</div>
				</div>
				<!-- Post Copy -->
			</div>
		</div>								
	</div>
</section>

<section class="px-6 py-10 md:py-16">
	<div class="container">
		<div class="text-center text-red-500 text-4xl font-roboto font-light mb-6 md:mb-8">
			Related Ukraine Updates
		</div>

		<div class="flex flex-wrap flex-col sm:flex-row">
			<?php
				$all_related_posts = new WP_Query( array(
						'post_type' => 'video-stories',
						'posts_per_page' => 3,
						'orderby' => 'rand',
						'status' => 'published',
						'post__not_in' => array( $post->ID )
					)
				);

				if ( $all_related_posts->have_posts() ) :
			?>
				<?php
					while ($all_related_posts->have_posts()) : $all_related_posts->the_post();  
					    $thumbnail_image = get_the_post_thumbnail_url();
				?>
					<div class="sm:w-1/2 lg:w-1/3 flex px-3 py-3">
						<article class="w-full bg-black-500-new shadow-2xl rounded flex flex-col">		
							<div class="thumb">
								<a href="<?php the_permalink(); ?>">
									<img src="<?= $thumbnail_image; ?>" alt="" class="w-full h-48 object-cover object-center">
								</a>
							</div>

							<div class="flex-auto px-6 py-4 bg-red-500">
								<div class="text-2xl text-white-pure font-bold leading-tight mb-1">
									<?= mb_strimwidth(get_the_title(), 0, 60, ''); ?>
								</div>					
							</div>	

							<div class="flex flex-col justify-between px-6">
								<div class="text-right pt-4 pb-4">
									<a href="<?php the_permalink(); ?>" class=" text-red-500 leading-none font-black">More About <?php the_field('video_stories_more_about_button'); ?> »</a>
								</div>
							</div>					
						</article>	
					</div>										
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer();
