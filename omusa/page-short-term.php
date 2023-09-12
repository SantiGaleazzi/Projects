<?php

	get_header();

	$banner_link = get_field('short_term_discover_banner_link');

	$more_opportunities = get_field('short_term_more_opportunities');
	$more_opportunitie_target = $more_opportunities['target'] ? $more_opportunities['target'] : '_self';

	$short_term_quote_button = get_field('short_term_quote_button');
	$quote_button_target = $short_term_quote_button['target'] ? $short_term_quote_button['target'] : '_self';
	
?>

    <section class="section-quoted px-6 pb-10 pt-24 md:pt-48 xl:pt-64">
        <div class="container">
            <div class="headline text-default mx-auto">
                <?php the_field('short_term_intro_title'); ?>
            </div>

            <?php if( have_rows('short_term_wts_repeater') ): ?>
                <div class="flex flex-wrap justify-center">
                    <?php
                        while( have_rows('short_term_wts_repeater') ): the_row();
                        $wts_image = get_sub_field('image');
						$link = get_sub_field('link');
                    ?>
                        <a href="<?= $link; ?>" class="flex w-full sm:w-1/2 lg:w-1/3 sm:px-3 my-3">
                            <div class="rounded-md shadow-2xl overflow-hidden">
								<div class="w-full py-32 bg-cover bg-center bg-no-repeat" style="background-image: url('<?= $wts_image['url']; ?>');">
                                </div>

                                <div class="p-6">
                                    <div class="text-2xl text-default font-bold leading-none mb-3">
                                        <?php the_sub_field('title'); ?>
                                    </div>

                                    <div class="text-default">
                                        <?php the_sub_field('description'); ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

	<section class="px-6">
		<div class="container">
			<div class="lg:w-4/5 text-xl xl:text-2xl md:leading-none text-center text-white-pure px-8 py-4 bg-red-500 mx-auto mb-8">
				<a href="<?= $banner_link; ?>" class="block">
					<?php the_field('short_term_discover_banner'); ?>
				</a>
			</div>

			<div class="lg:w-4/5 text-center md:text-left flex flex-col md:flex-row items-center justify-center px-6 lg:px-0 py-6 border-t border-b  border-separator mx-auto">
				<div class="md:flex-1 lg:flex-none text-default font-roboto font-light text-3xl">
					<?php the_field('short_term_quote_title'); ?>
				</div>

				<div class="w-full sm:w-auto mt-4 md:mt-0 md:pl-8 lg:pl-14">
					<a
						href="<?= $short_term_quote_button['url']; ?>"
						target="<?= esc_attr( $quote_button_target ); ?>"
						class="button w-full sm:w-auto text-lg lg:px-8 bg-red-500"
					>
						<?= $short_term_quote_button['title']; ?>
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="px-6">
		<div class="container bg-page border-b-4 border-red-500 shadow-2xl">
			<div class="text-default text-3xl text-center font-roboto font-light leading-none py-10">
				<?php the_field('short_term_process_title'); ?>
			</div>

			<div class="application-process sm:w-11/12 xl:w-4/5 px-6 lg:px-0 mx-auto border-b border-separator">
				<?php if ( have_rows('processes_repeater') ) : ?>
					<?php
						while ( have_rows('processes_repeater') ): the_row();
						$icon = get_sub_field('icon');
					?>
						<div class="process flex flex-col sm:flex-row pb-6 sm:pb-8 xl:pb-16 relative">
							<div class="sm:w-1/4 mb-6 sm:mb-0">
								<div class="step-time text-default flex flex-col lg:flex-row items-center justify-between p-5 bg-card rounded-md">
									<div class="w-full flex flex-col lg:flex-row items-center justify-around mb-2 lg:mb-0 relative z-10">
										<div class="flex-none mb-2 lg:mb-0">
											<img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>">
										</div>

										<div class="flex-none text-4xl font-roboto font-light leading-none mx-3 relative z-10">
											<?php the_sub_field('number'); ?>
										</div>
									</div>

									<div class="text-center lg:text-left font-roboto font-medium">
										<?php the_sub_field('time'); ?>
									</div>
								</div>
							</div>

							<div class="flex-1 sm:pl-12 md:px-12">
								<div class="text-red-500 text-3xl font-roboto font-light leading-none mb-5">
									<?php the_sub_field('title'); ?>
								</div>

								<div class="text-default has-red-links has-wysiwyg">
									<?php the_sub_field('description'); ?>
								</div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>

			<div class="text-center py-8 md:py-12">
				<a href="<?= $more_opportunities['url']; ?>" target="<?= esc_attr( $more_opportunitie_target ); ?>" class="text-center text-white-pure text-xl font-black leading-none px-8 py-3 bg-red-500 inline-block"><?= $more_opportunities['title']; ?></a>
			</div>
		</div>
	</section>

	<?php
		$stories = new WP_Query( array(
			'post_type' => 'stories',
			'posts_per_page' => 3,
			'tax_query' => array(
					array(
						'taxonomy' => 'type-worker',
						'field'    => 'slug',
						'terms'    => 'short-term-interns-volunteers',
					)
				)
			)
			);
	?>

	<?php if ( $stories->have_posts() ) : ?>
    <section class="py-16">
		<div class="container">
			<div class="text-3xl md:text-4xl text-center text-red-500 font-roboto font-light leading-none mb-8">
				<?php the_field('short_term_stories_title'); ?>
			</div>

			<div class="flex flex-wrap">
				<?php
					while ( $stories->have_posts()) :  $stories->the_post();
					$thumbnail_image = get_the_post_thumbnail_url();
				?>
					<div class="sm:w-1/2 lg:w-1/3 flex px-3 py-3">
						<article class="w-full bg-black-500-new shadow-2xl rounded flex flex-col">		
							<div class="thumb">
								<a href="<?php the_permalink() ?>">
									<img src="<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?>"" class="w-full h-48 object-cover object-center">
								</a>
							</div>

							<div class="flex-auto px-6 py-4 bg-red-500">
								<div class="text-2xl text-white-pure font-bold leading-tight mb-1">
									<a href="<?php the_permalink(); ?>"><?= mb_strimwidth(get_the_title(), 0, 60, '...'); ?></a>
								</div>
                                    
                                <div class="flex flex-wrap text-xs text-orange-500 font-bold uppercase">
									<?php
										// Post taxonomies
										$taxonomies = array('type-worker', 'region', 'type-impact');
										$taxo_string = '';

										foreach( $taxonomies as $taxonomy ) {

											$taxonomies_associated = wp_get_post_terms( $post->ID, $taxonomy, array( 'fields' => 'names' ) );
														
											if ( !empty($taxonomies_associated) ) {
															
												foreach ( $taxonomies_associated as $term) {
													
													if ( strpos($term, 'Short Term' ) !== false ) {
															
														$term = 'Short Term';

													}
															
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
							
							<div class="flex flex-col justify-between px-6">
								<div class="text-default text-sm leading-6 pt-5 mb-4">
									<?= mb_strimwidth(get_the_excerpt(), 0, 145, '...'); ?>
								</div>

								<div class="text-right pt-4 pb-4 border-t border-white-300-new">
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
