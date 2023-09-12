<?php
  class themeslug_walker_nav_menu_images extends Walker_Nav_Menu {
    function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

      if ( !$element )
              return;

      $id_field = $this->db_fields['id'];

      //display this element
      if ( is_array( $args[0] ) )
              $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );

      //Adds the 'has-dropdown' class to the current item if it has children
      if( ! empty( $children_elements[$element->$id_field] ) )
              array_push($element->classes,'has-dropdown');


      $id = $element->$id_field;         
      $args[0]->menu_id = $id;      
       //echo "<pre>";
       //print_r($args);

      $cb_args = array_merge( array(&$output, $element, $depth), $args);



      call_user_func_array(array(&$this, 'start_el'), $cb_args);

      //$id = $element->$id_field;

      //echo $id;

      // descend only when the depth is right and there are childrens for this element
      if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

              foreach( $children_elements[ $id ] as $child ){

                   // echo "<pre>";
                   // print_r($child);
                      if ( !isset($newlevel) ) {
                              $newlevel = true;
                              //start the child delimiter

                              $args[0]->parent_id = $id;  
                              $cb_args = array_merge( array(&$output, $depth), $args);

                              call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                      }


                      $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
              }
              unset( $children_elements[ $id ] );
      }

      if ( isset($newlevel) && $newlevel ){
              //end the child delimiter
              $cb_args = array_merge( array(&$output, $depth), $args);
              call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
      }

      //end this element
      $cb_args = array_merge( array(&$output, $element, $depth), $args);
      call_user_func_array(array(&$this, 'end_el'), $cb_args);

    }


  // add classes to ul sub-menus
    function start_lvl( &$output, $depth = 0, $args = Array() ) {
        // depth dependent classes
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $display_depth = ( $depth + 1); // because it counts the first submenu as 0
        $classes = array(
            'dropdown',
            ( $display_depth % 2  ? 'menu-odd' : 'menu-even' ),
            ( $display_depth >=2 ? 'sub-sub-menu' : '' ),
            'menu-depth-' . $display_depth
            );
        $class_names = implode( ' ', $classes );

        
        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">
        ' . "\n";
    }
    

    // add main/sub classes to li's and links
     function start_el( &$output, $item, $depth = 0, $args = Array(), $id = 0) {

      //  echo "<pre>";
      //  print_r($args);

        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

        $depth_classes = array(
            ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
            ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
            ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

        // passed classes
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );
        // build html
        $output .= $indent . '<li class="' . $depth_class_names . ' ' . $class_names . '">';

        // link attributes
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );

        // build html
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

    public function end_el( &$output, $item, $depth = 0, $args = array() ) {        
        
        $output .= "</li>
        <div class='caption-menu' data-id='". $args->menu_id."'><h4 data-id='". $args->menu_id."'>". get_field('field_5b16f8102dabf', $args->menu_id) ."</h4>
        <img data-id='". $args->menu_id."' src='" . get_field('field_5b16cdd35bb3a', $args->menu_id) ."'><p data-id='". $args->menu_id."'>". get_field('field_5b16f8222dac0', $args->menu_id) ."</p></div>";
    }

  }


