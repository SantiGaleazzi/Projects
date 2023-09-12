<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

$cart_gallery = get_field('cart_background_gallery');
$cart_link = get_field('woo_settings_cart_button');
$cart_link_target = $cart_link['target'] ? $cart_link['target'] : '_self';

?>

<div class="empty-cart">

    <div class="w-full md:w-1/2 h-full absolute top-0 right-0 bg-center bg-cover" style="background-image: url('<?= $cart_gallery['url']; ?>');">
        <div class="w-full h-full absolute top-0 left-0 bg-gray-800 opacity-75 md:opacity-0"></div>
    </div>
    
    <div class="container px-10 md:px-6 h-full">
        <div class="w-full md:w-2/5 h-full flex items-center justify-center md:justify-start">
            <div>
                <?php
                    /*
                    * @hooked wc_empty_cart_message - 10
                    */
                    do_action( 'woocommerce_cart_is_empty' );
                    
                    if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
                        <div class="empty-cart-info">
                            <h1 class="font-serif leading-none text-white md:text-default text-5xl mb-3"><?php the_field('woo_cart_empty_title'); ?></h1>
                            <p class="text-gray-500 mb-6"><?php the_field('woo_cart_empty_description'); ?></p>
                            <p class="return-to-shop">
                                <a class="button wc-backward" href="<?= $cart_link['url']; ?>" target="<?= esc_attr($cart_link_target); ?>">
                                    <?= $cart_link['title']; ?> <i class="fas fa-chevron-right ml-2"></i>
                                </a>
                            </p>
                        </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
