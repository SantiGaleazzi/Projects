const expandable_button = document.querySelector('.expandable')

if (expandable_button !== null) {
	const content_to_expand = document.querySelector('.work-matters-more-description')

	expandable_button.addEventListener('click', event => {
		event.preventDefault()

		document.querySelector('.truck-background').classList.toggle('xl:bg-cover')

		if (content_to_expand.style.maxHeight) {
			content_to_expand.style.maxHeight = null
		} else {
			content_to_expand.style.maxHeight = content_to_expand.scrollHeight + 'px'
		}
	})
}
