const prays = document.querySelectorAll('.pray-in-wall')

prays?.forEach(pray => {
	const pray_button = pray.querySelector('button')

	pray_button?.addEventListener('click', () => {
		pray_button.innerHTML = 'I Prayed for You'
		pray_button.classList.add('opacity-25', 'cursor-not-allowed')
	})
})
