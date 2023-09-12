<?php

    $april_banner_4 = check_range("10-06-2020", "20-07-2020");

    if( $april_banner_4  && ! isset( $_GET['old-banner'] ) || $_GET['old-banner'] == 'abril-banner-2020-4' ) :

        $banner_link = get_field('new_banner_block_link');
        $webinar_aside_image = get_field('new_banner_block_aside_image');
        $bg_image = get_field('new_banner_block_background_image');

?>

<section class="webinar-banner" style="background-image: url('<?= $bg_image['url']; ?>');">

    <!-- <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/intro-top-left-detail.png" alt="White Detail" class="intro-left-top-img"> -->

    <div class="grid-container">
        <div class="<?php if ( $webinar_aside_image ) : echo 'webinar-banner__aside-image-container'; endif; ?> grid-x align-middle">
            <div class="cell medium-6 large-6">
                <div class="webinar-banner__title">
                    <?php the_field('new_banner_block_title'); ?>
                </div>
                <div class="webinar-banner__description">
                    <?php the_field('new_banner_block_description'); ?>
                </div>
                <div>
                   <a href="<?= $banner_link['url']; ?>" class="webinar-banner__link"><?= $banner_link['title']; ?></a>
                </div>
            </div>

            <?php if ( $webinar_aside_image ) : ?>
            <div class="cell medium-6 large-6">
                <div class="webinar-aside-image">
                    <img src="<?= $webinar_aside_image['url']; ?>" alt="<?= $webinar_aside_image['alt']; ?>">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

</section>

<?php  endif;