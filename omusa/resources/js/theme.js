const theme_switcher = document.getElementById('theme-switcher')
const theme_color = document.querySelector('.switch-color')
const theme_mode = theme_switcher?.querySelector('.toggle-switch')

localStorage.getItem('theme') === 'theme-dark'
	? (theme_switcher?.classList.add('active'),
	  (theme_mode.innerHTML = `
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-5 text-black-500" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
		</svg>`),
	  document.body.classList.add('theme-dark'),
	  localStorage.setItem('theme', 'theme-dark'),
	  (theme_color.innerHTML = 'Dark'))
	: (theme_switcher?.classList.remove('active'),
	  (theme_mode.innerHTML = `
		<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-5 text-black-500" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
		</svg>`),
	  document.body.classList.add('theme-light'),
	  localStorage.setItem('theme', 'theme-light'),
	  (theme_color.innerHTML = 'Light'))

// This event changes the theme color on click
theme_switcher?.addEventListener('click', () => {
	localStorage.getItem('theme') === 'theme-light'
		? (theme_switcher?.classList.add('active'),
		  (theme_color.innerHTML = 'Dark'),
		  (theme_mode.innerHTML = `
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-5 text-black-500" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
			</svg>`),
		  (document.body.className = document.body.className.replace(/theme-\w+/, 'theme-dark')),
		  localStorage.setItem('theme', 'theme-dark'))
		: (theme_switcher?.classList.remove('active'),
		  (theme_color.innerHTML = 'Light'),
		  (theme_mode.innerHTML = `
			<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-5 text-black-500" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
			</svg>`),
		  (document.body.className = document.body.className.replace(/theme-\w+/, 'theme-light')),
		  localStorage.setItem('theme', 'theme-light'))
})
