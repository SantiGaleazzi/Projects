<?php

    /**
     * Function that adds the favicon and mobile app icons to the head of the HTML document.
     *
     * @since 1.0
     */
    function add_icons() {

        echo '<link href="'.get_template_directory_uri().'/assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">';
        echo '<link href="'.get_template_directory_uri().'/assets/images/apple-touch-icon.png" rel="apple-touch-icon">';
		
    }
    add_action('wp_head', 'add_icons');
