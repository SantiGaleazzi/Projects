<!DOCTYPE html>
<html lang="en">
<head>

    <title><?php bloginfo('title') ?></title>

    <meta charset="UTF-8">
	<meta name="theme-color" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">-->
    <!--<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>-->

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<?php wp_body_open();
