<section id="connections" class="py-16">
    <div class="container">
        <?php if ( have_rows('for_churches_connection_repeater') ) : ?>
            <div class="flex flex-wrap justify-center">
                <?php
                    while( have_rows('for_churches_connection_repeater') ) : the_row();

                    $icon = get_sub_field('icon');
                    $link = get_sub_field('link');
                    $link_target = $link['target'] ? $link['target'] : '_self';

                    $connection_option = 0;

                    if ( get_sub_field('title') == 'Church Teams' )  {
                        
                        $connection_option = 0;
                        
                    }

                    if ( get_sub_field('title') == 'Vision Trips' )  {

                        $connection_option = 3;
                        
                    }

                    if ( get_sub_field('title') == 'Partnership' )  {
                        
                        $connection_option = 4;
                        
                    }

                ?>
                    <div class="connection-type md:w-1/2 lg:w-1/3 px-8 xl:px-16 mb-6 lg:mb-0" data-form-option="<?= $connection_option; ?>">
                        <div class="text-center mb-9">
                            <div class="mb-6">
                                <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>" class="inline-block">
                            </div>

                            <div class="text-default text-2xl font-bold leading-none">
                                <?php the_sub_field('title'); ?>
                            </div>
                        </div>

                        <div>
                            <div class="text-default">
                                <?php the_sub_field('description'); ?>
                            </div>

                            <div class="mt-1">
                                <a href="<?= $link['url']; ?>" target="<?= esc_attr( $link_target ); ?>" class="text-red-500 font-black underline"><?= $link['title']; ?></a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>