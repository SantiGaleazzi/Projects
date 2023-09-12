<section class="sancodes-filter">

    <div class="close w-full h-full absolute top-0 left-0 bg-gray-500 opacity-50 z-40"></div>

    <div class="filters">
        <button aria-hidden="true" class="close"><i class="fas fa-times"></i></button>

        <div class="mt-6">
            
            <h1 class="font-medium text-purple-500 mb-1">Filtrar Opciones</h1>

            <div class="mb-5">
                <?php woocommerce_result_count(); ?>
            </div>

            <div class="mb-3">
                <?php woocommerce_catalog_ordering(); ?>
            </div>

            <?php the_widget('WC_Widget_Product_Categories', 'dropdown=1'); ?>
        </div>
    </div>

</section>  