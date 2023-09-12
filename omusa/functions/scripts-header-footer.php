<?php

	function header_scripts() {

       if ( get_field('header_scripts', 'option') ) {

           echo html_entity_decode( get_field( 'header_scripts', 'option', false ) );

        }

    }
    add_action( 'wp_head', 'header_scripts' ) ;

	function footer_scripts() {

       if ( get_field( 'footer_scripts', 'option' ) ) {

           echo html_entity_decode( get_field( 'footer_scripts', 'option', false ) );

        }

    }
    add_action( 'wp_footer', 'footer_scripts' );
