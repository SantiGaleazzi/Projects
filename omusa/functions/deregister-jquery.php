<?php

    /**
     * Deregister jQuery
     */
    function replace_core_jquery_version() {
        wp_deregister_script( 'jquery' );
        wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, false);
    }
    add_action( 'wp_enqueue_scripts', 'replace_core_jquery_version' );
