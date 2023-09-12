<?php

	$youtube_id = get_field('youtube_id');
	$term_id = get_queried_object()->term_id;
	$term = get_term($term_id, 'resources-category' );

	get_header();
	
?>

	<section class="pt-6 pb-20">
		<div class="container">
			<?php if ( $youtube_id ) : ?>
				<div class="video-single">
					<iframe class="video-single" src="https://www.youtube.com/embed/<?= $youtube_id; ?>?rel=0&mute=1" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" id=”audio”  allowfullscreen></iframe>
				</div>
			<?php else : ?>
				<div class="text-center thumb-single max-w-5xl mx-auto">
					<?php the_post_thumbnail('full'); ?>
				</div>
			<?php endif; ?>

			<div class="max-w-45 text-left mx-auto">
				<div class="font-roboto-condensed text-white font-semibold text-center px-2 py-2 leading-none bg-yellow-400 text-sm uppercase mx-150">
					<?php $terms = wp_get_post_terms( get_the_ID(), 'resources-category');
						foreach ($terms as $term) {
							echo $term->name, ' ';
					} ?>
				</div>
				<div class="font-roboto-condensed font-base text-left py-5">
					<?= get_the_date(); ?>
				</div>
				<div class="font-pt-serif text-2xxl text-yellow-300 leading-tight pb-5">
					<?php the_title(); ?>
				</div>
				<div class="flex items-center text-gold-light mb-5 md:mb-0 mt-5 font-archive">
					<div class="font-light pr-4">
						Share
					</div>

					<div class="flex items-center">
						<div class="pr-3">
							<a rel="nofollow" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>" target="_blank">
								<i class="fab fa-facebook text-lg"></i>
							</a>
						</div>
						<div class="pr-3">
							<a rel="nofollow" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank">
								<i class="fab fa-twitter text-lg"></i>
							</a>
						</div>
						<div class="pr-3">
							<a rel="nofollow" href="http://www.linkedin.com/shareArticle?mini=true&title=<?php the_title(); ?>&url=<?php the_permalink(); ?>" target="_blank">
								<i class="fab fa-linkedin text-lg"></i>
							</a>
						</div>
						<div>
						<a rel="nofollow" href="mailto:?&amp;subject=<?php the_title(); ?>&amp;body=<?php the_permalink(); ?>" target="_blank">
								<i class="fas fa-envelope text-lg"></i>
							</a>
						</div>
					</div>
				</div>
				
				<div class="text-white font-roboto-condensed text-lg pt-5 single-content">
					<?php echo the_content(); ?>
				</div>
			</div>
		</div>
	</section>

	<section class="px-6 py-16 bg-yellow-400 ">
		<div class="flex flex-col md:flex-row items-center justify-center">
	 		<h3 class="font-pt-serif text-white text-3xl mb-6">
				<?php the_field('copy_single_form', 'options'); ?>
			</h3>

	 		<div class="ffz-inline-form">
				<?php the_field('form_single','options'); ?>
			</div>
		</div>
	</section>

	<section class="pt-12 pb-4">
		<div class="container">
			<div class="text-white font-roboto-condensed text-4xl font-semibold tracking-widest pb-7">
				Recommended for you
			</div>
			
			<div class="w-full flex flex-wrap justify-center lg:justify-start archive-categ">
				<?php

					$custom_taxterms = wp_get_object_terms( $post->ID, 'resources-category', array('fields' => 'ids') );
					
					$args = array(
						'post_type' => 'resources',
						'post_status' => 'publish',
						'posts_per_page' => 3, // you may edit this number
						'orderby' => 'rand',
						'tax_query' => array(
						    array(
						        'taxonomy' => 'resources-category',
						        'field' => 'id',
						        'terms' => $custom_taxterms
						    )
						),
						'post__not_in' => array ($post->ID),
					);
					$related_items = new WP_Query( $args );

					if ( $related_items->have_posts() ) :
						while ( $related_items->have_posts() ) : $related_items->the_post();
					?>
						   <?php get_template_part('partials/post-item'); ?>
						<?php
						endwhile;
					endif;
					wp_reset_postdata();
				?>
			</div>
		</div>
	</section>

<?php get_footer();
