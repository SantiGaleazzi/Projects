<?php

    $golf_bg_img = get_field('golf_invite_bg_img');
    $golf_invite_logo = get_field('golf_invite_logo');
    $golf_invite_video_link = get_field('golf_invite_video_link');
    $golf_invite_video_target = $golf_invite_video_link['target'] ? $golf_invite_video_link['target'] : '_self';
    $golf_invite_video_image = get_field('golf_invite_video_image');
    $golf_invite_placeholder_image = get_field('golf_invite_placeholder_image');

    $golf_invite_video_url = get_field('golf_invite_default_video_url');

    $video_id = $_GET['user'];

    if ( !isset($video_id) ) {

        $video_id = substr($golf_invite_video_url, strrpos($golf_invite_video_url, '/') + 1);

    }

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

    <section class="golf-invite" style="background-image: url('<?= $golf_bg_img['url']; ?>');">

        <div class="grid-container relative">

            <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/content-black-detail.png" alt="Black Detail" class="content-black-detail">

            <div class="grid-x grid-padding-x">
                <div class="cell">
                    <div class="golf-invite__logo">
                        <a href="<?php bloginfo('url'); ?>" aria-hidden="true">
                            <img src="<?= $golf_invite_logo['url']; ?>" alt="<?= $golf_invite_logo['alt']; ?>">
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid-x grid-padding-x">

                <div class="cell large-6">
                    <div class="intro">
                        <h1 class="intro__title"><?php the_field('golf_invite_title'); ?></h1>
                        <p class="intro__description"><?php the_field('golf_invite_description'); ?></p>
                    </div>
                </div>

                <div class="cell large-6 relative">
                    <div class="video">
                        <div class="video__frame" style="background-image: url('<?= $golf_invite_placeholder_image['url']; ?>');">
                            <img src="<?php bloginfo('template_url'); ?>/assets/img/golf-invite/golf-invite-play.png" alt="Play Button" class="golf-invite--open-video">
                        </div>
                        <p class="video__description"><?php the_field('golf_invite_video_description'); ?></p>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <section class="golf-invite-question">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell">
                    <div class="question">
                        <?php the_field('golf_invite_question'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="golf-invite-hotel">
        <div class="grid-container relative">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-6">
                    <div class="golf-invite-hotel__video-image" style="background-image: url('<?= $golf_invite_video_image['url']; ?>');">
                        <a href="<?= $golf_invite_video_link['url']; ?>" target="<?= esc_attr( $golf_invite_video_target ); ?>" class="link-text">
                            &nbsp;
                        </a>
                    </div>
                </div>
                <div class="cell medium-1">
                    <img src="<?php bloginfo('template_url'); ?>/assets/img/golf-invite/green-arrow.png" alt="Green Arrow" class="green-arrow">
                </div>
                <div class="cell medium-5">
                    <a href="<?= $golf_invite_video_link['url']; ?>"  target="<?= esc_attr( $golf_invite_video_target ); ?>" class="link-text">
                        <img src="<?php bloginfo('template_url'); ?>/assets/img/golf-invite/golf-invite-text.png" alt="To explore Horseshoe Bay Resort, visit: hsbresort.com">
                    </a>
                </div>
            </div>

            <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/content-black-detail.png" alt="Black Detail" class="content-black-detail-scaled">
        </div>
    </section>

    <section class="golf-invite-form">

        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-6">
                    <div class="content">
                        <?php the_field('golf_invite_content'); ?>
                    </div>
                </div>

                <div class="cell medium-6">
                    <div class="form">
                        <h1 class="title"><?php the_field('golf_invite_form_title'); ?></h1>
                        <?php the_field('golf_invite_form'); ?>
                    </div>
                </div>
            </div>
        </div>

        <img src="<?php bloginfo('template_url'); ?>/assets/img/golf-invite/golf-imagery.png" alt="Golf Field" class="golf-field">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/golf-invite/golf-lake.png" alt="Golf Lake" class="golf-lake">

    </section>

    <section class="golf-invite-lightbox">
        <div class="golf-invite-lightbox__container">
            <div class="golf-invite-video">
                <div class="golf-invite-video__close" aria-hidden="true"><i class="fas fa-times"></i></div>
                <iframe src="https://player.vimeo.com/video/<?= $video_id; ?>" id="custom-video-golf" width="640" height="360" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
            </div>
        </div>
    </section>

<?php get_footer(); ?>
