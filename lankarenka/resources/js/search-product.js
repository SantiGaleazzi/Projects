// Navigation Search Product
const hamburger = document.querySelector('.hamburger');
const mobileNav = document.querySelector('.mobile-header');
const searchIcon = document.querySelector('.fas.fa-search');
const searchContainer = document.querySelector('.search-for-product');

searchIcon.addEventListener('click', () => {

    if ( !searchContainer.classList.contains('open') ) {

        searchContainer.classList.add('open');
        document.body.classList.add('overflow-hidden');

        if ( mobileNav.classList.contains('open') ) {

            mobileNav.classList.remove('open');
            hamburger.classList.remove('open');

        }

        return;
    }

});

const toClose = searchContainer.querySelectorAll('.close');

Array.prototype.forEach.call(toClose, function (item) {

    item.addEventListener('click', () => {
    
        searchContainer.classList.remove('open');
        document.body.classList.remove('overflow-hidden');
        searchContainer.querySelector('.search-field').value = '';
    
        return;
    
    });
    
});
