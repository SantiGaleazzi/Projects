<?php
  $cases_featured = get_field('feutures_image_issues','option');  
  $isHome = $_REQUEST['ishome'];
  $acptypes = array( 'research','news','blog','experts','cases');
  $contx = 0;
  $postPerPage = 2;

  $termsTaxs = get_terms( array(
      'taxonomy' => 'category-issue',
      'hide_empty' => false,
  ) );

  foreach( $termsTaxs as $term ){
    $tax_ids[$contx] = $term->term_id;       
    $contx++;
  }

  $all_cpt = array(1); 
?>

<?php if ( !$isHome ): ?>
  <?php $all_cpt = array( 'research','news','blog','experts','cases'); ?>  
<?php endif; ?>

<!-- ARTICLES-SECTION -->
<div class="articles">
<!-- MOST-RECENT -->

<?php 
$args = array(
  'post_type' => $acptypes,
  'tax_query' => array(
    array(
      'taxonomy' => 'category-issue',
      'field' => 'term_id',
      'terms' => $tax_ids,
    )
  ),
  'orderby' => 'date',
  'posts_per_page' => 1 
);

$the_query = new WP_Query( $args ); ?>


<?php if ( !$isHome ): ?>
  <?php $all_cpt = array( 'research','news','blog','experts','cases'); ?>  
<?php endif; ?>


<?php if( $cases_featured ): ?>
    <?php foreach( $cases_featured as $post): ?>
        <?php setup_postdata($post); ?>
        <?php $featured_id = $post->ID?>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>


<?php foreach( $all_cpt as $cpt): ?>
  <?php if ( $isHome ): ?>
    <?php $cpt = $acptypes;?>
  <?php endif; ?>
  <!-- ALL CPT  -->
  <?php 
  $args = array(
    'post_type' => $cpt,
    'post__not_in' => array( $featured_id ),
    'tax_query' => array(
      array(
        'taxonomy' => 'category-issue',
        'field' => 'term_id',
        'terms' => $tax_ids,
      )
    ),
    'orderby' => 'date',
    'order'   => 'DESC',
    'posts_per_page' => $postPerPage 
  );

  $the_query = new WP_Query( $args ); 

  $post_type_data       = get_post_type_object( $cpt );
  $post_type_slug       = $post_type_data->rewrite['slug'];
  $post_type_labelsname = $post_type_data->label;
  ?>

  <?php if ( $the_query->have_posts() ) : ?>
    <div class="articles__section">
      <?php if ( ! $isHome ): ?>
      <div class="row">      
        <div class="large-12 columns articles__header">
          
          <h1 class="articles__title"><?php echo ucwords($post_type_labelsname); ?></h1>

          <a href="<?php echo get_site_url() .'/'. $post_type_slug;
           ?>" class="articles__more">See More »</a>
        </div>
      </div>
      <?php endif; ?>

      <div class="row">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>          
      
        <?php
          $taxCat = get_the_term_list( $post->ID, 'category-type', '', '' );
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
            <div class="articles__info"><?php echo $post_date; ?><?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : '';?><?php echo ($taxCat) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxCat : ''; ?></div>

            <p><?php echo excerpt(25); ?></p>
            
          </div>
        </div>
        
        <?php endwhile; ?>
      </div>
    </div>

    <?php wp_reset_postdata(); ?>

  <?php else : ?>
    <div class="row">
      <div class="large-12 columns">
        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
      </div>
    </div>    
  <?php endif; ?>
  <!-- /ALL CPT  -->

<?php endforeach; ?>  


</div>
<!-- ARTICLES-SECTION -->
