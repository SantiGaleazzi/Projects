<?php
require 'inc/Carbon-2.12.0/autoload.php';

use Carbon\Carbon;

$terms          = get_query_var( 'terms' );
$terms          = $_REQUEST['terms'] ? $_REQUEST['terms'] : '';
$pagenum        = $_REQUEST['pagenum'] ? $_REQUEST['pagenum'] : 1;

if( !empty($terms[0]) ) {
  $tax_query = array(
                array(
                  'taxonomy' => 'typeEvent',
                  'field' => 'slug',
                  'terms' => $terms[0]
                )
              );
}

$args = array(
    'post_type'       => 'events',
    'post_status'     => 'publish',
    'orderby'         => 'publish_date',
    'order'           => 'DESC',
    'paged'           => $pagenum,
    'tax_query'       => $tax_query,
    'posts_per_page'  => 4
);

query_posts( $args );

$html = $pagination = '';

if ( have_posts() ) {
  $index = 1;
  while ( have_posts() ){
    the_post();

    $info           = get_field('event_info');
    $month_event    = get_field('month_event');
    $year_event     = get_field('year_event');

    $event_full_date = array();

    if( have_rows('specific_event_day') ):
        while ( have_rows('specific_event_day') ) : the_row();
            $finish_event = '';
            $begin_event = '';
            $divider = ' - ';

            $start_event        = get_sub_field('start_event');
            $hour_start_event   = get_sub_field('hour_start_event');
            $hour_end_event     = get_sub_field('hour_end_event');

            $carbon_date_event      = new Carbon($start_event);

            if($hour_start_event) {
                $begin_event = ' @ '.$hour_start_event;
            } else {
                $divider = ' @ ';
            }

            if($hour_end_event) {
                $finish_event = $divider.$hour_end_event;
            } 

            $event_full_date[] = $carbon_date_event->format('F j\\, Y').$begin_event.$finish_event; 
        endwhile;
    else :
        $event_full_date[] = ucfirst($month_event).' '.$year_event;
    endif;

    $separator = ' — ';
    $dates = '';

    foreach ($event_full_date as $index => $date) :
        if( ($index + 1) == count($event_full_date) ) {
            $separator = '';
        }
        $dates .= $date.$separator;
    endforeach;

    $html .= '
    <div class="article__remove flex-container flex-dir-column">
      <div class="article__details">
          <h5 class="article__title">'.get_the_title().'</h5>
          <div class="event__date">
              '.$dates.'
          </div>
          <p>
          '.$info.' 
          </p>
      </div>
        <div class="article flex-container flex-dir-column medium-flex-dir-row align-top align-center large-align-justify">
          <div class="flex-container flex-dir-column">
            <div class="article__image">
              <a href="'.get_the_permalink().'">
                '.get_the_post_thumbnail().'
              </a>
            </div>
          </div>
          <div class="article__data flex-container flex-dir-column">
            <h6 class="article__subtitle">'.$post_date.'</h6>
            <p>
            '.get_the_excerpt().'
            </p>
            <div class="article__button">
                <a href="'.get_the_permalink().'" class="button">READ MORE</a>
            </div>
          </div>
        </div>
    </div>
    ';
  }
}

$pagination = ea_archive_navigation();
//wp_reset_query()

if(have_posts()) {
  echo json_encode(array('success' => true, 'html' => $html, 'pagination' => $pagination));
}
else {
  //wp_send_json_error(); // {"success":false}
  // Similar to, echo json_encode(array("success" => false));
  // or you can use, something like -
  echo json_encode(array('success' => false, 'message' => 'Sorry, no posts matched your criteria'));
}
?>
