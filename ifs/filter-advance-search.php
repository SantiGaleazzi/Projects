<?php
$filter          = get_query_var( 'filter' );
$filter         = $_REQUEST['filter'] ? $_REQUEST['filter'] : '';
$pagenum        = $_REQUEST['pagenum'] ? $_REQUEST['pagenum'] : 1;
$keyword 		= $_REQUEST['search'] ? $_REQUEST['search'] : '';

// No filters
$tax_query = array();
$date_query = array();

// First Filter
if( !empty($filter[0]) && empty($filter[1]) ) {
	if($filter[0] == 'last-month' ) {
		$date_query = array(
		  	array(
		    	'after' => '1 month ago',
		  	)
		);
	}

	if($filter[0] == 'last-three-months' ) {
		$date_query = array(
		  	array(
		    	'after' => '3 month ago',
		  	)
		);
	}

	if($filter[0] == 'last-six-months' ) {
		$date_query = array(
		  	array(
		    	'after' => '6 month ago',
		  	)
		);
	}
	
	if($filter[0] == 'last-year' ) {
		$date_query = array(
		  	array(
		    	'after' => '12 month ago',
		  	)
		);
	}
}

// Second Filter
if( empty($filter[0]) && !empty($filter[1]) ) {
	if($filter[1] == 'exclude' ){
		$tax_query = array(
		  array(
		    'taxonomy' 	=> 'category-type',
		    'field' 	=> 'slug',
		    'terms' 	=> 'daily-media-links',
		    'operator'  => 'NOT IN'
		  )
		);
	}
}

// Both Filters
if( !empty($filter[0]) && !empty($filter[1]) ) {
	if($filter[1] == 'exclude' ){
		$tax_query = array(
		  array(
		    'taxonomy' 	=> 'category-type',
		    'field' 	=> 'slug',
		    'terms' 	=> 'daily-media-links',
		    'operator'  => 'NOT IN'
		  )
		);
	}
	if($filter[0] == 'last-month' ) {
		$date_query = array(
		  	array(
		    	'after' => '1 month ago',
		  	)
		);
	}

	if($filter[0] == 'last-three-months' ) {
		$date_query = array(
		  	array(
		    	'after' => '3 month ago',
		  	)
		);
	}

	if($filter[0] == 'last-six-months' ) {
		$date_query = array(
		  	array(
		    	'after' => '6 month ago',
		  	)
		);
	}
	
	if($filter[0] == 'last-year' ) {
		$date_query = array(
		  	array(
		    	'after' => '12 month ago',
		  	)
		);
	}
}

$args = array(
	'post_type' 	=> 'any',
    'post_status'   => 'publish',
    /*'orderby'       => 'date',
    'order'         => 'DESC',*/
    'paged'         => $pagenum,
    'tax_query'     => $tax_query,
    'date_query'	=> $date_query,
    's' 			=> $keyword,
    'posts_per_page'=> 10
);

$result = query_posts( $args );

$html = $pagination = $taxtype = $thumbnail = $author = '';
//echo esc_html( get_search_query( false ) );

 /*echo '<pre>';
 echo $GLOBALS['wp_query']->request;
 echo '</pre>';*/

if ( have_posts() ) {
  while ( have_posts() ){
    the_post();

    $taxtype = get_the_term_list( $post->ID, 'category-type', '<span>', ', </span><span>', '</span>' );
    $taxtype =($taxtype) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxtype : '';
    $thumbnail = has_post_thumbnail() ? get_the_post_thumbnail($post->ID, 'article') : '<img src="'.get_bloginfo('template_url').'/assets/img/research/dft-1.png" width="180" height="135" alt="Default Article"/>';
   	$author = ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.get_the_author() : '';

    $html .= '
        <div class="large-6 columns articles__item article__remove">
          	<a href="'.get_the_permalink().'" target="_blank" class="articles__blocklink">
          		<h3>'.get_the_title().'</h3>
          	</a>
			<a href="'.get_the_permalink().'" target="_blank" class="articles__blocklink">'.$thumbnail.'</a>
          	<div class="articles__description">
	            <div class="articles__info">
	              '.get_the_date( 'F j, Y' ). $author . $taxtype.'
	            </div> 
	            <p>'.get_the_excerpt().'</p>
          	</div>
        </div>
    ';
  }
}
global $wp_query;

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
