const hamburger = document.querySelector('header .hamburger')

hamburger?.addEventListener('click', () => {
	const navigation = document.querySelector('.navigation')
	const navigationOverlay = document.querySelector('.navigation-overlay')

	hamburger.classList.toggle('open')
	navigation?.classList.toggle('is-active')
	navigationOverlay?.classList.toggle('is-active')
	document.body.classList.toggle('tw-overflow-hidden')
})
