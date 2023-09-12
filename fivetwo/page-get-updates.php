<?php
    
    $intro_logo = get_field('donor_acq_intro_logo');
    $intro_background_image = get_field('donor_acq_intro_background_image');
    $intro_side_image = get_field('donor_acq_intro_side_image');

    $content_video_image = get_field('donor_acq_video_image');
    
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WSSCN34');</script>
    <!-- End Google Tag Manager -->

    <meta charset="UTF-8">
    <title>FIVE TWO</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#27466c">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <meta name="google-site-verification" content="FRI76O56hToG8knNJKS9YhDHS6mcIXvY0flSvnKHu5c" />
</head>
<body <?php body_class(); ?> data-scroll>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSSCN34"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

<section class="donor-acq-intro">
    
    <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/intro-top-left-detail.png" alt="White Detail" class="intro-left-top-img">
    <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/intro-right-middle-detail.png" alt="Blue Detail" class="intro-right-middle-img">

    <div class="donor-acq-intro__bg-image" style="background-image: url('<?= $intro_background_image['url']; ?>');">
        <img src="<?= $intro_side_image['url']; ?>" alt="<?= $intro_side_image['alt']; ?>" class="intro-side-image">
    </div>

    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="cell">
                <div class="donor-acq-intro__logo">
                    <a href="<?php bloginfo('url'); ?>" aria-hidden="true">
                        <img src="<?= $intro_logo['url']; ?>" alt="<?= $intro_logo['alt']; ?>">
                    </a>
                </div>
            </div>
            <div class="cell medium-7">
                <div class="donor-acq-intro__title">
                    <?php the_field('donor_acq_intro_title'); ?>
                </div>
                <div class="donor-acq-intro__description">
                    <?php the_field('donor_acq_intro_description'); ?>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="donor-acq-content">

    <div class="content-footer-container">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/content-footer-bg.png" alt="" class="content-footer-img">
    </div>

    <div class="grid-container">

        <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/content-black-detail.png" alt="Black Detail" class="content-black-detail">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/content-form-detail.png" alt="Blue Detail" class="content-blue-detail">

        <div class="grid-x align-center">
            <div class="cell medium-8">
                <div class="donor-acq-content__form-title">
                    <?php the_field('donor_acq_form_title'); ?>
                </div>
            </div>
            <div class="cell medium-10 large-8">
                <div class="donor-acq-content__form">
                    <?php the_field('donor_acq_form'); ?>
                </div>
            </div>
        </div>
        <div class="grid-x">
            <div class="cell">
                <div class="grid-x">
                    <div class="cell medium-7">
                        <div class="donor-acq-content__left-side">

                            <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/content-see-how-we-do-what.png" alt="See how we do what we do.">
    
                            <div class="donor-acq-content__video-image" style="background-image: url('<?= $content_video_image['url']; ?>');">
                                <div class="donor-acq-content__play">
                                    <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/content-play-button.png" alt="Play Button">
                                </div>
                            </div>
    
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/content-form-detail.png" alt="Blue Detail" class="content-blue-detail--big">
                        </div>
                    </div>
                    <div class="cell medium-5">
                        <div class="donor-acq-content__first-paragraph">
                            <?php the_field('donor_acq_first_parograph'); ?>
                        </div>

                        <div class="text-center">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/content-black-detail.png" alt="Black Detail" class="content-black-detail--small">
                        </div>

                        <div class="donor-acq-content__second-paragraph">
                            <?php the_field('donor_acq_second_parograph'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="donor-acq-lightbox">
    <div class="donor-acq-lightbox__container">
        <div class="donor-acq-video">
            <div class="donor-acq-video__close" aria-hidden="true"><i class="fas fa-times"></i></div>
            <?php the_field('donor_acq_video_iframe'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>