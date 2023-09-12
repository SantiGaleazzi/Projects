<?php

    get_header();

    $lightbox_form = get_field('lightbox_form');
    $dowload_file = get_field('dowload_file');

?>
	<main>
		<!-- Intro Section -->
		<?php get_template_part('partials/ways-to-give/intro'); ?>
		<!-- Intro Section -->

		<!-- Global Fund & Give Worker -->
		<?php get_template_part('partials/ways-to-give/global-fund-and-give-worker'); ?>
		<!-- Global Fund & Give Worker -->

		<!-- Your Account Section -->
		<?php get_template_part('partials/ways-to-give/your-account'); ?>
		<!-- Your Account Section -->

		<!-- Other Ways Section -->
		<?php get_template_part('partials/ways-to-give/other-ways'); ?>
		<!-- Other Ways Section -->

		<!-- Need Help Section -->
		<?php get_template_part('partials/ways-to-give/need-help'); ?>
		<!-- Need Help Section -->

		<!-- Other Questions Section -->
		<?php get_template_part('partials/ways-to-give/other-questions'); ?>
		<!-- Other Questions Section -->

		<!-- Settings Pray -->
		<?php get_template_part('partials/pray'); ?>
		<!-- Settings Pray -->

		<section class="ways-to-give-lightbox w-full h-full px-6 py-10 inset-0 fixed flex items-center justify-center z-50">

			<div class="close-ligtbox w-full h-full bg-lightbox absolute z-50"></div>

			<div class="w-full max-w-3xl h-full p-4 md:px-12 md:py-8 bg-white-pure border-t-8 border-b-8 border-red-500 rounded relative z-50">

				<div class="close-ligtbox w-8 h-8 flex items-center justify-center bg-black-700-new rounded-full absolute top-0 right-0 -mt-4 -mr-4 cursor-pointer z-10">
					<i class="fas fa-times text-white-pure"></i>
				</div>

				<div class="h-full px-6 overflow-y-auto">
					<?php if($lightbox_form ) : ?>
						<?=$lightbox_form?>
					<?php endif; ?>

					<?php if( $dowload_file ) : ?>
						<div class="pt-6">
							<a href="<?= esc_url( $dowload_file ); ?>" rel="nofollow" target="_blank" class=" text-white-pure text-center font-semibold leading-none uppercase px-8 py-3 bg-orange-500-new">
								OM’s Broker Info - PDF
							</a>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>

	</main>

<?php get_footer();
