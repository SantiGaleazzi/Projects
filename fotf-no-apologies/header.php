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

	<!-- Navigation -->
		<?php get_template_part('partials/header-platform'); ?>
	<!-- Navigation -->
