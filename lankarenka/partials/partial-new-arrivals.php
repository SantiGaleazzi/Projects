<section class="new-arrivals px-6 py-12 md:py-20 bg-gray-100">
    <div class="container">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-medium"><?php the_field('home_new_arrivals_title'); ?></h2>
            <?php if ( get_field('home_new_arrivals_description') ) : ?>
                <div><?php the_field('home_new_arrivals_description'); ?></div>
            <?php endif; ?>
        </div>

        <div class="arrival-container">
            <div class="swiper-wrapper mb-4">
                    <?php
                    
                        $query = new WC_Product_Query( array(
                            'limit' => 7,
                            'orderby' => 'rand',
                            'order' => 'DESC',
                            'status' => 'publish',
                        ));

                        $products = $query->get_products();
                        
                        if ( !empty($products) ) :
                            
                        foreach ($products as $product) :
                            
                            $sale_price = $product->get_sale_price();
                    ?>
                        <div class="product swiper-slide px-2 md:px-3 mb-0">
                            <div class="imagery relative">
                                <a href="<?= get_permalink( $product->get_id() ); ?>">
                                    
                                    <?= $product->get_image(); ?>

                                    <?php if ($sale_price) :?>
                                        <span class="text-xs text-purple-100 font-medium leading-none tracking-wider px-3 py-2 bg-purple-500 hover:bg-purple-600 rounded flex items-center justify-center uppercase transition-all duration-200 ease-in-out absolute top-4 left-4 hover:px-6 hover:left-6 z-10"><i class="fas fa-tag"></i></span>
                                    <?php endif; ?>
                                </a>
                                <div class="add-to-cart">
                                    <?php
                                        echo sprintf( '<a href="%s" data-quantity="1" class="%s" %s>%s</a>',
                                            esc_url( $product->add_to_cart_url() ),
                                            esc_attr( implode( ' ', array_filter( array(
                                                'text-sm text-purple-100 font-medium leading-none px-5 py-3 bg-purple-500 hover:bg-purple-600 rounded transition-all duration-500 ease-in-out inline-block', 'product_type_' . $product->get_type(),
                                                $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                                                $product->supports( 'ajax_add_to_cart' ) ? 'ajax_add_to_cart' : '',
                                            ) ) ) ),
                                            wc_implode_html_attributes( array(
                                                'data-product_id'  => $product->get_id(),
                                                'data-product_sku' => $product->get_sku(),
                                                'aria-label'       => $product->add_to_cart_description(),
                                                'rel'              => 'nofollow',
                                            ) ),
                                            esc_html( $product->add_to_cart_text() )
                                        );
                                    ?>    
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-xs text-gray-400"><?= $product->get_categories(); ?></p>
                                <a href="<?= get_permalink( $product->get_id() ); ?>" class="hover:text-purple-600 font-medium transition duration-200 ease-in-out truncate block"><?= $product->get_name(); ?></a>
                                <div class="text-sm flex items-center">
                                    <?php if ($product->is_type('variable')) : ?>
                                        <span class="font-medium">$<?= $product->get_variation_price(); ?></span> <span class="mx-1">-</span> <span class="font-medium">$<?= $product->get_variation_price('max'); ?></span>
                                    <?php elseif ($sale_price) : ?>
                                        <span class="text-gray-400 line-through mr-2">$<?= $product->get_regular_price(); ?></span>
                                        <span class="font-medium">$<?= $sale_price; ?></span>
                                    <?php else : ?>
                                        <span class="font-medium">$<?= $product->get_price(); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php
                            endforeach;
                        endif;
                        wp_reset_postdata();
                    ?>
            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div>
</section>