<div class="new-ligthbox gallery-lightbox tw-items-center">
	<div class="dismiss tw-bg-gradient-to-b tw-from-gray-800/50 tw-to-orange-900/50 tw-backdrop-blur-sm tw-absolute tw-inset-0"></div>
	<div class="lightbox-content tw-max-w-6xl">
		<button class="dismiss tw-w-14 tw-h-14 tw-flex tw-items-center tw-justify-center tw-bg-orange-500 hover:tw-bg-orange-900 tw-transition-colors tw-duration-100 tw-ease-in-out tw-rounded-full tw-absolute -tw-top-7 -tw-right-5 tw-cursor-pointer tw-z-10" aria-label="Close">
			<i class="fa-solid fa-xmark tw-text-white tw-text-3xl"></i>
		</button>

		<div class="tw-border-8 tw-border-solid tw-border-white tw-bg-white tw-rounded-2xl">
			<div class="swiper oven-gallery tw-rounded-tl-xl tw-rounded-tr-xl tw-overflow-hidden">
				<div class="swiper-wrapper">
					<?php foreach( $args['images'] as $image ) : ?>
						<div class="swiper-slide text-center">
							<img class="tw-w-auto mx-auto tw-max-h-96 lg:tw-max-h-[650px] lg:tw-w-auto lg:tw-h-auto tw-object-cover" src="<?= esc_url( $image['url'] ); ?>" alt="<?= esc_attr( $image['alt'] ); ?>">
						</div>
					<?php endforeach; ?>
				</div>
				<div class="swiper-button-next nav-button-next"></div>
      			<div class="swiper-button-prev nav-button-prev"></div>
			</div>

			<div class="swiper oven-gallery-thumbs tw-rounded-bl-xl tw-rounded-br-xl tw-overflow-hidden" thumbsSlider="">
				<div class="swiper-wrapper">
					<?php foreach( $args['images'] as $image ) : ?>
						<div class="swiper-slide">
							<img class="tw-w-full tw-h-[100px] tw-object-cover" src="<?= esc_url( $image['sizes']['thumbnail'] ); ?>" alt="<?= esc_attr( $image['alt'] ); ?>">
						</div>
					<?php endforeach; ?>
				</div>				
			</div>
		</div>
	</div>
</div>
