<?php 

	get_header();

	$default_post_thumbnail = get_field('settings_default_thumbnail', 'options');
?>

<section class="px-6 pt-20 md:pt-40 xl:pt-56 pb-12">
	<div class="container">
		<div>
			<?php get_template_part('partials/stories/filters') ?>
		</div>
		
		<div>
			<?php
			 	$args = array(
					'post_type' => 'stories',
					'orderby' => 'date',
					'post_status' => 'publish',
					'posts_per_page' => 10,
					'paged' => 1
				);

				// This scripts checks what filters have been selected and filters the query.
				if ( isset( $_GET['applied-filters'] ) ) {

					$filter_params = $_GET['applied-filters'];
					$filter_params = str_replace(',', ' ', $filter_params);
		
					// Categories taken from the filters.
					$all_workers = array();
					$workers = get_terms( array( 'taxonomy' => 'type-worker' ) );
		
					// If the category filter is selected then get only the categories that have been selected.
					if ( $workers ) {
		
						// Loop through the categories.
						foreach ( $workers as $worker ) {
		
							// If the category is selected on the filter option add it to the array, so we can filter after.
							if ( strpos($filter_params, (string)$worker->term_id) !== false ) {
		
								array_push( $all_workers, $worker->term_id );
		
							}
		
						}
		
						if ( is_countable( $all_workers ) && count( $all_workers ) > 0 ) {
		
							$args['tax_query'][] = array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'type-worker',
									'field' => 'id',
									'terms'=> $all_workers,
									'relation' => 'IN'
								)
							);
							
						}
		
					}
		
					// Regions taken from the filters.
					$all_regions = array();
					$regions = get_terms( array( 'taxonomy' => 'region') );
		
					// If the region filter is selected then get only the regions that have been selected.
					if ( $regions ) {
		
						// Loop through the regions.
						foreach ( $regions as $region ) {
		
							// If the region is selected on the filter option add it to the array, so we can filter after.
							if ( strpos( $filter_params, (string)$region->term_id ) !== false ) {
		
								array_push( $all_regions, $region->term_id );
		
							}
		
						}
		
						// Add the selected region as filter for the posts.
						if ( is_countable( $all_regions ) && count( $all_regions ) > 0 ) {
		
							$args['tax_query'][] = array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'region',
									'field' => 'id',
									'terms'=> $all_regions,
									'relation' => 'IN'
								)
							);
							
						}
		
					}

					// Impacts taken from the filters.
					$all_impacts = array();
					$impacts = get_terms( array( 'taxonomy' => 'type-impact') );
		
					// If the region filter is selected then get only the regions that have been selected.
					if ( $impacts ) {
		
						// Loop through the regions.
						foreach ( $impacts as $impact ) {
		
							// If the region is selected on the filter option add it to the array, so we can filter after.
							if ( strpos($filter_params, (string)$impact->term_id) !== false ) {
		
								array_push($all_impacts, $impact->term_id);
		
							}
		
						}
		
						// Add the selected region as filter for the posts.
						if ( is_countable( $all_impacts ) && count( $all_impacts ) > 0 ) {
		
							$args['tax_query'][] = array(
								'relation' => 'AND',
								array(
									'taxonomy' => 'type-impact',
									'field' => 'id',
									'terms'=> $all_impacts,
									'relation' => 'IN'
								)
							);
							
						}
		
					}
		
				}

				$stories_query = new WP_Query( $args );

				if ( $stories_query->have_posts() ) :

					$counter = 0;
				
				?>
					<div id="stories-data" class="stories_found flex flex-wrap mb-10 filter-result">

						
						<?php while ( $stories_query->have_posts() ) : $stories_query->the_post();

								$counter++;
								$thumbnail_image = get_the_post_thumbnail_url();

							?>

								<?php if ( $counter == 1 ) : ?>

									<div class="story-item w-full flex flex-col md:flex-row rounded-md bg-black-500-new overflow-hidden shadow-2xl mb-4">
										<div class="md:w-2/3 h-40 md:h-auto bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>');">
										</div>

										<div class="md:w-1/3">
											<div class="p-4 sm:px-6 lg:px-8 sm:py-6 lg:h-48 xl:h-56 flex flex-col justify-end bg-red-500">
												<div>
													<div class="text-white-pure text-2xl font-bold mb-1">
														<a href="<?php the_permalink(); ?>" target="_blank"><?php the_title(); ?></a>
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
											</div>

											<div class="p-4 sm:p-6 lg:p-8">
												<div class="text-default text-sm pb-5 border-b border-separator mb-5">
													<?php the_excerpt(); ?>
												</div>

												<div class="text-center">
													<?php $region = get_the_terms( $post->ID, 'region' ); ?>
													<a href="<?php the_permalink(); ?>" target="_blank" class="text-center text-white-pure text-xl font-black leading-none px-8 py-3 bg-orange-500 inline-block">More about <?php the_field('stories_more_about_button'); ?> »</a>
												</div>
											</div>
										</div>
									</div>
								
								<?php else : ?>
									<div class="story-item sm:w-1/2 lg:w-1/3 flex px-3 py-3">
										<article <?php post_class(esc_attr('bg-black-500-new shadow-2xl rounded flex flex-col')); ?>>		
											<div class="thumb">
												<a href="<?php the_permalink(); ?>" target="_blank">
													<img src="<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?>" class="w-full h-48 object-cover object-center">
												</a>
											</div>

											<div class="px-6 py-4 bg-red-500">
												<div class="text-2xl text-white-pure font-bold leading-tight mb-1">
													<a href="<?php the_permalink(); ?>" target="_blank"><?= mb_strimwidth(get_the_title(), 0, 60, '...'); ?></a>
												</div>

												<div class="flex flex-wrap text-xs text-orange-500 font-bold uppercase">
													<?php
														// Post taxonomies
														$taxonomies = array('type-worker', 'region', 'type-impact');
														$taxo_string = '';

														foreach ( $taxonomies as $taxonomy ) {

															$taxonomies_associated = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) );
																	
															if ( !empty( $taxonomies_associated ) ) {
																	
																foreach ( $taxonomies_associated as $term ) {
																	
																	$taxo_string .= $term . '/';

																}
																	
															}
														}

														$taxo_string = substr_replace( $taxo_string, '', -1 );
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
													<a href="<?php the_permalink(); ?>" target="_blank" class=" text-red-500 leading-none font-black">More about <?php the_field('stories_more_about_button'); ?> »</a>
												</div>
											</div>					
										</article>	
									</div>
								<?php endif; ?>

						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>

					</div>

					<?php if ( $stories_query->max_num_pages > 1 ) : ?>
						<div class="w-full load-more-stories text-center mt-6">
							<div class="cursor-pointer">
								<button type="button" class="text-white-pure text-lg font-bold leading-none px-10 py-4 bg-red-500 relative">See More <div class="loading-spinner absolute top-0 right-0"></div></button>
							</div>
						</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php get_footer();
