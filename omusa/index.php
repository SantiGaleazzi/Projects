<?php 

	get_header();

	$default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

?>

	<section class="section-quoted px-6 pt-20 md:pt-40 xl:pt-56 pb-12">
		<div class="container">
			
			<div class="headline text-default mx-auto">
				<?php the_field('settings_default_title', 'option'); ?>
			</div>

			<div class="mt-12 md:mt-16">
				<?php
					if ( have_posts() ) :

						$counter = 0;
					
					?>
						<div id="video-stories-data" class="stories_found flex flex-wrap flex-col sm:flex-row mb-10 filter-result">

							
							<?php while ( have_posts() ) : the_post();

									$counter++;
									$thumbnail_image = get_the_post_thumbnail_url();

								?>

									<?php if ( $counter === 1 ) : ?>

										<div class="w-full">
											<div class="story-item w-full flex flex-col md:flex-row rounded-md bg-black-500-new overflow-hidden shadow-2xl mb-4">
												<div class="md:w-2/3 h-40 md:h-auto bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $thumbnail_image ?: $default_post_thumbnail['url']; ?>');">
												</div>
		
												<div class="md:w-1/3">
													<div class="p-4 sm:px-6 lg:px-8 sm:py-6 lg:h-48 xl:h-56 flex flex-col justify-end bg-red-500">
														<div>
															<div class="text-white-pure text-2xl font-bold mb-1">
																<a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a>
															</div>
														</div>
													</div>
		
													<div class="p-4 sm:p-6 lg:px-8 lg:pt-6 lg:pb-8">
		
														<div class="text-default text-sm pb-5 border-b border-separator mb-5">
															<?php the_excerpt(); ?>
														</div>
		
														<div class="text-center">
															<a href="<?php the_permalink(); ?>" target="_blank" class="text-center text-white-pure text-xl font-black leading-none px-8 py-3 bg-orange-500 inline-block">More about <?php the_field('video_stories_more_about_button'); ?> »</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php else : ?>
										<div class="story-item sm:w-1/2 lg:w-1/3 flex sm:px-3 py-3">
											<article class="w-full bg-black-500-new shadow-2xl rounded flex flex-col">		
												<div class="thumb">
													<a href="<?php the_permalink(); ?>" target="_blank">
														<img src="<?= $thumbnail_image ?: $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?>" class="w-full h-48 object-cover object-center">
													</a>
												</div>

												<div class="flex-auto px-6 py-4 bg-red-500">
													<div class="text-2xl text-white-pure font-bold leading-tight mb-1">
														<a href="<?php the_permalink(); ?>" target="_blank"><?= mb_strimwidth(get_the_title(), 0, 60, '...'); ?></a>
													</div>					
												</div>	

												<div class="flex flex-col justify-between px-6">
													<div class="text-right pt-4 pb-4">
														<a href="<?php the_permalink(); ?>" target="_blank" class=" text-red-500 leading-none font-black">More about <?php the_field('video_stories_more_about_button'); ?> »</a>
													</div>
												</div>					
											</article>	
										</div>
									<?php endif; ?>

							<?php endwhile; ?>
						</div>
				<?php endif; ?>
			</div>
		</div>
	</section>

<?php get_footer();
