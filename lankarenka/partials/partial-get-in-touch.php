
<section class="px-6 py-12 md:py-20 relative border-t-2 border-gray-300 md:border-none">

    <div class="md:w-1/2 h-full bg-white left-0 top-0 absolute md:border-t-2 md:border-gray-300"></div>

    <?php
                    
            $query = new WC_Product_Query( array(
                'limit' => 1,
                'orderby' => 'rand',
                 'order' => 'DESC',
                'status' => 'publish',
            ));

            $products = $query->get_products();
                        
            if ( !empty($products) ) :
                            
                foreach ($products as $product) :

        ?>
                <div class="hidden md:w-1/2 h-full md:flex items-end top-0 right-0 absolute bg-cover bg-center bg-no-repeat" <?php if ($product->get_image_id()) : ?>style="background-image: url('<?= wp_get_attachment_url( $product->get_image_id(), 'full' ); ?>');"<?php endif; ?>>
                    <div class="w-full px-6 py-4 bg-purple-500 bg-opacity-75 z-10">
                        <h1 class="text-white font-semibold tracking-wide"><?= $product->get_name(); ?></h1>
                        <a href="<?= get_permalink( $product->get_id() ); ?>" class="text-sm text-white">Comprar ahora<i class="fas fa-chevron-right ml-2" aria-hidden="true"></i></a>
                    </div>
                </div>
    <?php
                endforeach;
            endif;
        wp_reset_postdata();
    ?>

    <div class="container">
        <div class="md:w-1/2 md:px-10 md:py-12 rounded overflow-hidden relative">
           
            <div class="w-full flex flex-col items-center relative z-10 mx-auto">
                <div class="w-full text-center md:text-left mb-6">
                    <h1 class="text-purple-600 text-3xl md:text-4xl font-medium mb-2"><?php the_field('newsletter_title', 'options'); ?></h1>    
                    <p class="text-gray-500"><?php the_field('newsletter_description', 'options'); ?></p>
                </div>
                <div class="w-full">
                    <?php the_field('newsletter_form', 'options'); ?>
                </div>
            </div>
        </div>
    </div>
    
</section>