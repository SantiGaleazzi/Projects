<?php
    function add_nofollow_content($content) {
    $content = preg_replace_callback('/]*href=["|\']([^"|\']*)["|\'][^>]*>([^<]*)/i', function($matches) {
        $site_link = get_bloginfo('url');
        if (strpos($matches[1], $site_link) === false)
            return 'href="'.$matches[1].'" rel="nofollow" target="_blank">'.$matches[2];
        else
            return $matches[0];
        }, $content);
    return $content;
    }
    add_filter('the_content', 'add_nofollow_content');
