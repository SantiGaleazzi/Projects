
<?php

	$oven_image = get_field('settings_yellow_oven_image', 'option');

?>

<section class="tw-px-6 tw-py-24 <?= is_page_template('templates/home.php') ? 'tw-bg-gray-100' : 'tw-bg-white'; ?>">
	<div class="tw-container">
		<div class="tw-text-center tw-mb-16">
			<div class="tw-text-orange-500 tw-text-[20px] tw-font-medium tw-mb-4">
				<?php the_field('settings_resources_pretitle', 'option'); ?>
			</div>

			<div class="tw-text-gray-800 tw-text-[42px] tw-font-bold tw-leading-none">
				<?php the_field('settings_resources_title', 'option'); ?>
			</div>
		</div>

		<div class="tw-grid tw-grid-flow-row tw-gap-6">

			<?php if ( have_rows('settings_resources', 'option') ) : $counter = 0; ?>
			
				<?php while ( have_rows('settings_resources', 'option')  ) : the_row(); ?>
					
					<?php if ( $counter % 2 === 0 ) : // Even Big boxes. ?>

						<div class="tw-flex tw-flex-col md:tw-flex-row tw-gap-y-6">

							<?php if ( have_rows('resorces_resource', 'option') ) : $itern_counter = 0; ?>
								<?php
								
									while ( have_rows('resorces_resource', 'option')  ) : the_row();

										$link = get_sub_field('link');
										$image = get_sub_field('has_side_image') === 'yes' ? get_sub_field('image') : '';
									
								?>
									<?php if ( $itern_counter === 0 ) : // Double size boxes. ?>

										<div class="tw-flex tw-w-full md:tw-w-1/2 md:tw-px-3">
											<div class="tw-text-gray-900 tw-flex tw-flex-col sm:tw-flex-row tw-items-center tw-justify-center tw-p-8 xl:tw-p-16 tw-bg-orange-400 tw-rounded-xl tw-group">
												<?php if ( $image ) : ?>
													<div class="tw-flex-none tw-w-full sm:tw-w-1/2 tw-text-center tw-mb-6 sm:mb-0">
														<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
													</div>
												<?php endif; ?>

												<div class="tw-w-full sm:tw-w-1/2 tw-text-center sm:tw-text-left sm:tw-pl-6">
													<div class="tw-text-[24px] tw-font-semibold tw-leading-none tw-mb-6">
														<?php the_sub_field('title'); ?>
													</div>

													<div class="tw-font-medium tw-mb-8">
														<?php the_sub_field('description'); ?>
													</div>

													<?php if ( $link ) : ?>
														<div>
															<a class="js-oven-link tw-text-white hover:tw-text-white tw-font-semibold tw-inline-flex tw-items-center" href="<?= $link['url']; ?>" target="<?= esc_attr( $link['target'] ?: '_self' ); ?>">
																<?= $link['title']; ?> <i class="fa-solid fa-right-long tw-text-4xl tw-text-white tw-pl-4 tw-transition-transform tw-duration-150 tw-ease-in-out tw-translate-x-0 group-hover:tw-translate-x-5"></i>
															</a>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>

									<?php else : // Small boxes ?>

										<div class="tw-flex tw-w-full md:tw-w-1/4 md:tw-px-3">
											<div class="tw-text-center tw-text-white tw-flex tw-items-center tw-justify-center tw-p-8 xl:tw-p-16 <?= $itern_counter === 1 ? 'tw-bg-gray-800' : 'tw-bg-orange-900'; ?> tw-rounded-xl tw-group">
												<div>
													<div class="tw-text-[24px] tw-font-semibold tw-mb-4">
														<?php the_sub_field('title'); ?>
													</div>

													<div class="tw-font-medium tw-mb-8">
														<?php the_sub_field('description'); ?>
													</div>

													<?php if ( $link ) : ?>
														<div>
															<a class="js-oven-link tw-text-orange-400 hover:tw-text-orange-400 tw-font-semibold tw-inline-flex tw-items-center" href="<?= $link['url']; ?>" target="<?= esc_attr( $link['target'] ?: '_self' ); ?>">
																<?= $link['title']; ?> <i class="fa-solid fa-right-long tw-text-4xl tw-text-orange-400 tw-pl-4 tw-transition-transform tw-duration-150 tw-ease-in-out tw-translate-x-0 group-hover:tw-translate-x-5"></i>
															</a>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>

									<?php endif; ?>

								<?php $itern_counter++; endwhile; ?>
							<?php endif; ?>

						</div>

					<?php else : //Big boxes. ?>

						<div class="tw-flex tw-flex-col-reverse md:tw-flex-row tw-gap-y-6">

							<?php if ( have_rows('resorces_resource', 'option') ) : $itern_counter = 0; ?>
								<?php
								
									while ( have_rows('resorces_resource', 'option')  ) : the_row();

										$link = get_sub_field('link');
										$image = get_sub_field('has_side_image') === 'yes' ? get_sub_field('image') : '';
									
								?>
									<?php if ( $itern_counter === 2 ) : ?>

										<div class="tw-flex tw-w-full md:tw-w-1/2 md:tw-px-3">
											<div class="tw-text-gray-900 tw-flex tw-flex-col-reverse sm:tw-flex-row tw-items-center tw-justify-center tw-p-8 xl:tw-p-16 tw-bg-beige-500 tw-rounded-xl tw-group">
												<div class="tw-w-full sm:tw-w-1/2 tw-text-center sm:tw-text-left sm:tw-mr-8">
													<div class="tw-text-[24px] tw-font-semibold tw-leading-none tw-mb-6">
														<?php the_sub_field('title'); ?>
													</div>

													<div class="tw-font-medium tw-mb-8">
														<?php the_sub_field('description'); ?>
													</div>

													<?php if ( $link ) : ?>
														<div>
															<a class="js-oven-link tw-text-orange-500 hover:tw-text-orange-500 tw-font-semibold tw-inline-flex tw-items-center" href="<?= $link['url']; ?>" target="<?= esc_attr( $link['target'] ?: '_self' ); ?>">
																<?= $link['title']; ?> <i class="fa-solid fa-right-long tw-text-4xl tw-text-orange-500 tw-pl-4 tw-transition-transform tw-duration-150 tw-ease-in-out tw-translate-x-0 group-hover:tw-translate-x-5"></i>
															</a>
														</div>
													<?php endif; ?>
												</div>

												<?php if ( $image ) : ?>
													<div class="tw-flex-none tw-w-full sm:tw-w-1/2 tw-text-center tw-mb-6 sm:tw-mb-0">
														<img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>">
													</div>
												<?php endif; ?>
											</div>
										</div>

									<?php else : // Small boxes. ?>

										<div class="tw-flex tw-w-full md:tw-w-1/4 md:tw-px-3">
											<div class="tw-flex tw-items-center tw-justify-center tw-text-center tw-text-white tw-p-8 xl:tw-p-16 <?= $itern_counter % 2 === 0 ? 'tw-bg-gray-800' : 'tw-bg-orange-900'; ?> tw-rounded-xl tw-group">
												<div>
													<div class="tw-text-[24px] tw-font-semibold tw-mb-4">
														<?php the_sub_field('title'); ?>
													</div>

													<div class="tw-font-medium tw-mb-8">
														<?php the_sub_field('description'); ?>
													</div>

													<?php if ( $link ) : ?>
														<div>
															<a class="js-oven-link tw-text-orange-400 hover:tw-text-orange-400 tw-font-semibold tw-inline-flex tw-items-center" href="<?= $link['url']; ?>" target="<?= esc_attr( $link['target'] ?: '_self' ); ?>">
																<?= $link['title']; ?> <i class="fa-solid fa-right-long tw-text-4xl tw-text-orange-400 tw-pl-4 tw-transition-transform tw-duration-150 tw-ease-in-out tw-translate-x-0 group-hover:tw-translate-x-5"></i>
															</a>
														</div>
													<?php endif; ?>
												</div>
											</div>
										</div>

									<?php endif; ?>

								<?php $itern_counter++; endwhile; ?>
							<?php endif; ?>

						</div>
						
					<?php endif; ?>

				<?php $counter++; endwhile; ?>

			<?php endif; ?>
		</div>
	</div>
</section>
