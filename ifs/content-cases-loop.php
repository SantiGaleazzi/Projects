<?php
  $cases_featured = get_field('cases_featured','option');
  $pagepp = intval($_REQUEST['pagenum']);

  $termsTaxs = get_terms( array(
      'taxonomy' => 'category-issue',
      'hide_empty' => false,
  ) );

  foreach( $termsTaxs as $term ){
    $tax_ids[$contx] = $term->term_id;  
    $contx++;
  }

  // $id_case = get_query_var( 'id_feature' );
?>

<?php 

if( $cases_featured ): ?>
    <?php foreach( $cases_featured as $post): ?>
        <?php setup_postdata($post); ?>
        <?php $featured_id = $post->ID?>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<!-- ARTICLES-SECTION -->
<div class="articles slide-in-bck-center">

<!-- Articles  -->
  <?php 
  $args = array(
    'post_type' => 'cases',
     'post__not_in' => array( $featured_id ),
    'orderby' => 'date',
    'order'   => 'DESC',
    'paged'          => $pagepp, 
    'posts_per_page' => 10
  );

  $the_query = new WP_Query( $args ); 

  $npages = $the_query->max_num_pages; 

// $excludeID =  $the_query->posts[0]->ID;
  ?>

  <?php if ( $the_query->have_posts() ) : ?>
    <div class="articles__section cases">      
      <div class="row">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      
        <?php
          $taxissue = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );
          $taxtype = get_the_term_list( $post->ID, 'category-type', '<span>', ', </span><span>', '</span>' );
        ?>
        <div class="large-6 columns articles__item">
          <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><h3><?php the_title(); ?></h3></a>

          <?php if ( has_post_thumbnail() ): ?>
            <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><?php the_post_thumbnail('article'); ?></a>
          <?php else: ?>
            <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><img src="<?php bloginfo('template_url'); ?>/assets/img/research/dft-1.png" width="180" height="135" alt="Default Article"/></a>
          <?php endif; ?>

          <div class="articles__description">
            <?php $post_date = get_the_date( 'F j, Y' );?>
            <?php $author = get_the_author(); ?>
            
            <div class="articles__info">
              <?php echo $post_date; ?>
              <?php echo ($taxtype) ? '&nbsp;&nbsp;•&nbsp;&nbsp;' . $taxtype : ''; ?>
              <?php echo ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;' . $taxissue : ''; ?></div>

            <?php //if(get_the_excerpt()): ?>  
               <!-- <p><?php //echo excerpt_cases(25); ?></p>-->
              <?php if (has_excerpt( $post->ID )): ?>
                <p><?php echo excerpt(25); ?></p>
              <?php else: ?>
                <p><?php echo force_balance_tags( html_entity_decode( wp_trim_words( htmlentities( get_the_content() ), 25 ) ) );?></p>
              <?php endif; ?>              
               
            <?php //endif;?>
          </div>
        </div>
        
        <?php endwhile; ?>
      </div>
    </div>

    <?php wp_reset_postdata(); ?>

  <?php endif; ?>
  <!-- /Articles  -->

</div>
<!-- ARTICLES-SECTION -->

<script type="text/javascript">
    var max_pages = <?php echo json_encode($npages); ?>;
</script>