const scrollButton = document.createElement('button')
scrollButton.innerHTML = 'Top'
scrollButton.classList.add(
	'w-10',
	'h-10',
	'flex',
	'items-center',
	'justify-center',
	'text-white',
	'font-bold',
	'rounded-full',
	'p-2',
	'bg-lms-mustard-500',
	'fixed',
	'bottom-4',
	'right-4',
	'z-50',
	'cursor-pointer',
	'drop-shadow-lg'
)

scrollButton.addEventListener('click', () => {
	window.scrollTo({
		top: 0,
		behavior: 'smooth',
	})
})

document.body.appendChild(scrollButton)
