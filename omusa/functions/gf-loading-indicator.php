<?php

    /**
     * Gravity Forms
     *
     * @since 1.0
     *
     * Custom loading empty image for the gravity forms spinner.
     * Styles: Resources/sass/components/gravity-forms.sass
    */

    function spinner_url( $image_src, $form ) {

        return  'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
        
    }
    add_filter( 'gform_ajax_spinner_url', 'spinner_url', 10, 2 );