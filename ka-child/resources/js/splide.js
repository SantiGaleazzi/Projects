import Splide from '@splidejs/splide'

if (document.getElementById('country-main')) {
	const countrySplide = new Splide('#country-main', {
		type: 'fade',
		rewind: true,
		arrows: false,
		pagination: false,
		heightRatio: 0.45,
	})

	const countryThumbnails = new Splide('#country-thumbnails', {
		perPage: 5,
		perMove: 1,
		gap: 10,
		rewind: true,
		autoplay: false,
		interval: 5000,
		isNavigation: true,
		pauseOnHover: false,
		pauseOnFocus: false,
		arrows: true,
		pagination: false,
		breakpoints: {
			640: {
				perPage: 2,
			},
			768: {
				perPage: 3,
			},
		},
	})

	countrySplide.sync(countryThumbnails).mount()
	countryThumbnails.mount()
}
