
<?php if ( is_front_page() && get_field('featured_content_show', 'options') == 'yes' ) : ?>

    <section class="featured-content py-3 border-b border-gold-light relative">
        <div class="container relative z-10">
            <div class="flex justify-center">

                <?php
                            
                    if ( get_field('featured_content_type', 'options') == 'video' ) :

                        $link = get_field('featured_content_is_video', 'options');
                        $link_target = $link['target'] ? $link['target'] : '_self';

                ?>

                    <div class="flex items-center flex-col sm:flex-row">
                        <div class="hidden md:block w-48 h-24 bg-cover bg-center bg-no-repeat rounded-lg shadow-xl mb-2 sm:mb-0 relative overflow-hidden" style="background-image: url('<?php the_field('featured_content_thumbnail', 'options'); ?>');">
                            <a href="<?= $link['url']; ?>" target="<?= esc_attr( $link_target ); ?>" class="inline-flex items-center justify-center absolute inset-0">
                                <i class="far fa-play-circle text-white text-2xl"></i>
                            </a>
                        </div>

                        <div class="text-white text-center sm:text-left pl-3">
                            <div class="text-2xl font-bold leading-none mb-1">
                                <?php the_field('featured_content_title', 'options'); ?>
                            </div>
                            
                            <?php if ( get_field('featured_content_description', 'options') ) : ?>
                                <div class="text-sm leading-none mb-2">
                                    <?php the_field('featured_content_description', 'options'); ?>
                                </div>
                            <?php endif; ?>

                            <div>
                                <a href="<?= $link['url']; ?>" target="<?= esc_attr( $link_target ); ?>" class="font-bold leading-none px-6 py-2 bg-red-500 rounded inline-block"><?php the_field('featured_content_button', 'options'); ?></a>
                            </div>
                        </div>
                    </div>

                <?php
                    
                    elseif ( get_field('featured_content_type', 'options') == 'serie' ) :

                        $serie_selected = get_term_link( get_field('featured_content_is_serie', 'options') );

                        if ( get_field('serie_params', 'options') ) {

                            $serie_selected .= get_field('serie_params', 'options');

                        }
                    
                ?>

                    <div class="flex items-center flex-col sm:flex-row">
                        <div class="hidden md:block w-48 h-24 bg-cover bg-center bg-no-repeat rounded-lg shadow-xl mb-2 sm:mb-0 relative overflow-hidden" style="background-image: url('<?php the_field('featured_content_thumbnail', 'options'); ?>');">
                            <a href="<?= $serie_selected; ?>" class="inline-flex items-center justify-center absolute inset-0">
                                <i class="far fa-play-circle text-white text-2xl"></i>
                            </a>
                        </div>

                        <div class="text-white text-center sm:text-left pl-3">
                            <div class="text-2xl font-bold leading-none mb-1">
                                <?php the_field('featured_content_title', 'options'); ?>
                            </div>
                            
                            <?php if ( get_field('featured_content_description', 'options') ) : ?>
                                <div class="text-sm leading-none mb-2">
                                    <?php the_field('featured_content_description', 'options'); ?>
                                </div>
                            <?php endif; ?>

                            <div>
                                <a href="<?= $serie_selected; ?>" class="font-bold leading-none px-6 py-2 bg-red-500 rounded inline-block"><?php the_field('featured_content_button', 'options'); ?></a>
                            </div>
                        </div>
                    </div>
                
                <?php elseif ( get_field('featured_content_type', 'options') == 'streaming' ) : ?>

                    <div class="flex items-center flex-col sm:flex-row">
                        <div class="w-48 h-24 bg-cover bg-center bg-no-repeat rounded-lg shadow-xl mb-2 sm:mb-0 relative overflow-hidden" style="background-image: url('<?php the_field('featured_content_thumbnail', 'options'); ?>');">
                            <a href="<?php the_field('streaming_or_external_url', 'options'); ?>" target="_blank" class="inline-flex items-center justify-center absolute inset-0">
                                <i class="far fa-play-circle text-white text-2xl"></i>
                            </a>
                        </div>

                        <div class="text-white text-center sm:text-left pl-3">
                            <div class="text-2xl font-bold leading-none mb-1">
                                <?php the_field('featured_content_title', 'options'); ?>
                            </div>
                            
                            <?php if ( get_field('featured_content_description', 'options') ) : ?>
                                <div class="text-sm leading-none mb-2">
                                    <?php the_field('featured_content_description', 'options'); ?>
                                </div>
                            <?php endif; ?>

                            <div>
                                <a href="<?php the_field('streaming_or_external_url', 'options'); ?>" target="_blank" rel="noopener noreferrer" class="font-bold leading-none px-6 py-2 bg-red-500 rounded inline-block"><?php the_field('featured_content_button', 'options'); ?></a>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>
            </div>
        </div>

        <div class="w-full h-full bg-cover bg-center bg-no-repeat absolute inset-0" style="background-image: url('<?php the_field('featured_content_background', 'options'); ?>');">
            <div class="w-full h-full blurry-10 bg-gray-800 bg-opacity-50 absolute inset-0"></div>
        </div>
    </section>

<?php endif; ?>