<?php 
    
    // Function that adds the minus button to the quantity field
    function add_quantity_minus_button() {
        echo 
            '<div class="product-qty">' .
                '<span>Cantidad:</span>' .
                '<div class="woo-quantity">' .
                    '<button type="button" class="cart-minus"><i class="fas fa-minus"></i></button>';
    }
    add_action( 'woocommerce_before_add_to_cart_quantity', 'add_quantity_minus_button' );

    // Function that adds plus button to the quantity field.
    function add_quantity_plus_button() {
        echo
                    '<button type="button" class="cart-plus"><i class="fas fa-plus"></i></button>'.
                '</div>'.
            '</div>';
    }

    add_action( 'woocommerce_after_add_to_cart_quantity', 'add_quantity_plus_button' );
