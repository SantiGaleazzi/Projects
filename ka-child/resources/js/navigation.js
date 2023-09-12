if (document.documentElement.clientWidth < 767) {
	const menuItems = document.querySelectorAll('.header-menu .menu-item-has-children')

	menuItems?.forEach(item => {
		item.insertAdjacentHTML(
			'beforeend',
			`<button class="toogle-submenu tw-w-12 tw-h-12 tw-p-0 tw-bg-transparent hover:tw-bg-transparent tw-flex tw-items-center tw-justify-center md:tw-hidden tw-absolute tw-top-0 tw-right-0 tw-border-l tw-border-solid tw-border-gray-200" aria-label="Close Option" aria-expanded="false">
        <svg width="24" height="24" class="tw-text-blue-800 tw-transition-transform tw-rotate-0 tw-duration-200 tw-ease-in-out" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6 9L12 15L18 9" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
      </button>`
		)

		item.querySelector('.toogle-submenu').addEventListener('click', () => {
			item.classList.toggle('is-active')
		})
	})
}
