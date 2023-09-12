<?php
  $single_subtitle = get_field( "single_subtitle" );
  $post_date = get_the_date( 'F j, Y' );
  $captionThumbnail = get_the_post_thumbnail_caption();
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<?php
  $excludePost = $post->ID;
  $taxtype = get_the_term_list( $post->ID, 'category-type', '<span>', ', </span><span>', '</span>' );

  $taxissue = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );

  $relatedType = wp_get_object_terms($post->ID, 'category-type');
  $relatedIssue = wp_get_object_terms($post->ID, 'category-issue');

  foreach ($relatedType as $value1) {
    $catType[] = $value1->name;
    // echo 'Key:  -> ' . $value1->name . '<br>';
  }
  foreach ($relatedIssue as $value2) {
    $catIssue[] = $value2->name;
    // echo 'Key:  -> ' . $value2->name . '<br>';
  }
?>

<div class="main-banner">

  <div class="row">
    <div class="large-7 columns main-banner__description">
      <?php if(get_the_title()): ?>
      <h1 class="main-banner__title"><?php the_title(); ?></h1>
      <?php endif; ?>

      <?php if($single_subtitle): ?>
      <h2 class="main-banner__subtitle"><?php echo $single_subtitle; ?></h2>
      <?php endif; ?>

      <div class="main-banner__info">
        <?php $author = get_the_author(); ?>

        <?php echo $post_date; ?>
        <?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : '';?>
        <?php echo ($taxtype) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxtype : ''; ?><?php echo ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxissue : ''; ?>
      </div>
    </div>
    <div class="large-5 columns wrap-relative">
      <div class="small-10 small-centered medium-8 large-12 large-uncentered wrap-relative thumbnail-content">
        <?php
          if ( has_post_thumbnail() ) :
            the_post_thumbnail();
              if($captionThumbnail): ?>
                <div class="caption-thumbnail"><?=$captionThumbnail;?></div>
              <?php  endif;
          else: ?>
            <img src="<?php bloginfo('template_url'); ?>/assets/img/research/dft-1.png" width="480" height="360" alt="Default Article"/>
        <?php  endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="single">
  <div class="row">
    <div class="large-8 columns single-content">
      <?php 
        if(is_singular( 'blog' )) {
          echo do_shortcode('[ss_social_share]');
        }
        the_content();
      ?>
    </div>
    <div class="columns large-3 large-offset-1 single-sidebar">

      <div class="single-author">
        <?php echo get_avatar( get_the_author_meta( 'ID' ), 180 ); ?>
        <h3 class="author-title"><?php echo get_the_author(); ?></h3>

      </div>

      <?php
      $contx = 0;
      $contxi = 0;
      $termsTaxs = get_terms( array(
      'taxonomy' => 'category-type',
      'hide_empty' => false,
      ) );
      foreach( $termsTaxs as $term ){
        $tax_ids[$contx] = $term->term_id;
        // echo "State: " . $term->name . '<br>';
        $contx++;
      }

      $termsTaxsIssue = get_terms( array(
      'taxonomy' => 'category-issue',
      'hide_empty' => false,
      ) );
      foreach( $termsTaxsIssue as $term ){
        $tax_idsissue[$contxi] = $term->term_id;
        // echo "State: " . $term->name . '<br>';
        $contxi++;
      }

      if ($catType && $catIssue) {
        $relation = 'AND';
      }else{
        $relation = 'OR';
      }


      $args = array(
        'post_type'       => array( 'research', 'cases', 'news', 'experts','blog'),
        'posts_per_page'  => 2,
        'post__not_in'    => array( $excludePost ),
        // 'orderby' => 'date',
        'orderby'         => 'rand',
        'tax_query'       => array(
          'relation' => $relation,
          array(
            'taxonomy' => 'category-type',
            'field'    => 'slug',
            'terms'    => $catType,
          ),
          array(
            'taxonomy' => 'category-issue',
            'field'    => 'slug',
            'terms'    => $catIssue,
          ),

        ),
      );

      $the_query = new WP_Query( $args );
      ?>

      <div class="single__related">
        <?php if ( $the_query->have_posts() ) : ?>
        <div class="articles__section">

            <div class="articles__header">

              <h1 class="articles__title">Related Content</h1>

              <?php
              if($post_type != 'post') {
                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);
              }
              ?>

              <a href="<?php echo $post_type_archive; ?>" class="articles__more">See More Posts »</a>
            </div>

            <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <?php
              $taxCat = get_the_term_list( $post->ID, 'category-type', '<span>', ', </span><span>', '</span>' );
              $taxCatI = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );
            ?>
            <div class="articles__item">

              <?php if ( has_post_thumbnail() ): ?>
                <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><?php the_post_thumbnail('article'); ?></a>
              <?php else: ?>
                <img src="<?php bloginfo('template_url')?>/assets/img/research/dft-1.png" alt="Related Article" width="180" height="135">
              <?php endif; ?>

              <div class="articles__description">
                <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><h3><?php the_title(); ?></h3></a>
                <?php $post_date = get_the_date( 'F j, Y' );?>
                <?php $author = get_the_author(); ?>

                <div class="articles__info"><?php echo $post_date; ?>
                <?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : ''; ?><?php echo ($taxCat) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxCat : ''; ?>
                <?php echo ($taxCatI) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxCatI : ''; ?></div>

                <p><?php echo excerpt(25); ?></p>

              </div>
            </div>

            <?php endwhile; ?>

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
      </div>

    </div>
  </div>
</div>

<?php endwhile; else : ?>
  <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>
