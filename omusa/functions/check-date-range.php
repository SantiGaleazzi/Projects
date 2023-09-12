<?php
  
  function check_range( $start_date, $end_date ){

    $current_date = current_time('d-m-Y', false);

    $end_date = strtotime( $end_date );
    $start_date = strtotime( $start_date );
    $current_date = strtotime( $current_date );

    if ( ( $current_date >= $start_date ) && ( $current_date <= $end_date ) ) {

      return true;

    } else {

      return false;

    }
    
  }