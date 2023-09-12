<?php
    $cart = WC()->cart;
    $cart_count = WC()->cart->get_cart_contents_count();
    $cart_items = WC()->cart->get_cart();

?>

<div class="aside-cart">
    <div class="close w-full h-full absolute top-0 left-0 bg-gray-500 opacity-50"></div>

    <div class="cart-container">
        <div class="close text-purple-500 md:text-purple-100 text-2xl cursor-pointer absolute top-2 left-6 md:-left-9 md:top-6"><i class="fas fa-times" aria-hidden="true"></i></div>

        <div class="flex-initial flex items-center justify-between mb-6">
            <h1 class="text-xl font-medium">Mi Carrito</h1>
            <span class="text-purple-500"><?= $cart_count; ?> producto<?php if ( $cart_count > 1 || $cart_count == 0) : echo 's'; endif;  ?></span>
        </div>
        

            <?php if ( $cart_count == 0 ) : ?>
                <div class="flex-auto flex items-center justify-center">
                    <div class="text-center px-6">
                        <i aria-hidden="true" class="fas fa-shopping-bag text-4xl mb-3"></i>
                        <h3 class="text-xl font-medium mb-2">El Carrito está vacío</h3>
                        <p class="text-sm text-gray-500 mb-4">Consulta todos los productos disponibles y compra algunos en la tienda</p>
                        <a href="/shop" aria-label="Go to the Store" class="text-purple-100 leading-none text-sm px-5 py-3 bg-purple-500 rounded inline-block">Ir a la tienda <i class="fas fa-chevron-right ml-2"></i></a>
                    </div>
                </div>
            <?php
                else :
            ?>
            <div class="products">
            <?php
                foreach ($cart_items as $item => $values) : 

                    $price = 0;
                    $product = wc_get_product( $values['data']->get_id() );
            ?>
                <div class="py-2 rounded flex items-center">
                        
                    <div class="w-12 rounded overflow-hidden mr-3">
                        <?= $product->get_image(); ?>
                    </div>
                    <div class="flex-1">
                        <a href="<?= get_permalink( $product->get_id() ); ?>" class="hover:text-purple-500"><?= $product->get_name(); ?></a>
                        <?php
                            if ( $product->get_sale_price() ) : 
                            
                            $price = ($product->get_sale_price() * $values['quantity']);
                        ?>
                            <p class="text-green-500">$<?= $price; ?></p>
                        <?php 
                            else:
                            $price = ($product->get_price() * $values['quantity']);
                        ?>
                            <p class="text-green-500">$<?= $price; ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="w-8">
                        <span class="text-sm text-gray-500">x <?= $values['quantity']; ?></span>
                    </div>
                    <div class="w-8 text-center ml-2">
                            
                        <?php
                            echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                'woocommerce_cart_item_remove_link',
                                sprintf(
                                    '<a href="%s" class="text-red-400 px-2 py-1" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="fas fa-times cursor-pointer"></i></a>',
                                        esc_url( wc_get_cart_remove_url( $item ) ),
                                        esc_html__( 'Remove this item', 'woocommerce' ),
                                        esc_attr( $values['product_id'] ),
                                        esc_attr( $product->get_sku() )
                                    ),
                                $item
                            );
                        ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="flex-initial">
                <div class="flex items-center justify-between pt-4 border-t-2 mb-4">
                    <span>Subtotal:</span>
                    <span><?= WC()->cart->get_cart_subtotal(); ?></span>
                </div>
                <div>
                    <a href="/cart" aria-label="View Cart" class="text-sm text-purple-500 text-center px-5 py-2 border-2 border-purple-500 rounded block mb-3">Ver Carrito</a>
                    <a href="/checkout" aria-label="Checkout" class="text-purple-100 text-sm text-center px-5 py-2 bg-purple-500 border-2 border-purple-500 rounded block">Ir al Pago</a>
                </div>
            </div>
            <?php endif; ?>
        
    </div>
</div>