<?php

/*Subscribe Form Gravity Forms and Luminate*/

add_action( 'gform_after_submission_1', 'newsletterSignUpConvio', 10, 2 );
  function newsletterSignUpConvio( $entry, $form ) {
    $endpoint_url = 'https://secure3.convio.net/li/site/SSurvey';
    $idForm = 2600;
    $args = array(
        "cons_info_component" => "t",
        "cons_first_name" => rgar( $entry, '1.3' ),
        "cons_last_name" => rgar( $entry, '1.6' ),
        "cons_email" => rgar( $entry, '2' ),
        "cons_zip_code" => rgar( $entry, '3.5' ),
        "cons_mail_opt_in" => "t",
        "cons_email_opt_in" => "on",
        "cons_email_opt_in_requested" => true,
        "cons_postal_opt_in" => "on",
        "cons_postal_opt_in_requested" => true,
        "s_rememberMe" => "on",
        "remember_me_opt_in_requested" => true,
        "s_src" => get_bloginfo('url'),
        "s_subsrc" => parse_url(rgar( $entry, '4' ), PHP_URL_PATH),
        "denySubmit" => "",
        "ACTION_SUBMIT_SURVEY_RESPONSE" => "Submit Subscribe FL Live",
        "SURVEY_ID" => $idForm
    );
  $response = wp_remote_get( $endpoint_url, array( 'body' => $args ) );
}

add_filter( 'gform_validation_1', 'flNameValidation' );
    function flNameValidation( $validation_result ) {
    $form = $validation_result['form'];

      if ( rgpost( 'input_1_3' ) == rgpost( 'input_1_6' ) ) {

          $validation_result['is_valid'] = false;

          foreach( $form['fields'] as &$field ) {

            if ( $field->id == '1' ) {
              $field->failed_validation = true;
              $field->validation_message = 'First and Last Name should have different values.';
              break;
            }
          }
      }

    $validation_result['form'] = $form;
    return $validation_result;
}


/*Subscribe Page*/

add_action( 'gform_after_submission_3', 'subscribeSignUpConvio', 10, 2 );
  function subscribeSignUpConvio( $entry, $form ) {
    $endpoint_url = 'https://secure3.convio.net/li/site/SSurvey';
    $idForm = 2600;
    $args = array(
        "cons_info_component" => "t",
        "cons_first_name" => rgar( $entry, '1.3' ),
        "cons_last_name" => rgar( $entry, '1.6' ),
        "cons_email" => rgar( $entry, '2' ),
        "cons_zip_code" => rgar( $entry, '3.5' ),
        "cons_mail_opt_in" => "t",
        "cons_email_opt_in" => "on",
        "cons_email_opt_in_requested" => true,
        "cons_postal_opt_in" => "on",
        "cons_postal_opt_in_requested" => true,
        "s_rememberMe" => "on",
        "remember_me_opt_in_requested" => true,
        "s_src" => get_bloginfo('url'),
        "s_subsrc" => parse_url(rgar( $entry, '4' ), PHP_URL_PATH),
        "denySubmit" => "",
        "ACTION_SUBMIT_SURVEY_RESPONSE" => "Submit Subscribe FL Live",
        "SURVEY_ID" => $idForm
    );
  $response = wp_remote_get( $endpoint_url, array( 'body' => $args ) );
}

add_filter( 'gform_validation_3', 'flNameValidationSubscribe' );
    function flNameValidationSubscribe( $validation_result ) {
    $form = $validation_result['form'];

      if ( rgpost( 'input_1_3' ) == rgpost( 'input_1_6' ) ) {

          $validation_result['is_valid'] = false;

          foreach( $form['fields'] as &$field ) {

            if ( $field->id == '1' ) {
              $field->failed_validation = true;
              $field->validation_message = 'First and Last Name should have different values.';
              break;
            }
          }
      }

    $validation_result['form'] = $form;
    return $validation_result;
}

// Form 5 Asq a Question
add_action( 'gform_after_submission_5', 'ask_a_question_convio', 10, 2 );
function ask_a_question_convio( $entry, $form ) {
  
  $endpoint_url = 'https://secure3.convio.net/li/site/SSurvey';
  $idForm = 2961;

  // This id 4268_2961_2_2863 corresponds to the convio survey 2961 with question id 2863
  
  $args = array(
    "cons_info_component" => "t",
    "4268_2961_2_2863" => rgar( $entry, '9' ),
    "cons_first_name" => rgar( $entry, '1.3' ),
    "cons_last_name" => rgar( $entry, '1.6' ),
    "cons_email" => rgar( $entry, '2' ),
    "cons_zip_code" => rgar( $entry, '3.5' ),
    "cons_mail_opt_in" => "t",
    "cons_email_opt_in" => "on",
    "cons_email_opt_in_requested" => true,
    "cons_postal_opt_in" => "on",
    "cons_postal_opt_in_requested" => true,
    "s_rememberMe" => "on",
    "remember_me_opt_in_requested" => true,
    "s_src" => get_bloginfo('url'),
    "s_subsrc" => parse_url(rgar( $entry, '4' ), PHP_URL_PATH),
    "denySubmit" => "",
    "ACTION_SUBMIT_SURVEY_RESPONSE" => "Submit Subscribe FL Live",
    "SURVEY_ID" => $idForm
  );

  $response = wp_remote_post( $endpoint_url, array( 'body' => $args ) );

}

add_filter( 'gform_validation_5', 'ask_a_question_full_name_validation' );
function ask_a_question_full_name_validation( $validation_result ) {
  
  $form = $validation_result['form'];

  if ( rgpost( 'input_1_3' ) == rgpost( 'input_1_6' ) ) {

    $validation_result['is_valid'] = false;

    foreach( $form['fields'] as &$field ) {

      if ( $field->id == '1' ) {

        $field->failed_validation = true;
        $field->validation_message = 'First and Last Name should have different values.';

        break;

      }
    
    }
  
  }

  $validation_result['form'] = $form;
  
  return $validation_result;

}
