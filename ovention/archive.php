<?php get_header(); ?>

	<?php get_template_part('partials/general-banner'); ?>

	<section class="tw-px-6 tw-py-24 tw-bg-gray-100">
		<div class="tw-container">
			<div class="tw-flex tw-flex-col lg:tw-flex-row">
				<div class="tw-full lg:tw-w-3/4 tw-mb-10 lg:tw-mb-0 lg:tw-pr-4">
					<?php if ( have_posts() ) : ?>
						<div class="tw-flex tw-flex-wrap tw-gap-y-8">
							<?php while ( have_posts() ) : the_post(); ?>
								<div class="tw-w-full md:tw-w-1/2 md:tw-px-4 tw-flex">
									<div class="tw-flex tw-flex-col tw-bg-white tw-rounded-2xl tw-shadow-lg tw-overflow-hidden">
										<div class="tw-flex-auto">
											<div>
												<?php if ( has_post_thumbnail() ) : ?>
													<a href="<?php the_permalink(); ?>">
														<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
													</a>
												<?php else: ?>
													<a href="<?php the_permalink(); ?>">
														<img src="<?php bloginfo('template_url' ) ?>/assets/img/press-default.jpg" alt="press-default">
													</a>
												<?php endif; ?>	
											</div>

											<div class="tw-p-8">
												<div class="tw-text-orange-600 tw-text-[30px] tw-font-semibold tw-leading-none tw-mb-8">
													<?php the_title(); ?>
												</div>

												<div class="tw-flex tw-items-center tw-justify-between tw-py-4 tw-border-t-2 tw-border-b-2 tw-border-solid tw-border-gray-100 tw-my-6">
													<div class="tw-text-gray-400 tw-font-semibold">
														<?= get_the_date('M d, Y'); ?>
													</div>

													<?php

														$category = get_the_category();

														if ( $category ) :

													?>
														<div>
															<a class="tw-text-[12px] tw-text-white hover:tw-text-white tw-font-bold tw-px-4 tw-py-2 tw-bg-orange-900 tw-inline-block tw-rounded-2xl" href="<?= esc_url( get_category_link( $category[0]->term_id ) ); ?>">
																<?= esc_html( $category[0]->name ); ?>
															</a>
														</div>
													<?php endif; ?>
												</div>

												<div class="tw-font-medium tw-mb-8">
													<?php the_excerpt(); ?>
												</div>
												
												<div>
													<a class="tw-text-white hover:tw-text-white tw-font-bold tw-px-10 tw-py-5 tw-bg-orange-500 tw-rounded-2xl tw-inline-flex tw-items-center tw-group" href="<?php the_permalink(); ?>">
														Learn More <div class="tw-pl-3 tw-transition-transform tw-duration-200 tw-ease-in-out group-hover:tw-translate-x-2">»</div>
													</a>
												</div>
											</div>
										</div>									
									</div>
								</div>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="tw-w-full lg:tw-w-1/4 tw-max-w-lg">
					<?php get_template_part( 'partials/category-sidebar' ); ?>
				</div>
			</div>
			
			<?php get_template_part( 'partials/paginator' ); ?>
		</div>
	</section>

<?php get_footer();
