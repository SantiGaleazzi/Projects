const requesDemoTrigger = document.querySelectorAll('.js-request-demo-trigger')

requesDemoTrigger?.forEach(trigger => {
	trigger?.addEventListener('click', () => {
		const requestLightbox = document.querySelector('.request-demo-ligthbox')
		const lightboxContent = requestLightbox?.querySelector('.lightbox-content')

		requestLightbox.classList.add('is-active')
		document.body.classList.add('tw-overflow-hidden')

		setTimeout(() => {
			lightboxContent.classList.toggle('is-active')
		}, 350)

		document.addEventListener('keyup', event => {
			if (event.key === 'Escape') {
				requestLightbox.classList.remove('is-active')
				lightboxContent.classList.remove('is-active')
				document.body.classList.remove('tw-overflow-hidden')
			}
		})

		requestLightbox.querySelectorAll('.dismiss').forEach(dismiss => {
			dismiss.addEventListener('click', () => {
				requestLightbox.classList.remove('is-active')
				lightboxContent.classList.remove('is-active')
				document.body.classList.remove('tw-overflow-hidden')
			})
		})
	})
})
