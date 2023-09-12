
<?php if ( get_field('need_help_title') || get_field('need_help_description') || get_field('need_help_button') ) : ?>
    <section>
        <div class="container px-6 md:px-10 py-16 border-b border-separator">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="flex-1 md:pr-10 mb-8 md:mb-0">
                    <div class="text-2xl text-default font-bold leading-none mb-6">
                        <?php the_field('need_help_title'); ?>
                    </div>

                    <div class="text-default has-red-links">
                        <?php the_field('need_help_description'); ?>
                    </div>
                </div>

                <?php
                    if ( get_field('need_help_button') ) :
                        
                        $need_help_button = get_field('need_help_button');
                        $need_help_target = $need_help_button['target'] ? $need_help_button['target'] : '_self';

                ?>
                    <div class="lg:ml-12">
                        <a href="<?= $need_help_button['url']; ?>" target="<?= esc_attr( $need_help_target ); ?>" class="text-lg text-center text-white-pure leading-none font-black px-8 py-4 bg-red-500 cursor-pointer block"><?= $need_help_button['title']; ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>