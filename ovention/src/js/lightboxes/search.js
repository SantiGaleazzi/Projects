const searchInSite = document.querySelector('.search-in-site')

searchInSite?.addEventListener('click', () => {
	const searchLightbox = document.querySelector('.search-ligthbox')
	const lightboxContent = searchLightbox?.querySelector('.lightbox-content')

	searchLightbox.classList.add('is-active')
	document.body.classList.add('tw-overflow-hidden')
	searchLightbox.querySelector('.search-field').value = ''

	setTimeout(() => {
		lightboxContent.classList.toggle('is-active')

		setTimeout(() => {
			searchLightbox.querySelector('.search-field').focus()
		}, 150)
	}, 400)

	document.addEventListener('keyup', event => {
		if (event.key === 'Escape') {
			searchLightbox.classList.remove('is-active')
			lightboxContent.classList.remove('is-active')
			document.body.classList.remove('tw-overflow-hidden')
		}
	})

	searchLightbox.querySelectorAll('.dismiss').forEach(dismiss => {
		dismiss.addEventListener('click', () => {
			searchLightbox.classList.remove('is-active')
			lightboxContent.classList.remove('is-active')
			document.body.classList.remove('tw-overflow-hidden')
		})
	})
})
