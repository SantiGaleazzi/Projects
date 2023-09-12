<?php

$terms          = get_query_var( 'terms' );
$terms          = $_REQUEST['terms'] ? $_REQUEST['terms'] : '';
$pagenum        = $_REQUEST['pagenum'] ? $_REQUEST['pagenum'] : 1;
$customPostType = $_REQUEST['cpt'] ? $_REQUEST['cpt'] : 'resources';
$taxonomy       = $_REQUEST['taxonomy'] ? $_REQUEST['taxonomy'] : '';

// No filters
$tax_query = array(
  'relation' => 'OR'
);

// First Filter
if( !empty($terms[0]) && empty($terms[1]) ) {
  $tax_query = array(
    array(
      'taxonomy' => $taxonomy[0],
      'field' => 'slug',
      'terms' => $terms[0]
    )
  );
}

// Second Filter
if( empty($terms[0]) && !empty($terms[1]) ) {
  $tax_query = array(
                array(
                  'taxonomy' => $taxonomy[1],
                  'field' => 'slug',
                  'terms' => $terms[1]
                )
              );
}

// Both Filters
if( !empty($terms[0]) && !empty($terms[1]) ) {
  $tax_query = array(
                'relation' => 'AND',
                array(
                  'taxonomy' => $taxonomy[0],
                  'field' => 'slug',
                  'terms' => $terms[0]
                ),
                array(
                  'taxonomy' => $taxonomy[1],
                  'field' => 'slug',
                  'terms' => $terms[1]
                )
              );
}

$args = array(
    'post_type'     => $customPostType,
    'post_status'   => 'publish',
    'orderby'       => 'date',
    'order'         => 'DESC',
    'paged'         => $pagenum,
    'tax_query'     => $tax_query,
    'posts_per_page'=> 8
);

query_posts( $args );
$html = $pagination = '';

if ( have_posts() ) {
  $index = 1;
  while ( have_posts() ) {

    the_post();

    $terms = wp_get_post_terms( $post->ID, 'resources-types');
    $termPost = $terms[0];
    $title = $termPost->name;

    $cat = $cat[0]->name;

    $html .= '
    <div class="article article__remove post-item-single">
        <div class="article__image">
          <a href="'.get_the_permalink().'">
            '.get_the_post_thumbnail().'
          </a>
        </div>
        <div>          
          <div class="title-post-item">
            <a href="'.get_the_permalink().'">
              '.get_the_title().'
            </a>
          </div>
          <div class="the-excerpt">
          '.get_the_excerpt().'
          </div>
              <a href="'.get_the_permalink().'">READ MORE&nbsp;&gt;</a>
        </div>

    </div>
    ';
  }
}

$pagination = ea_archive_navigation();

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
