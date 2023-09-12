const contactParams = new URLSearchParams(window.location.search)

if (contactParams.has('comment')) {
	const contactForm = document.getElementById('gform_wrapper_3')

	if (contactForm !== null) {
		const messageField = document.getElementById('input_3_4')
		const message = contactParams.get('comment')

		messageField.value = message
	}
}
