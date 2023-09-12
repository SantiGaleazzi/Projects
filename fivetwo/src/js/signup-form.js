const signupForm = document.querySelector('.subscribe-form')

if (signupForm) {
	const tab = signupForm.querySelector('.sign-up-tab')

	tab?.addEventListener('click', () => {
		signupForm.classList.toggle('active')
	})
}
