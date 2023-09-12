<?php 

    $issues_featured = get_field('feutures_image_issues','option');

    $contx = 0;

    $termsTaxs = get_terms( array(
      'taxonomy' => 'category-issue',
      'hide_empty' => false,
    ) );

    foreach( $termsTaxs as $term ){
        $tax_ids[$contx] = $term->term_id;  
        $contx++;
    }

    $args = array(
      'post_type' => array( 'research', 'cases', 'news', 'experts','blog'),
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

    $the_query = new WP_Query( $args ); 
?>

<?php if ( $issues_featured ) : ?>
  <div class="destacada">
    <div class="row">
        <?php foreach( $issues_featured as $post):  ?>
          <?php setup_postdata($post); ?>
          <?php
          $idIssue = $post->ID;
          $taxissue = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );
          $taxtype = get_the_term_list( $post->ID, 'category-type', '<span>', ', </span><span>', '</span>' );


          ?>
        <?php if ( has_post_thumbnail() ): ?>
            <div class="large-5 columns">
                <?php the_post_thumbnail('article-destacada'); ?>
            </div>
        <?php else: ?>
            <div class="large-5 columns">
                <a href="<?php the_permalink(); ?>" target="_self"><img src="<?php bloginfo('template_url'); ?>/assets/img/research/dft-1.png" width="480" height="360" alt="Default Article"/></a>
            </div>
        <?php endif; ?>

        <div class="large-7 columns destacada__description">
            <a href="<?php the_permalink(); ?>" target="_self"><h2 class="destacada__title"><?php the_title(); ?></h2></a>

            <?php $post_date = get_the_date( 'F j, Y' );?>
            <?php $author = get_the_author(); ?>

            <div class="destacada__info"><?php echo $post_date; ?><?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : '';?><?php echo ($taxtype) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxtype : ''; ?><?php echo ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxissue : ''; ?></div>

            <p><?php echo excerpt(60); ?></p>

        </div>
    <?php endforeach; ?>
</div>

<?php 
    // set_query_var( 'id_feature', $idIssue );
    //echo "ID loop: " . $idIssue;?>
    <?php wp_reset_postdata(); ?>  
</div>
<?php endif; ?>  