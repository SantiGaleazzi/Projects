<?php
    $script     = get_field('top_banner_text');
    $facebook   = get_field('facebook', 'option');
    $twitter    = get_field('twitter', 'option');
    $shop       = get_field('store', 'option');
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <?php wp_head(); ?>
        <meta name="google-site-verification" content="FRI76O56hToG8knNJKS9YhDHS6mcIXvY0flSvnKHu5c" />
    </head>
    <body <?php body_class(); ?> data-scroll>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSSCN34"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        <header class="header">
            <div class="header-container">
                <?php
                  $logo             = get_field('logo_header', 'option');
                  $button_donor  = get_field('button_donor', 'option');
                ?>
                <div class="nav-menu">

                  <div class="mobile-menu align-justify" data-responsive-toggle="responsive-menu" data-hide-for="medium">
                    <div class="title-bar-title">
                      <?php if (!empty($logo) ): ?>
                        <div class="header__logo">
                          <a href="<?php bloginfo('url'); ?>">
                            <img width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                          </a>
                        </div>
                      <?php endif ?>
                    </div>
                    <button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
                  </div>

                  <div class="flex-container flex-dir-column medium-flex-dir-row align-justify" id="responsive-menu">
                    <?php if (!empty($logo) ): ?>
                      <div class="header__logo show-for-medium">
                        <a href="<?php bloginfo('url'); ?>">
                          <img width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                        </a>
                      </div>
                    <?php endif ?>
                    <div class="header__menu flex-container flex-dir-column medium-flex-dir-row align-middle header-donor">
                      <?php if ($button_donor):
                      ?>
                        <div class="pink-button-ffz"><?php echo $button_donor; ?></div>
                      <?php endif ?>
                    </div>
                  </div>

                </div>

            </div>
        </header>
        <div class="main-container">
            <div class="grid-y">
                <div class="cell flex-grow-1">