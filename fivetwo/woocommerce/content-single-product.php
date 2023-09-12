<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
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
                <p>
                    Glad you stopped by our store! Our guides, videos and books provide the tools and sacramental theology you need to launch your start-up.
                    <br>
                    Here’s a great way to get started: purchase Assessment, as either part of our StartNew Incubator or as a standalone product that helps you discover the startup Jesus has placed in you.
                </p>
            </div>
            <div class="woocommerce__cart">
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
<div id="product-<?php the_ID(); ?>" <?php wc_product_class('grid-container'); ?>>
	<div class="grid-x grid-margin-x">
	    <div class="cell large-11 flex-container flex-dir-column medium-flex-dir-row">
	<?php
		/**
		 * Hook: woocommerce_before_single_product_summary.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		do_action( 'woocommerce_before_single_product_summary' );
	?>

        	<div class="summary entry-summary">
        		<?php
        			/**
                     * Hook: woocommerce_single_product_summary.
                     *
                     * @hooked woocommerce_template_single_title - 5
                     * @hooked woocommerce_template_single_rating - 10
                     * @hooked woocommerce_template_single_price - 10
                     * @hooked woocommerce_template_single_excerpt - 20
                     * @hooked woocommerce_template_single_add_to_cart - 30
                     * @hooked woocommerce_template_single_meta - 40
                     * @hooked woocommerce_template_single_sharing - 50
                     * @hooked WC_Structured_Data::generate_product_data() - 60
                     */
                    do_action( 'woocommerce_single_product_summary' );
        		?>

        	</div>
		</div>
	</div>
    <div class="grid-x grid-margin-x">
        <div class="cell large-11">
            <?php
                /**
                 * Hook: woocommerce_after_single_product_summary.
                 *
                 * @hooked woocommerce_output_product_data_tabs - 10
                 * @hooked woocommerce_upsell_display - 15
                 * @hooked woocommerce_output_related_products - 20
                 */
                do_action( 'woocommerce_after_single_product_summary' );
            ?>
        </div>
    </div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
