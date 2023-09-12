<?php
    
    $webinar_logo = get_field('webinar_logo');
    $webinar_join_link = get_field('webinar_link');
    $webinar_aside_image = get_field('webinar_aside_image');
    $webinar_background_image = get_field('webinar_background_image');

    $webinar_tagline = get_field('webinar_tagline');
    
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

<section class="webinar-intro" style="background-image: url('<?= $webinar_background_image['url']; ?>');">
    
    <!-- <img src="<?php bloginfo('template_url'); ?>/assets/img/donor-acq/intro-top-left-detail.png" alt="White Detail" class="intro-left-top-img"> -->

    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="cell">
                <div class="webinar-intro__logo">
                    <a href="<?php bloginfo('url'); ?>" aria-hidden="true">
                        <img src="<?= $webinar_logo['url']; ?>" alt="<?= $webinar_logo['alt']; ?>">
                    </a>
                </div>
            </div>
        </div>
        <div class="<?php if ($webinar_aside_image)  : echo 'webinar-intro__side-image-container'; endif; ?> grid-x grid-padding-x align-center text-center">
            <div class="cell medium-6 large-7">
                <div class="webinar-intro__title">
                    <?php the_field('webinar_title'); ?>
                </div>
                <div class="webinar-intro__description">
                    <?php the_field('webinar_description'); ?>
                </div>
                <div>
                    <a href="<?= $webinar_join_link['url']; ?>" class="webinar-intro__link"><?= $webinar_join_link['title']; ?></a>
                </div>
            </div>
            <?php if ( $webinar_aside_image ) : ?>
            <div class="cell medium-6 large-5">
                <div class="webinar-aside-image">
                    <img src="<?= $webinar_aside_image['url']; ?>" alt="<?= $webinar_aside_image['alt']; ?>">
                </div>
            </div>
            <?php endif; ?>
        </div>

    </div>
</section>

<section class="webinar-content">

    <div class="content-footer-container">
        <img src="<?php bloginfo('template_url'); ?>/assets/img/webinar/green-footer.png" alt="" class="content-footer-img">
    </div>

    <div class="grid-container">

        <img src="<?php bloginfo('template_url'); ?>/assets/img/webinar/green-shape.png" alt="Blue Detail" class="content-blue-detail">

        <div class="grid-x align-center">
            <div class="cell medium-7">
                <div id="sign-up-form" class="webinar-content__form-container">
                    <div class="webinar-content__form-pretitle">
                        <?php the_field('webinar_form_pre_title'); ?>
                    </div>
                    <div class="webinar-content__form-title">
                        <?php the_field('webinar_form_title'); ?>
                    </div>
                    <div class="webinar-content__form-date">
                        <?php the_field('webinar_form_date_or_description'); ?>
                    </div>
                    <div class="webinar-content__form">
                        <?php the_field('webinar_form'); ?>
                    </div>
                    <div class="webinar-content__form">
                        <?php the_field('webinar_form_virtuous'); ?>
                    </div>
                </div>
            </div>
            <div class="cell medium-5">
                <div class="webinar-content__content">
                    <div class="webinar-content__title">
                        <?php the_field('webinar_content_title'); ?>
                    </div>
                    <div class="webinar-content__options">
                        <?php the_field('webinar_content_options'); ?>
                    </div>
                    <div class="webinar-content__tagline">
                        <img src="<?= $webinar_tagline['url']; ?>" alt="<?= $webinar_tagline['alt']; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>