<?php

    function gdprRedirect() {
        
        get_template_part('partials/header-gdpr');
    
    }
    add_action('wp_head', 'gdprRedirect');