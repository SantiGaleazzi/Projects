<?php

	global $wp_query;

	get_header();
	
?>

	<section class="tw-px-6 tw-py-16 tw-bg-orange-900">
		<div class="tw-container">
			<div class="tw-text-white tw-text-[22px] tw-font-medium">
				Search Results for: <span class="tw-text-[30px] tw-font-semibold">"<?php the_search_query() ?>"</span>
			</div>
		</div>
	</section>

	<section class="tw-px-6">
		<div class="tw-container">
			<div class="tw-font-semibold tw-flex tw-justify-end tw-py-16 tw-border-b-2 tw-border-solid tw-border-gray-100">
				Showing <span class="tw-text-orange-900 tw-px-2"><?= $wp_query->post_count; ?></span> of <span class="tw-text-orange-900 tw-px-2"><?= $wp_query->found_posts; ?></span> Results
			</div>

			<div class="tw-py-16">
                <?php if ( have_posts() ) : ?>
					<div class="tw-flex tw-flex-col tw-gap-y-16">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php if ( get_post_type() === 'product' ) : ?>

								<div class="tw-w-full tw-flex tw-flex-col sm:tw-flex-row tw-items-center tw-bg-white tw-shadow-xl tw-rounded-xl tw-overflow-hidden">
									<div class="tw-w-auto sm:tw-w-1/4 h-full tw-bg-gray-100">
										<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
									</div>

									<div class="tw-flex-1 tw-p-8 sm:tw-px-12">
										<div class="tw-mb-6">
											<a class="tw-text-orange-900 hover:tw-text-orange-900 tw-text-[22px] tw-font-medium" href="<?php the_permalink(); ?>">
												<?php the_title(); ?> »
											</a>
										</div>

										<div class="tw-text-gray-900 has-wysiwyg">
											<?php the_excerpt(); ?>
										</div>
									</div>
								</div>

							<?php else: ?>

								<div class="tw-w-full tw-flex tw-flex-col sm:tw-flex-row tw-items-center">
									<div class="tw-w-full sm:tw-w-1/4 tw-py-48 tw-bg-cover tw-bg-center tw-bg-no-repeat tw-rounded-xl" <?= get_the_post_thumbnail_url() ? 'style="background-image: url(' . get_the_post_thumbnail_url() .');"' : ''; ?>>
									</div>

									<div class="tw-flex-1 tw-p-8 sm:tw-px-12">
										<div class="tw-mb-6">
											<a class="tw-text-orange-900 hover:tw-text-orange-900 tw-text-[22px] tw-font-medium" href="<?php the_permalink(); ?>">
												<?php the_title(); ?> »
											</a>
										</div>

										<div class="tw-text-gray-900 has-wysiwyg">
											<?php the_excerpt(); ?>
										</div>
									</div>
								</div>

							<?php endif; ?>
						<?php endwhile ?>
					</div>
                <?php endif; ?>
            </div>

			<div class="search-pagination">
				<?php pagination('« Prev', 'Next »'); ?>
			</div>
		</div>
	</section>

<?php get_footer();
