<?php

    add_filter( 'gform_entry_meta', function ( $entry_meta, $form_id ) {
        $entry_meta['process_contact'] = array(
            'label'                      => 'Process Contact',
            'is_numeric'                 => false,
            'is_default_column'          => true,
            'filter'                     => array(
                'key'       => 'no',
                'text'      => 'No',
                'operators' => array(
                    'is',
                    'isnot',
                )
            ),

        );

        $entry_meta['status_text'] = array(
            'label'                      => 'Status Text',
            'is_numeric'                 => false,
            'is_default_column'          => true,

        );

        return $entry_meta;
    }, 10, 2 );
    if (!function_exists('write_log')) {
        function write_log ( $log )  {
            if ( true === WP_DEBUG ) {
                if ( is_array( $log ) || is_object( $log ) ) {
                    error_log( print_r( $log, true ) );
                } else {
                    error_log( $log );
                }
            }
        }
    }

    /**
     * This function will send an email went the virtuous connection is failed.
     *
     * @param array $response The Response object.
     * @param array $form The Form object.
     * @param array $entry The Entry object.
     */
    function vituousNotificationError( $response, $entry, $form ) {

        $successResponse = ($response->success === false) ? 'No': 'Yes';
        $statusText = ($response->statusText == "") ? "Failed: VirtuousConnection" : $response->statusText ;

        gform_add_meta($entry['id'], "process_contact", $successResponse, $entry['form_id']);
        gform_add_meta($entry['id'], "status_text", "$statusText", $entry['form_id']);

        $formTitle = $form['title'];
        $entryID = $entry['id'];
        $entrySource = $entry['source_url'];

        if($successResponse  == 'No'){
          ob_start();?>
              <html>
                  <head>

                  </head>
                  <body>
                      <table width="99%" border="0" cellpadding="1" cellspacing="0" bgcolor="#EAEAEA">
                          <tr>
                              <td>
                                  <table width="100%" border="0" cellpadding="5" cellspacing="0" bgcolor="#FFFFFF">
                                      <tr bgcolor="#EAF2FA">
                                          <td colspan="2">
                                              <font style="font-family: sans-serif; font-size:12px;"><strong>Gravity ID User</strong></font>
                                          </td>
                                      </tr>
                                      <tr bgcolor="#FFFFFF">
                                          <td width="20">&nbsp;</td>
                                          <td>
                                              <font style="font-family: sans-serif; font-size:12px;"><?php echo $entryID; ?></font>
                                          </td>
                                      </tr>
                                      <tr bgcolor="#EAF2FA">
                                          <td colspan="2">
                                              <font style="font-family: sans-serif; font-size:12px;"><strong>Form Title</strong></font>
                                          </td>
                                      </tr>
                                      <tr bgcolor="#FFFFFF">
                                          <td width="20">&nbsp;</td>
                                          <td>
                                              <font style="font-family: sans-serif; font-size:12px;"><?php echo $formTitle; ?></font>
                                          </td>
                                      </tr>
                                      <tr bgcolor="#EAF2FA">
                                          <td colspan="2">
                                              <font style="font-family: sans-serif; font-size:12px;"><strong>Source</strong></font>
                                          </td>
                                      </tr>
                                      <tr bgcolor="#FFFFFF">
                                          <td width="20">&nbsp;</td>
                                          <td>
                                              <font style="font-family: sans-serif; font-size:12px;"><?php echo $entrySource; ?></font>
                                          </td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                      </table>
                  </body>
              </html>
          <?php
          $htmlContent = ob_get_clean();
          $to= "test@digizent.com";
          $subject = "Virtuous connection error";
          $headers .= "MIME-Version: 1.0\r\n";
          $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

          wp_mail( $to,$subject,$htmlContent,$headers );

        }

    }
