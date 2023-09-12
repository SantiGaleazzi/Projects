<?php
$pagepp = intval($_REQUEST['pagenum']);

// $page_num = isset( $_GET['paged'] ) ? (int) $_GET['paged'] : 1;

$id1 = $_REQUEST['ids_opt1'] ? $_REQUEST['ids_opt1'] : '0';
$id2 = $_REQUEST['ids_opt2'] ? $_REQUEST['ids_opt2'] : '0';
$id3 = $_REQUEST['ids_opt3'] ? $_REQUEST['ids_opt3'] : '0';
$id4 = $_REQUEST['ids_opt4'] ? $_REQUEST['ids_opt4'] : '0';

if ( ($id1 && !$id2  && !$id3  && !$id4) 
  || (!$id1 && $id2  && !$id3  && !$id4) 
  || (!$id1 && !$id2  && $id3  && !$id4) 
  || (!$id1 && !$id2  && !$id3  && $id4)) {
  $relation = 'OR';
}else{
  $relation = 'AND';
}

$varArgs = '';

if ($id1) {
  $tax_query[] = array(
      'taxonomy' => 'category-issue',
      'field'    => 'term_id',
      'terms'    => $id1
    );
}

if ($id2) {

  $tax_query[] = array(
    'taxonomy' => 'category-state',
    'field'    => 'term_id',
    'terms'    => $id2
  );
}

if ($id3) {
  $meta_query = array(
        array(
            'key' => 'status',
            'value' =>  $id3,
        )
    );
}

if ($id4) {
  $tax_query[] = array(
    'taxonomy' => 'category-type',
    'field'    => 'term_id',
    'terms'    => $id4
  );
}

$args =  $concatArgs;  

$contp = 0;
?>

<?php

$args = array(
  'post_type' => 'cases',
  'posts_per_page' => 10,
  'paged'          => $pagepp, 
  'orderby' => 'date',
  'meta_query' => $meta_query,

  'tax_query' => array(
    'relation' => $relation,
    $tax_query   
  ),
);

$the_query = new WP_Query( $args );
$max = intval($the_query->max_num_pages);
?>

<script type="text/javascript">
    var max_pages = <?php echo $max;?>
</script>
<?php if($pagepp <= $max): ?>
    <?php if ( $the_query->have_posts() ) : ?>
    <div class="articles slide-in-bck-center">
        <div class="articles__section">
            <div class="row">
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php $taxissue = get_the_term_list( $post->ID, 'category-type', '', '' ); ?>

                    <div class="large-6 columns articles__item">
                        <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><h3><?php the_title(); ?></h3></a>

                        <?php if ( has_post_thumbnail() ): ?>
                          <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><?php the_post_thumbnail('article'); ?>
                          </a>
                        <?php else: ?>
                          <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><img src="<?php bloginfo('template_url'); ?>/assets/img/research/dft-1.png" width="180" height="135" alt="Default Article"/></a>
                        <?php endif; ?>

                        <div class="articles__description">
                          <?php $post_date = get_the_date( 'F j, Y' );?>
                          <?php $author = get_the_author(); ?> 

                            <div class="articles__info">
                                <?php echo $post_date; ?>
                                <?php echo ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxissue : ''; ?>
                            </div>

                          <?php //if(get_the_excerpt()): ?>  
                            <!-- <p><?php //echo wp_trim_words(the_content(), 25); ?></p> -->
                            <?php if (has_excerpt( $post->ID )): ?>
                              <p><?php echo excerpt(25); ?></p>
                            <?php else: ?>
                              <p><?php echo force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( get_the_content() ), 25 ) ) );?></p>
                            <?php endif; ?>
                          <?php //endif;?>
                        </div>
                    </div>
                <?php $contp++;?>
                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>  
            </div>    
        </div>
    </div>      
    <?php endif; ?>
<?php else : ?>
    <div class="row">
      <div class="large-8 large-centered columns matched-msg text-center">
        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
      </div>
    </div>
<?php endif; ?>          