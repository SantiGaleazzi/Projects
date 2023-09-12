const reset_filters = document.getElementById('reset-resources')

if (reset_filters != null) {
	reset_filters.addEventListener('click', () => {
		document.getElementById('filters-data').reset()

		resetResourcesFilters()
	})
}

// This resets the filters and fhe form
function resetResourcesFilters() {
	// This removes the params from the URL without refreshing the browser
	window.history.replaceState({}, '', `${window.location.pathname}`)

	location.reload()
}
