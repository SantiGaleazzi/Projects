const yearEndLightboxes = document.querySelectorAll('.year-end-lightbox')

yearEndLightboxes?.forEach(lightbox => {
	const lightboxClose = lightbox.querySelector('.close-lightbox')

	lightboxClose.addEventListener('click', () => {
		lightbox.classList.add('is-closed')
	})
})
