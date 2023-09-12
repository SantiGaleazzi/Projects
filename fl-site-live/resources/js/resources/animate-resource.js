const resources = document.querySelector('.resources-data')

if (resources !== null) {
	const all_resources = resources.querySelectorAll('.resource-item')

	// If Items exists.
	if (all_resources.length > 0) {
		all_resources.forEach((resource, index) => {
			// Animate resource on page load.
			setTimeout(() => {
				resource.classList.add('animating')
			}, 100 * index)
		})
	}
}
