	<?php
		get_header();
		$term = get_queried_object();
		$term_name = get_term( $term->term_id )->name;
		$term_slug = get_term( $term->term_id )->slug;

		$area_intro_button = get_field('area_intro_button', $term);
		$area_intro_button_target = $area_intro_button['target'] ? $area_intro_button['target'] : '_self';

		$area_picture_side_image = get_field('area_picture_side_image', $term);
		$area_featured_side_image = get_field('area_featured_side_image', $term);
		$area_countries_map = get_field('area_countries_map', $term);

		$default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

	?>

		<section class="section-quoted pt-24 md:pt-48 xl:pt-64 <?php if ( $area_picture_side_image ) : ?> pb-40 <?php endif; ?> md:pb-16 ">
			<div class="container">
				<div class="flex lg:pl-24">
					<div class="md:w-1/2 xl:w-2/5 xl:pr-6">
						<div class="headline text-default">
							<?= the_field('area_intro_title', $term); ?> <strong><?= $term_name; ?></strong>
						</div>

						<div class="text-default">
							<?php the_field('area_intro_description', $term); ?>
						</div>

						<?php if ( $area_intro_button ) : ?>
							<div class="mt-8">
								<a href="<?php if ( !$area_intro_button['url'] ) : ?>#countries-list<?php else: echo $area_intro_button['url']; ?><?php endif; ?>" target="<?php esc_attr( $area_intro_button_target ); ?>" class="text-lg text-center text-white-pure leading-none font-black px-6 py-4 bg-red-500 cursor-pointer inline-block"><?= $area_intro_button['title']; ?></a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>
		
		<section class="px-6">
			<div class="container">
				<div class="px-6 lg:px-0 pt-8 pb-6 sm:pb-32 bg-red-500 rounded-md">
					<div class="w-full lg:w-4/5 flex items-center flex-col-reverse sm:flex-row relative mx-auto">
						<div class="sm:w-1/2 xl:pr-4 mt-4 sm:mt-0">
							<div class="text-2xl md:text-3xl text-white-pure font-roboto font-light">
								<?php the_field('area_picture_title', $term); ?>
							</div>
						</div>

						<?php if ( $area_picture_side_image ) : ?>
							<div class="sm:w-1/2 lg:w-auto sm:absolute bottom-0 right-0 lg:mr-4 -mt-32 sm:-mt-0 sm:-mb-12 md:-mb-8 lg:-mb-12">
								<img src="<?= $area_picture_side_image['url']; ?>" alt="<?= $area_picture_side_image['alt']; ?>">
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

		<section class="pb-16 md:pb-0">
			<div class="container px-6 lg:px-0">
				<div class="w-full lg:w-4/5 has-video mt-6 sm:-mt-24 lg:-mt-36 xl:-mt-40 mx-auto">
					<div class="w-full h-full absolute top-0">
						<?php the_field('area_picture_video', $term); ?>
					</div>
				</div>
			</div>
		</section>

		<section class="px-6 py-16 bg-gray-150-new relative">
            <div class="container">
                <div class="flex justify-end">
                    <div class="sm:w-3/5 lg:w-1/2 xl:w-2/5 relative z-10">
                        <div class="text-3xl text-wysiwyg font-roboto font-light leading-none mb-6">
                            <?php the_field('area_featured_title', $term); ?>
                        </div>

                        <div class="text-default">
                            <?php the_field('area_featured_description', $term); ?>
                        </div>
                    </div>
                </div>
            </div>

			<?php if ( $area_featured_side_image ) : ?>
            	<div class="hidden sm:block sm:w-3/5 md:w-3/4 lg:w-3/4 xl:w-3/5 h-full bg-cover lg:bg-contain sm:bg-right-top lg:bg-left-top bg-no-repeat absolute top-0 left-0 md:-ml-32 lg:-ml-20 xl:ml-0" style="background-image: url('<?= $area_featured_side_image['url']; ?>');"></div>
			<?php endif; ?>
        </section>

		<?php
			$continent_areas = new WP_Query( array(
					'post_type' => 'continents',
					'orderby' => 'title',
					'order'   => 'ASC',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'areas',
							'field' => 'slug',
							'terms' => $term_slug
						)
					)	
				)
			);
		?>

		<?php if ( $continent_areas->have_posts() ) : ?>
			<section id="countries-list" class="px-6">
				<div class="container py-12 border-b border-separator">
					<div class="flex flex-col sm:flex-row justify-between">
						<div class="sm:w-2/5 lg:pr-6">
							<div class="text-3xl md:text-4xl text-red-500 font-roboto font-light leading-10 mb-6">
								<?php the_field('area_countries_title', $term); ?> <strong><?= $term_name; ?></strong>
							</div>

							<div>
								<?php
									while ($continent_areas->have_posts()) : $continent_areas->the_post();
									$flag_image = get_field('country_flag');
								?>
									<div class="mb-1">
										<a href="<?php the_permalink(); ?>" class="inline-flex items-center">
											<?php if ( $flag_image ) : ?>
												<div class="mr-2">
													<img src="<?= $flag_image['url']; ?>" alt="<?= $flag_image['alt']; ?>">
												</div>
											<?php endif; ?>

											<div class="text-default font-roboto font-light">
												<?php the_title(); ?> »
											</div>
										</a>
									</div>
									<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>			
							</div>
						</div>
						
						<?php if ( $area_countries_map ) : ?>
							<div class="sm:w-3/5 lg:w-1/2">
								<img src="<?= $area_countries_map['url']; ?>" alt="<?= $area_countries_map['alt']; ?>">
							</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		<?php endif; ?>
		
		<?php
			$area_stories = new WP_Query( array(
					'post_type' => 'stories',
					'posts_per_page' => 3,
					'tax_query' => array(
						array(
							'taxonomy' => 'region',
							'field' => 'name',
							'terms' => strtolower($term_name)
						)
					)	
				)
			);
		?>

		<?php if ( $area_stories->have_posts() ) : ?>
			<section class="py-10">
				<div class="container">
					<div class="text-3xl md:text-4xl text-center text-red-500 font-roboto font-light leading-none mb-8">
						<?php the_field('area_stories_title', $term); ?> <strong><?= $term_name; ?></strong>
					</div>

					<div class="flex flex-wrap">
						<?php
							while ( $area_stories->have_posts() ) :  $area_stories->the_post();
							$thumbnail_image = get_the_post_thumbnail_url();
						?>
							<div class="sm:w-1/2 lg:w-1/3 flex px-3 py-3">
								<article <?php post_class(esc_attr('bg-black-500-new shadow-2xl rounded flex flex-col')); ?>>		
									<div class="thumb">
										<a href="<?php the_permalink(); ?>">
											<img src="<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?>"" class="w-full h-48 object-cover object-center">
										</a>
									</div>

									<div class="px-6 py-4 bg-red-500">
										<div class="text-2xl text-white-pure font-bold leading-tight mb-1">
											<a href="<?php the_permalink(); ?>"><?= mb_strimwidth(get_the_title(), 0, 60, '...'); ?></a>
										</div>

										<div class="flex flex-wrap text-xs text-orange-500 font-bold uppercase">
											<?php
												// Post taxonomies
												$taxonomies = array('type-worker', 'region', 'type-impact');
												$taxo_string = '';

												foreach($taxonomies as $taxonomy) {

													$taxonomies_associated = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) );
															
													if ( !empty($taxonomies_associated) ) {
															
														foreach ( $taxonomies_associated as $term) {
															
															$taxo_string .= $term . '/';

														}
															
													}
												}

												$taxo_string = substr_replace($taxo_string, '', -1);
												$taxo_string = str_replace('/', '<span class="text-white-pure px-1">/</span>', $taxo_string);
											?>
											<?= $taxo_string ? $taxo_string : '&nbsp;'; ?>
										</div>						
									</div>

									<div class="h-full flex flex-col justify-between px-6">
										<div class="text-default text-sm leading-6 pt-5 mb-4">
											<?= mb_strimwidth(get_the_excerpt(), 0, 145, '...'); ?>
										</div>

										<div class="text-right pt-4 pb-4 border-t border-white-300-new ">
											<a href="<?php the_permalink(); ?>" class=" text-red-500 leading-none font-black">More About <?php the_field('stories_more_about_button'); ?> »</a>
										</div>
									</div>					
								</article>
							</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</div>
				</div>
			</section>
		<?php endif; ?>

	<?php get_footer();
