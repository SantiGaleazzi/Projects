<?php
/**
 * Order details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.6.0
 */

defined( 'ABSPATH' ) || exit;

$order = wc_get_order( $order_id ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

if ( ! $order ) {
	return;
}

$order_items           = $order->get_items( apply_filters( 'woocommerce_purchase_order_item_types', 'line_item' ) );
$show_purchase_note    = $order->has_status( apply_filters( 'woocommerce_purchase_note_order_statuses', array( 'completed', 'processing' ) ) );
$show_customer_details = is_user_logged_in() && $order->get_user_id() === get_current_user_id();
$downloads             = $order->get_downloadable_items();
$show_downloads        = $order->has_downloadable_item() && $order->is_download_permitted();

if ( $show_downloads ) {
	wc_get_template(
		'order/order-downloads.php',
		array(
			'downloads'  => $downloads,
			'show_title' => true,
		)
	);
}
?>
<section class="woocommerce-order-details">

	<?php do_action( 'woocommerce_order_details_before_order_table', $order ); ?>

	<h2 class="text-2xl text-default mb-4"><?php esc_html_e( 'Detalles del Pedido', 'woocommerce' ); ?></h2>

	<?php
		do_action( 'woocommerce_order_details_before_order_table_items', $order );

		foreach ( $order_items as $item_id => $item ) {
			$product = $item->get_product();

			wc_get_template(
				'order/order-details-item.php',
				array(
					'order'              => $order,
					'item_id'            => $item_id,
					'item'               => $item,
					'show_purchase_note' => $show_purchase_note,
					'purchase_note'      => $product ? $product->get_purchase_note() : '',
					'product'            => $product,
				)
			);
		}

		do_action( 'woocommerce_order_details_after_order_table_items', $order );
	?>

	<div class="text-right px-4 flex flex-col items-end mb-2">
		<?php if ( $order->get_total_refunded() ) : ?>
			<div class="mb-3">
				<p class="text-default"><?php _e('Order Refunded', 'woocommerce'); ?></p>
				<p>$<?= $order->get_total_refunded(); ?>.00</p>
			</div>
		<?php endif; ?>

		<div class="mb-3">
			<p class="text-default"><?php _e('Subtotal', 'woocommerce'); ?></p>
			<p class="text-sm"><?= $order->get_subtotal_to_display(); ?></p>
		</div>
	</div>

	<div class="px-6 py-4 bg-gray-900 flex items-center justify-between rounded-lg mb-6">

		<div>
			<?php if ( $order->get_payment_method() === 'conektaoxxopay' ) : ?>
				<svg xmlns="http://www.w3.org/2000/svg" version="1.0" viewBox="0 0 956.693 519.803" class="w-12"><path d="M35.433 90.172c0-29.6 23.773-53.618 53.129-53.618h779.447c29.33 0 53.128 24.018 53.128 53.618v339.166c0 29.6-23.797 53.593-53.128 53.593H88.562c-29.356 0-53.129-23.993-53.129-53.593V90.172" fill="#fff"/><path d="M36.045 84.761c0-27.225 21.888-49.31 48.869-49.31h787.502c26.98 0 48.844 22.085 48.844 49.31v1.567H36.045V84.76M921.26 433.818v1.224c0 27.225-21.864 49.31-48.844 49.31H84.914c-26.98 0-48.869-22.085-48.869-49.31v-1.224H921.26" fill="#fbb110"/><path d="M648.688 259.375c0 68.92 55.357 124.791 123.665 124.791 68.284 0 123.665-55.87 123.665-124.79 0-68.946-55.381-124.816-123.665-124.816-68.308 0-123.665 55.87-123.665 124.815zm-589.604 0c0 68.92 55.38 124.791 123.689 124.791 68.284 0 123.665-55.87 123.665-124.79 0-68.946-55.381-124.816-123.665-124.816-68.308 0-123.69 55.87-123.69 124.815zM921.26 410.192H311.506c10.993-7.786 21.227-18.436 32.39-32.808l62.115-79.986 27.127 34.594 30.188-40.52-26.393-33.909 63.216-81.43c20.076-25.83-18.314-56.19-38.39-30.36l-55.87 71.98-56.802-72.935c-20.1-25.756-58.417 4.677-38.316 30.457l64.195 82.313-69.459 89.437c-24.679 31.78-49.309 60.914-98.202 63.167H36.045V109.954h606.547c-10.43 7.688-20.272 17.995-30.947 31.755l-62.09 79.962-27.151-34.57-30.163 40.52 26.393 33.884-63.24 81.431c-20.052 25.83 18.337 56.19 38.39 30.36l55.894-71.957 56.801 72.911c20.101 25.781 58.417-4.651 38.316-30.432l-64.194-82.337 69.458-89.413c22.672-29.233 45.319-56.213 86.793-62.114H921.26v300.238zM698.316 259.375c0-41.278 33.15-74.723 74.037-74.723 40.887 0 74.013 33.445 74.013 74.723 0 41.254-33.126 74.698-74.013 74.698-40.887 0-74.037-33.444-74.037-74.698zm-589.58 0c0-41.278 33.15-74.723 74.037-74.723 40.862 0 74.013 33.445 74.013 74.723 0 41.254-33.15 74.698-74.013 74.698-40.887 0-74.037-33.444-74.037-74.698" fill="#e70020"/></svg>
			<?php endif; ?>
		</div>

		<div class="text-right">
			<div>
				<p class="text-white"><?php _e('Total', 'woocommerce'); ?></p> 
				<p class="text-sm"><?= $order->get_formatted_order_total(); ?></p>
			</div>
		</div>

	</div>

	<?php if ( $order->get_customer_note() ) : ?>
		<div class="order-note py-4 border-t-2 border-b-2 border-gray-300 mb-6">
			<h2 class="text-2xl text-default mb-4"><?php _e('Notes', 'woocommerce'); ?></h2>
			<div class="px-4 py-3 bg-yellow-100 rounded-lg">
				<p class="text-yellow-700"><?php echo wp_kses_post( nl2br( wptexturize( $order->get_customer_note() ) ) ); ?></p>
			</div>
		</div>
	<?php endif; ?>

	<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>
</section>

<?php
/**
 * Action hook fired after the order details.
 *
 * @since 4.4.0
 * @param WC_Order $order Order data.
 */
do_action( 'woocommerce_after_order_details', $order );

if ( $show_customer_details ) {
	wc_get_template( 'order/order-details-customer.php', array( 'order' => $order ) );
}
