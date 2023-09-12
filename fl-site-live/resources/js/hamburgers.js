const hamburger = document.querySelector('.hamburger')

if (hamburger !== null) {
	const navigation = document.querySelector('.navigation')
	const navigation_overlay = document.querySelector('.navigation-overlay')

	hamburger.addEventListener('click', () => {
		hamburger.classList.toggle('open')
		document.body.classList.toggle('overflow-hidden')
		navigation.classList.toggle('is-active')
		navigation_overlay.classList.toggle('is-active')
	})
}
