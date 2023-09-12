
const asideCart = document.querySelector('.aside-cart');
const cartIcon = document.querySelector('.fa-shopping-bag');

// Opens the Asiden Cart lightbox.
cartIcon.addEventListener('click', () => {

    if (!asideCart.classList.contains('.open')) {

        asideCart.classList.add('open');
        document.body.classList.add('overflow-hidden');
        asideCart.querySelector('.cart-container').classList.add('open');

        return;
    }

});

// Close Aside Cart when the user clicks outside the white area, and the times icon.
const toClose = asideCart.querySelectorAll('.close');

Array.prototype.forEach.call(toClose, function (item) {

    item.addEventListener('click', () => {

        asideCart.classList.remove('open');
        document.body.classList.remove('overflow-hidden');
        asideCart.querySelector('.cart-container').classList.remove('open');

        return;

    });

});
