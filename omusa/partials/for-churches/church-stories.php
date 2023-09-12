<?php

	/**
	 * 
	 * @param for-churches
	 * 
	 * This param is being sent when a post is being visited from the For Churches page.
	 * This change the back button and redirects the user to the For Churches page instead of the Stories.
	 * 
	 */

?>

<section class="px-6 py-8">
    <div class="container">
        <div class="flex flex-wrap">
            <?php
                $stories = new WP_Query( array(
                        'post_type' => 'stories',
                        'posts_per_page' => 3,
                        'tag' => 'for-church'
                    )
                );

                if ($stories->have_posts() ) :
            ?>
				<?php
					while ($stories->have_posts() ) : $stories->the_post();
					$thumbnail_image = get_the_post_thumbnail_url();
				?>
					<div class="sm:w-1/2 lg:w-1/3 flex px-3 py-3">
						<article <?php post_class(esc_attr('bg-black-500-new shadow-2xl rounded flex flex-col')); ?>>		
							<div class="thumb">
								<a href="<?php the_permalink(); ?>?from-churches#story-section">
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
									<a href="#connections" class=" text-red-500 leading-none font-black">More About <?php the_field('stories_more_about_button'); ?> »</a>
								</div>
							</div>					
						</article>	
					</div>
				<?php
					endwhile;
					wp_reset_postdata();
				?>

		    <?php endif; ?>
		</div>
		
    </div>
</section>