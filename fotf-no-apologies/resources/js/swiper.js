// eslint-disable-next-line no-unused-vars
import Swiper, { Pagination, Autoplay, Navigation } from 'swiper'

Swiper.use([Navigation])

window.onload = function () {
	// eslint-disable-next-line no-unused-vars
	const swiper = new Swiper('.testimonial-swipper', {
		loop: true,
		autoplay: {
			delay: 5000,
			disableOnInteraction: false,
			pauseOnMouseEnter: true,
		},
		navigation: {
			nextEl: '.home-next',
			prevEl: '.home-prev',
		},
	})
}
