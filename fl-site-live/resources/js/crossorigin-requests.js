const externalParams = new URLSearchParams(window.location.search)

if (externalParams.has('external')) {
	const portfolioLightboxes = document.querySelectorAll('.pum')

	portfolioLightboxes?.forEach(lightbox => {
		const closeButton = lightbox.querySelector('.popmake-close')
		setTimeout(() => {
			closeButton.click()
		}, 600)
	})

	setTimeout(() => {
		document.querySelector('.grecaptcha-badge')?.classList.add('opacity-0', 'invisible')
	}, 200)
}
