import { Swiper, Navigation, Pagination, Autoplay } from 'swiper/js/swiper.esm.js'

Swiper.use([Navigation, Pagination, Autoplay])

// For all video sliders
const all_video_sliders = document.querySelectorAll('.has-video-swiper')

all_video_sliders.forEach((slider, index) => {
	slider.querySelector('.video-swiper').classList.add('video-swiper-' + index)

	const videoSwiper = new Swiper('.video-swiper-' + index, {
		slidesPerView: 1,
		speed: 1000,
		loop: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
			640: {
				slidesPerView: 2,
				slidesPerGroup: 2,
			},
			768: {
				slidesPerView: 3,
				slidesPerGroup: 3,
			},
			1024: {
				slidesPerView: 4,
				slidesPerGroup: 4,
			},
			1280: {
				slidesPerView: 5,
				slidesPerGroup: 5,
			},
		},
	})
})

// Used for all Main sliders
const all_main_sliders = document.querySelectorAll('.has-main-swiper')

all_main_sliders.forEach((slider, index) => {
	slider.querySelector('.main-swiper').classList.add('main-swiper-' + index)

	const mainSwiper = new Swiper('.main-swiper-' + index, {
		slidesPerView: 'auto',
		parallax: true,
		loop: true,
		speed: 600,
		autoplay: {
			delay: 3500,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	})
})

// Used for all Series sliders
const all_series_sliders = document.querySelectorAll('.has-series-slider')

all_series_sliders.forEach((slider, index) => {
	slider.querySelector('.series-swiper').classList.add('series-swiper-' + index)

	const seriesSwiper = new Swiper('.series-swiper-' + index, {
		slidesPerView: 2,
		spaceBetween: 15,
		loop: true,
		speed: 600,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
		breakpoints: {
			640: {
				slidesPerView: 4,
				slidesPerGroup: 2,
			},
			1280: {
				slidesPerView: 4,
			},
		},
	})
})

document.addEventListener('touchstart', function () {}, false)
