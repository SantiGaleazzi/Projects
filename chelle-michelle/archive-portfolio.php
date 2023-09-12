<?php get_header(); ?>

    <section class="px-5 py-16">
        <div class="container">
            <h1 class="text-6xl font-semibold mb-10">Work</h1>

			<div class="flex flex-col md:flex-row items-start gap-x-8 gap-y-10 lg:gap-x-10">
				<div class="w-full md:w-3/4">
					<?php if ( have_posts() ) : ?>
						
						<div class="flex flex-wrap gap-y-4">
							<?php
								while ( have_posts() ) : the_post();
								$post_terms = wp_get_post_terms( $post->ID, 'work-type' );
							?>
							<div class="w-full lg:w-1/2 group">
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

					<?php else : ?>

						<div class="text-center text-zinc-400 py-4">
							No posts found
						</div>

					<?php endif; ?>
				</div>

				<div class="w-full md:w-1/4">
					<?php get_template_part('partials/terms-sidebar'); ?>
				</div>
			</div>
        </div>
    </section>

<?php get_footer();
