<?php

	add_action( 'rest_api_init', function () {

		register_rest_route( 'fivetwo-api/v1',
			'gravity/(?P<id>\d+)',
			array(
				'methods' => WP_REST_Server::READABLE,
				'callback' => 'get_gravityform_shortcode_by_id',
				'permission_callback' => '__return_true'
			)
		);

	} );

	function get_gravityform_shortcode_by_id ( WP_REST_Request $request ) {

		return do_shortcode( '[gravityform id="' . $request['id'] . '" title="false" description="false" ajax="true"]' );

	}
