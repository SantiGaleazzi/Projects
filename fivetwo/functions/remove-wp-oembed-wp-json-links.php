<?php

//Remove the wp-embed scripts
function deregister_embed_scripts(){
    wp_dequeue_script( 'wp-embed' );
}
add_action( 'wp_footer', 'deregister_embed_scripts' );


//Remove the rest API Output on header.
remove_action( 'wp_head',     'rest_output_link_wp_head'  );
//Remove the rest API Link Output on header.
remove_action( 'template_redirect', 'rest_output_link_header', 11 );
