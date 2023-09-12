<?php

    $store_on_sale = get_field('is_sale_available', 'options');

?>

<?php if ($store_on_sale === 'yes') : ?>
    <section class="px-6 py-6 bg-gray-100">
        <div class="container">
            <div class="text-center sm:text-left flex flex-col xl:flex-row items-center justify-center">
                <i class="fas fa-gift text-2xl mb-2 xl:mb-0 xl:mr-3" aria-hidden="true"></i>
                <span class="font-semibold md:pr-2 mb-1 xl:mb-0"><?php the_field('sales_banner_title',  'options'); ?></span> 
                <span><?php the_field('sales_banner_description', 'options'); ?></span>
            </div>
        </div>
    </section>
<?php endif; ?>