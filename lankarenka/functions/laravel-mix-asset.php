<?php 

    /**
     * Gets the path to a versioned Mix file in a WordPress theme.
     *
     * Use this function if you want to version theme files. This function will cache the contents
     * of the manifest file for you.
     *
     * Inspired by <https://www.sitepoint.com/use-laravel-mix-non-laravel-projects/>.
     *
     * @since 1.0.0
     *
     * @param string $file_name The relative path to the file.
     *
     * @return string The versioned file path.
     */
    function laravel_mix_asset( $file_name ) {
        
        static $manifest_assets;
        static $manifest_path;
        static $hashed_file_name;
        
        $manifest_path = get_theme_file_path( 'mix-manifest.json' );

        // Manifest couldn’t be found, return the asset URI
        if ( ! file_exists( $manifest_path ) ) {
            return '';
        }

        $manifest_assets = json_decode( file_get_contents( $manifest_path ), true );

        // Check the file exists on the manifest assets
        if ( ! array_key_exists( '/' . $file_name, $manifest_assets ) ) {
            return '';
        }

        // Get file URL from manifest file
        $hashed_file_name = $manifest_assets[ '/' . $file_name ];

        // Run this statement if the manifest file contains the word id
        // This means that npm run prod has been used and the file has been versioned
        // We only need the last 20 characters of the manifest file which are basically the hash number we need to version our files.
        if (strpos($hashed_file_name, 'id') !== false) {

            $hashed_file_name = substr($hashed_file_name, -20);

            return $hashed_file_name;
        }

        // Return empty just when no production mode is enabled.
        // WordPress By default returns the WordPress Core Version as hash.
        return '';

    }
    