// Load more Resources
const load_more_resources = document.querySelector('.load-more-resources')

if (load_more_resources !== null) {
	load_more_resources.addEventListener('click', () => {
		// Get form data and transform it into string representation.
		let data = new FormData(document.querySelector('#filters-data'))
		let queryString = new URLSearchParams(data).toString()
		const loading_spinner = load_more_resources.querySelector('.loading-spinner')

		// Loading Spinner Animation - Start
		loading_spinner.classList.add('is-loading')

		// Request Resources.
		sendFormHTTPRequest('POST', search_resources_ajax.ajaxurl, queryString)
			.then(response => {
				// Loading Spinner Animation - End.
				loading_spinner.classList.remove('is-loading')

				const page = parseInt(response.page)
				const max_page = parseInt(response.num_max)

				// Hide the load more button.
				if (page === max_page) {
					document.querySelector('.load-more-resources').style.display = 'none'
				} else {
					document.querySelector('#current_page').value = page
				}

				// Adds and animate the found resources.
				animatingResources(response.resources)
			})
			.catch(error => {
				console.log(error)
			})
	})
}
