<?php
function ffz_extend_custom_field( $postId, $params ) {

  $virtuousTags = get_field('virtuous_tags', $postId);

  $customFields = array();
  if($virtuousTags){
	  array_push($customFields,
	    array(
	        'component' => 'input-hidden',
	        'settings' => array(
	          'name' => 'virtuous_tags',
	          'value' => $virtuousTags,
	        ),
	     ),
	  );
	}

  return $customFields;
}