<!DOCTYPE html>
<html lang="en">
<head> 

	<meta charset="UTF-8">
	<meta name="theme-color" />
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php bloginfo('title') ?></title>

    <!--<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">-->
    <!--<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>-->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php wp_head(); ?>

	<?php
		
		$logo = get_field('logo','options');
		$header_donation_button = get_field('header_donation_button', 'options');

	?>

</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<?php if ( !is_page_template('templates/template-donation.php') ) : ?>

		<header class="w-full fixed top-0 left-0 z-50">
			<div class="navigation-overlay"></div>
			<?php if ( is_front_page() ) : ?>
					<?php get_template_part('partials/home-top-banner'); ?>
				<?php endif; ?>

			<div class="w-full bg-default-reverse border-b border-separator relative z-50">
				<div class="container p-4 md:p-0 flex items-center justify-between relative z-50">
					<div class="md:absolute top-0 left-0 z-50 md:mt-10 lg:mt-0">
						<?php if ( $logo ) : ?>
							<a href="<?= get_home_url(); ?>">
								<div id="logo-nav" class="w-12 md:w-20 lg:w-32 xl:w-40 h-12 md:h-20 lg:h-32 xl:h-40 flex items-center justify-center bg-red-500">
									<img src="<?= esc_url($logo['url']); ?>" alt="<?= esc_attr($logo['alt']); ?>" class="w-8 md:w-14 lg:w-24">
								</div>
							</a>
						<?php endif; ?>
					</div>

					<button class="hamburger" type="button" aria-label="Open Menu">
						<span class="hamburger-box">
							<span class="hamburger-inner"></span>
						</span>
					</button>
				</div>
			</div>
			
			<div class="navigation">
				<div class="px-4 md:px-0 md:pt-2 bg-submenu">
					<div class="container">
						<div class="w-full flex flex-col-reverse md:flex-row items-center justify-between">
							<div class="w-full">
								<ul id="list-m" class="list-menu menu-nav flex-1 flex flex-col md:flex-row justify-end lg:justify-center lg:pl-32 xl:pl-24">
									<?php
										$defaults = array(
											'theme_location'  => 'header_menu',
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
											'items_wrap' => '%3$s',
											'depth'           => 0,
											'walker'        => new themeslug_walker_nav_menu_header
										);
										wp_nav_menu($defaults);
									?>
								</ul>

								<div class="w-full md:w-auto mb-4 md:mb-0 md:hidden">
									<?php if ( !is_page_template('templates/george-verwer.php') ) : ?>
										<a href="<?= esc_url( $header_donation_button['url'] ); ?>" target="<?= esc_attr( $header_donation_button['target'] ?: '_self' ); ?>" rel="nofollow noopener" class="text-xl xl:text-2xl leading-none text-center text-white-200-new font-roboto font-semibold px-8 py-3 bg-red-500 block md:inline-block">
											<?= $header_donation_button['title']; ?>
										</a>
									<?php endif; ?>
								</div>
							</div>

							<div id="iconmedia" class="w-full md:w-auto py-3 md:py-0 flex items-center">			
								<div id="panel-search" class="container-searcher flex-1 flex items-center justify-center relative">
									<?php get_search_form(); ?>
									<button class="search-button relative z-10" aria-label="Search">
										<i class="fas fa-search text-sm text-white-pure"></i>
									</button>
								</div>		

								<?php if ( have_rows('social_networks_repeater', 'options') ) : ?>
									<div class="flex items-center">
										<?php
											while( have_rows('social_networks_repeater', 'options') ): the_row();
										?>
											<div class="pl-3">
												<a href="<?php the_sub_field('url'); ?>" target="_blank" rel="noopener noreferrer" aria-label="Social Media"><i class="fab <?php the_sub_field('network');?> text-xl text-white-pure"></i></a>
											</div>
										<?php endwhile; ?>
									</div>
								<?php endif; ?>
								
								<div class="text-center pl-3">
									<div class=" leading-none text-white-pure" style="font-size: 10px;">
										Mode:
									</div>
									<div class="switch-color text-xs text-white-pure font-black">
										Light
									</div>
								</div>
								
								<!-- Theme Switcher -->
								<?php get_template_part('partials/theme-switcher'); ?>
								<!-- Theme Switcher -->
								
							</div>
						</div>
					</div>
				</div>

				<div class="starter-menu px-4 md:px-0 bg-submenu md:bg-default-reverse md:border-b md:border-separator hidden md:block">
					<div class="container">
						<div class="flex flex-col md:flex-row items-center justify-between">
							<ul id="sub-menu" class="sub-menu menu-nav flex-1 flex flex-col md:flex-row justify-end lg:justify-center relative lg:pl-32 xl:pl-32">
								<?php
									$defaults = array(
										'theme_location'  => 'sub_menu',
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
										'items_wrap' => '%3$s',
										'depth'           => 0,
										'walker'        => new themeslug_walker_nav_menu_header
									);
									wp_nav_menu($defaults);
								?>
							</ul>

							<div class="w-full md:w-auto mb-4 md:mb-0">
								<?php if ( !is_page_template('templates/george-verwer.php') ) : ?>
									<a href="<?= esc_url( $header_donation_button['url'] ); ?>" target="<?= esc_attr( $header_donation_button['target'] ?: '_self' ); ?>" rel="nofollow noopener" class="text-xl xl:text-2xl leading-none text-center text-white-200-new font-roboto font-semibold px-8 py-3 bg-red-500 block md:inline-block">
										<?= $header_donation_button['title']; ?>
									</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>

	<?php endif; ?>
