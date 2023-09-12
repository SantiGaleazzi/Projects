<?php
/**
 * Order Item Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-item.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! apply_filters( 'woocommerce_order_item_visible', true, $item ) ) {
	return;
}
?>

<div class="<?= esc_attr( apply_filters( 'woocommerce_order_item_class', 'woocommerce-table__line-item order_item', $item, $order ) ); ?> text-black text-sm px-5 py-4 bg-white rounded-lg border-2 flex items-center justify-between hover:shadow-md mb-4 transition duration-200 ease-in-out">
	<div class="product-name">
		<?php
			$is_visible        = $product && $product->is_visible();
			$category  = $product->get_categories();
			$image_id  = $product->get_image_id();
            $image_url = wp_get_attachment_image_url( $image_id, 'full' );
			$product_permalink = apply_filters( 'woocommerce_order_item_permalink', $is_visible ? $product->get_permalink( $item ) : '', $item, $order );

			$qty          = $item->get_quantity();
			$refunded_qty = $order->get_qty_refunded_for_item( $item_id );

			if ( $refunded_qty ) {

				$qty_display = '<del class="text-gray-400">' . esc_html( $qty ) . '</del> <ins>' . esc_html( $qty - ( $refunded_qty * -1 ) ) . '</ins>';

			} else {

				$qty_display = esc_html( $qty );

			}

		?>
			<div class="flex items-center">
				<div class="flex-none w-10 h-10 mr-3">
					<img src="<?= $image_url; ?>" alt="" class="w-10 h-10 rounded-full">
				</div>

				<div>
					<?php
						echo apply_filters( 'woocommerce_order_item_quantity_html', ' <p class="product-category text-xs leading-none text-gray-500">' . sprintf( '%s', $category ) . '</p>', $item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
						echo wp_kses_post( apply_filters( 'woocommerce_order_item_name', $product_permalink ? sprintf( '<a href="%s">%s</a>', $product_permalink, $item->get_name() ) : $item->get_name(), $item, $is_visible ) );
					?>
				</div>
			</div>
		<?php


			do_action( 'woocommerce_order_item_meta_start', $item_id, $item, $order, false );

				wc_display_item_meta( $item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

			do_action( 'woocommerce_order_item_meta_end', $item_id, $item, $order, false );
		?>
	</div>

	<div class="product-total">
		<?= apply_filters( 'woocommerce_order_item_quantity_html', ' <p class="product-quantity text-xs text-gray-500">' . sprintf( '%s items', $qty_display ) . '</p>', $item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
		<?= $order->get_formatted_line_subtotal( $item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>
</div>

<?php if ( $show_purchase_note && $purchase_note ) : ?>

	<div class="bg-white mb-6">
		<?php echo wpautop( do_shortcode( wp_kses_post( $purchase_note ) ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
	</div>

<?php endif; ?>
