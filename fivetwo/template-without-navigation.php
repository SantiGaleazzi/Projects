<?php  

	/**  
	* Template Name: Page Without Navigation
	*/

	$image_banner = get_field('image_banner');
	$content_banner_page = get_field('content_banner_page');
	$content_body = get_field('content_body');
	$form_body = get_field('form_body');
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

    <section style="background-color:<?php the_field('background_color_banner'); ?>" class="banner-top-content">
    	<div class="grid-container">
    		<div class="grid-x grid-margin-x">
	    		<?php if ($content_banner_page): ?>
	    			<div class="cell large-7 content_banner_page"><?= $content_banner_page; ?></div>
	    		<?php endif; ?>
	    		<?php if ($image_banner): ?>
	    			<div class="cell large-5">
	    				<a href="#minicourse-form">
	    					<img class="center-image-content" src="<?= $image_banner['url']?>" alt="<?= $image_banner['url']?>" />
	    				</a>
	    			</div>	    			
    			<?php endif; ?>
    		</div>	
    	</div>    	
    </section>


	<div class="grid-container">
		<?php if ($content_body): ?>
		<div class="content-body-page"><?= $content_body; ?></div>
		<?php endif; ?>

		<?php if ($form_body): ?>
		<div class="minicourse-form" id="minicourse-form"><?= $form_body; ?></div>
		<?php endif; ?>

	    <div class="content_copyright">
	        <p>© FiveTwo Network. All rights reserved.</p>
	    </div>
	</div>


	<?php wp_footer(); ?>

	<!--Pixel Code-->
	<script>
	  !function(f,e,a,t,h,r){if(!f[h]){r=f[h]=function(){r.invoke?
	  r.invoke.apply(r,arguments):r.queue.push(arguments)},
	  r.queue=[],r.loaded=1*new Date,r.version="1.0.0",
	  f.FeathrBoomerang=r;var g=e.createElement(a),
	  h=e.getElementsByTagName("head")[0]||e.getElementsByTagName("script")[0].parentNode;
	  g.async=!0,g.src=t,h.appendChild(g)}
	  }(window,document,"script","https://cdn.feathr.co/js/boomerang.min.js","feathr");

	  feathr("fly", "5db87e34e1cc9004ecf8e248");
	  feathr("sprinkle", "page_view");
	</script>

</body>
</html>
