<!DOCTYPE html>
<html lang="en">
<head>

    <title><?php bloginfo('title') ?></title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-P07LNK967F"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-P07LNK967F');
    </script>

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

    <!-- Navigation -->
    <?php get_template_part('partials/partial-navigation'); ?>
    <!-- Navigation -->