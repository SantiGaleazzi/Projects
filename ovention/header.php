<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

	<title><?php wp_title(''); ?></title>
	
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
	<?php wp_head(); ?>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-56TRFF9');</script>
	<!-- End Google Tag Manager -->
	
    <script defer src="https://tools.luckyorange.com/core/lo.js?site-id=5696ea9e"></script>

</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-56TRFF9"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

    <?php do_action('body_top'); ?>

		<header class="tw-relative">
			<div class="navigation-overlay"></div>
			<div class="tw-px-6 tw-py-3 tw-bg-beige-500">
				<div class="tw-container">
					<div class="tw-flex tw-items-center tw-justify-center sm:tw-justify-end">

						<?php if ( have_rows('header_social_media', 'option') ) : ?>
							<div class=" tw-flex tw-flex-col sm:tw-flex-row tw-items-center">
								<div class="tw-flex-none tw-flex tw-items-center tw-mb-3 sm:tw-mb-0">
									<div class="tw-mr-6">
										<button class="js-contact-in-site tw-text-white tw-text-xl tw-font-semibold tw-px-6 tw-py-2 tw-bg-orange-900 tw-rounded-xl tw-cursor-pointer" aria-label="Contact Us">Contact Us</button>
									</div>

									<div>
										<a class="tw-text-[#3f4449] hover:tw-text-[#3f4449] tw-font-semibold" href="<?= get_home_url(); ?>/login">Sign In</a>
									</div>
								</div>

								<div class="tw-flex tw-items-center">
									<div class="tw-px-7">
										<button class="search-in-site tw-text-orange-900 tw-cursor-pointer" aria-label="Search" ><i class="fa-solid fa-magnifying-glass"></i></button>
									</div>

									<?php while ( have_rows('header_social_media', 'option') ) : the_row(); ?>
										<div class="tw-mr-4 last:tw-mr-0">
											<a href="<?php the_sub_field('network_url'); ?>" target="_blank" class="tw-text-gray-800 hover:tw-text-gray-800">
												<i class="<?= the_sub_field('network_icon'); ?>"></i>
											</a>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<div class="tw-px-6 tw-bg-gray-800 tw-relative">
				<div class="tw-container">
					<div class="tw-flex md:tw-flex-col xl:tw-flex-row tw-items-center tw-justify-between tw-py-7">
						<div class="tw-w-full md:tw-w-auto md:tw-flex-none tw-flex tw-items-center tw-justify-between xl:tw-border-r-2 xl:tw-border-solid xl:tw-border-gray-500 md:tw-pr-0 xl:tw-pr-20 md:tw-mr-0 xl:tw-mr-8 md:tw-mb-5 xl:tw-mb-0">
							<div class="xl:tw-py-2">
								<a href="<?= get_home_url(); ?>">
									<img src="<?php the_field('header_logo', 'option'); ?>" alt="Ovention Logo">
								</a>
							</div>

							<button type="button" class="hamburger" aria-label="Open Menu">
								<span class="hamburger-box"></span>
							</button>
						</div>

						<div class="navigation">
							<ul role="list" class="menu">
								<?php
									wp_nav_menu(array(
										'theme_location'  => 'header_main_menu',
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
										'items_wrap'      => '%3$s',
										'depth'           => 0,
										'walker'          => new themeslug_walker_nav_menu_header
									));
								?>
							</ul>

							<div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-gap-5 tw-mb-6 md:tw-mb-0 md:tw-mt-6 lg:tw-mt-0">
								<?php

									if ( get_field('header_buy_now', 'option') ) :

									$header_buy_now = get_field('header_buy_now', 'option');

								?>
									<div class="tw-w-full md:tw-w-auto md:tw-flex-none">
										<a class="tw-w-full md:tw-w-auto tw-text-center tw-text-white hover:tw-text-white tw-text-[16px] tw-font-semibold tw-px-10 tw-py-6 tw-bg-orange-900 tw-rounded-2xl tw-inline-block" href="<?= $header_buy_now['url']; ?>" target="<?= esc_attr( $header_buy_now['target'] ?: '_self' ); ?>">
											<?= $header_buy_now['title']; ?> »
										</a>
									</div>
								<?php endif; ?>
										
								<?php

									if ( get_field('header_buy_recipe', 'option') ) :
									$header_recipe = get_field('header_buy_recipe', 'option');

								?>
									<div class="tw-w-full md:tw-w-auto md:tw-flex-none">
										<div class="tw-w-full md:tw-w-auto tw-text-center tw-text-white hover:tw-text-white tw-text-[16px] tw-font-semibold tw-px-10 tw-py-6 tw-bg-orange-500 tw-rounded-2xl tw-inline-block tw-cursor-pointer find-rep-btn">
											<?= $header_recipe['title']; ?> »
										</div>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
   
