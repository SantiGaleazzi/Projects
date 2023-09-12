<?php
	get_header();

	$default_post_thumbnail = get_field('settings_default_thumbnail', 'options');
?>

<section class="pt-32 px-6 md:pt-40 xl:pt-56 pb-12">
	<div class="container">
		<div>
			<?php get_template_part('partials/filters/filters') ?>
		</div>
		<div id="response" class="flex flex-wrap mb-10 filter-result">
			<div class="flex flex-wrap mb-10 filter-result">
				<?php if (have_posts() ) : $counter = 0; ?>
					<?php
						while (have_posts() ) :the_post();
						$counter++;
						$thumbnail_image = get_the_post_thumbnail_url();
					?>
						<?php if ($counter == 1) : ?>
							<div class="w-full flex flex-col md:flex-row rounded-md bg-black-500-new overflow-hidden shadow-2xl mb-4">
								<div class="md:w-2/3 h-40 md:h-auto bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>');">
								</div>

								<div class="md:w-1/3">
									<div class="p-4 sm:px-6 lg:px-8 sm:py-6 lg:h-48 xl:h-56 flex flex-col justify-end bg-red-500">
										<div>
											<div class="text-white-pure text-2xl font-bold mb-1">
												<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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
											<?php

												$region = get_the_terms( $post->ID, 'region' );
												$term_link = get_term_link($region[0]->term_id);
												
											?>
											<a href="<?= $term_link; ?>" class="text-center text-white-pure text-xl font-black leading-none px-8 py-3 bg-orange-500 inline-block">More About <?php the_field('stories_more_about_button'); ?> »</a>
										</div>
									</div>
								</div>
							</div>
						
						<?php else : ?>
							<div class="sm:w-1/2 lg:w-1/3 flex px-3 py-3">
								<article <?php post_class(esc_attr('bg-black-500-new shadow-2xl rounded flex flex-col')); ?>>		
									<div class="thumb">
										<a href="<?php the_permalink() ?>">
											<img src="<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?>" class="w-full h-48 object-cover object-center">
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
						<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
			
			<?php if ( $wp_query->max_num_pages > 1 ) : ?>
				<div class="w-full load-more-stories text-center">
					<img src="<?= get_template_directory_uri(); ?>/assets/images/red-chevron.png" alt="Load More Stories" class="inline-block cursor-pointer" />
				</div>
			<?php endif; ?>
			</div>
	</div>
</section>
<?php get_footer();
