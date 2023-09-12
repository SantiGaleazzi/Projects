<?php

    $default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

?>

<section class="section-quoted text-center pt-12">
    <div class="container">
        <div class="headline text-default mx-auto">
            <?php the_field('internships_degree_title' ); ?>
        </div>

        <div class="text-default">
            <?php the_field('internships_degree_description' ); ?>
        </div>
    </div>
</section>

<section class="px-6 py-8">
    <div class="container">
        <div class="flex flex-wrap flex-col sm:flex-row">
            <?php
                $internship_degrees = get_terms(array(
                    'taxonomy' => 'degrees',
                    'hide_empty' => false,
                ));
            ?>

            <?php

                foreach ( $internship_degrees as $degrees ) :

                    $degree_image = get_field( 'internship_degree_image', $degrees );

            ?>
                <?php if ( $degrees->parent == 0 ) : ?>
                    <div class="w-full sm:w-1/2 lg:w-1/3 flex sm:p-3">
                        <div class="w-full flex flex-col bg-white-pure rounded-lg overflow-hidden shadow-xl">
                            <div class="py-24 xl:py-32 bg-gray-200 bg-center bg-cover bg-no-repeat" style="background-image: url('<?= $degree_image['url'] ? $degree_image['url'] : $default_post_thumbnail['url']; ?>');">
                            </div>

                            <div class="text-white-pure text-xl xl:text-2xl leading-none font-bold px-4 lg:px-6 py-4 bg-red-500 uppercase">
                                <?= $degrees->name; ?>
                            </div>
                            
                            <div class="flex-auto flex flex-col justify-between px-4 lg:px-6">
                                <div class="text-sm py-4">
                                    <?= $degrees->description; ?>
                                </div>

                                <div class="py-4 border-t text-right">
                                    <a href="/internships-opportunities/?internship-cat=<?= $degrees->slug; ?>&applied-filters=<?= $degrees->term_id; ?>" class="text-red-500 font-black leading-none inline-block">VIEW MORE »</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>