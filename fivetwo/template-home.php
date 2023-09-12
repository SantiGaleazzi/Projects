<?php
 /*
  * Template name: Home Template
  */

get_header();

 if ( have_posts() ) :
    while ( have_posts() ) : the_post();

        the_content();
		
    endwhile;
endif;

get_template_part('partials/lightboxes/november-ye-2022');
get_template_part('partials/lightboxes/december-ye-2022');

get_footer();
