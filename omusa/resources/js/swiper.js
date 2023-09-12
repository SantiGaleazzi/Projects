import Swiper from 'swiper'

window.onload = function () {
	//  Get Involved
	const getInvoldedSlider = new Swiper('.swiper-container', {
		autoHeight: true,
		slidesPerView: 1,
		loop: true,
		speed: 1400,
		autoplay: {
			delay: 5000,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	})

	//  Prays
	const praysSlider = new Swiper('.prays-swiper-container', {
		slidesPerView: 1,
		loop: true,
		speed: 1400,
		autoplay: {
			delay: 5000,
		},
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	})

	//  Long Featured Jobs
	const longFeatured = new Swiper('.long-featured-swiper-container', {
		slidesPerView: 1,
		slidesPerGroup: 1,
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

	//  Get Involved
	const internshipsSlider = new Swiper('.internships-testimonials-swiper', {
		autoHeight: true,
		slidesPerView: 1,
		loop: true,
		speed: 1400,
		autoplay: {
			delay: 5000,
		},
		observer: true,
		observeParents: true,
		navigation: {
			nextEl: '.swiper-button-next',
			prevEl: '.swiper-button-prev',
		},
	})
}
