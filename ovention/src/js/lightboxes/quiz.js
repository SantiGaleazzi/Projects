const quizTriggers = document.querySelectorAll('.js-quiz-lightbox-trigger')

quizTriggers?.forEach(lightboxTrigger => {
	lightboxTrigger.addEventListener('click', event => {
		event.preventDefault()

		const quizLightbox = document.querySelector('.quiz-lightbox')
		const lightboxContent = quizLightbox?.querySelector('.lightbox-content')

		quizLightbox.classList.add('is-active')
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

		quizLightbox.querySelectorAll('.dismiss').forEach(dismiss => {
			dismiss.addEventListener('click', () => {
				quizLightbox.classList.remove('is-active')
				lightboxContent.classList.remove('is-active')
				document.body.classList.remove('tw-overflow-hidden')
			})
		})
	})
})
