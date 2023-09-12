// Custom buttons that have been added to the
// woocommerce_before_add_to_cart_quantity and woocommerce_after_add_to_cart_quantity hooks

const cartSingle = document.querySelector('.product-type-simple form');
const cartVariable = document.querySelector('.product-type-variable form');
const cartGrouped = document.querySelector('.product-type-grouped form');
// const archiveQuantity = document.querySelector('.post-type-archive-product');

// All Single Products.
if (cartSingle !== null || cartVariable !== null) {

    const cartPlus = document.querySelector('.cart-plus');
    const cartMinus = document.querySelector('.cart-minus');
    const cartQuantity = document.querySelector('input.qty');

    // Add product count
    cartPlus.addEventListener('click', () => {

        let amount = parseInt(cartQuantity.value);
        const maxQty = parseInt(cartQuantity.getAttribute('max'));
        const step = parseInt(cartQuantity.getAttribute('step'));

        if (maxQty && (amount == maxQty)) {

            return;

        }

        cartQuantity.value = amount + step;

    });

    // Remove product count
    cartMinus.addEventListener('click', () => {

        let amount = parseInt(cartQuantity.value);
        const minQty = parseInt(cartQuantity.getAttribute('min'));
        const step = parseInt(cartQuantity.getAttribute('step'));

        if (minQty && (minQty >= amount)) {

            cartQuantity.value = minQty;


        } else if (amount > 1) {

            cartQuantity.value = amount - step;

        }

    });
}

// All Grouped Products.
if (cartGrouped !== null) {

    const allGroupProducts = cartGrouped.querySelectorAll('.woocommerce-grouped-product-list-item__quantity')

    allGroupProducts.forEach((product) => {

        const cartQuantity = product.querySelector('input.qty');
        const addButton = product.querySelector('.cart-plus');
        const removeButton = product.querySelector('.cart-minus');

        // Add quantity
        addButton.addEventListener('click', () => {

            let amount = parseInt(cartQuantity.value);
            const maxQty = parseInt(cartQuantity.getAttribute('max'));
            const step = parseInt(cartQuantity.getAttribute('step'));

            if (maxQty && (amount == maxQty)) {

                return;

            }

            cartQuantity.value = amount + step;

        });

        // Remove quantity
        removeButton.addEventListener('click', () => {

            let amount = parseInt(cartQuantity.value);
            const minQty = parseInt(cartQuantity.getAttribute('min'));
            const step = parseInt(cartQuantity.getAttribute('step'));

            if (minQty && (minQty >= amount)) {

                cartQuantity.value = minQty;


            } else if (amount > 1) {

                cartQuantity.value = amount - step;

            }

        });

    });

}

/*
if (archiveQuantity !== null) {

    const products = archiveQuantity.querySelectorAll('.product.product-type-simple');

    products.forEach( (product) => {

        const quantity = product.querySelector('.qty');
        
        quantity.addEventListener('change', () => {

            const button = product.querySelector('.add_to_cart_button');
            
            button.setAttribute('data-quantity', quantity.value);

        });

    });
} */