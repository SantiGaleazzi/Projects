<?php
add_action( 'rest_api_init',
    function () {

        register_rest_route(
            'feed-reader/v1',
            '/long_term',
            array(
                'methods'  => 'POST',
                'callback' => 'post_long_term_end_point',
                'permission_callback' => function () {
                    return current_user_can('edit_others_posts');
                }
            )

        );

        register_rest_route(
            'feed-reader/v1',
            '/long_term/(?P<id>\w\d+)',
            array(
                'methods'  => 'PUT',
                'callback' => 'put_long_term_end_point',
                'permission_callback' => function () {
                    return current_user_can('edit_others_posts');
                }
            )

        );

        register_rest_route(
            'feed-reader/v1',
            '/short_term',
            array(
                'methods'  => 'POST',
                'callback' => 'post_short_term_endpoint',
                'permission_callback' => function () {
                    return current_user_can('edit_others_posts');
                }
            )
        );

        register_rest_route(
            'feed-reader/v1',
            '/short_term/(?P<id>\w\d+)',
            array(
                'methods'  => 'PUT',
                'callback' => 'put_short_term_endpoint',
                'permission_callback' => function () {
                    return current_user_can('edit_others_posts');
                }
            )
        );

    }
);


function long_term_handler($post_id, $long_term_data, $old_post_id = null) {
    // Adds the type of work categories to the long term custom post type
    create_terms_on_taxonomy( $long_term_data['web_categories'], 'long-type-of-work' );
    // Adds the regions to the long term custom post type
    create_terms_on_taxonomy( $long_term_data['countries'], 'long-regions' );
    // Adds the full/part-time type to the long term custom post type
    create_terms_on_taxonomy( $long_term_data['full_part_time'], 'long-part-time' );
    // Adds the virtual taxonomy to the long term custom post type
    create_terms_on_taxonomy( $long_term_data['remote_compatible'], 'long-remote-jobs' );

    // Adds the Location to the long term custom post type
    if ( !in_array( 'United States', $long_term_data['countries'] ) ) {
        create_terms_on_taxonomy( 'International', 'long-location' );
        // The true at the end appends the terms to the post.
        wp_set_object_terms( $post_id, 'International', 'long-location', false );
    } else {
        create_terms_on_taxonomy( 'United States', 'long-location' );
        // The true at the end appends the terms to the post.
        wp_set_object_terms( $post_id, 'United States', 'long-location', false );
    }

    // The true at the end appends the terms to the post.
    wp_set_object_terms( $post_id, $long_term_data['web_categories'], 'long-type-of-work', true );
    // Create the relacion between the new post, the given country and the taxonomy.
    wp_set_object_terms( $post_id, $long_term_data['countries'], 'long-regions', true );
    // Create the relacion between the new post, the given full-time and the taxonomy.
    wp_set_object_terms( $post_id, 'Raising Support', 'long-part-time', false );

    // Create the relacion between the new post, the given remote job and the taxonomy.
    if ( $long_term_data['remote_compatible'] === true ) {
        // The true at the end appends the terms to the post.
        wp_set_object_terms( $post_id, 'Virtual', 'long-remote-jobs', false );
    }

    $post_photos = array(); // Post gallery photos.

    // If the item on feed has photos we need to add them to an array.
    // The field id belongs to the photo gallery repeater on the post.
    if ( !empty( $long_term_data['photos'] ) ) {
        foreach ( $long_term_data['photos'] as $photo ) {
            array_push(
                $post_photos,
                array(
                    'field_6058e5166648b' => $photo,
                )
            );
        }
    }
    // Custom Post Fields
    $custom_fields = array(
        'id' => 'field_6058e7bfb5d7b',
        'link' => 'field_6058e7ddb5d7c',
        'static_link' => 'field_609d6a941998a',
        'description' => 'field_6058e7f9b5d7d',
        'commitment' => 'field_6058e82bb5d7e',
        'start_date' => 'field_6058e869b5d7f',
        'end_date' => 'field_6058e88db5d80',
        'full_part_time' => 'field_6058ea24b5d81',
        'requirements' => 'field_6058ea4bb5d82',
        'photos' => 'field_6058e5046648a',
    );

    $fields_data = array(
        'id' => $long_term_data['id'],
        'link' => $long_term_data['link'],
        'static_link' => 'https://omusa.servicereef.com/tracks/form-onboarding/88af40b6-f940-4be9-bb76-78a6adfe6acd',
        'description' => $long_term_data['description'],
        'commitment' => $long_term_data['commitment'],
        'start_date' => $long_term_data['start_date'],
        'end_date' => $long_term_data['end_date'],
        'full_part_time' => 'Raising Support',
        'requirements' => $long_term_data['requirements'],
        'photos' => $post_photos,
    );

    // Adds the value from the feed to each field on WordPress.
    foreach ( $custom_fields as $field_key => $field_value ) {
        update_field( $field_value, $fields_data[$field_key], $post_id );
    }

    return new WP_REST_Response(
        array(
            'status' => 201,
            'response' => 'OK',
            'body_response' => array(
                'wp_post_id' => $old_post_id != null ? $old_post_id : $post_id,
            )
        )
    );
}

function create_new_long_term($long_term_data, $user_id) {
     // Get current user id.
    // This data belongs to the post
    $post_args = array(
        'post_author'    => $user_id,
        'post_status'    => 'draft',
        'post_title'     => $long_term_data['title'],
        'post_type'      => 'long-term',
    );

    // Creates a New post under the long-term custom post type.
    $new_post_id = wp_insert_post( $post_args );

    return long_term_handler($new_post_id, $long_term_data);
}

    // Create Log Term Post
function post_long_term_end_point( WP_REST_Request $request ) {
    $long_term_data = $request->get_json_params();
    $user_id = get_current_user_id();

    return create_new_long_term($long_term_data, $user_id);
}

    // Update the long-term posts creating a new post on the Revisions plugin.
function put_long_term_end_point( WP_REST_Request $request ) {
    global $wpdb;
    $long_term_data = $request->get_json_params();
    $user_id = get_current_user_id();

    if (FALSE === get_post_status($long_term_data['wp_post_id'])) {
        return create_new_long_term($long_term_data, $user_id);
    }

    // Post Data
    $post_args = array(
        'post_author'    => $user_id,
        'post_status'    => 'pending',
        'post_mime_type' => 'pending-revision',
        'post_title'     => $long_term_data['title'],
        'post_type'      => 'long-term',
        'meta_input'     => array(
            '_rvy_base_post_id' => $long_term_data['wp_post_id']
        )
    );

    // Create New post with the new data.
    $new_post_id = wp_insert_post( $post_args );

    //Force Comment Count on new revision post
    $data = [ 'comment_count' => $long_term_data['wp_post_id'] ];
    $where = [ 'id' => $new_post_id ];
    $wpdb->update( 'wp_posts', $data, $where );

    // Create the relacion between post, taxonomy and taxonomy term.
    add_post_meta( $long_term_data['wp_post_id'], '_rvy_has_revisions', 1 );

    return long_term_handler($new_post_id, $long_term_data, $long_term_data['wp_post_id']);
}


function short_term_handler($post_id, $short_term_data, $old_post_id = null) {
    // Adds the type of work categories to the short term custom post type
    create_terms_on_taxonomy( $short_term_data['web_categories'], 'short-type-of-work' );
    // Adds the regions to the short term custom post type
    create_terms_on_taxonomy( $short_term_data['country'], 'short-regions' );
    // Adds the Groups, Family and Individuals as terms.
    $available_for_terms = explode( ',', $short_term_data['available_for'] );
    foreach ( $available_for_terms as $key => $value ) {
        if ( $value == 'Individual' ) {
            $available_for_terms[$key] = 'Individuals';
        }
    }
    create_terms_on_taxonomy( $available_for_terms, 'short-remote-compatibility' );
    // The true at the end appends the terms to the post.
    wp_set_object_terms( $new_post_id, $short_term_data['web_categories'], 'short-type-of-work', true );

    // Create the relacion between the new post, the given country and the taxonomy.
    wp_set_object_terms( $new_post_id, $short_term_data['country'], 'short-regions' );

    // Create the relacion between the new post,the given group, family or individual.
    wp_set_object_terms( $new_post_id, $available_for_terms, 'short-remote-compatibility', true );

    // After creating the post functionality
    $post_photos = array(); // Post gallery photos.

    // If the item on feed has photos we need to add them to an array.
    // The field id belongs to the photo gallery repeater on the post.
    if ( !empty( $short_term_data['photos'] ) ) {
        foreach ( $short_term_data['photos'] as $photo ) {
            array_push(
                $post_photos,
                array(
                    'field_604917d1402c2' => $photo
                )
            );
        }
    }

    // Custom Post Fields
    $custom_fields = array(
        'id' => 'field_602ee67155f59',
        'link' => 'field_604b8fc6ae9e6',
        'static_link' => 'field_60a2dc513ae08',
        'description' => 'field_604949bcc2e2e',
        'cost' => 'field_604916b7402bd',
        'available_for' => 'field_60494a4737662',
        'currency' => 'field_6049175c402bf',
        'start_date' => 'field_6049105e402b8',
        'end_date' => 'field_604915a5402b9',
        'application_deadline' => 'field_604915db402ba',
        'min_age' => 'field_6049164d402bb',
        'max_age' => 'field_6049166e402bc',
        'ministry_details' => 'field_60490e6a1ad1f',
        'participant_profile' => 'field_60490f022ac27',
        'accommodation' => 'field_60490f282ac29',
        'food' => 'field_60490f4b2ac2a',
        'travel' => 'field_60490f5d2ac2b',
        'health' => 'field_60490f832ac2c',
        'visa' => 'field_60490f972ac2e',
        'notes' => 'field_60490f9e2ac2f',
        'photos' => 'field_604917b0402c1',
    );

    // The RSS item data
    $fields_data = array(
        'id' => $short_term_data['id'],
        'link' => $short_term_data['link'],
        'static_link' => 'https://omusa.servicereef.com/Account/LogIn?ReturnUrl=%2ftracks%2f16%2fshort-term-application-steps%2fsubscribe',
        'description' => $short_term_data['description'],
        'cost' => $short_term_data['cost'],
        'available_for' => implode(', ', $available_for_terms),
        'currency' => $short_term_data['currency'],
        'start_date' => $short_term_data['start_date'],
        'end_date' => $short_term_data['end_date'],
        'application_deadline' => $short_term_data['application_deadline'],
        'min_age' => $short_term_data['min_age'],
        'max_age' => $short_term_data['max_age'],
        'ministry_details' => $short_term_data['ministry_details'],
        'participant_profile' => $short_term_data['participant_profile'],
        'accommodation' => $short_term_data['accommodation'],
        'food' => $short_term_data['food'],
        'travel' => $short_term_data['travel'],
        'health' => $short_term_data['health'],
        'visa' => $short_term_data['visa'],
        'notes' => $short_term_data['notes'],
        'photos' => $post_photos,
    );

    foreach ( $custom_fields as $field_key => $field_value ) {
        update_field( $field_value, $fields_data[$field_key], $new_post_id );
    }

    return new WP_REST_Response(
        array(
            'status' => 201,
            'response' => 'OK',
            'body_response' => array(
                'wp_post_id' => $old_post_id != null ? $old_post_id : $post_id,
            )
        )
    );
}


function create_new_short_term($short_term_data, $user_id) {
        // This data belongs to the post
    $post_args = array(
        'post_author'    => $user_id,
        'post_excerpt'   => $short_term_data['purpose'],
        'post_status'    => 'draft',
        'post_title'     => $short_term_data['title'],
        'post_type'      => 'short-term',
        //'post_date'      => date('Y-m-d', strtotime( $short_term_data['start_date'] ) )
    );

    // Creates a New post under the short-term custom post type.
    $new_post_id = wp_insert_post( $post_args );

    return short_term_handler($new_post_id, $short_term_data);
}

// Create a new post on the Short-term custom post type.
function post_short_term_endpoint( WP_REST_Request $request ) {

    $short_term_data = $request->get_json_params();
    $user_id = get_current_user_id(); // Get current user id.s


    return create_new_short_term($short_term_data, $user_id);
}

// Update the short-term posts creating a new post on the Revisions plugin.
function put_short_term_endpoint( WP_REST_Request $request ) {

    global $wpdb;

    $short_term_data = $request->get_json_params();
    $user_id = get_current_user_id(); // Get current user id.

    if (FALSE === get_post_status($short_term_data['wp_post_id'])) {
        return create_new_short_term($short_term_data, $user_id);
    }

    // Post Data
    $post_args = array(
        'post_author'    => $user_id,
        'post_excerpt'   => $short_term_data['purpose'],
        'post_status'    => 'pending',
        'post_mime_type' => 'pending-revision',
        'post_title'     => $short_term_data['title'],
        'post_type'      => 'short-term',
        'meta_input'     => array(
            '_rvy_base_post_id' => $short_term_data['wp_post_id'],
        ),
    );
    // Create New post with the new data.
    $new_post_id = wp_insert_post( $post_args );
    //Force Comment Count on new revision post
    $data = [ 'comment_count' => $short_term_data['wp_post_id'] ];
    $where = [ 'id' => $new_post_id ];
    $wpdb->update( 'wp_posts', $data, $where );
    // If data changes create a revision and a copy of the original post.
    update_post_meta( $short_term_data['wp_post_id'], '_rvy_has_revisions', 1 );

    return short_term_handler($new_post_id, $short_term_data, $short_term_data['wp_post_id']);

}

// Creates the terms on a given taxonomy.
function create_terms_on_taxonomy( $data, $term ) {

    // Check if the received data is just a string.
    if ( is_string( $data ) ) {

        $the_term_on_list = term_exists( $data, $term ); // Check if the data exists on the taxonomy term lists

        // If the data does not exists on the list we need to created it.
        if ( $the_term_on_list == 0 && $the_term_on_list == null ) {

            wp_insert_term(
                $data,
                $term,
                array(
                    'slug' => strtolower($data),
                )
            );

        }

    } elseif ( is_array( $data ) && !empty( $data ) ) {

        foreach ( $data as $item_on_list ) {

            $the_term_on_list = term_exists($item_on_list, $term); // Check if the ty of work comming from the RSS exists on the short-type-of-work taxonomy lists

            // If the RSS Feed type of work exists on the term list get the term_id
            if ( $the_term_on_list == 0 && $the_term_on_list == null ) {

                wp_insert_term(
                    $item_on_list,
                    $term,
                    array(
                        'slug' => strtolower($item_on_list),
                    )
                );

            }

        }

        // This is made for the remote compatible - aka Virtual.
    } elseif ( is_bool( $data ) === true ) {

        wp_insert_term(
            'Virtual',
            $term,
            array(
                'slug' => 'virtual',
            )
        );

    }

}
