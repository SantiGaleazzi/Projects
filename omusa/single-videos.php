<?php
	get_header();

	$thumbnail_image = get_the_post_thumbnail_url();
	$default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

	$post_give_now_button = get_field('post_give_now_button');
	$post_give_now_button_target = $post_give_now_button ? $post_give_now_button['target'] : '_self';

	$pray_button = get_field('post_pray_button');
	$pray_button_target = $pray_button ? $pray_button['target'] : '_self';

?>

<section class="pt-16 md:pt-40 xl:pt-40">
	<div class="container bg-black-500-new shadow-2xl border-b-4 border-red-500">
		<div class="text-white-pure px-6 md:px-12 lg:px-24 pt-10 lg:pt-16 pb-32 bg-red-500">
            < <a href="/videos" class="text-xs font-bold underline" >BACK TO VIDEOS</span></a>
		</div>

		<div class="px-6 md:px-12 lg:px-24 -mt-32 pt-3">
			<div>	
				<!-- Post Copy -->
				<div class="bg-page shadow-2xl mb-12">
					<div>
						<img src="<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?> thumbnail" class="w-full" />
					</div>

					<?php if ( $post_give_now_button || $pray_button ) : ?>
						<div class="flex flex-col sm:flex-row justify-end pt-4 px-4">
							<?php if ( $post_give_now_button ) : ?>
								<div class="sm:mr-4 mb-4 sm:mb-0">
									<a href="<?= $post_give_now_button['url']; ?>" target="<?php esc_attr( $post_give_now_button_target ); ?>" class="w-full md:w-auto text-white-pure text-center text-lg font-black leading-none px-8 py-3 bg-red-500 inline-block"><?= $post_give_now_button['title'];?></a>
								</div>
							<?php endif; ?>

							<?php if ( $pray_button ) : ?>
								<div>
									<a href="<?= $pray_button['url']; ?>" target="<?php esc_attr( $pray_button_target ); ?>" class="w-full md:w-auto text-white-pure text-center text-lg font-black leading-none px-8 py-3 bg-orange-500 inline-block"><?= $pray_button['title']; ?></a>
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<div class="px-6 sm:px-12 lg:px-24 pt-4">

						<div class="xl:w-3/5 text-3xl md:text-4xl lg:text-5xl text-red-500 font-roboto font-light leading-snug mb-1">
							<?php the_title(); ?>					
						</div>

						<div class="flex flex-wrap text-xs text-orange-500 font-bold uppercase mb-12">
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
								$taxo_string = str_replace('/', '<span class="text-default px-1">/</span>', $taxo_string);
							?>
							<?= $taxo_string ? $taxo_string : '&nbsp;'; ?>
						</div>

						<div class="text-default pt-10 has-red-links has-wysiwyg border-t border-b border-separator">
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; endif; ?>
						</div>
					</div>

					<div class="text-xs text-red-500 font-bold px-6 sm:px-12 lg:px-24 py-6 md:py-10">
                        < <a href="/videos" class="text-xs font-bold underline" >BACK TO VIDEOS</span></a>
					</div>
				</div>
				<!-- Post Copy -->
			</div>
		</div>								
	</div>
</section>

<?php
	$all_related_posts = new WP_Query( array(
            'post_type' => 'videos',
            'posts_per_page' => 3,
            'orderby' => 'rand',
            'status' => 'published',
            'post__not_in'   => array( $post->ID ),
            'paged' => get_query_var( 'paged' ),
            'category_name' => get_query_var( 'category_name' )
	    )
	);

	if ($all_related_posts->have_posts() ) :
?>
<section class="px-6 py-10 md:py-16">
	<div class="container">
		<div class="text-center text-red-500 text-4xl font-roboto font-light mb-6 md:mb-8">
			Related Videos
		</div>

		<div class="flex flex-wrap flex-col sm:flex-row">
				<?php
					while ($all_related_posts->have_posts()) : $all_related_posts->the_post();  
					$thumbnail_image = get_the_post_thumbnail_url();
				?>
					<div class="sm:w-1/2 lg:w-1/3 flex px-3 py-3">
						<article <?php post_class(esc_attr('bg-black-500-new shadow-2xl rounded flex flex-col')); ?>>		
							<div class="thumb">
								<a href="<?php the_permalink() ?>">
									<img src="<?= $thumbnail_image; ?>" alt="" class="w-full h-48 object-cover object-center">
								</a>
							</div>

							<div class="px-6 py-4 bg-red-500">
								<div class="text-2xl text-white-pure font-bold leading-tight mb-1">
									<?= mb_strimwidth(get_the_title(), 0, 60, ''); ?>
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
									<a href="<?php the_permalink() ?>" class=" text-red-500 leading-none font-black">More about <?php the_title(); ?> »</a>
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
