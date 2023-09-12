/**
 *
 * PHP : partials/lightboxes/gallery.php
 * CSS : src/components/lightboxes.sass
 *
 */

const galleryThumbs = document.querySelectorAll('.js-gallery-thumbnail')

galleryThumbs?.forEach(thumbnail => {
	thumbnail.addEventListener('click', () => {
		const galleryLightbox = document.querySelector('.gallery-lightbox')
		const lightboxContent = galleryLightbox.querySelector('.lightbox-content')

		galleryLightbox.classList.add('is-active')
		document.body.classList.add('tw-overflow-hidden')

		setTimeout(() => {
			lightboxContent.classList.toggle('is-active')
		}, 400)

		document.addEventListener('keyup', event => {
			if (event.key === 'Escape') {
				quizLightbox.classList.remove('is-active')
				lightboxContent.classList.remove('is-active')
				document.body.classList.remove('tw-overflow-hidden')
			}
		})

		galleryLightbox.querySelectorAll('.dismiss').forEach(dismiss => {
			dismiss.addEventListener('click', () => {
				galleryLightbox.classList.remove('is-active')
				lightboxContent.classList.remove('is-active')
				document.body.classList.remove('tw-overflow-hidden')
			})
		})
	})
})
