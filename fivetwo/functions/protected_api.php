<?php

add_filter( 'rest_endpoints', 'remove_default_endpoints_smarter' );

function remove_default_endpoints_smarter( $endpoints ) {
	if (is_user_logged_in()) {
		return $endpoints;
	}

	$prefix = 'wp/v2';

	  foreach ( $endpoints as $endpoint => $details) {
	   		if(strpos($endpoint, $prefix)) {
	   			unset( $endpoints[$endpoint] );
	   		}
	  }

	  return $endpoints;
}