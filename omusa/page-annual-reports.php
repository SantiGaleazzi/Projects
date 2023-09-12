<?php get_header(); ?>

<div class="pt-24 md:pt-56 pb-24">
	<div class="container px-6 lg:px-0 relative">
		<div class="bg-black-500-new shadow-2xl">
			<div class="text-black-600-new text-sm">
				<?php get_template_part('partials/about/navigation'); ?>
			</div>

			<div>
				<div class="text-4xl md:text-5xl text-white-200-new text-center leading-none font-roboto font-light py-6 px-2 bg-red-500">
					<?php the_title();?>
				</div>

				<div class="relative py-12">
					<div class="lg:w-4/5 text-default px-4 md:px-12 mx-auto has-wysiwyg">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</div>

					<div class="lg:w-4/5 mx-auto px-6">
                        <div class="text-red-500 text-2xl md:text-3xl text-center font-roboto font-light mb-6">
							<?php the_field('annual_reports_title'); ?>
						</div>

						<div class="text-center flex flex-wrap items-center justify-evenly">
                            <?php if ( have_rows('annual_reports_repeater') )  : ?>
                                <?php
									while ( have_rows('annual_reports_repeater') ) : the_row();
									$has_file = get_sub_field('file');
									$has_link = get_sub_field('link');

								?>
                                    <?php
										if ( $has_link ) :
											$has_link_target = $has_link['target'] ? $has_link['target'] : '_self';
									?>
										<div class="text-left text-red-500 font-roboto mt-2 cursor-pointer mx-3">
											<a href="<?= $has_link['url']; ?>" target="<?= esc_attr( $has_link_target ); ?>">
												<div class="text-3xl font-semibold">
													<i class="fas fa-external-link-alt text-xl mr-1"></i> <?php the_sub_field('year'); ?>
												</div>

												<div class="text-default">
													<?php the_sub_field('title'); ?>
												</div>
											</a>
										</div>
									<?php elseif ( $has_file ) : ?>
										<div class="text-left text-red-500 font-roboto mt-2 cursor-pointer mx-3">
											<a href="<?php the_sub_field('file'); ?>" target="_blank">
												<div class="text-3xl font-semibold">
													<i class="fas fa-download text-xl mr-1"></i> <?php the_sub_field('year'); ?>
												</div>

												<div class="text-default">
													<?php the_sub_field('title'); ?>
												</div>
											</a>
										</div>
									<?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
