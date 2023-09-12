<?php

    function template_chooser($template) {

        global $wp_query;

        if ( $wp_query->is_search ) {

            return locate_template('searchpage.php');

        }

        return $template;

    }
    add_filter('template_include', 'template_chooser');

    function add_custom_post_types( $query ) {

        if ( $query->is_main_query() && $query->is_search() && ! is_admin() ) {

            $query->set( 'post_type', array('page', 'post', 'resources' ) );

        }
        
    }
    add_action( 'pre_get_posts', 'add_custom_post_types' );

    function acf_search_join( $join ) {

        global $wpdb;

        if ( is_search() ) {

            $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';

        }

        return $join;

    }
    add_filter('posts_join', 'acf_search_join' );

    function acf_search_where( $where ) {
        
        global $pagenow, $wpdb;

        if ( is_search() ) {
            
            $where = preg_replace(
                "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
                "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
        }

        return $where;

    }
    add_filter( 'posts_where', 'acf_search_where' );

    function acf_search_distinct( $where ) {

        global $wpdb;

        if ( is_search() ) {

            return "DISTINCT";

        }

        return $where;

    }
    add_filter( 'posts_distinct', 'acf_search_distinct' );

    function truncate( $string, $length = 250 ) {
    
        if ( strlen($string) > $length ) {

            $string = substr($string, 0, $length) . ' [...]';
            
        }

        return $string;

    }