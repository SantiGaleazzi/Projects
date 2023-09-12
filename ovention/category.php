<?php get_header(); ?>

	<section class="tw-text-center tw-text-white tw-px-6 tw-py-32 lg:tw-py-64 tw-bg-cover tw-bg-center tw-bg-no-repeat tw-relative" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/default-banner-background.jpg');">
		<div class="tw-container tw-max-w-7xl tw-relative tw-z-30">
			<div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
				<div class="tw-text-[40px] lg:tw-text-[60px] tw-font-bold tw-leading-none tw-mb-8 lg:tw-mb-12">
					<?php the_field('settings_culinary_oven_title', 'option'); ?>
				</div>

				<div class="lg:tw-text-[22px]">
					<?php the_field('settings_culinary_oven_description', 'option'); ?>
				</div>
			</div>
		</div>
		<div class="tw-w-full md:tw-w-3/5 tw-h-full tw-absolute tw-bg-cover tw-bg-left-top tw-bg-no-repeat tw-top-0 tw-right-0 tw-z-20" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/orange-flare.png');"></div>
		<div class="tw-bg-gray-800/80 tw-absolute tw-inset-0 tw-z-10"></div>
	</section>

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
												<div class="tw-text-orange-600  tw-text-[30px] tw-font-semibold tw-leading-none tw-mb-8">
													<?php the_title(); ?>
												</div>

												<div class="tw-flex tw-items-center tw-justify-between tw-py-4 tw-border-t-2 tw-border-b-2 tw-border-solid tw-border-gray-100 tw-my-6">
													<div class="tw-text-gray-400 tw-font-semibold">
														<?= get_the_date('M d, Y'); ?>
													</div>

													<?php

														$categories = get_the_category();

														if ( ! empty( $categories ) ) :

													?>
														<div>
															<a class="tw-text-[12px] tw-text-white hover:tw-text-white tw-font-bold tw-px-4 tw-py-2 tw-bg-orange-900 tw-inline-block tw-rounded-2xl" href="<?= esc_url( get_category_link( $categories[0]->term_id ) ); ?>">
																<?= esc_html( $categories[0]->name ); ?>
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
