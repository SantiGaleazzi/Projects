<?php

	$post_terms = wp_get_post_terms( $post->ID, 'work-type' );
	$post_terms_ids = wp_list_pluck( $post_terms, 'term_id' );
	$post_terms_data = wp_list_pluck( $post_terms, 'term_id', 'name' );

	get_header();
	
?>

	<section class="px-5 py-16">
        <div class="container">
			<div class="mb-6">
				<div class="w-full md:w-1/2 xl:w-1/4">
					<?php if ( get_field('project_client_logo') ) : ?>
						<div class="flex items-center mb-6">
							<?php if ( get_field('project_client_logo') ) : ?>
								<div class="w-32">
									<img src="<?= get_field('project_client_logo')['url']; ?>" alt="<?= get_field('project_client_logo')['alt']; ?>">
								</div>
							<?php endif; ?>

							<?php if ( get_field('project_client_name') ) : ?>
								<div class="text-2xl lg:text-3xl font-semibold leading-none ml-3">
									<?php the_field('project_client_name'); ?>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( !post_password_required( $post->ID ) ) : ?>
						<h1 class="text-7xl font-bold mb-2">
							<?= str_replace('Protected:', '', get_the_title() ); ?>
						</h1>
					<?php endif; ?>
				</div>
			</div>
			
			<div class="has-wysiwyg mb-10">
				<?php the_content(); ?>
			</div>

			<?php
				if ( have_rows('tools_list') ) :
				$tooling_count = count( get_field('tools_list') );
			?>
				<div class="mb-6">
					<div class="flex items-center mb-3">
						<div class="text-3xl font-bold mr-4">
							<?php the_field('tools_title'); ?>
						</div>

						<div class="text-sm text-zinc-400 font-semibold leading-none px-3 py-1 bg-zinc-500/50 rounded-full">
							<?= $tooling_count; ?> 
						</div>
					</div>

					<div class="flex flex-wrap items-center gap-4">
						<?php while ( have_rows('tools_list') ) : the_row();  ?>
							<div class="flex items-center px-3 py-2 bg-zinc-800 rounded-full">
								<div class="flex-none w-7 h-7 bg-zinc-700/40 border-2 border-zinc-700 flex items-center justify-center rounded-full overflow-hidden mr-2">
									<?php if ( get_sub_field('icon') ) : ?>
										<img loading="lazy" class="rounded-full" src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('service_name'); ?>">
									<?php endif; ?>
								</div>
										
								<div class="text-sm font-semibold leading-none">
									<?php the_sub_field('service_name'); ?>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>


			<div>
				<?php
					if ( have_rows('services_list') ) :
					$services = get_field('services_list');
				?>
					<div class="mb-10">
						<div class="flex items-center mb-3">
							<div class="text-3xl font-semibold mr-4">
								<?php the_field('services_title'); ?>
							</div>

							<div class="text-sm text-zinc-400 font-semibold leading-none px-3 py-1 bg-zinc-500/50 rounded-full">
								<?= count( $services ); ?> 
							</div>
						</div>

						<div class="flex flex-wrap gap-x-4 gap-y-3">
							<?php while ( have_rows('services_list') ) : the_row();  ?>
								<div class="flex items-center">
									<div class="text-zinc-400 hover:text-white text-sm font-normal transition-colors duration-200 ease-in-out">
										<?php the_sub_field('name'); ?>
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				<?php endif; ?>

				<div class="pt-10 border-t border-zinc-700 first:border-t-0 first:pt-0 first:mt-0">
					<div class="text-2xl font-semibold mb-4">
						More from Me
					</div>

					<?php
						$taxonomy_terms = get_terms( array(
							'taxonomy' => 'work-type'
						));
					?>

					<?php foreach ( $taxonomy_terms as $term ) : ?>
						<div class="flex items-center mb-2 last:mb-0">
							<a class="font-normal text-zinc-400 hover:text-yellow-300 inline-flex cursor-pointer mr-2" href="<?= get_term_link( $term ); ?>">
								<?= $term->name; ?>
							</a>

							<div class="text-xs text-zinc-400 font-semibold leading-none px-3 py-1 bg-zinc-500/50 rounded-full">
								<?= $term->count; ?> 
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
        </div>
    </section>

	<?php
		$related_posts = new WP_Query(
			array(
				'post_type' => 'portfolio',
				'posts_per_page' => 4,
				'post__not_in' => array( get_the_ID() ),
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => 'work-type',
						'field' => 'term_id',
						'terms' => $post_terms_ids,
						'operator' => 'IN'
					)
				)
			)
		);
	?>
			
	<?php if ( $related_posts->have_posts() ) : ?>
		<section class="px-5 py-16 bg-zinc-800/50">
			<div class="container">
				<div class="text-center text-5xl lg:text-6xl font-semibold mb-6">
					Recomended for you
				</div>

				<div class="flex flex-wrap justify-center gap-y-4">
					<?php
						while ( $related_posts->have_posts() ) : $related_posts->the_post();
						$post_terms = wp_get_post_terms( $post->ID, 'work-type' );
					?>
						<div class="w-full sm:w-1/2 lg:w-1/3 group">
							<div>
								<a class="block cursor-pointer" href="<?php the_permalink(); ?>">
									<div class="h-64 sm:h-80 border border-zinc-900 group-hover:border-yellow-300 mb-4 transition-colors duration-200 ease-in-out overflow-hidden">
										<img class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-200 ease-in-out" src="<?= get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>" loading="lazy">
									</div>

									<div class="text-2xl font-bold group-hover:text-yellow-300 pr-5 truncate">
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
				</div>

				<?php if ( $related_posts->found_posts > 2 ) : ?>
					<div class="text-center mt-8">
						<a class="text-zinc-900 hover:text-yellow-300 text-lg font-semibold leading-none px-8 py-4 bg-yellow-300 hover:bg-yellow-300/10 border border-yellow-300 rounded-lg inline-block transition-colors duration-200 ease-in-out" href="<?= get_post_type_archive_link('portfolio'); ?>">
							View More
						</a>
					</div>
				<?php endif; ?>
			</div>
		</section>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

<?php get_footer();
