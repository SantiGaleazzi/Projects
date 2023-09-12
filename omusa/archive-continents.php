<?php
	get_header();

	$default_post_thumbnail = get_field('settings_default_thumbnail', 'options');
?>

<section class="pt-16 px-6 md:pt-40 xl:pt-56 pb-12">
	<div class="container">
		<div class="flex flex-wrap mb-10">
			<?php if ( have_posts() ) : $counter = 0; ?>
				<?php
					while (have_posts() ) :the_post();
					$counter++;
					$thumbnail_image = get_the_post_thumbnail_url();
				?>
					<div class="sm:w-1/2 lg:w-1/3 flex px-3 py-3">
						<article <?php post_class(esc_attr('bg-black-500-new shadow-2xl rounded flex flex-col')); ?>>		
							<div class="thumb">
								<a href="<?php the_permalink() ?>">
									<img src="<?= $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url']; ?>" alt="<?php the_title(); ?>"" class="w-full h-48 object-cover object-center">
								</a>
							</div>

							<div class="px-6 py-4 bg-red-500">
								<div class="text-2xl text-white-pure font-bold leading-tight mb-1">
									<a href="<?php the_permalink(); ?>"><?= mb_strimwidth(get_the_title(), 0, 60, '...'); ?></a>
								</div>					
							</div>	

							<div class="h-full flex flex-col justify-between px-6">
								<div class="text-default text-sm leading-6 pt-5 mb-4">
									<?= mb_strimwidth(get_the_excerpt(), 0, 145, '...'); ?>
								</div>
								
                                <div class="text-right pt-4 pb-4 border-t border-white-300-new ">
									<a href="<?php the_permalink(); ?>" class=" text-red-500 leading-none font-black">More about <?php the_title(); ?> »</a>
								</div>
							</div>					
						</article>	
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		
		<?php if ( $wp_query->max_num_pages > 1 ) : ?>
			<div class="w-full load-more-stories text-center">
				<img src="<?= get_template_directory_uri(); ?>/assets/images/red-chevron.png" alt="Load More Stories" class="inline-block" />
			</div>
		<?php endif; ?>
	</div>
</section>

<?php get_footer();
