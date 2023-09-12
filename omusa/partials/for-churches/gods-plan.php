<?php

    $gods_plan_side_image = get_field('for_churches_gods_side_image');

?>

<section class="px-6">
    <div class="container py-16 md:py-20 relative">
        <div class="flex flex-col md:flex-row justify-end">
            <div class="md:w-1/2 xl:pr-10">
                <div class="text-red-500 text-3xl font-roboto font-light leading-9 mb-8">
                    <?php the_field('for_churches_gods_title'); ?>
                </div>

                <div class="text-default">
                    <?php the_field('for_churches_gods_description'); ?>
                </div>
            </div>
        </div>

        <div class="md:w-3/4 xl:w-1/2 h-full absolute bg-contain md:bg-cover bg-right-bottom bg-no-repeat bottom-0 left-0 md:-ml-32 lg:-ml-40 xl:-ml-5" style="background-image: url('<?= $gods_plan_side_image['url']; ?>');"></div>
    </div>
</section>