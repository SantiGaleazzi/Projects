
        <section class="px-4 py-10 bg-yellow-400">
            <div class="flex flex-col lg:flex-row items-center justify-center">
                <h3 class="font-pt-serif text-white text-center lg:text-left text-2xl mb-6 lg:mb-0">
                    <?php the_field('copy_single_form','options'); ?>
                </h3>

                <div class="ffz-inline-form">
                    <?php the_field('form_single','options'); ?>
                </div>
            </div>
        </section>

        <footer class="px-4 py-12 bg-black">
            <div class="container max-w-6xl">
                <div class="flex flex-col-reverse md:flex-row items-center justify-center md:items-start md:justify-between">
                    <div>
                        <ul class="footer-nav text-center md:text-left text-gray-600 text-sm flex flex-col md:flex-row mb-6">
                            <?php
                                $defaults = array(
                                    'theme_location'  => 'footer_menu',
                                    'menu'            => '',
                                    'container'       => '',
                                    'container_class' => '',
                                    'container_id'    => '',
                                    'menu_class'      => '',
                                    'menu_id'         => '',
                                    'echo'            => true,
                                    'fallback_cb'     => 'wp_page_menu',
                                    'before'          => '',
                                    'after'           => '',
                                    'link_before'     => '',
                                    'link_after'      => '',
                                    'items_wrap' => '%3$s',
                                    'depth'           => 0,
                                    'walker'        => new themeslug_walker_nav_menu_header
                                );
                                wp_nav_menu($defaults);
                            ?>
                        </ul>

                        <div class="text-sm text-gray-600 text-center md:text-left">
                           <?php the_field('footer_copyrights','options'); ?>
                        </div>

                    </div>
                    
                    <?php if ( have_rows('footer_social_network_repeater', 'options') ) : ?>
                        <div class="flex-none flex items-center mb-6 md:mb-0">
                            <?php while ( have_rows('footer_social_network_repeater', 'options') ): the_row(); ?>
                                <div class="mr-3">
                                    <a href="<?php the_sub_field('socia_network_url'); ?>" target="_blank" rel="noopener noreferrer" class="w-6 h-6 inline-flex items-center justify-center bg-gray-400 rounded-full">
                                        <i class="fab <?php the_sub_field('socia_network'); ?> text-black text-xs leading-none"></i>
                                    </a>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </footer>

        <div class="lightbox-component" data-lightbox-name="subscribe"> 
            <div class="lightbox-container w-full max-w-xl h-full sm:h-auto p-6 sm:p-8 relative border-2 border-white rounded-lg bg-cover bg-center bg-no-repeat" style="background-image: url('<?php bloginfo('template_url'); ?>/assets/images/lightbox-bg.png');">
                <div class="close-lightbox"><i class="fas fa-times"></i></div>

                <div class="h-full sm:h-auto overflow-y-scroll md:overflow-x-hidden">
                    <?= do_shortcode( '[gravityform id="1" title="false" description="false" ajax="true"]' ); ?>
                </div>
            </div>
        </div>
    
        <?php wp_footer(); ?>
        
    </body>
</html>
