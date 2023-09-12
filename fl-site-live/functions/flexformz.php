<?php

/*FlexFormz*/

function ffz_extend_custom_field( $postId, $params ) {

  $luminateId = get_field('luminate_form_id', $postId);
  $customFields = array();
  array_push($customFields,
    array(
        'component' => 'input-hidden',
        'settings' => array(
          'name' => 'luminate_form_id',
          'value' => $luminateId['luminate_form_id'],
        )
     )
  );

  return $customFields;
  
}
