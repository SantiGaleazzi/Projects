/*Menu Scroll Animation*/

window.onload = function () {
	//scrollColor()
}

/*Mobile Menu*/

const openMenu = document.querySelector('.action-m')
const mobileMenu = document.querySelector('.mobile-menu')

if (openMenu !== null) {
	openMenu.addEventListener('click', () => {
		mobileMenu.classList.toggle('action-menu')
	})
}

const closeMenu = document.querySelector('.action-close')

if (closeMenu !== null) {
	closeMenu.addEventListener('click', () => {
		mobileMenu.classList.remove('action-menu')
	})
}

/*Move Action Bar*/

function insertAfter(el, referenceNode) {
	referenceNode.parentNode.insertBefore(el, referenceNode.nextSibling)
}

var newEl = document.querySelector('.action-bar')

var ref = document.querySelector('.menu')

if (newEl !== null) {
	insertAfter(ref, newEl)
}
