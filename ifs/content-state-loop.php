<?php
  $all_cpt = array( 'research', 'news', 'experts', 'blog', 'cases');
  $contx = 0;
  $index = 0;

  $id_exclude = get_query_var( 'id_ws' );

  $termsTaxs = get_terms( array(
      'taxonomy' => 'category-state',
      'hide_empty' => false,
  ) );

  foreach( $termsTaxs as $term ){
    $tax_ids[$contx] = $term->term_id; 
    $contx++;
  }
?>


<!-- ARTICLES-SECTION -->
<div class="articles">

<?php foreach( $termsTaxs as $termstate): ?>

  <!-- State  -->
  <?php 
  $args = array(
    'post_type' => $all_cpt,
    'post__not_in' => array( $id_exclude ),
    'tax_query' => array(
      array(
        'taxonomy' => 'category-state',
        'field' => 'term_id',
        'terms' => $termstate->term_id,
      )
    ),
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => 1 
  );

  $the_query = new WP_Query( $args ); ?>

  <?php if ( $the_query->have_posts() ) : ?>

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <?php
          $taxissue = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );
        ?>

        <?php if( (($index % 2) == 0) || ($index == 0) ): ?>
        <div class="row">
        <?php endif; ?>
        
        <div class="articles__section large-6 columns articles-state">
          <div class="articles__header">
            <h1 class="articles__title"><?php echo $termstate->name; ?></h1>
            <a href="<?php echo get_site_url() .'/category-state/'.$termstate->slug; ?>" class="articles__more">See More Posts »</a>  
          </div>
          <div class=" articles__item">
            <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><h3><?php the_title(); ?></h3></a>

            <?php if ( has_post_thumbnail() ): ?>
              <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><?php the_post_thumbnail('article'); ?></a>
            <?php else: ?>
              <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><img src="<?php bloginfo('template_url'); ?>/assets/img/research/dft-1.png" width="180" height="135" alt="Default Article"/></a>
            <?php endif; ?>

            <div class="articles__description">
              <?php $post_date = get_the_date( 'F j, Y' );?>
              <?php $author = get_the_author(); ?> 

              <div class="articles__info"><?php echo $post_date; ?>
              <?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : '';?><?php echo ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxissue : ''; ?></div>

              <p><?php echo excerpt(25); ?></p>
          
            </div>
          </div>
        </div>
      <?php
      $index++;
      if( (($index % 2) == 0)): ?>
      </div>
      <?php endif; ?>

        <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>
  
  <?php endif; ?>
  <!-- /State  -->

<?php endforeach; ?>  

</div>
<!-- ARTICLES-SECTION -->