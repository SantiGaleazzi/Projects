<?php

    /**
     * Functions that hides the users from the REST API.
     * This will only show the users when the user is authenticated.
     *
     * @since 1.0
    */


    function remove_default_endpoints_smarter ( $endpoints ) {

        if ( is_user_logged_in() ) {

            return $endpoints;

        }

        $prefix = 'wp/v2';

        foreach ( $endpoints as $endpoint => $details ) {

            if ( strpos( $endpoint, $prefix ) ) {

                unset( $endpoints[$endpoint] );
            }

        }

        return $endpoints;

    }
    add_filter( 'rest_endpoints', 'remove_default_endpoints_smarter' );
