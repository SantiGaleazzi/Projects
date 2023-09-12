<?php

	if ( $post->post_parent ) {

		$ancestors = get_post_ancestors($post->ID);
		$root = count($ancestors) - 1;
		$parent = $ancestors[$root];

	} else {

		$parent = $post->ID;
		
	}
					 
	$children = get_pages('child_of='.$parent);
	$child_pages = array(1);
					 
	foreach( $children as $child ) {

		array_push($child_pages,$child->ID);

    }
    
    $all_pages = implode(",",$child_pages);
                     
    if ( count( $children ) != 0 ) {

		echo '<ul class="submenu-navigation flex flex-wrap flex-col md:flex-row justify-center">'.
		    wp_list_pages( 'title_li=&sort_column=menu_order&echo=0&include=' . $all_pages )
		.'</ul>';
		
    }
    
?>