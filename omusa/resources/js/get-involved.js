// This lets the user scroll to the selected opportunity.
const opportunities = document.querySelector('.opportunities-involved')

if (opportunities !== null) {
	const all_opportunities = opportunities.querySelectorAll('.opportunity')

	all_opportunities.forEach(opportunity => {
		opportunity.addEventListener('click', () => {
			const name = opportunity.dataset.name

			document.querySelector('.' + name).scrollIntoView()
		})
	})
}
