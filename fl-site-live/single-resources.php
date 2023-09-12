<?php

	get_header();

	$term_id = get_queried_object()->term_id;

?>

	<section class="pt-12 md:pb-12 px-4">
		<div class="container">
			<div class="flex flex-col md:flex-row">
				<div class="w-full md:w-1/2 md:pr-6">
					<?php if ( has_term('series', 'type') && has_term('', 'series') && get_field('series_player_media_id') ) : ?>

						<div class="video-single">
							<?php if ( get_field('series_media_type') === 'youtube') : ?>
								<iframe class="video-single" src="https://www.youtube.com/embed/<?php the_field('series_player_media_id'); ?>?rel=0&modestbranding=1&mute=1" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" id=”audio” allowfullscreen></iframe>
							<?php elseif ( get_field('series_media_type') === 'subsplash') : ?>
								<iframe src='https://subsplash.com/firstlibertyinstitute/embed/mi/+<?php the_field('series_player_media_id'); ?>?video&audio&info&logo_watermark=false&autoplay=true&origin=${window.location.hostname}' frameborder='0' webkitallowfullscreen mozallowfullscreenallowfullscreen style='position:absolute;top:0;left:0;width:100%;height:100%;'></iframe>
							<?php endif; ?>	
						</div>

					<?php elseif ( !has_term('series', 'type') && !has_term('', 'series') && get_field('youtube_id') || get_field('subsplash_id') ) : ?>

						<div class="video-single">
							<?php if ( get_field('youtube_id') ) : ?>
								<iframe class="video-single" src="https://www.youtube.com/embed/<?php the_field('youtube_id'); ?>?rel=0&modestbranding=1&mute=1" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" id=”audio” allowfullscreen></iframe>
							<?php elseif ( get_field('subsplash_id') ) : ?>
								<iframe src='https://subsplash.com/firstlibertyinstitute/embed/mi/+<?php the_field('subsplash_id'); ?>?video&audio&info&logo_watermark=false&autoplay=true&origin=${window.location.hostname}' frameborder='0' webkitallowfullscreen mozallowfullscreenallowfullscreen style='position:absolute;top:0;left:0;width:100%;height:100%;'></iframe>
							<?php endif; ?>	
						</div>

					<?php else : ?>

						<div class="thumb-single">
							<?php the_post_thumbnail('full'); ?>
						</div>

					<?php endif; ?>

					<div class="flex items-center text-gold-light mb-5 md:mb-0 mt-5 font-archive">
						<div class="font-light pr-4">
							Share
						</div>

						<div class="flex items-center">
							<div class="pr-3">
								<a rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" target="_blank">
									<i class="fab fa-facebook text-xl"></i>
								</a>
							</div>
							<div class="pr-3">
								<a rel="nofollow" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank">
									<i class="fab fa-twitter text-xl"></i>
								</a>
							</div>
							<div class="pr-3">
								<a rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&title=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank">
									<i class="fab fa-linkedin text-xl"></i>
								</a>
							</div>
							<div>
								<a rel="nofollow" href="mailto:?&amp;subject=<?php echo get_the_title(); ?>&amp;body=<?php echo get_permalink(); ?>" target="_blank">
									<i class="fas fa-envelope text-xl"></i>
								</a>
							</div>
						</div>
					</div>

					<?php if ( get_field('youtube_id') ) : ?>
						<div class="mt-6 mb-6 mb:mb-0 md:hidden">
							<a href="https://www.youtube.com/watch?v=<?php the_field('youtube_id'); ?>" target="_blank" rel="noopener noreferrer" class="text-white text-lg font-bold leading-none px-6 py-3 bg-red-500 rounded inline-block">Watch on YouTube</a>
						</div>
					<?php endif; ?>
				</div>

				<div class="w-full md:w-1/2 md:pl-6">
					<div class="text-lg text-gold-light mb-2">
						<?php the_date('M d, Y'); ?>
					</div>

					<div class="text-2xl md:text-3xl lg:text-4xl leading-tight text-white font-bold mb-5">
						<?php the_title(); ?>
					</div>

					<div class="text-white text-lg has-wysiwyg">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="px-4 py-12 bg-gray-900">
		<div class="container">
			<div class="text-white text-3xl font-bold mb-4">
				Recommended for you
			</div>
			
			<?php
					
				$custom_taxterms = wp_get_object_terms( $post->ID, 'resources-category', array('fields' => 'ids') );

				$args = array(
					'post_type' => 'resources',
					'post_status' => 'publish',
					'posts_per_page' => 5,
					'orderby' => 'rand',
					'tax_query' => array(
					    array(
						    'taxonomy' => 'resources-category',
						    'field' => 'id',
					        'terms' => $custom_taxterms
					    )
					),
					'post__not_in' => array( $post->ID ),
				);

				$related_items = new WP_Query( $args );

				if ( $related_items->have_posts() ) :
			?>
				<div class="flex flex-wrap gap-y-4">
					<?php
						while ( $related_items->have_posts() ) : $related_items->the_post();


					?>
							
						<div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 sm:px-2 flex group relative z-10">		
							<div class="w-full flex flex-col border-2 border-gray-900 hover:border-white rounded-lg transition-all duration-200 ease-in-out">
                                <a href="<?php the_permalink(); ?>">
								<div class="w-full h-40 bg-cover bg-center bg-no-repeat rounded-lg" style="background-image: url('<?php the_post_thumbnail_url('medium'); ?>');">
								</div>

								<div class="flex-auto flex flex-col items-stretch p-3">
									<div class="flex-auto text-white text-lg uppercase font-bold mb-2">
										<?php the_title(); ?>
									</div>

									<div class="flex-none text-sm text-gold-light">
										<span  class="underline">Watch Now</span> »
									</div>
								</div>
                                </a>
							</div>					
						</div>	

					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>
			<?php endif; ?>
		</div>
	</section>

<?php get_footer();
