const storeLightbox = document.querySelector('.store-lightbox')
const lightboxContent = storeLightbox?.querySelector('.lightbox-content')

storeLightbox &&
	(storeLightbox?.classList.add('is-active'),
	document.body.classList.add('tw-overflow-hidden'),
	setTimeout(() => {
		lightboxContent?.classList.add('is-active')
	}, 500),
	storeLightbox?.querySelectorAll('.dismiss').forEach(dismiss => {
		dismiss.addEventListener('click', () => {
			storeLightbox.classList.remove('is-active')
			lightboxContent.classList.remove('is-active')
			document.body.classList.remove('tw-overflow-hidden')
		})
	}))
