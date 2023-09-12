<?php

	/**
	 * Template Name: Work Type
	*/

	$taxonomy_terms = get_terms( array(
		'taxonomy' => 'work-type'
	));
	$taxonomy_terms_ids = wp_list_pluck( $taxonomy_terms, 'term_id', 'name' );

	get_header();

?>

	<section class="px-5 py-16">
		<div class="container divide-y divide-zinc-700">
			<?php foreach ( $taxonomy_terms_ids as $name => $id ) : ?>
				<div class="first:pt-0 pt-12 mb-12 last:mb-0">
					<?php
						$posts = new WP_Query(
							array(
								'post_type' => 'portfolio',
								'posts_per_page' => -1,
								'orderby' => 'name',
								'tax_query' => array(
									array(
										'taxonomy' => 'work-type',
										'field' => 'term_id',
										'terms' => $id,
									)
								)
							)
						);
					?>
							
					<?php if ( $posts->have_posts() ) : ?>
						<div class="flex items-center mb-10">
							<div class="text-3xl font-semibold mr-4">
								<?= $name; ?>
							</div>

							<div class="text-sm text-zinc-400 font-semibold leading-none px-3 py-1 bg-zinc-500/50 rounded-full">
								<?= $posts->post_count; ?> 
							</div>
						</div>

						<div class="flex flex-wrap">
							<?php
								while ( $posts->have_posts() ) : $posts->the_post();
								$post_terms = wp_get_post_terms( $post->ID, 'work-type' );
							?>
								<div class="w-full sm:w-1/2 lg:w-1/3 group">
									<div>
										<a class="block cursor-pointer" href="<?php the_permalink(); ?>">
											<div class="h-64 sm:h-80 border border-zinc-900 group-hover:border-yellow-300 mb-4 transition-colors duration-200 ease-in-out overflow-hidden">
												<img class="w-full h-full object-cover group-hover:scale-105 group-hover:rotate-2 transition-transform duration-150 ease-in-out" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>" loading="lazy">
											</div>

											<div class="text-2xl font-bold group-hover:text-yellow-300">
												<?php the_title(); ?>
											</div>
										</a>
									</div>
			
									<?php if ( !empty( $post_terms ) ) : ?>
										<div class="flex items-center gap-3">
											<?php foreach ( $post_terms as $term ) : ?>
												<div class="leading-none">
													<a class="text-zinc-400 hover:text-zinc-300 font-normal transition-colors duration-200 ease-in-out" href="<?= get_term_link($term); ?>">
														<?= $term->name ?>
													</a>
												</div>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						</div>
					<?php endif; ?>
				</div>
			<?php endforeach; ?>
		</div>
	</section>

<?php get_footer();
