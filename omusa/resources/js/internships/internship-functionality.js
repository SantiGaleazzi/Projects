// Filter toggle
const internship_filters = document.getElementById('internships-filters')

if (internship_filters !== null) {
	const all_internships_filters = internship_filters.querySelectorAll('.filter')
	const auto_selected = document.querySelector('.selected_filtered_options') // this items stores the selected filters
	let options_pre_selected = []

	all_internships_filters.forEach(filter => {
		filter.querySelector('.filter-collapsable').addEventListener('click', () => {
			filter.querySelector('.filter-terms').classList.toggle('active')
		})

		// Outside Click event closes dropdown options.
		document.addEventListener('mousedown', event => {
			if (!filter.contains(event.target)) {
				filter.querySelector('.filter-terms').classList.remove('active')
			}
		})

		// On Select checkbox options clicks.
		const all_checkboxes = filter.querySelectorAll('.filter-terms input[type="checkbox"]')
		const options_selected = filter.querySelector('.options-selected')
		const options_counter = filter.querySelector('.options-counter')
		let sum_of_options = parseInt(options_counter.textContent)

		// Ony triggers when the param exists
		if (window.location.href.indexOf('applied-filters') > -1) {
			const site_url = new URL(window.location.href)
			const urlParams = new URLSearchParams(site_url.search.slice(1))

			if (urlParams.has('applied-filters')) {
				let applied_filters = urlParams.get('applied-filters')
				applied_filters = applied_filters.replace(/,/g, ' ').toLowerCase()

				all_checkboxes.forEach(input_selected => {
					const termName = input_selected.dataset.name.toLowerCase()

					if (applied_filters.includes(termName)) {
						const input_name = input_selected.getAttribute('name')
						const input_id = document.getElementById(input_name)

						input_id.click()

						sum_of_options++

						// This adds the term id to the array of filters selected and pushes it.
						if (input_id.checked && !options_pre_selected.includes(termName)) {
							options_pre_selected.push(termName)
						}
					}
				})

				if (sum_of_options == 1) {
					options_counter.classList.remove('opacity-0')
					options_counter.classList.add('opacity-100')
					options_counter.innerHTML = sum_of_options

					// This checks all inputs and takes only the one selected.
					// This also anly applies when there is only one option selected
					all_checkboxes.forEach(checked => {
						const input_name = checked.getAttribute('name')
						const input_id = document.getElementById(input_name)

						if (input_id.checked) {
							options_selected.innerHTML = checked.dataset.name
						}
					})
				}

				if (sum_of_options >= 2) {
					options_counter.classList.remove('opacity-0')
					options_counter.classList.add('opacity-100')
					options_counter.innerHTML = sum_of_options
					options_selected.innerHTML = 'More options selected'
				}

				// Assignes the options selected to the element
				auto_selected.dataset.filtersSelected = options_pre_selected.toString()
			}
		}

		all_checkboxes.forEach(input_selected => {
			input_selected.addEventListener('click', () => {
				const input_name = input_selected.getAttribute('name')
				const input_id = document.getElementById(input_name)

				if (input_id.checked) {
					sum_of_options++
				} else {
					sum_of_options--
				}

				if (sum_of_options == 0) {
					options_counter.classList.add('opacity-0')
					options_counter.classList.remove('opacity-100')
					options_counter.innerHTML = ''
					options_selected.innerHTML = 'SELECT'
					auto_selected.removeAttribute('data-filters-selected')
				}

				if (sum_of_options == 1) {
					options_counter.classList.remove('opacity-0')
					options_counter.classList.add('opacity-100')
					options_counter.innerHTML = sum_of_options

					// This checks all inputs and takes only the one selected.
					// This also anly applies when there is only one option selected
					all_checkboxes.forEach(checked => {
						const input_name = checked.getAttribute('name')
						const input_id = document.getElementById(input_name)

						if (input_id.checked) {
							options_selected.innerHTML = checked.dataset.name
						}
					})
				}

				if (sum_of_options >= 2) {
					options_counter.classList.remove('opacity-0')
					options_counter.classList.add('opacity-100')
					options_counter.innerHTML = sum_of_options
					options_selected.innerHTML = 'More options selected'
				}

				// This checks all inputs and takes only the one selected.
				// This script generates a dynamic parameter to keep track which items in the filter are selected, so when the user comes back to the page the filters auto filter the data
				all_checkboxes.forEach(checked => {
					const termName = checked.dataset.name.toLowerCase()
					const input_name = checked.getAttribute('name')
					const input_id = document.getElementById(input_name)

					if (input_id.checked && !options_pre_selected.includes(termName)) {
						options_pre_selected.push(termName)
					} else if (input_id.checked == false && options_pre_selected.includes(termName)) {
						// Gets item index in array.
						const item_index = options_pre_selected.indexOf(termName)

						// Searches item in array and removes it.
						item_index > -1 ? options_pre_selected.splice(item_index, 1) : false
					}
				})

				// Assignes the options selected to the element
				auto_selected.dataset.filtersSelected = options_pre_selected.toString()
			})
		})
	})
}

// Search box on long term
const internship_search_input = document.getElementById('internships_string')

if (internship_search_input !== null) {
	internship_search_input.onkeydown = event => {
		if (event.keyCode == 13) {
			return false
		}
	}

	internship_search_input.onkeyup = () => {
		return false
	}
}

// Page: /short-term-opportunities
// File : archive-short-terms
// Comments: This script runs when the user clicks on the job.
const internships_found = document.querySelector('.internships_found')

if (internships_found != null) {
	const all_internships_found = internships_found.querySelectorAll('.short-term-job')

	const site_url = new URL(window.location.href)
	let internship_params = new URLSearchParams(site_url.search.slice(1))

	all_internships_found.forEach(internship => {
		const internships_link = internship.querySelector('a')

		internships_link.addEventListener('click', event => {
			// This checks if the filters are selected and appends the values to the params.
			if (
				document.querySelector('.selected_filtered_options').hasAttribute('data-filters-selected')
			) {
				internship_params.set(
					'applied-filters',
					document.querySelector('.selected_filtered_options').dataset.filtersSelected
				)
			} else {
				internship_params.delete('applied-filters')
			}

			internships_link.href =
				internships_link.href + '?' + decodeURIComponent(internship_params.toString())
		})
	})
}
