const ovensList = document.querySelector('.ovens-list')
const ovens = ovensList?.querySelectorAll('.oven')
const ovensSelect = ovensList?.querySelector('.js-ovens-dropdown')
const ovensOptions = ovensList?.querySelector('.js-ovens-options')

// Mobile dropdown
ovensSelect?.addEventListener('click', () => {
	ovensSelect.classList.toggle('is-open')
	ovensOptions.classList.toggle('is-open')
})

ovens?.forEach(oven => {
	oven.addEventListener('click', () => {
		ovens?.forEach(oven => {
			oven.classList.remove('is-selected')
		})

		oven.classList.add('is-selected')

		fetch(`/wp-json/oven-app/v1/oven/${oven.dataset.ovenId}`)
			.then(response => response.json())
			.then(response => {
				document.querySelector('.js-oven-image').src = response.feature_image
				document.querySelector('.js-oven-title').innerHTML = response.post_title
				document.querySelector('.js-oven-description').innerHTML = response.post_intro
				document.querySelector('.js-oven-link').href = response.permalink
				document.querySelector('.js-oven-link .js-link-text').innerHTML = `Learn more about ${response.oven_name} Ovens`

				if (ovensOptions.classList.contains('is-open')) {
					document.querySelector('.js-selected-oven').innerHTML = response.post_title
					ovensSelect.classList.remove('is-open')
					ovensOptions.classList.remove('is-open')
				}
			})
	})
})
