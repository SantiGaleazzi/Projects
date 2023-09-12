const externalParams = new URLSearchParams(window.location.search)

if (externalParams.has('external')) {
	const portfolioLightboxes = document.querySelectorAll('[data-portfolio="true"]')
	portfolioLightboxes?.forEach(lightbox => {
		if (lightbox.classList.contains('active')) {
			lightbox.classList.remove('active')
		}
	})

	setTimeout(() => {
		document.querySelector('.grecaptcha-badge').classList.add('opacity-0', 'invisible')
	}, 650)
}
