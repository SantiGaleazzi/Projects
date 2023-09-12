<?php

	get_header();

	$thumbnail_image = get_the_post_thumbnail_url();
	$default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

?>

	<section class="pt-16 md:pt-40 xl:pt-40 pb-20">
		<div class="container bg-black-500-new shadow-2xl border-b-4 border-red-500">
			<div class="text-white-pure px-6 md:px-12 lg:px-24 pt-10 lg:pt-16 pb-32 bg-red-500">
			</div>
			<div class="px-6 md:px-12 lg:px-24 -mt-32 pt-3">
				<div>	
					<div class="bg-page shadow-2xl mb-12">
						<div>
							<img src="<?= $thumbnail_image ?: $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?> thumbnail" class="w-full" />
						</div>

						<div id="story-section" class="px-6 sm:px-12 lg:px-24 pt-4">

							<div class="xl:w-3/5 text-3xl md:text-4xl lg:text-5xl text-red-500 font-roboto font-light leading-snug mb-1">
								<?php the_title(); ?>					
							</div>

							<div class="flex flex-wrap text-xs text-orange-500 font-bold uppercase mb-12">
								<?php
									$taxonomies = array('category');
									$taxo_string = '';

									foreach( $taxonomies as $taxonomy) {

										$taxonomies_associated = wp_get_post_terms( $post->ID, $taxonomy, array(
											'fields' => 'names',
											'hide_empty' => true
										));
																	
										if ( !empty($taxonomies_associated) ) {
																
											foreach ( $taxonomies_associated as $term) {
																	
												$taxo_string .= $term . '/';

											}
																	
										}
									}

									$taxo_string = substr_replace($taxo_string, '', -1);
									$taxo_string = str_replace('/', '<span class="text-default px-1">/</span>', $taxo_string);
								?>
								<?= $taxo_string ?: '&nbsp;'; ?>
							</div>

							<div class="text-default pt-10 has-red-links has-wysiwyg border-t border-b border-separator">
								<?php if ( have_posts() ) : ?>
									<?php while ( have_posts() ) : the_post(); ?>
										<?php the_content(); ?>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>								
		</div>
	</section>

<?php get_footer();
