<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_account_orders', $has_orders ); ?>

<div class="account">

    <div class="mb-4">
        <p class="text-sm text-gray-500 tracking-widest uppercase"><?php _e('Descripción General', 'woocommerce'); ?></p>
        <h1 class="text-3xl text-default font-normal"><?php _e('Mis Pedidos', 'woocommerce'); ?></h1>
    </div>

    <?php if ( $has_orders ) : ?>

        <table class="hidden woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
            <thead>
                <tr>
                    <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
                        <th class="woocommerce-orders-table__header woocommerce-orders-table__header-<?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
                    <?php endforeach; ?>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ( $customer_orders->orders as $customer_order ) {
                    $order      = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
                    $item_count = $order->get_item_count() - $order->get_item_count_refunded();

                    ?>

                    
                    <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr( $order->get_status() ); ?> order">

                        <?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>

                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr( $column_id ); ?>" data-title="<?php echo esc_attr( $column_name ); ?>">

                                <?php if ( has_action( 'woocommerce_my_account_my_orders_column_' . $column_id ) ) : ?>

                                    <?php do_action( 'woocommerce_my_account_my_orders_column_' . $column_id, $order ); ?>

                                <?php elseif ( 'order-number' === $column_id ) : ?>
                                    <a href="<?php echo esc_url( $order->get_view_order_url() ); ?>">
                                        <?php echo esc_html( _x( '#', 'hash before order number', 'woocommerce' ) . $order->get_order_number() ); ?>
                                    </a>

                                <?php elseif ( 'order-date' === $column_id ) : ?>
                                    <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>

                                <?php elseif ( 'order-status' === $column_id ) : ?>
                                    <?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>

                                <?php elseif ( 'order-total' === $column_id ) : ?>
                                    <?php
                                    /* translators: 1: formatted order total 2: total order items */
                                    echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ) );
                                    ?>

                                <?php elseif ( 'order-actions' === $column_id ) : ?>
                                    <?php
                                    $actions = wc_get_account_orders_actions( $order );

                                    if ( ! empty( $actions ) ) {
                                        foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
                                            echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
                                        }
                                    }
                                    ?>
                                <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

        <section>

            <div class="text-black text-sm px-4 md:px-6 py-4 flex items-center justify-between">
                <div class="w-24 md:w-32 mr-3">
                    <?php _e('ID de pedido', 'woocommerce'); ?>
                </div>
                <div class="flex-1 mr-3">
                    <?php _e('Product', 'woocommerce'); ?>
                </div>
                <div class="hidden md:block md:w-24 mr-3">
                    <?php _e('Status', 'woocommerce'); ?>
                </div>
                <div class="w-20">
                    <?php _e('Total', 'woocommerce'); ?>
                </div>
                <div class="w-10">
                </div>
            </div>

            <?php 
            
                foreach ( $customer_orders->orders as $customer_order ) :

                    $order        = wc_get_order( $customer_order ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited
                    $order_status = $order->get_status();
                    $item_count   = $order->get_item_count() - $order->get_item_count_refunded();

                    // Has been added.
                    // Get product and order details
                    foreach ( $order->get_items() as $item_id => $item ) {

                        $name      = $item->get_name();
                        $product   = $item->get_product();
                        $category = '';

                        if ( $product->get_categories() ) {

                            $category = $product->get_categories();

                        }

                        $image_id  = $product->get_image_id();
                        $image_url = wp_get_attachment_image_url( $image_id, 'full' );

                    }
            ?>
                <div class="text-black text-sm px-4 md:px-6 py-4 bg-white rounded-lg border-2 flex items-center justify-between mb-4 hover:shadow-xl transition duration-200 ease-in-out order order-status<?php echo esc_attr( $order->get_status() ); ?>">
                    <div class="w-24 md:w-32 order-id leading-none mr-3">
                        <div class="capitalize text-xs text-gray-500 mb-1">
                            <time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>
                        </div>
                        <a href="<?= esc_url( $order->get_view_order_url() ); ?>"># <?= $order->get_order_number(); ?></a>
                    </div>

                    <div class="flex-1 leading-none order-product mr-3">
                        <a href="<?= esc_url( $order->get_view_order_url() ); ?>" class="flex items-center">
                            <div class="flex-none w-8">
                                <img src="<?= $image_url; ?>" alt="<?= $name; ?>" class="w-8 h-8 rounded-full">
                            </div>
                            <div class="hidden md:inline-block ml-3">
                                <p class="text-xs text-gray-500 mb-1"><?= strip_tags($category); ?></p>
                                <p class="truncate"><?= $name; ?></p>
                            </div>
                        </a>
                    </div>

                    <div class="hidden md:block md:w-24 order-status mr-3">

                        <span class="text-xs text-white px-3 py-1 inline-block capitalize
                            <?php
                            
                                if ($order_status === 'on-hold' || $order_status === 'pending' || $order_status === 'processing') :
                                    echo 'bg-blue-400';

                                    elseif ( $order_status === 'completed') :

                                        echo 'bg-green-400';

                                    elseif ( $order_status === 'failed' || $order_status === 'cancelled') :

                                        echo 'bg-red-400';

                                    elseif ( $order_status === 'refunded') :

                                        echo 'bg-teal-400';
                                    
                                endif;
                            ?>
                        ">
                            <?= esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
                        </span>
                    </div>

                    <div class="w-20 leading-none order-total">
                       <p class="text-xs text-gray-500 mb-1"> <?= $item_count; ?> producto<?php if ( $item_count > 1 ): echo 's'; endif; ?></p>
                        <?= $order->get_formatted_order_total(); ?>
                    </div>

                    <div class="w-10 leading-none pl-4 order-action">
                        <a href="<?= esc_url( $order->get_view_order_url() ); ?>"><i class="far fa-eye text-gray-500"></i></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </section>

        <?php do_action( 'woocommerce_before_account_orders_pagination' ); ?>

        <?php if ( 1 < $customer_orders->max_num_pages ) : ?>
            <div class="woocommerce-pagination woocommerce-pagination--without-numbers woocommerce-Pagination">
                <?php if ( 1 !== $current_page ) : ?>
                    <a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page - 1 ) ); ?>"><?php esc_html_e( 'Previous', 'woocommerce' ); ?></a>
                <?php endif; ?>

                <?php if ( intval( $customer_orders->max_num_pages ) !== $current_page ) : ?>
                    <a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button" href="<?php echo esc_url( wc_get_endpoint_url( 'orders', $current_page + 1 ) ); ?>"><?php esc_html_e( 'Next', 'woocommerce' ); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>


    <?php else : ?>
        <div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
            <a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
                <?php esc_html_e( 'Buscar Productos', 'woocommerce' ); ?>
            </a>
            <p><?php esc_html_e( 'No order has been made yet.', 'woocommerce' ); ?></p>
        </div>
    <?php endif; ?>

</div>
<?php do_action( 'woocommerce_after_account_orders', $has_orders ); ?>
