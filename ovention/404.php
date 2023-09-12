<?php get_header(); ?>

	<section class="tw-text-center tw-text-white tw-px-6 tw-py-32 lg:tw-py-64 tw-bg-cover tw-bg-center tw-bg-no-repeat tw-relative" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/default-banner-background.jpg');">
		<div class="tw-container tw-max-w-6xl tw-relative tw-z-30">
			<div class="tw-flex tw-flex-col tw-items-center tw-justify-center">
				<div class="tw-text-[60px] lg:tw-text-[100px] tw-font-bold tw-leading-none tw-mb-8 lg:tw-mb-12">
					404
				</div>

				<div class="lg:tw-text-[22px]">
					Something is wrong. The page you are looking for was moved, removed, renamed or might never existed.
				</div>
			</div>
		</div>
		<div class="tw-w-full md:tw-w-3/5 tw-h-full tw-absolute tw-bg-cover tw-bg-left-top tw-bg-no-repeat tw-top-0 tw-right-0 tw-z-20" style="background-image: url('<?= bloginfo('template_url'); ?>/assets/img/orange-flare.png');"></div>
		<div class="tw-bg-gray-800/80 tw-absolute tw-inset-0 tw-z-10"></div>
	</section>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer(); ?>
