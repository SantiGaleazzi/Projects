<?php
    
    /**
     *  Template Name: Virtuous Embed LP (OMUSA)
    */

    get_header('no-menu');
    
?>

    <?php if ( get_field('template_virtuous_lp_intro_title') ) : ?>
        <section class="px-5 py-16 bg-cover <?php the_field('template_virtuous_lp_intro_background_position'); ?> bg-no-repeat relative" style="background-image: url('<?php the_field('template_virtuous_lp_intro_background'); ?>');">
            <div class="container relative z-10">
                <div class="md:flex md:gap-x-8">
                    <div class="md:w-1/2">
                        <div class="text-red-500 font-roboto text-6xl xl:text-8xl leading-none font-black mb-6 md:mb-0">
                            <?php the_field('template_virtuous_lp_intro_title'); ?>
                        </div>
                    </div>

                    <div class="md:w-1/2">
                        <div class="text-xl text-white-pure has-wysiwyg light-headings virtuous-form">
                            <?php the_field('template_virtuous_lp_intro_copy'); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute inset-0" style="background-color: <?php the_field('template_virtuous_lp_intro_overlay'); ?>;"></div>
        </section>
    <?php endif; ?>

    <?php if (get_field('template_virtuous_lp_cta_code')): ?>
        <section class="py-10 sm:py-16 px-5">
            <div class="container">
                <div class="relative mx-auto" style="padding: 47.296% 0 0 0; max-width: 1080px;">
                    <?php the_field('template_virtuous_lp_cta_code'); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if ( get_field('template_virtuous_lp_cta_title') ) : ?>
        <section class="text-center md:text-left px-5 py-12 md:py-16 bg-gray-50-new">
            <div class="container">
                <div class="md:flex">
                    <div class="md:w-1/2">
                        <div class="text-red-500 text-3xl font-bold mb-6 md:mb-0">
                            <?php the_field('template_virtuous_lp_cta_title'); ?>
                        </div>
                    </div>

                    <div class="md:w-1/2">
                        <div class="text-xl text-gray-500 has-wysiwyg">
                            <?php the_field('template_virtuous_lp_cta_copy'); ?>
                        </div>

                        <?php if ( get_field('template_virtuous_lp_cta_button') ) :
                            
                            $button = get_field('template_virtuous_lp_cta_button');
                        ?>

                            <div class="mt-6">
                                <a href="<?= $button['url'];?>" target="<?= esc_attr( $button['target'] ?: '_self' ); ?>" class="text-white-pure text-2xl leading-none font-bold px-6 py-3 bg-red-500 inline-block"><?= $button['title']; ?></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php get_footer();
