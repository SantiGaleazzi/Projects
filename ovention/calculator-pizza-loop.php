<?php 
  $p = $_REQUEST['p'];
  $pizza = $_REQUEST['pizza'];
  $args = array(
    'post_type' => 'calculator',
    'p' => $p
  );
  $query = new WP_Query($args);
  while ( $query->have_posts() ) : $query->the_post();
?>
<?php
  if( have_rows('pizza_types') ):

      while( have_rows('pizza_types'  ) ) : the_row();

        $child_titles = get_sub_field('pizza_types_select');
       
        
      // child loop
      if( $child_titles == $pizza && have_rows('dates') ):

        ?>
          <table>
            <tr>
              <td>Size</td>
              <td>Up to per hour</td>
            </tr>
            <?php
          while( have_rows('dates') ) : the_row();
        
          // vars
          $sizepizza = get_sub_field('size');
          $uptoperhour = get_sub_field('up_to_per_hour');?>

          <tr>
            <td><?php echo $sizepizza; ?></td>
            <td><?php echo $uptoperhour; ?></td>
          </tr>

          
          <?php
          
        endwhile;?>

        </table>
     <?php 
      endif;
      // end child loop

      endwhile;

  endif;
?>
<?php
  endwhile;
  wp_reset_postdata();
?>

