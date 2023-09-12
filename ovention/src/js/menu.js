if (document.documentElement.clientWidth < 767) {
	const mobileNav = document.querySelector('.navigation')
	const menuChildren = mobileNav?.querySelectorAll('.main-menu-item')

	menuChildren?.forEach(parentItem => {
		if (parentItem.classList.contains('menu-item-has-children')) {
			parentItem.querySelector('a.main-menu-link').addEventListener('click', e => {
				e.preventDefault()
				parentItem.querySelector('.dropdown').classList.toggle('is-active')
			})
		}
	})

	// Footer
	const footerMenu = document.querySelector('footer .footer-menu')
	const menuItems = footerMenu?.querySelectorAll('.main-menu-item')

	menuItems?.forEach(parentItem => {
		if (parentItem.classList.contains('menu-item-has-children')) {
			parentItem.querySelector('a.main-menu-link').addEventListener('click', e => {
				e.preventDefault()
				parentItem.classList.toggle('is-active')
			})
		}
	})
}
