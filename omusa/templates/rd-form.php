<?php

    /**
    * Template Name: RD Embed Template (OMUSA)
    */

    get_header('no-menu');

    $logo = get_field('logo','options');
    $side_image = get_field('rd_don_form_intro_side_image');

?>

    <section class="section-quoted bg-cover bg-left-top overflow-hidden" style="background-image: url('<?php the_field('rd_don_form_intro_background_image'); ?>');">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="md:w-3/5 lg:w-2/3 pb-12 md:pb-20 xl:pb-32 relative z-10 mx-auto" style="<?php if(get_field('rd_don_form_aside_title')) { echo ("margin: 0px !important"); } ?>">
                    <div class="text-center mb-10 md:mb-6">   
                        <a href="<?= get_home_url(); ?>" class="inline-block">
							<div id="logo-nav" class="w-20 lg:w-32 h-20 lg:h-32 flex items-center justify-center bg-red-500">
								<img src="<?= esc_url($logo['url']); ?>" alt="<?= esc_attr($logo['alt']); ?>" class="w-14 lg:w-24">
							</div>
						</a>
                    </div>
                    
                    <?php if ( get_field('rd_don_form_intro_title') ) : ?>
                        <div class="headline leading-none text-default mx-auto">
                            <?php the_field('rd_don_form_intro_title'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="text-lg text-default text-center lg:px-8 xl:px-24">
                        <?php the_field('rd_don_form_intro_description'); ?>
                    </div>
                </div>
                
                <div class="hidden md:block md:w-3/5 h-full md:bg-cover xl:bg-contain md:bg-left-top bg-no-repeat absolute top-0 right-0 md:-mr-32 lg:-mr-48 xl:-mr-56" style="background-image: url('<?= $side_image['url']; ?>');"></div>

                <div class="block md:hidden">
                    <img src="<?= $side_image['url']; ?>" alt="<?= $side_image['alt']; ?>">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-card px-6 pt-5 pb-10 relative z-10">
        <div class="container">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-3/5 lg:w-2/3 bg-white-pure flex-1 flex flex-col border-t-4 border-red-500 shadow-2xl -mt-16 xl:-mt-32">
                    <?php the_field('rd_don_form_intro_form'); ?>
                </div>

                <div class="md:w-2/5 xl:w-1/3 pt-12 md:pt-0 md:pl-6 hidden" style="<?php if(get_field('rd_don_form_aside_title')) { echo ("display: block !important"); } ?>">
                    <div class="text-default pb-6 border-b border-separator">
                        <div class="text-2xl font-roboto font-light leading-8">
                            <?php the_field('rd_don_form_aside_title'); ?>
                        </div>

                        <div>
                            <?php the_field('rd_don_form_aside_description'); ?>
                        </div>
                    </div>

                    <?php if ( have_rows('rd_don_form_non_profit_repeater') ) : ?>
                        <div class="mt-5 border-b border-separator">
                            <div class="flex items-center flex-wrap mb-5">
                                <?php
                                    while( have_rows('rd_don_form_non_profit_repeater') ) : the_row();
                                    $logo_image = get_sub_field('logo');
                                ?>
                                    <div class="p-2">
                                        <img src="<?= $logo_image['url']; ?>" alt="<?= $logo_image['title']; ?>">
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ( get_field('rd_don_form_give_by_check') ) : ?>
                        <div class="text-default my-5">
                            <?php the_field('rd_don_form_give_by_check'); ?>
                        </div>
                    <?php endif; ?>
                    
                    <?php if ( get_field('rd_don_form_side_copyrights') ) : ?>
                        <div class="text-xs text-default">
                            <?php the_field('rd_don_form_side_copyrights'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="mt-6 flex items-center hidden">
                        <div class="text-default">
							<div class="text-sm leading-none">
								Mode:
							</div>
							<div class="switch-color text-xs font-black">
								Light
							</div>
						</div>

                        <!-- Theme Switcher -->
                        <?php get_template_part('partials/theme-switcher'); ?>
                        <!-- Theme Switcher -->
                    </div>

                </div>
            </div>
        </div>
    </section>


<?php get_footer();
