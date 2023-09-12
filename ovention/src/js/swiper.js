import Swiper, { Pagination, Autoplay, Parallax, EffectFade, Thumbs, Navigation } from 'swiper'

Swiper.use([Navigation]);
/**
 * Location : templates/home.php
 */
const ovenSwiper = new Swiper('.oven-swiper', {
	modules: [Pagination, Autoplay, Parallax, EffectFade],
	loop: true,
	parallax: true,
	autoplay: {
		delay: 4500,
		disableOnInteraction: false,
		pauseOnMouseEnter: true,
	},
	effect: 'fade', 
	pagination: {
		el: '.ovens-pagination',
		clickable: true,
	},
	on: {
		init: () => {
			setTimeout(() => {
				const swiperContainer = document.querySelector('.swiper.oven-swiper .swiper-wrapper')
				const firstSlide = swiperContainer.children[1]

				const ovenNamesPlaceholder = document.querySelectorAll('.js-swiper-oven-name');

				console.log(ovenNamesPlaceholder);

				ovenNamesPlaceholder?.forEach(name => {
					name.innerHTML = firstSlide.dataset.slideOvenName
				})
				document.querySelector('.js-swiper-oven-link').href = firstSlide.dataset.slideOvenLink
			}, 1000) 
		},
	},
})

ovenSwiper.on('slideChange', swiper => {
	const index = swiper.activeIndex
	const swiperContainer = document.querySelector('.swiper.oven-swiper .swiper-wrapper')
	const currentSlide = swiperContainer.children[index]

	const ovenNamesPlaceholder = document.querySelectorAll('.js-swiper-oven-name')

	ovenNamesPlaceholder?.forEach(name => {
		name.innerHTML = currentSlide.dataset.slideOvenName
	})
	document.querySelector('.js-swiper-oven-link').href = currentSlide.dataset.slideOvenLink
})

/**
 * Location : templates/oven-catalog.php
 */
const catalogTestimonials = new Swiper('.catalog-testimonials', {
	modules: [Autoplay],
	speed: 700,
	loop: true,
	spaceBetween: 20,
	slidesPerView: 1.5,
	centeredSlides: true,
	autoplay: {
		delay: 5000,
		disableOnInteraction: false,
		pauseOnMouseEnter: true,
	},
	breakpoints: {
		640: {
			slidesPerView: 2,
		},
		768: {
			spaceBetween: 30,
		},
		1024: {
			spaceBetween: 40,
		},
	},
})

/**
 * Location : templates/single-oven.php
 */
const singleOven = new Swiper('.single-oven-swiper', {
	modules: [Autoplay],
	loop: true,
	slidesPerView: 1.4,
	centeredSlides: true,
	spaceBetween: 30,
	autoplay: {
		delay: 4000,
		disableOnInteraction: false,
		pauseOnMouseEnter: true,
	},
	navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
	breakpoints: {
		640: {
			slidesPerView: 2,
		},
		768: {
			slidesPerView: 2.4,
			spaceBetween: 30,
		},
		1024: {
			slidesPerView: 3.4,
			spaceBetween: 40,
		},
	},
})

/**
 * Location : partials/lightboxes/gallery.php
 */
const galleryThumbs = new Swiper('.oven-gallery-thumbs', {
	loop: false,
	spaceBetween: 10,
	slidesPerView: 4,
	freeMode: true,
	watchSlidesProgress: true,	
})


const galleryMain = new Swiper('.oven-gallery', {
	modules: [Thumbs],
	loop: true,
	thumbs: {
		swiper: galleryThumbs,
	},
	navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    }
})

