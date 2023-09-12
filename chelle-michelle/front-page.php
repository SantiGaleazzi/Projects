<?php get_header(); ?>

    <section class="px-5 py-16">
        <div class="container">
            <?php $postfolio_posts = new WP_Query( array(
				'post_type' => 'portfolio',
				'posts_per_page' => -1
			) ); ?>

			<?php if ( $postfolio_posts->have_posts() ) : ?>
				<div class="grid md:grid-cols-2 gap-6">
					<?php while ( $postfolio_posts->have_posts() ) : $postfolio_posts->the_post(); ?>
						<?php get_template_part('partials/home/portfolio'); ?>
					<?php endwhile; ?>
				</div>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
        </div>
    </section>

	<?php if ( have_rows('homepage_clients') ) : ?>
		<section class="px-5 py-16 border-t border-zinc-700">
			<div class="container">
				<div class="grid sm:grid-cols-2 md:grid-cols-4 xl:grid-cols-5 gap-16">
					<?php while ( have_rows('homepage_clients') ) : the_row(); ?>
					
						<?php if ( get_sub_field('link') ) : ?>

							<div>
								<a href="<?php the_sub_field('link'); ?>" target="_blank" rel="noopener nofollow">
									<img class="grayscale" src="<?= get_sub_field('logo')['url']; ?>" alt="<?= get_sub_field('logo')['alt']; ?>">
								</a>
							</div>

						<?php else : ?>

							<div>
								<img class="grayscale" src="<?= get_sub_field('logo')['url']; ?>" alt="<?= get_sub_field('logo')['alt']; ?>">
							</div>

						<?php endif; ?>

					<?php endwhile; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

<?php get_footer();
