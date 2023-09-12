const contactButtons = document.querySelectorAll('.js-contact-in-site')

contactButtons?.forEach(contact => {
	contact?.addEventListener('click', () => {
		const contactLightbox = document.querySelector('.contact-ligthbox')
		const lightboxContent = contactLightbox?.querySelector('.lightbox-content')

		contactLightbox.classList.add('is-active')
		document.body.classList.add('tw-overflow-hidden')

		setTimeout(() => {
			lightboxContent.classList.toggle('is-active')
		}, 400)

		document.addEventListener('keyup', event => {
			if (event.key === 'Escape') {
				contactLightbox.classList.remove('is-active')
				lightboxContent.classList.remove('is-active')
				document.body.classList.remove('tw-overflow-hidden')
			}
		})

		contactLightbox.querySelectorAll('.dismiss').forEach(dismiss => {
			dismiss.addEventListener('click', () => {
				contactLightbox.classList.remove('is-active')
				lightboxContent.classList.remove('is-active')
				document.body.classList.remove('tw-overflow-hidden')
			})
		})
	})
})
