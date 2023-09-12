const headerMenu = document.querySelector('#header-menu')

if (headerMenu) {
	const menuItems = headerMenu.querySelectorAll('li.menu-item-has-children')

	menuItems?.forEach(item => {
		item.insertAdjacentHTML(
			'afterbegin',
			`
        <button class="toogle-open w-7 h-7 flex items-center justify-center md:hidden text-xl text-denim-500 absolute top-4 right-4 rotate-0 transition-transform duration-150 ease-in-out" aria-expanded="false" aria-label="Toggle sub menu">
          <i class="fa-solid fa-chevron-down"></i>
        </button>
      `
		)

		const openButton = item.querySelector('button')

		openButton?.addEventListener('click', () => {
			item.classList.toggle('is-open')
		})
	})
}
