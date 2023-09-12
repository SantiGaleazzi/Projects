<?php

	$oven_image = get_field('image_store_lightbox', 'option');
	$shop_link = get_field('button_store_lightbox', 'option');

?>

<div class="new-ligthbox store-lightbox tw-items-center">
	<div class="dismiss tw-bg-gradient-to-b tw-from-gray-800/50 tw-to-orange-900/50 tw-backdrop-blur-sm tw-absolute tw-inset-0"></div>
	<div class="lightbox-content tw-max-w-6xl">
		<button class="dismiss tw-w-14 tw-h-14 tw-flex tw-items-center tw-justify-center tw-bg-orange-500 hover:tw-bg-orange-900 tw-transition-colors tw-duration-100 tw-ease-in-out tw-rounded-full tw-absolute -tw-top-7 -tw-right-5 tw-cursor-pointer tw-z-10" aria-label="Close">
			<i class="fa-solid fa-xmark tw-text-white tw-text-3xl"></i>
		</button>

		<div class="tw-bg-white tw-rounded-2xl tw-bg-cover tw-bg-center tw-bg-no-repeat tw-overflow-hidden" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/img/lightbox-kitchen-bg.png');">
			<div class="tw-flex tw-flex-col sm:tw-flex-row tw-px-12 tw-py-20">
				<div class="tw-text-center tw-w-full sm:tw-w-1/2">
					<div class="tw-text-[34px] tw-leading-none tw-font-bold tw-uppercase tw-mb-6">
						<?php the_field('title_store_lightbox', 'option'); ?>
					</div>

					<div class="tw-text-[20px]">
						<?php the_field('copy_store_lightbox', 'option'); ?>
					</div>
				</div>

				<div class="tw-w-full sm:tw-w-1/2 tw-relative">
					<img class="tw-hidden sm:tw-block sm:tw-absolute tw-top-0 tw-right-0 -tw-mt-20" src="<?= $oven_image['url']; ?>" alt="<?= $oven_image['alt']; ?>">
				</div>
			</div>

			<div class="tw-text-center sm:tw-text-left tw-p-8 tw-bg-gradient-to-r tw-from-orange-900 tw-to-orange-500">
				<a class="tw-text-center tw-text-white hover:tw-text-white tw-text-[24px] tw-font-bold tw-px-12 tw-py-5 tw-border-2 tw-border-solid tw-border-white tw-rounded-2xl tw-inline-block tw-uppercase" href="<?= $shop_link['url']; ?>">
					<?= $shop_link['title']; ?>
				</a>
			</div>
		</div>
	</div>
</div>
