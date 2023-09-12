const resources_filters = document.querySelectorAll('.resources-filter')

if (resources_filters.length > 0) {
	resources_filters.forEach(filter => {
		// Variables.
		let options_pre_selected = [] // The options selected.
		const option_selected = filter.querySelector('.option-selected')

		// Filters Dropdown.
		option_selected.addEventListener('click', event => {
			filter.classList.toggle('is-open')
		})

		// Grab all cheboxes.
		const all_options_checkboxes = filter.querySelectorAll('.options-available input[type="radio"]')

		// Preselect filters if param exists,
		//populateFiltersWithParams( filter.dataset.taxonomy, all_options_checkboxes, sum_of_options, options_pre_selected )

		all_options_checkboxes.forEach(checkbox => {
			checkbox.addEventListener('click', el => {
				const name_singular =
					el.target.offsetParent.previousElementSibling.firstElementChild.dataset.filterNameSingular
				const taxonomy_name = el.target.labels[0].textContent
					.replace(/[\n\r]+|[\s]{2,}/g, ' ')
					.trim()

				if (taxonomy_name == 'None') {
					el.target.offsetParent.previousElementSibling.firstElementChild.textContent =
						name_singular
				} else {
					el.target.offsetParent.previousElementSibling.firstElementChild.textContent =
						name_singular + ' ' + taxonomy_name
				}

				// This checks all inputs and takes only the one selected.
				all_options_checkboxes.forEach(checked => {
					if (
						document.getElementById(checked.value).checked &&
						!options_pre_selected.includes(checked.dataset.termId)
					) {
						options_pre_selected.push(checked.dataset.termId)
					} else if (
						document.getElementById(checked.value).checked == false &&
						options_pre_selected.includes(checked.dataset.termId)
					) {
						// Gets item index in array.
						const item_index = options_pre_selected.indexOf(checked.dataset.termId)

						// Searches item in array and removes it.
						item_index > -1 ? options_pre_selected.splice(item_index, 1) : false
					}
				})

				// Reset pagination value before sending.
				document.querySelector('#current_page').value = 0

				// Get form data and transform it into string representation.
				let data = new FormData(document.querySelector('#filters-data'))
				let queryString = new URLSearchParams(data).toString()

				//console.log(queryString)

				// Request Resources
				sendFormHTTPRequest('POST', search_resources_ajax.ajaxurl, queryString)
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
		})

		// Outside dropdown mosedown event closes filter options available.
		document.addEventListener('mousedown', event => {
			if (!filter.contains(event.target)) {
				filter.classList.remove('is-open')
			}
		})
	})
}

// Animate all episodes on retrive.
window.animatingResources = resources => {
	// Convert string elements to HTML.
	let list_of_resources = new DOMParser()
	let resouces = list_of_resources.parseFromString(resources, 'text/html')

	let all_resources_found = resouces.querySelectorAll('.resource-item')

	if (all_resources_found.length > 0) {
		all_resources_found.forEach((resource, index) => {
			// Appends child.
			document.querySelector('.resources-data').appendChild(resource)

			// Animate option.
			setTimeout(() => {
				resource.classList.add('animating')
			}, 150 * index)
		})
	}
}

// Not being used right now.
function populateFiltersWithParams(filter, checkboxes, total_selected, selected) {
	// Ony triggers when the param filter exists.
	if (window.location.href.indexOf(filter) > -1) {
		const site_url = new URL(window.location.href)
		const urlParams = new URLSearchParams(site_url.search.slice(1))

		if (urlParams.has(filter)) {
			let applied_filters = urlParams.get(filter) // Gets the params.
			applied_filters = applied_filters.replace(/,/g, ' ') // Remove commas and adds spaces.

			checkboxes.forEach(checkbox => {
				if (applied_filters.includes(checkbox.dataset.slug)) {
					const input_name = checkbox.getAttribute('name')
					const input_id = document.getElementById(input_name)

					input_id.click()

					total_selected++

					// This adds the term id to the array of filters selected and pushes it.
					if (input_id.checked && !selected.includes(checkbox.dataset.slug)) {
						selected.push(checkbox.dataset.slug)
					}
				}
			})
		}
	}
}
