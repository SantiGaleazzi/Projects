<?php
/**
 * View Order
 *
 * Shows the details of a particular order on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/view-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.0.0
 */

defined( 'ABSPATH' ) || exit;

$notes = $order->get_customer_order_notes();
?>

<div class="account">

    <div class="flex items-center justify-between mb-6">
        <div>
            <span class="text-base">#<?= $order->get_order_number(); ?></span>
            <h1 class="text-3xl text-default font-normal"><?php _e('Ver Pedido', 'woocommerce'); ?></h1>
            <p class="text-sm capitalize"><?= wc_format_datetime( $order->get_date_created() ); ?></p>
        </div>
        <span class="account__order-status <?= str_replace(' ', '-', strtolower(wc_get_order_status_name( $order->get_status() ))); ?>"><?= wc_get_order_status_name( $order->get_status() ); ?></span>
    </div>

    <p class="hidden account__message">
        <?php
            printf(
                // translators: 1: order number 2: order date 3: order status
                esc_html__( 'Order #%1$s was placed on %2$s and is currently %3$s.', 'woocommerce' ),
                '<mark class="order-number">' . $order->get_order_number() . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                '<mark class="order-date">' . wc_format_datetime( $order->get_date_created() ) . '</mark>', // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                '<mark class="order-status">' . wc_get_order_status_name( $order->get_status() ) . '</mark>' // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            );
        ?>
    </p>

    <?php if ( $notes ) : ?>

        <div class="pt-4 pb-4 border-t-2 border-b-2 border-gray-300 mb-6">

            <h2 class="text-2xl text-default mb-3"><?php esc_html_e( 'Order Updates', 'woocommerce' ); ?></h2>

            <?php foreach ( $notes as $note ) : ?>

                <div class="mb-4">
                    <p class="text-sm text-gray-500 mb-2"><?php echo date_i18n( esc_html__( 'l jS \o\f F Y, h:ia', 'woocommerce' ), strtotime( $note->comment_date ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                    <div class="px-4 py-3 bg-yellow-100 rounded-lg">
                        <p class="text-yellow-700"><?= wptexturize( $note->comment_content ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
                    </div>
                </div>

            <?php endforeach; ?>
        
        </div>
        
    <?php endif; ?>

    <?php do_action( 'woocommerce_view_order', $order_id ); ?>
    
</div>

