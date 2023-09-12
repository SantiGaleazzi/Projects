<div class="research">
  <div class="row">
    <div class="large-12 columns">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
        $category = get_the_term_list( $post->ID, 'category-research', '', '' ); 
      ?>
        <h2><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                 <span><?php the_time('F j, Y') ?></span>
      <?php endwhile; else : ?>

      <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
    </div>
  </div>
</div>