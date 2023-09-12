const hamburger = document.querySelector('header .hamburger')

hamburger?.addEventListener('click', () => {
	const navigation = document.querySelector('nav')
	const navigationOverlay = document.querySelector('.navigation-overlay')

	hamburger.classList.toggle('open')
	navigation?.classList.toggle('is-active')
	navigationOverlay?.classList.toggle('is-active')
	document.body.classList.toggle('overflow-hidden')

	navigationOverlay?.addEventListener('click', () => {
		hamburger.classList.remove('open')
		navigation?.classList.remove('is-active')
		navigationOverlay?.classList.remove('is-active')
		document.body.classList.remove('overflow-hidden')
	})
})
