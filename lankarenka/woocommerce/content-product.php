<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<li <?php wc_product_class( '', $product ); ?>>

	<?php

		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		do_action( 'woocommerce_before_shop_loop_item' );

	?>
	<div class="relative">

		<?php

			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );

			
		?>

		<div class="text-left flex items-center justify-between">

			<div>
				<?php

					/**
					 * Hook: woocommerce_shop_loop_item_title.
					 *
					 * @hooked woocommerce_template_loop_product_title - 10
					 */
					do_action( 'woocommerce_shop_loop_item_title' );

					/**
					 * Hook: woocommerce_after_shop_loop_item_title.
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 * 
					 * do_action( 'woocommerce_after_shop_loop_item_title' );
					 */

					woocommerce_template_loop_price();
				?>
			</div>

			<div class="add-to-cart">
				<?php
					echo sprintf( '<a href="%s" data-quantity="1" class="%s" %s><i class="fas fa-plus"></i></a>',
						esc_url( $product->add_to_cart_url() ),
						esc_attr( implode( ' ', array_filter( array(
							'classes', 'product_type_' . $product->get_type(),
							$product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
							$product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
						) ) ) ),
						wc_implode_html_attributes( array(
							'data-product_id'  => $product->get_id(),
							'data-product_sku' => $product->get_sku(),
							'aria-label'       => $product->add_to_cart_description(),
							'rel'              => 'nofollow',
						) )
					);
				?>
			</div>
		</div>	
	</div>


	<?php

		/**
		 * Hook: woocommerce_after_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 * 
		 * do_action( 'woocommerce_after_shop_loop_item' );
		 */
		woocommerce_template_loop_product_link_close();
	?>
</li>
