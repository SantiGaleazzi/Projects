const tabs = document.querySelector('.custom-tabs-ovention')

if (tabs !== null) {
	const allTabs = tabs.querySelectorAll('.custom-tab')

	allTabs.forEach(tab => {
		const tabTitle = tab.querySelector('.custom-tab-title')

		tabTitle.addEventListener('click', () => {
			allTabs.forEach(tab => {
				tab.classList.remove('active')
			})

			tab.classList.add('active')
		})
	})
}
