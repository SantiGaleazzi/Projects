<div class="new-ligthbox quiz-lightbox">
	<div class="dismiss tw-bg-gradient-to-b tw-from-gray-800/50 tw-to-orange-900/50 tw-backdrop-blur-sm tw-absolute tw-inset-0"></div>
	<div class="lightbox-content tw-max-w-6xl">
		<button class="dismiss tw-w-14 tw-h-14 tw-flex tw-items-center tw-justify-center tw-bg-orange-500 hover:tw-bg-orange-900 tw-transition-colors tw-duration-100 tw-ease-in-out tw-rounded-full tw-absolute -tw-top-7 -tw-right-5 tw-cursor-pointer tw-z-10" aria-label="Close">
			<i class="fa-solid fa-xmark tw-text-white tw-text-3xl"></i>
		</button>

		<div class="tw-p-8 sm:tw-p-12 tw-bg-white tw-rounded-2xl quiz-form">
			<?php the_field('quiz_form', 'option'); ?>
		</div>

		<div class="sm:tw-hidden tw-animate-bounce tw-bg-orange-500 tw-p-2 tw-w-12 tw-h-12 tw-ring-1 tw-ring-slate-900/5 tw-shadow-lg tw-rounded-full tw-flex tw-items-center tw-justify-center tw-absolute -tw-bottom-6 tw-left-0 tw-right-0 tw-mx-auto" aria-label="Scroll Down">
			<svg class="tw-w-8 tw-h-8 tw-text-white" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
				<path d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
			</svg>
		</div>
	</div>
</div>
