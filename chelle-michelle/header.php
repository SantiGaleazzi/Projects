<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php bloginfo('title') ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php wp_head(); ?>
   
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>

	<header class="px-5 py-6">
		<div class="container">
			<div class="flex items-center justify-between">
				<div class="flex-none">
					<a href="<?= get_home_url(); ?>">
						<img class="w-32" src="<?php the_field('header_logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" loading="lazy">
					</a>
				</div>

				<div class="navigation flex-1">
					<ul class="flex flex-row items-center justify-end gap-x-8 gap-y-4">
						<?php
							wp_nav_menu(array(
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
								'items_wrap'      => '%3$s',
								'depth'           => 0,
								'walker'          => new themeslug_walker_nav_menu_header
							));
						?>
					</ul>
				</div>
			</div>
		</div>
	</header>
