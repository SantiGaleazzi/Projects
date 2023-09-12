<?php
 /*
  * Template name: Donor Template
  */

get_header('logo-and-button'); 
 if (have_posts()) :
    while (have_posts()) :
        the_post();

        the_content();

    endwhile;
endif;

get_footer('logo-and-copy');
?>