<?php


    function custom_media_add_column_file_size ( $columns ) {

        $columns['filesize'] = 'File Size';

        return $columns;

    }

    function custom_media_column_file_size ( $column_name, $media_item ) {

        if ( 'filesize' != $column_name || !wp_attachment_is_image( $media_item ) ) return;

        $filesize = filesize( get_attached_file( $media_item ) );

        if ( $filesize > 259452 && $filesize < 998366 ) {

           $filesizeUser = size_format( $filesize, 1 );

           echo "<b style='color: #b0a600;'>" . $filesizeUser . "</b><br>";

        } elseif ($filesize > 998366) {

            $filesizeUser = size_format( $filesize, 1 );

            echo "<b style='color: red;'>" . $filesizeUser . "</b><br>";

        } else {

            $filesizeUser = size_format( $filesize, 1 );

            echo $filesizeUser;

        }
        
    }
    add_filter( 'manage_upload_columns', 'custom_media_add_column_file_size' );
    add_action( 'manage_media_custom_column', 'custom_media_column_file_size', 10, 2 );
