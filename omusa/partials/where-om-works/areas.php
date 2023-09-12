<?php

    $terms = get_terms( array(
            'taxonomy'=>'areas',
            'orderby'=>'title',
            'order'=>'ASC',
            'hide_empty' => false
        )
    );

    $side_image = get_field('where_works_areas_side_image');
    
?>

<section class="pt-16 pb-20 px-6 bg-gray-150-new relative">		
	<div class="container relative z-10">
        <div>
            <div class="text-wysiwyg text-4xl md:text-5xl text-center sm:text-left font-roboto font-light leading-none mb-8">
                <?php the_field('where_works_areas_title'); ?>
            </div>

            <div class="text-lg font-roboto font-light text-default text-center sm:text-left">
                <?php if ( $terms ) : ?>
                    <?php
                        foreach ($terms as $term) :

                        $term_link = get_term_link($term->term_id);
                    ?>
                        <div>
                            <a href="<?= $term_link; ?>" class="hover:text-red-500 inline-block mt-2"><?= $term->name; ?> »</a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
	</div>

    <div class="hidden sm:block w-full lg:w-2/3 h-full md:bg-cover lg:bg-auto sm:bg-left-top xl:bg-right-top bg-no-repeat absolute top-0 right-0" style="background-image: url('<?= $side_image['url']; ?>');"></div>
</section>
