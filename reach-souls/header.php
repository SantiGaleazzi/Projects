<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="theme-color" content="#f3b120">

    <title><?php bloginfo('title') ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head(); ?>
   
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

	<header	class="w-full fixed top-0 left-0 z-50">
		<div class="navigation-overlay"></div>

		<div class="px-5 py-1 bg-blue-500 relative z-10">
			<div class="container">
				<div class="flex justify-end">
					<div class="flex items-center gap-x-6 divide-x divide-white">
						<ul id="preheader-menu" class="flex items-center gap-4">
							<?php
								wp_nav_menu( array(
									'theme_location'  => 'preheader_menu',
									'menu'            => '',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => '',
									'menu_id'         => '',
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

						<?php if ( have_rows('settings_footer_social_networks', 'option') ) : ?>
							<div class="flex gap-5 items-center pl-3">
								<?php while ( have_rows('settings_footer_social_networks', 'option') ) : the_row(); ?>
									<div>
										<a href="<?php the_sub_field('network_url'); ?>" target="_blank" rel="noopener nofollow">
											<i class="fa-brands text-white text-sm <?php the_sub_field('network_icon'); ?>"></i>	
										</a>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		<nav class="md:bg-white md:shadow-xl">
			<div class="md:container">
				<div class="flex flex-col md:flex-row items-center justify-between gap-x-5">
					<div class="w-full md:w-auto md:flex-none flex items-center justify-between p-4 md:p-0 bg-white shadow-lg md:shadow-none relative z-10">
						<a href="<?= get_home_url(); ?>">
							<img src="<?php the_field('settings_header_logo', 'option'); ?>" alt="Reaching Souls Logo">
						</a>

						<div class="w-11 h-11 flex items-center justify-center border border-gray-100 rounded-full md:hidden">
							<button type="button" class="hamburger" aria-label="Open Menu">
								<span class="hamburger-box"></span>
							</button>
						</div>
					</div>

					<div class="main-navigation w-full flex items-center justify-center">
						<ul id="header-menu" class="grow flex flex-col md:flex-row flex-wrap md:items-center justify-center md:gap-12 lg:gap-16">
							<?php
								wp_nav_menu(array(
									'theme_location'  => 'header_menu',
									'menu'            => '',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => '',
									'menu_id'         => '',
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
					</div>

					<div class="flex-none hidden lg:block">
						<?php
							if ( get_field('settings_header_donation_type', 'option') === 'link' ) :
								$donation_link = get_field('settings_header_donation_link', 'option');
						?>
							
							<a class="button" href="<?= $donation_link['url']; ?>" target="<?= esc_attr( $donation_link['target'] ?: '_self' ); ?>">
								<?= $donation_link['title']; ?>
							</a>

						<?php else : ?>

							<?php the_field('settings_header_donation_flexformz', 'option'); ?>

						<?php endif; ?>
					</div>
				</div>
			</div>
		</nav>
	</header>
