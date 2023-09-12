const mobileHamburguer = document.querySelector('.mobile-hamburguer')
const mobileMenu = document.querySelector('.mobile-menu')
mobileHamburguer?.addEventListener('click', () => {
	mobileMenu.classList.toggle('show-mobile-menu')
})
