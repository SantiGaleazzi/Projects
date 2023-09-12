const search_resources = document.getElementById('search-resources')

if (search_resources != null) {
	const search_string = document.getElementById('search_resources_string')

	search_resources.addEventListener('click', () => {
		// Request Resources
		sendFormHTTPRequest(
			'POST',
			search_resources_ajax.ajaxurl,
			`action=resources_search&search_resources_string=${search_string.value}`
		)
			.then(response => {
				const page = parseInt(response.page)
				const max_page = parseInt(response.num_max)

				// Show load more button.
				document.querySelector('.load-more-resources').style.display = 'block'

				document.querySelector('#current_page').value = 1

				// Hide more button
				if (page === max_page) {
					document.querySelector('.load-more-resources').style.display = 'none'
				}

				// Clear previous resources.
				document.querySelector('.resources-data').innerHTML = ''

				// Adds and animate the found resources.
				if (response.not_found === false) {
					animatingResources(response.resources)
				} else {
					document.querySelector('.resources-data').innerHTML = response.resources
				}
			})
			.catch(error => {
				console.log(error)
			})
	})

	// Prevent the input from submitting the form on enter.
	search_string.addEventListener('keydown', event => {
		if (event.keyCode === 13) {
			event.preventDefault()

			return false
		}
	})
}
