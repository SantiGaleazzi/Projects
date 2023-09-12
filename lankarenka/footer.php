        
        <footer class="w-full px-6 py-16 bg-gray-200">
            <div class="container">
                <div class="flex flex-col sm:flex-row">
                    <ul class="footer-nav">
                        <?php
                            $defaults = array(
                                'theme_location'  => 'footer_menu',
                                'menu'            => '',
                                'container'       => '',
                                'container_class' => '',
                                'container_id'    => '',
                                'menu_class'      => 'nav',
                                'menu_id'         => '',
                                'echo'            => true,
                                'fallback_cb'     => 'wp_page_menu',
                                'before'          => '',
                                'after'           => '',
                                'link_before'     => '',
                                'link_after'      => '',
                                'items_wrap'      => '%3$s',
                                'depth'           => 0,
                                'walker'          => new themeslug_walker_nav_menu_header
                            );
                            wp_nav_menu($defaults);
                        ?>
                    </ul>
                </div>
            </div>
        </footer>

        <div class="text-xs px-6 py-5 bg-gray-200">
            <div class="container">
                <div class="flex flex-col sm:flex-row items-center justify-between">
                    <div class="mb-3">
                        <?php if( have_rows('footer_social_media', 'option') ): ?>
                            <div class="flex items-center justify-center sm:justify-start mb-4">
                                <?php while( have_rows('footer_social_media', 'option') ): the_row(); ?>
                                    <div class="pr-4">
                                        <a href="<?php the_sub_field('url'); ?>" target="_blank" rel="noopener noreferrer"><i class="fab <?php the_sub_field('network');?> text-xl text-purple-500"></i></a>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>

                        <div class="text-center text-gray-400  mb-3 sm:mb-0">
                            Copyright © <?= date('Y'); ?> <?php the_field('footer_settings_copyrights', 'option'); ?>
                        </div>
                    </div>
                    

                    <div class="flex items-center">
                        <?php
                            if ( have_rows('payment_gateways_options', 'options') ) :
                                while ( have_rows('payment_gateways_options', 'options') ) : the_row();
                        ?>

                            <div class="px-2">
                                <i class="fab fa-cc-<?php the_sub_field('gateway'); ?> text-2xl text-purple-500 transition duration-150 ease-in-out"></i>
                            </div>

                            <?php
                                endwhile;
                            endif;
                        ?>
                            
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-top">
            <i class="fas fa-chevron-up"></i>
        </div>

        <!-- Search Product -->
        <?php get_template_part('partials/partial-search-product'); ?>
        <!-- Search Product -->
        
        <!-- Aside Cart -->
        <?php get_template_part('partials/partial-aside-cart'); ?>
        <!-- Aside Cart -->

        <!-- Newsletter Lightbox -->
        <?php //get_template_part('partials/partial-newsletter'); ?>
        <!-- Newsletter Lightbox -->


        <!-- Whats App -->
        <?php get_template_part('components/whats-app-sticky'); ?>
        <!-- Whats App -->

        <?php wp_footer(); ?>
        
    </body>
</html>