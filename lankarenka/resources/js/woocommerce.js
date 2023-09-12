/*********************
 * WooCommerce
* *******************/

// Animating the products on Page Load
const products = document.querySelector('.products');

// This conditional helps removing console errors in case the product does not have any related products
if (products) {

    const product = products.querySelectorAll('.product');

    product.forEach((item, index) => {

        // Adds an extra wrap to the product image
        let productImage = item.querySelector('.attachment-woocommerce_thumbnail');
        const imageWrapper = document.createElement('div');

        imageWrapper.className = 'product-image';
        productImage.parentNode.insertBefore(imageWrapper, productImage);
        imageWrapper.appendChild(productImage);

        setTimeout(() => {
            item.classList.add('animating');
        }, 100 * index);

    });

}