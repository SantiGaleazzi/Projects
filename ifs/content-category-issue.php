<?php
  $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); 

  $featured_post = get_field('featured_post','option'); 
  $excludeid = 0;
?>

<?php
if( have_rows('featured_post', 'option') ):
   while ( have_rows('featured_post', 'option') ) : the_row();
      $archives_featured_posts    = get_sub_field('archive_featured_post');
      $archives_featured_taxonomy = get_sub_field('archive_featured_post_taxonomy');

      if($archives_featured_taxonomy->slug == get_query_var( 'term' )):

        if( $archives_featured_posts ): ?>
  <ul>
  <?php foreach( $archives_featured_posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
    <?php echo 'ID POST: ' . $p->ID; $excludeid = $p->ID; ?>
      <li>
        <a href="<?php echo get_permalink( $p->ID ); ?>"><?php echo get_the_title( $p->ID ); ?></a>
        <span>Custom field from $post: <?php the_field('author', $p->ID); ?></span>
      </li>
  <?php endforeach; ?>
  </ul>
<?php endif; ?>

     <?php else:
        echo "NO";
      endif;

   endwhile;
endif; 
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



<div class="articles">
  <div class="articles__section tax-content">

    <?php echo $excludeid; ?>
    <div class="row jscroll">
      <?php 
      global $query_string;
      query_posts( $query_string . '&post__not_in=469' ); ?>

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <?php
        $taxname = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );
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

          <div class="articles__info"><?php echo $post_date; ?><?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author :''; ?> <?php echo ($taxname) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxname : '';?></div>

          <?php if(get_the_excerpt()): ?>  
            <p><?php echo excerpt(25); ?></p>
          <?php endif;?>
        </div>

      </div>
      <?php endwhile; ?>

      <?php endif; ?>
    </div>
    
  </div>  
</div>