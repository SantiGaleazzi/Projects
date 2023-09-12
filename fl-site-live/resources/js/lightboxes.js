const lightboxes = document.querySelectorAll('.lightbox-component')

if (lightboxes.length > 0) {
	lightboxes.forEach(lightbox => {
		lightbox.querySelector('.close-lightbox').addEventListener('click', () => {
			lightbox.classList.toggle('is-open')
		})
	})
}

const subscribeLightbox = document.querySelector('.open-lightbox')

if (subscribeLightbox !== null) {
	subscribeLightbox.addEventListener('click', () => {
		const lightbox = document.querySelector(
			`[data-lightbox-name='${subscribeLightbox.dataset.lightboxTrigger}']`
		)

		if (lightbox !== null) {
			lightbox.classList.add('is-open')
		}
	})
}
