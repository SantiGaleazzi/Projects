<?php
    /**
     * Allow tags.
     */

    function allow_basic_tags ($allowable_tags) {

        return '<p><stong>';

    }
    add_filter( 'gform_allowable_tags', 'allow_basic_tags' );


    /**
     * Validate url into textarea input.
     */

    function reject_urls_in_textarea ( $validation_result ) {
        
        $form = $validation_result["form"];

        foreach ( $form['fields'] as &$field ) {

            if ( $field["type"] == 'textarea' ) {

                $field_value = rgpost( "input_{$field['id']}" );
                $pattern = '/(http|https|ftp|ftps)?\:?\/?\/?[a-zA-Z0-9\-\.]+(\.|&#46;)[a-zA-Z]{2,3}(\/\S*)?/';

                if ( preg_match( $pattern, $field_value ) )  {

                    $validation_result['is_valid'] = false;
                    $field['failed_validation'] = true;
                    $field['validation_message'] = 'Urls [Links] or [Emails] are not allowed in this field.';
                    $validation_result['form'] = $form;

                } else {

                    continue;

                }
                
            } else {

                continue;

            }

        }

        return $validation_result;

    }
    add_filter('gform_validation', 'reject_urls_in_textarea', 10, 2);
