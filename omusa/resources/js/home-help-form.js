const help_form = document.querySelector('.home-help-form')

if (help_form != null) {
	const donate_button = help_form.querySelector('.help-button')
	const original_url = donate_button.getAttribute('href')

	donate_button.addEventListener('click', () => {
		const donation_input = document.querySelector('#donation-amount')
		let params_values = {}

		const default_values = {
			amt: donation_input.value,
		}

		if (donation_input.dataset.params) {
			params_values = JSON.parse(donation_input.dataset.params)
		}

		const donation_url = donate_button.getAttribute('href')

		const stringParams = new URLSearchParams({
			...default_values,
			...params_values,
		})

		donate_button.href = donation_url + '?' + stringParams.toString()

		setTimeout(() => {
			donate_button.href = original_url
		}, 200)
	})
}
