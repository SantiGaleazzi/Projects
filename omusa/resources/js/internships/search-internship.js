// AJAX Job Search
jQuery(document).ready(function ($) {
	// Load the missing jobs. This is the double down arrow
	$('.load-the-new-internships').click(function () {
		var filter = $('#internships-filters') // Form

		$.ajax({
			url: search_for_internship_ajax.ajaxurl,
			type: filter.attr('method'),
			data: filter.serialize(),
			dataType: 'json',
			beforeSend: function () {
				$('.loading-spinner').addClass('is-loading')
			},
			success: function (response) {
				$('.loading-spinner').removeClass('is-loading')

				var page = parseInt(response.page)
				var max_page = parseInt(response.num_max)

				$('#internships-found').append(response.internships)
				$('.total-of-internships-found').text(response.total_of_internships_found)

				if (page === max_page) {
					$('.load-the-new-internships').hide()
				} else {
					$('input#current_internship_page').val(page)
				}

				// Custom Function
				getInternshipsFilters()
			},
		})

		return false
	})

	// Reset Filters
	$('#reset-internship').click(function () {
		document.getElementById('internships-filters').reset()

		resetInternshipFilters()

		$('#internships-found').append()
		$('input#current_internship_page').val(0)

		var filter = $('#internships-filters') // Form

		$.ajax({
			url: search_for_internship_ajax.ajaxurl,
			type: filter.attr('method'),
			data: filter.serialize(),
			dataType: 'json',
			success: function (response) {
				var page = parseInt(response.page)
				var max_page = parseInt(response.num_max)

				$('.load-the-new-internships').show()
				$('input#current_internship_page').val(1)

				if (page === max_page) {
					$('.load-the-new-internships').hide()
				}

				$('#internships-found').html(response.internships)
				$('.total-of-internships-found').text(response.total_of_internships_found)

				// Custom Function
				getInternshipsFilters()
			},
		})

		return false
	})

	// When a field on the form changes,
	$('#internships-filters').change(function () {
		// Used to paginate.
		$('input#current_internship_page').val(0)

		var filter = $('#internships-filters')

		$.ajax({
			type: filter.attr('method'),
			url: search_for_internship_ajax.ajaxurl,
			data: filter.serialize(),
			dataType: 'json',
			success: function (response) {
				var page = parseInt(response.page)
				var max_page = parseInt(response.num_max)

				$('.load-the-new-internships').show()
				$('input#current_internship_page').val(1) // Used Pagination

				if (page === max_page) {
					$('.load-the-new-internships').hide()
				}

				$('#internships-found').html(response.internships)
				$('.total-of-internships-found').text(response.total_of_internships_found)
			},
		})

		return false
	})
})

// This assignes an event to the jobs loaded on the ajax.
function getInternshipsFilters() {
	// This script runs
	const internships_found = document.querySelector('.internships_found')

	if (internships_found != null) {
		const all_internships_found = internships_found.querySelectorAll('.internship-itern')

		const site_url = new URL(window.location.href)
		let internship_params = new URLSearchParams(site_url.search.slice(1))

		all_internships_found.forEach(internship => {
			const internship_link = internship.querySelector('a')

			internship_link.addEventListener('click', event => {
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

				internship_link.href =
					internship_link.href + '?' + decodeURIComponent(internship_params.toString())
			})
		})
	}
}

// This resets the filters and fhe form
function resetInternshipFilters() {
	// This removes the params from the URL without refreshing the browser
	window.history.replaceState({}, '', `${window.location.pathname}`)

	location.reload()
}
