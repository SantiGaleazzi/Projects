<?php
$postId        = $_REQUEST['postId'] ? $_REQUEST['postId'] : 473; // 473 Bill Woolsey Biography by default

$args = array(
  'post_type'=> 'team',
  'p' => $postId
);

query_posts( $args );

$html = '';

if ( have_posts() ) {
  while ( have_posts() ){
    the_post();
    $full_name        = get_field('full_name');
    $spot             = get_field('spot');
    $location_member  = get_field('location_member');
    $emptyThumbnail = (empty(get_the_post_thumbnail())) ? 'team__picture-empty' : 'team__picture';

    $html .= '
    <div class="team__member-full flex-container flex-dir-column align-middle">
        <div class="team__picture '.$emptyThumbnail.'">
          '.get_the_post_thumbnail(get_the_ID(), 'thumbnail').'
        </div>
        <div class="team__envelope-full text-center flex-container flex-dir-column w100">
            <h2 class="team__member-name title">'.$full_name.'</h2>
            <h6 class="team__member-spot subtitle">'.$spot.'</h6>
            <h6 class="team__member-location title">'.$location_member.'</h6>
            <p>'.get_the_content().'</p>
        </div>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
      <span aria-hidden="true">&times;</span>
    </button>
    ';
  }
}
if(have_posts()) {
  echo json_encode(array('success' => true, 'html' => $html));
}
else {
  echo json_encode(array('success' => false, 'message' => 'Sorry, no posts matched your criteria'));
}
?>
