<!DOCTYPE HTML>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en">
  <![endif]-->
  <!--[if gt IE 8]>
  <!-->
  <html class="no-js" lang="en" ng-app="recipeTool">
    <!--<![endif]-->
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width initial-scale=1" />

    <title><?php wp_title(''); ?></title>
        <?php
            global $post;
           $content = get_the_excerpt();
           $content = substr($content, 0 , 100);
           $content = strip_tags($content);
           $link    = "Read More &";
           $description = str_replace($link, "",$content);
        ?>

    <link rel="icon" type="image/png" href="<?php echo bloginfo('template_url'); ?>/assets/img/OventionFavicon.ico?1234">
    <link rel="apple-touch-icon" href="<?php echo bloginfo('template_url'); ?>/assets/img/apple-touch-icon.png">


    <?php wp_head(); ?>

    <?php get_template_part( 'partials/partial', 'ga' ); ?>

	<script type="text/javascript">
      //declare array of MTIConfig
      var MTIConfig = {};
         //MTIConfig to enable/disable Hybrid Configuration.
         MTIConfig.UseHybrid= true;
    </script>
    <script type="text/javascript" src="https://fast.fonts.net/jsapi/c3b4dbe2-ed55-413f-8c5f-5f6b82f732c9.js"></script>
    <script src="//assets.adobedtm.com/c876840ac68fc41c08a580a3fb1869c51ca83380/satelliteLib-b17a4b6a0a9547d3e171c78f2ed9e0cf7dac2789.js"></script> 

    <script async defer src="https://tools.luckyorange.com/core/lo.js?site-id=5696ea9e"></script>
</head>
 <body <?php body_class(); ?>>

    <?php if ( get_field('gtm_id', 'option' ) ) : ?>

		<!-- Google Tag Manager -->
		<noscript>
			<iframe src="//www.googletagmanager.com/ns.html?id=<?php the_field('gtm_id', 'option');?>" height="0" width="0" style="display:none;visibility:hidden"></iframe>
		</noscript>

		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','<?= get_field('gtm_id', 'option'); ?>');</script>
		<!-- End Google Tag Manager -->

    <?php endif;?>

    <div class="wrap-video">
        <img class="gif-mobile" src="<?php bloginfo('template_url') ?>/assets/img/bg-4.jpg" alt=""  >
    </div>
