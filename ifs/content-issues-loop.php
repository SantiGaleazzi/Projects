<?php
$cases_featured = get_field('feutures_image_issues','option');
$pagepp = $_REQUEST['pagenum'];
$isHome = $_REQUEST['reqHome'];

// $page_num = isset( $_GET['paged'] ) ? (int) $_GET['paged'] : 1;

$id1 = $_REQUEST['ids_opt1'] ? $_REQUEST['ids_opt1'] : '0';
$id2 = $_REQUEST['ids_opt2'] ? $_REQUEST['ids_opt2'] : '0';

if (($id1 && !$id2) || ($id2 && !$id1)) {
  $relation = 'OR';
}else{
  $relation = 'AND';
}

$pperpage = 10;
?>

<?php if ( $isHome ): ?>
  <?php 
    $pperpage = 10;
    $pagepp = 1;
  ?>  
<?php endif; ?>


<?php if( $cases_featured ): ?>
    <?php foreach( $cases_featured as $post): ?>
        <?php setup_postdata($post); ?>
        <?php $featured_id = $post->ID?>
    <?php endforeach; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; ?>

<?php
$args = array(
  'post_type' => array( 'research', 'cases', 'news', 'experts','blog'),
  'post__not_in' => array( $featured_id ),
  'posts_per_page' => $pperpage,
  'paged'          => $pagepp, 
  'orderby' => 'date',
  'tax_query' => array(
    'relation' => $relation,
    array(
      'taxonomy' => 'category-issue',
      'field'    => 'term_id',
      'terms'    => $id1,
    ),
    array(
      'taxonomy' => 'category-type',
      'field'    => 'term_id',
      'terms'    => $id2,
    ),    
  ),
);

$the_query = new WP_Query( $args );
$npages = $the_query->max_num_pages; 
$contp = 0;
?>

<?php if ( $the_query->have_posts() ) : ?>
<div class="articles">
  <div class="articles__section">
    
    <div class="row">
      <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <?php
        $taxtype = get_the_term_list( $post->ID, 'category-type', '<span>', ', </span><span>', '</span>' );
        $taxtype .= get_the_term_list( $post->ID, 'category-issue', ', <span>', ', </span><span>', '</span>' );
      ?>

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

          <div class="articles__info"><?php echo $post_date; ?><?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author :'';?><?php echo ($taxtype) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxtype : ''; ?></div>

          <p><?php echo excerpt(25); ?></p>
          
        </div>
      </div>
      <?php $contp++;?>
      <?php endwhile; ?>

      <div id="pagination">
       <?php
       // global $wp_query;

       $big = 999999999; // need an unlikely integer

       echo paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, $pagepp ),
        'total' => $the_query->max_num_pages
       ) );
       ?>
      </div>

    <?php wp_reset_postdata(); ?>  
    </div>    
  </div>
</div> 
<?php else : ?>
  <div class="row">
    <div class="large-8 large-centered columns matched-msg text-center">
      <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
    </div>
  </div>  
<?php endif; ?>

<script type="text/javascript">
    var total_pages = <?php echo json_encode($npages); ?>;
</script>