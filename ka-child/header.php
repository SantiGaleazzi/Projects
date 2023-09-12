<?php

	$homeurl = get_bloginfo('home');
	$themeurl = get_bloginfo('template_url');
	$urlparts = parse_url($homeurl);

	wp_enqueue_style('theme-ie9', get_template_directory_uri() . '/ie9.css', array('theme'), THEME_VERSION);
	$GLOBALS['wp_styles']->add_data('theme-ie9', 'conditional', 'lte IE 9');

	wp_enqueue_style('theme-ie8', get_template_directory_uri() . '/ie8.css', array('theme-ie9'), THEME_VERSION);
	$GLOBALS['wp_styles']->add_data('theme-ie8', 'conditional', 'lte IE 8');

	if ( is_page() && get_the_ID() ) {
		$class = get_post_meta( get_the_ID(), 'class', true );
		add_body_class($class);
		add_body_class( 'page-' . $post->post_name );
	}

	$section = get_current_nav_item();

	if ( $section ) {
		$section_slug = sanitize_title( $section->title );
		add_body_class('section-'.$section_slug);
		switch($section_slug) {
			case 'page-name':
				add_body_class('wide2');
			break;
		}
		if (($post->post_type == 'page') && !$post->post_parent) {
			add_body_class('section-frontpage');
		}
	}

	if ( !has_body_class('single-column') ) {

		add_body_class('wide-column');

	}

?>

<!DOCTYPE html>
<html <?php language_attributes( 'html' ) ?> xmlns:fb="http://ogp.me/ns/fb#">
<head>

	<meta charset="UTF-8">
	<meta name="theme-color" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title><?php wp_title(' '); ?> <?php echo ( wp_title(' ', false) ? ' : ' : '' ); ?> <?php bloginfo('name'); ?></title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<script src="//use.typekit.net/nsm1gcs.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>

	<script>
		var BASE = <?php echo json_encode( $themeurl ); ?>;
		var BASEWP = <?php echo json_encode( get_bloginfo('wpurl') ); ?>;
		var HOSTNAME = <?php echo json_encode( $urlparts['host'] ); ?>;
		var DOMAINS = ['kidsalive.org','secure.kidsalive.org', 'proto-secure.kidsalive.org', HOSTNAME];
		var ajaxurl = <?php echo json_encode(admin_url('admin-ajax.php')); ?>;
		var INSTAGRAM_CLIENT_ID = <?php echo json_encode(THEME_INSTAGRAM_CLIENT_ID); ?>;
	</script>

	<?php get_template_part( 'header', 'meta' ); ?>
	<?php wp_head(); ?>

	<?= get_ad('head-tags'); ?>
	<?php if ( is_archive() ) echo '<meta name=’robots’ content=’noindex,follow’ />'; ?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], 
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TG8KV63');</script>
	<!-- End Google Tag Manager -->

</head>

<body <?php body_class('no-js'); ?>>

	<?php wp_body_open(); ?>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TG8KV63" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<?php if ( is_page(4) ) include('header-pushdown.php'); ?>

	<header id="header" class="tw-w-full tw-fixed tw-top-0 tw-left-0 tw-z-50 tw-drop-shadow-md">
		<div class="navigation-overlay"></div>
		<div class="tw-p-4 md:tw-py-0 tw-bg-white tw-flex tw-items-center tw-justify-between tw-relative tw-z-50">
			<div class="tw-container tw-relative">
				<div class="tw-flex tw-items-center tw-justify-between">
					<div class="tw-flex tw-items-center tw-justify-center md:tw-px-3 md:tw-py-2 lg:tw-p-6 lg:tw-pt-5 tw-bg-white md:tw-drop-shadow-md md:tw-absolute md:tw-top-0 md:tw-left-0">
						<a href="<?= get_home_url(); ?>">
							<img class="tw-w-24 md:tw-w-20 lg:tw-w-40" src="<?= get_stylesheet_directory_uri(); ?>/assets/images/new-logo.svg" alt="<?php bloginfo('name'); ?>" />
						</a>
					</div>

					<div class="tw-flex tw-items-center">
						<?php if ( !is_page( array( 6951, 6966, 6957, 7064, 7071, 7075, 7080, 7088, 7132, 7139, 7144, 7149, 7156, 7162, 7169, 7173, 7180, 7185, 7189, 7195, 7206, 7212, 7217, 7221, 7227, 7248, 7266, 7257, 7266, 7270, 7274, 7278, 7282, 7286, 7290, 7294, 7298, 7304, 7317, 7321, 7324, 7327, 7330, 7335, 7343, 7348, 7352, 7358, 8018, 8021, 3750 ) ) ) : ?>
							<a class="tw-block md:tw-hidden tw-text-xs tw-text-center tw-text-white tw-font-bold tw-leading-none hover:tw-no-underline tw-px-5 tw-py-2 tw-bg-orange-500" href="/donate/">Donate</a>
						<?php endif; ?>

						<button class="hamburger" type="button" aria-label="Open Menu">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
			</div>
		</div>

		<div class="navigation">
			<div class="tw-px-5 tw-py-4 md:tw-py-0 tw-bg-beige-100">
				<div class="tw-container">
					<div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center md:tw-justify-end">
						<div id="cart-status-links"></div>
						<div class="tw-w-full md:tw-w-auto tw-flex tw-flex-col md:tw-flex-row">
							<form id="search" method="get" action="<?= esc_url( home_url( '/search/' ) ); ?>">
								<input type="text" name="q" placeholder="Search" class="query noclear">
								<button type="submit" class="icon-search-find"></button>
							</form>

							<a class="toggle tw-hidden md:tw-block tw-text-center tw-text-white tw-font-bold tw-leading-none hover:tw-no-underline tw-px-6 tw-py-3 tw-bg-gray-100" href="/search/" data-toggle="search-on">Search</a>

							<?php if ( !is_page( array( 6951, 6966, 6957, 7064, 7071, 7075, 7080, 7088, 7132, 7139, 7144, 7149, 7156, 7162, 7169, 7173, 7180, 7185, 7189, 7195, 7206, 7212, 7217, 7221, 7227, 7248, 7266, 7257, 7266, 7270, 7274, 7278, 7282, 7286, 7290, 7294, 7298, 7304, 7317, 7321, 7324, 7327, 7330, 7335, 7343, 7348, 7352, 7358, 8018, 8021, 3750 ) ) ) : ?>
								<a class="tw-hidden md:tw-block tw-text-center tw-text-white tw-font-bold tw-leading-none hover:tw-no-underline tw-px-6 tw-py-3 tw-bg-orange-500" href="/donate/">Donate</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>

			<div class="tw-bg-white">
				<div class="tw-container">
					<div class="tw-flex md:tw-justify-end">
						<ul class="header-menu">
							<?php
								wp_nav_menu( array(
									'theme_location'  => 'main',
									'menu'            => '',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => '',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'     => '%3$s',
									'depth'          => 0,
									'walker'        => new themeslug_walker_nav_menu_header
								));
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div id="wrap">
		<div id="cart-status-wrap"></div>

		<!-- <div id="bump"></div> -->
