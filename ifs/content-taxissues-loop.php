<?php
    $paged = intval($_REQUEST['pagenum']);
    $termslug = $_REQUEST['termissue'];
    $featured_id = $_REQUEST['featID'];
    // echo "Page in ajax " . $paged;
    // echo "Term " .$termslug;
?>

<div class="articles" id="response-tax">
  <div class="articles__section tax-content">

    <div class="row jscroll">

      <?php 
        $args = array(
          'post__not_in' => array( $featured_id ),
          'orderby' => 'date',
          'order'   => 'DESC',
          'tax_query' => array(
            'relation' => 'OR',
            array(
              'taxonomy' => 'category-issue',
              'field' => 'slug',
              'terms' => $termslug,
            ),
            array(
              'taxonomy' => 'category-type',
              'field' => 'slug',
              'terms' => $termslug,
            ),
            array(
              'taxonomy' => 'category-state',
              'field' => 'slug',
              'terms' => $termslug,
            ),
            array(
              'taxonomy' => 'category-case',
              'field' => 'slug',
              'terms' => $termslug,
            )

          ),
          'paged'          => $paged, 
          'posts_per_page' => 10
        );
        query_posts( $args );  
      ?>
      <?php 
        if ( have_posts() ) : while ( have_posts() ) : the_post(); 
          $taxname = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );
          $taxname .= get_the_term_list( $post->ID, 'category-type', ', <span>', ', </span><span>', '</span>' );
          $taxname .= get_the_term_list( $post->ID, 'category-state', ', <span>', ', </span><span>', '</span>' );
          $taxname .= get_the_term_list( $post->ID, 'category-case', ', <span>', ', </span><span>', '</span>' );

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
            <?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : ''; ?><?php echo ($taxname) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxname : ''; ?></div>

          <p><?php echo excerpt(25); ?></p>
          
        </div>

      </div>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>

      <?php endif; ?>
    </div>
    
  </div>  
</div>