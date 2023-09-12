<section id="other-ways" class="px-6 pt-12">
    <div class="container">
        <div class="text-center text-4xl text-default font-roboto font-light mb-12">
            <?php the_field('other_ways_title'); ?>
        </div>
        
        <div class="flex flex-wrap justify-center ">
            <?php if( have_rows('list_of_ways_repeater') ) : ?>
                <?php
                    while( have_rows('list_of_ways_repeater') ): the_row();

                    $icon = get_sub_field('icon');
                    $link = get_sub_field('link');
                    $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                    <div class="flex sm:w-1/2 lg:w-1/3 sm:px-2 mb-4">
                        <div class="flex flex-col justify-between p-6 md:px-10 bg-card rounded-md">
                            <div>
                                <div class="flex flex-col-reverse sm:flex-row items-center sm:items-end justify-between">
                                    <div class="text-2xl text-default font-bold sm:pr-6 truncate">
                                        <?php the_sub_field('title'); ?>
                                    </div>

                                    <div class="mb-4 sm:mb-0">
                                        <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>" />
                                    </div>
                                </div>

                                <div class="text-default has-black-links my-6 sm:my-8">
                                    <?php the_sub_field('description'); ?>
                                </div>
                            </div>

                            <div>
                                <?php if ( strpos(get_sub_field('title'), 'Stock') !== false ) : ?>

                                    <button type="button" class="ways-to-give-btn w-full text-sm md:text-lg text-center text-white-pure leading-none font-black px-2 py-4 bg-red-500 cursor-pointer block"><?= $link['title']; ?></button>

                                <?php else : ?>
                                    <a href="<?= $link['url']; ?>" target="<?= esc_attr( $link_target ); ?>" class="text-sm md:text-lg text-center text-white-pure leading-none font-black px-2 py-4 bg-red-500 cursor-pointer block"><?= $link['title']; ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>