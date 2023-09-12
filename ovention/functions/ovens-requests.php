
<?php

	/**
	 * It takes a post ID, gets the post, and then adds some extra fields to the post object
	 * 
	 * @param request The request object.
	 * 
	 * @return The post object is being returned.
	 */
	function get_oven_by_id ( WP_REST_Request $request ) {

		$post_id = $request['id'];
		$post = get_post( $post_id );

		$post->permalink = get_permalink( $post_id );
		$post->post_intro = get_field( 'intro', $post_id );
		$post->oven_name = get_field( 'single_oven_name', $post_id );
		$post->feature_image = get_the_post_thumbnail_url( $post_id );

		return $post;

	}

	function get_oven_by_slug ( WP_REST_Request $request ) {

		$oven_info = array();
		$body = $request->get_params();

		$post_id = $body['post_id'];
		$post_info = $body['section'];

		if ( have_rows( 'oven_' . $post_info, $post_id ) ) {

			while ( have_rows( 'oven_' . $post_info, $post_id ) ) {

				the_row();

				if ( $body['type'] === 'about' ) {

					$icon = get_sub_field( 'icon' );

					array_push( $oven_info, array(
						'copy' => get_sub_field( 'text' ),
						'icon' => array(
							'url' => $icon['url'],
							'alt' => $icon['alt']
						),
						'type' => $body['type']
					));

				} else {

					array_push( $oven_info, array(
						'title' => get_sub_field( 'title' ),
						'link' => get_sub_field( 'file' ) ?: get_sub_field( 'oven_training_videos_video' ),
						'type' => $body['type']
					));

				}

			}

		} elseif ( $body['type'] === 'about' && !have_rows( 'oven_' . $post_info, $post_id ) ) {

			array_push( $oven_info, array(
				'copy' => apply_filters( 'the_content', get_post_field( 'post_content', $post_id ) ),
				'type' => $body['type'] . '-no-repeater'
			));

		}

		return $oven_info;

	}
	
	/* It's creating a new route for the REST API. */
	add_action( 'rest_api_init', function () {

		register_rest_route( 'oven-app/v1',
			'oven/(?P<id>\d+)',
			array(
				'methods' => WP_REST_Server::READABLE,
				'callback' => 'get_oven_by_id',
				'permission_callback' => '__return_true'
			)
		);

		register_rest_route( 'oven-app/v1',
			'oven/(?P<slug>[a-zA-Z0-9-]+)',
			array(
				'methods' => 'POST',
				'callback' => 'get_oven_by_slug',
				'permission_callback' => '__return_true'
			)
		);

	});
