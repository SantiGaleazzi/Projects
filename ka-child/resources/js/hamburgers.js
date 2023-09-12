const hamburger = document.querySelector('.hamburger')

hamburger?.addEventListener('click', () => {
	const navigation = document.querySelector('.navigation')
	const overlay = document.querySelector('.navigation-overlay')

	hamburger.classList.toggle('open')
	document.body.classList.toggle('tw-overflow-hidden')
	navigation.classList.toggle('is-active')
	overlay.classList.toggle('is-active')
})
