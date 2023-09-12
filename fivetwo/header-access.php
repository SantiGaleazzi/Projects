<?php
    $pastor     = get_field('are_you_a_pastor', 'option');
    $leader     = get_field('are_you_a_denominational_leader', 'option');
    $script     = get_field('top_banner_text');
    $facebook   = get_field('facebook', 'option');
    $twitter    = get_field('twitter', 'option');
    $shop       = get_field('store', 'option');
    $header_logo = get_field('white_header_logo', 'option');
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

    <section class="navigation">

        <div class="navigation-overlay"></div>

        <header class="grid-container">

            <div class="grid-cell">

                <a href="<?php bloginfo('url'); ?>" aria-label="<?= $header_logo['alt']; ?>" class="navigation-logo">
                    <img src="<?= $header_logo['url']; ?>" alt="<?= $header_logo['alt']; ?>" class="w-32 md:w-auto">
                </a>


                <div class="flex items-center">

                    <button class="hamburger" type="button" aria-label="Open Menu">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>

                </div>

            </div>

            <ul class="walker-nav">
                <?php
                    $defaults = array(
                        'theme_location'  => 'access_menu',
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
                        'items_wrap' => '%3$s',
                        'depth'           => 0,
                        'walker'        => new themeslug_walker_nav_menu_header
                    );
                    wp_nav_menu($defaults);
                ?>
            </ul>
        </header>
    </section>