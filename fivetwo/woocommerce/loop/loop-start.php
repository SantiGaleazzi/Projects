<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
<div class="woocommerce__header grid-container">
    <div class="grid-x grid-margin-x">
        <div class="cell large-11">
            <h6 class="woocommerce__subtitle">FiveTwo Resources for Purchase</h6>
            <h2 class="woocommerce__title">STORE</h2>
        </div>
        <div class="cell large-11 flex-container flex-dir-column large-flex-dir-row align-justify align-middle">
            <div class="woocommerce__description">
                <p>Glad you stopped by our store! Our guides, videos and books provide the tools and sacramental theology you need to launch your start-up. </p>
                <p>
                    Here’s a great way to get started: purchase Assessment, as either part of our StartNew Incubator or as a standalone product that helps you discover the startup Jesus has placed in you.
                </p>
            </div>
            <div class="woocommerce__cart">
                <a class="my-account button light-blue" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account',''); ?>"><?php _e('My Account',''); ?></a>

                <?php if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) :

                    $count = WC()->cart->cart_contents_count;
                    ?>
                    <a class="cart-contents button light-blue" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
                        VIEW CART
                        <?php
                        if ( $count > 0 ) :
                        ?>
                        <span class="woocommerce__cart-count"><?php echo esc_html( $count ); ?></span>
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="grid-container">
<div class="grid-x grid-margin-x products woocommerce__products columns-<?php echo esc_attr( wc_get_loop_prop( 'columns' ) ); ?>">
