<?php

	get_header();

	$default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

?>


	<section class="py-16 md:pt-40 lg:pt-48">
		<div class="container">

			<div class="text-red-500 px-6">
				< <a href="/internships/" class=" text-xs font-bold underline" >BACK TO INTERNSHIPS</a>
			</div>

			<div class="flex flex-wrap">
				
				<?php

					$args = array(
						'post_type' => 'videos',
						'orderby' => 'date',
						'post_status' => 'publish',
						'posts_per_page' => 9,
						'paged' => 1
					);

					$videos_query = new WP_Query( $args );
					
					if ( $videos_query->have_posts() ) :
					
				?>
						
					<div class="internships-videos flex flex-wrap flex-col sm:flex-row">
							
						<?php

							while ( $videos_query->have_posts() ) : $videos_query->the_post();

								$thumbnail_image = get_the_post_thumbnail_url();

						?>

								<div class="intern-video w-full sm:w-1/2 md:w-1/3 flex p-3">
									<div class="w-full bg-white-pure rounded-lg overflow-hidden shadow-2xl flex flex-col">
										<div class="py-32 bg-top bg-cover bg-no-repeat relative" style="background-image: url('<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>');">
											<?php if ( get_field('internship_stories_video_id') ) : ?>
												<div class="play-video w-14 h-14 flex items-center justify-center bg-red-500 rounded-full absolute left-0 bottom-0 ml-5 mb-5 cursor-pointer" data-video-id="<?php the_field('internship_stories_video_id'); ?>">
													<i class="fas fa-play text-white-pure text-3xl leading-none pl-1"></i>
												</div>
											<?php endif; ?>
										</div>

										<div class=" text-white-pure text-xl lg:text-2xl leading-none font-bold p-4 bg-red-500">
											<?php the_title(); ?>
										</div>

										<div class="flex-auto text-sm p-4">
											<?php the_excerpt(); ?>
										</div>
									</div>
								</div>
										
							<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>

					</div>
							
					<?php if ( $videos_query->max_num_pages > 1 ) : ?>
						<div class="w-full load-more-video-stories text-center mt-5">
							<div>
								<img src="<?= get_template_directory_uri(); ?>/assets/images/red-chevron.png" alt="Load More" class="inline-block cursor-pointer" />
							</div>

							<input type="hidden" id="current_videos_page" name="page_number" value="1">
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>

		</div>
	</section>

	<div class="internship-video-lightbox w-full h-full px-4 py-10 inset-0 fixed flex items-center justify-center z-50">
        <div class="close-ligtbox w-full h-full bg-lightbox absolute z-50"></div>

        <div class="w-full max-w-3xl h-auto bg-white-pure border-t-8 border-b-8 border-red-500 rounded relative z-50">
            <div class="close-ligtbox w-8 h-8 flex items-center justify-center bg-black-700-new rounded-full absolute top-0 right-0 -mt-4 -mr-4 cursor-pointer z-10">
                <i class="fas fa-times text-white-pure"></i>
            </div>

            <div class="h-full overflow-y-auto has-video">
                <iframe src="" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen allow="autoplay"></iframe>
            </div>
        </div>
    </div>
	
<?php get_footer();
