<?php
  $logo          = get_field('logo', 'option');
  $logo_stickie  = get_field('logo_stickie', 'option');
  $social        = get_field('social', 'option');
  $donate_btn    = get_field('donate_btn', 'option');
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="UTF-8">
  <title>Institute For Free Speech</title>
  <meta name="format-detection" content="telephone=no">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <meta name="theme-color" content="#1e3764">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/ico" href="<?php bloginfo('template_url'); ?>/assets/img/favicon.ico" />
  <link rel="apple-touch-icon" href="<?php echo bloginfo('template_url'); ?>/assets/img/apple-icon.png">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  
  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>
		
	<!-- PUSH DOWN -->
	<?php get_template_part( 'content', 'push-down' ); ?>
	<!-- /PUSH DOWN -->

	<!-- HEADER -->
	<div class="header-bar">
	<div class="row">
		<div class="medium-3 columns header-bar__logo show-for-medium">
		<?php if ( $logo ): ?>
		<a href="<?php bloginfo('url'); ?>" target="_self">
			<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="logosvg">
		</a>
		<?php endif; ?>
		</div>
		<div class="medium-9 columns header-bar__items involved">
		<div class="title-bar" data-responsive-toggle="preheader-menu" data-hide-for="medium">

		<?php if ( $logo ): ?>
			<a href="<?php bloginfo('url'); ?>" target="_self">
			<img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" class="logosvg">
		</a>
		<?php endif; ?>

		<button class="menu-btn" type="button" data-toggle="preheader-menu">
			<div class="menu-hamburger"></div>
		</button>
		</div>

		<div class="top-bar" id="preheader-menu">
			<div class="top-bar-right">
			<ul class="medium-horizontal vertical dropdown menu submenu" data-responsive-menu="drilldown medium-dropdown">
				<?php
				$defaults = array(
					'theme_location'  => 'preheader_menu',
					'menu'            => '',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'navigation',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap' => '%3$s',
					'depth'           => 0,
					'walker'        => new themeslug_walker_nav_menu_images
				);
				wp_nav_menu($defaults); ?>

				<?php if( have_rows('social','option') ): ?>
				<li class="involved__social">
				<?php while ( have_rows('social','option') ) : the_row(); ?>
					<?php $social_icon = get_sub_field('social_icon');  ?>
					<?php $social_url  = get_sub_field('social_url');  ?>

					<a href="<?php echo $social_url; ?>" class="social-icon involved__item" target="_blank"><img src="<?php echo $social_icon['url'];?>" alt="<?php echo $social_icon['alt'];?>"></a>

				<?php endwhile; ?>
				</li>
				<?php endif; ?>
				<?php get_search_form(); ?>

				<div class="hide-for-medium header-bar__secmobile">
				<?php
				$defaults = array(
					'theme_location'  => 'header_menu',
					'menu'            => '',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'navigation',
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
				wp_nav_menu($defaults); ?>
				<li class="icon-item">
					<a href="<?php echo $donate_btn['url']; ?>" target="<?php echo $donate_btn['target']; ?>" class="btn btn--yellow"><?php echo $donate_btn['title']; ?></a>
				</li>
				</div>
			</ul>
			</div>
		</div>
		</div>
	</div>
	</div>

	<div class="sticky-nav">
	<div class="header-navmenu show-for-medium">
		<div class="row">
		<div class="show-for-large show-for-large large-2 xlarge-3 columns header-navmenu__logo">
			<a href="https://www.ifs.org" target="_self">
				<img src="https://www.ifs.org/wp-content/uploads/2018/06/IFS-Logo-1CBWW-1.svg" alt="Institute For Free Speech" class="svglogo">
			</a>
		</div>
		<div class="medium-12 large-10 xlarge-9 columns header__secmenu navmenu">

			<ul class="dropdown navmenu__secondary" data-dropdown-menu>
			<?php
				$defaults = array(
				'theme_location'  => 'header_menu',
				'menu'            => '',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'navigation',
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
			wp_nav_menu($defaults); ?>
			<li class="icon-item">
				<a href="<?php echo $donate_btn['url']; ?>" target="<?php echo $donate_btn['target']; ?>" class="btn btn--yellow donation-btn"><?php echo $donate_btn['title']; ?></a>
			</li>
			</ul>
		</div>
		</div>
	</div>
	</div>

	<!-- /HEADER -->
