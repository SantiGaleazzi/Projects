const hamburger = document.querySelector('.hamburger')

hamburger?.addEventListener('click', () => {
	const navigation = document.querySelector('.navigation')
	const navigationOverlay = document.querySelector('.navigation-overlay')

	hamburger.classList.toggle('open')
	document.body.classList.toggle('overflow-hidden')
	navigation.classList.toggle('is-active')
	navigationOverlay.classList.toggle('is-active')
})
