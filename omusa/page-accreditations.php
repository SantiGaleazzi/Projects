<?php get_header(); ?>

<div class="pt-24 md:pt-56 pb-24">
	<div class="container px-6 lg:px-0 relative">
		<div class="bg-black-500-new shadow-2xl">
			<div class="text-black-600-new text-sm">
				<?php get_template_part('partials/about/navigation'); ?>
			</div>

			<div>
				<div class="text-4xl md:text-5xl text-white-pure text-center leading-none font-roboto font-light py-6 px-2 bg-red-500">
					<?php the_title();?>
				</div>

				<div class="relative">
					<div>
						<div class="max-w-4xl px-6 lg:px-0 py-12 mx-auto">
							<?php if( have_rows('certificates_repeater') ): ?>
								<?php
									while( have_rows('certificates_repeater') ): the_row();
									$certificate_logo = get_sub_field('logo');
								?>
									<div class="py-6 md:py-8">
										<div class="flex flex-col text-center md:text-left md:flex-row">
											<div class="md:w-56 mb-8 md:mb-0">
												<img src="<?= $certificate_logo['url']; ?>" alt="<?= $certificate_logo['alt']; ?>" class="inline-block"/>
											</div>

											<div class="flex-1">
												<div class="text-2xl md:text-3xl text-red-500 leading-none font-roboto font-light mb-3">
													<?php the_sub_field('name'); ?>
												</div>

												<div class="text-default">
													<?php the_sub_field('description'); ?>
												</div>
											</div>
										</div>
									</div>
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
