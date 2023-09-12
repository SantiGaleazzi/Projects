<?php //get_sidebar("banner"); ?>

<?php
  $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 
  $featured_id= 0;
  $contx = 0;

?>




<!-- BANNER -->
<div id="banner-active" class="banner banner--bg banner-taxonomy">
  <div class="banner--color">
    <div class="row h100">
      <div class="large-7 columns banner__description">

        <div class="table w100 h100">
          <div class="table-cell vAmiddle">

            <h1 class="banner__title"><?php echo $term->name; ?></h1>
            <!-- <div class="content">
              <p>Donec dapibus in arcu quis ultricies</p>  
            </div> -->
              
          </div>
        </div>
        
      </div>
      <div class="banner__image show-for-large">
        
      </div>
    </div>  
  </div>  
</div>
<!-- /BANNER -->

<?php 
    
    $featured_post = get_field('featured_post','option'); 
    $featured_id = 0;
?>

<?php

    // check if the repeater field has rows of data
    if( have_rows('featured_post', 'option') ):

        // loop through the rows of data
        while ( have_rows('featured_post', 'option') ) : the_row();

            // display a sub field value
            $archives_featured_posts    = get_sub_field('archive_featured_post');
            $archives_featured_taxonomy = get_sub_field('archive_featured_post_taxonomy');
            
            if($archives_featured_taxonomy->slug == get_query_var( 'term' )): ?>
                <div class="articles">
                  <!-- MOST-RECENT -->
                    <?php 

                        /*$termsTaxs = get_terms( array(
                          'taxonomy' => 'category-issue',
                          'hide_empty' => false,
                        ) );

                        foreach( $termsTaxs as $term ){
                            $tax_ids[$contx] = $term->term_id;  
                            $contx++;
                        }

                       /* $args = array(
                          'post_type' => array( 'research', 'cases', 'news', 'experts','blog'),
                          // 'post__not_in' => array( $postExclude ), 
                          'tax_query' => array(
                            array(
                              'taxonomy' => 'category-issue',
                              'field' => 'term_id',
                              'terms' => $archives_featured_taxonomy->id,
                            )
                          ),
                          'orderby' => 'date',
                          'posts_per_page' => 1 
                        );

                        $the_query = new WP_Query( $args ); */
                    ?>

                <?php if ( $archives_featured_posts ) : ?>
                    <div class="destacada">
                        <div class="row">
                            <?php foreach( $archives_featured_posts as $post):  ?>
                                <?php $featured_id =  $post->ID; ?>   
                                <?php setup_postdata($post); ?>
                                <?php
                                    $taxissue = get_the_term_list( $featured_id, 'category-issue', '<span>', ', </span><span>', '</span>' );
                                    $taxtype = get_the_term_list( $featured_id, 'category-type', '<span>', ', </span><span>', '</span>' );
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

                                <div class="destacada__info"><?php echo $post_date; ?><?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : ''; ?><?php echo ($taxtype) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxtype : ''; ?><?php echo ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxissue : ''; ?></div>

                                <?php the_excerpt(); ?>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php wp_reset_postdata(); ?>  
                    </div>
                <?php endif; ?>
                </div>         
             <?php   
            endif;
        endwhile;
    endif;    
?>

<!-- Articles  -->
  <?php 
     /* $args = array(
        'post_type' => array( 'research', 'cases', 'news', 'experts','blog'),
        'post__not_in' => array( $featured_id ),
        'orderby' => 'date',
        'order'   => 'DESC',
        //'paged'          => $pagepp, 
        'posts_per_page' => 4 
      );*/
  ?>
 <?php //query_posts( $args );?>
<div class="articles" id="response-tax">
  <div class="articles__section tax-content">
    <!-- <div class="row">      
      <div class="large-12 columns articles__header">        
        <h1 class="articles__title"><?php //echo $term->name; ?></h1> 
        <a href="<?php //echo $term_link; ?>" class="articles__more">See More Posts »</a>
      </div>
    </div> -->
    <div class="row jscroll">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php
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
            <?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : ''; ?>
            <?php echo ($taxname) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxname : ''; ?>
          </div>

          <?php if(get_the_excerpt()): ?>  
            <p><?php echo excerpt(25); ?></p>
          <?php endif;?>
        </div>

      </div>
      <?php endwhile; ?>
      <?php wp_reset_query(); ?>


      <?php endif; ?>
    </div>
    
  </div>
  <span class="load-more btn btn--blue">Load more</span>
</div>

<script type="text/javascript">
//  global $wp_query;
// echo $wp_query->max_num_pages;

var max_pages = <?php echo $wp_query->max_num_pages; ?>;
var termslug = <?php echo "'".$term->slug."'"; ?>;
var featID = <?php echo $featured_id; ?>


</script>