<section class="px-6 py-12 md:py-16">
    <div class="container">
        
        <?php if ( get_field('home_collections_title') ) : ?>
            <div class="text-center text-2xl md:text-4xl font-medium mb-6 sm:mb-10">
                <?php the_field('home_collections_title'); ?>
            </div>
        <?php endif; ?>

        <?php if ( have_rows('collections_repeater') ) : ?>
            <div class="flex flex-wrap">
                <?php
                    
                    while( have_rows('collections_repeater') ): the_row();
                    
                ?>
                    <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 py-2 sm:p-3 group">
                        <a href="<?php the_sub_field('link'); ?>" class="w-full py-32 bg-gray-400 bg-cover bg-no-repeat rounded-md overflow-hidden relative inline-block transition-transform duration-150 ease-in-out transform scale-200 group-hover:scale-105" style="background-image: url('<?php the_sub_field('image'); ?>');">
                            <div class="w-full h-full text-white text-center text-3xl bg-black bg-opacity-25 p-4 flex items-center justify-center absolute inset-0 group-hover:opacity-100 group-hover:visible sm:opacity-0 sm:invisible transition-all duration-500 ease-in-out">
                                <?php the_sub_field('nombre'); ?>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>