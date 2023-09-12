<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

	<title><?php bloginfo('title') ?></title>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

	<?php get_template_part('partials/header-redirect'); ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-GK7FQM891T"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'G-GK7FQM891T');
	</script>

	<script src="https://cdn.jwplayer.com/libraries/BziVZcID.js"></script>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<!-- Featured Content -->
	<?php get_template_part('partials/featured'); ?>
	<!-- Featured Content -->

	<!-- Navigation -->
	<?php get_template_part('partials/navigation'); ?>
	<!-- Navigation -->
