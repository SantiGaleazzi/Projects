<?php
/*
Template Name: Search Page
*/
get_header(); 
?>

<!-- BANNER -->
<div id="banner-active" class="banner banner--bg banner-taxonomy">
  <div class="banner--color">
    <div class="row h100">
      <div class="large-7 columns banner__description">

        <div class="table w100 h100">
          <div class="table-cell vAmiddle">

            <h1 class="banner__title">Search results</h1>
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

<!-- FILTER SECTION -->
<div class="filter filter--cases">
  <div class="row">
    <div class="large-12 columns filter__container">
      <span>Filter by</span>

      <label for="" class="filter__left filter__label">Daily Media Links:</label>
      <select id="media-links" class="filter__left filter__search filter__select">
        <option value="">All</option>
        <option value="include">Include</option>
        <option value="exclude">Exclude</option>
      </select>

      <label for="" class="filter__left filter__label">Date:</label>
      <select id="date" class="filter__left filter__search filter__select">
        <option value="">All</option>
        <option value="last-month">Last Month</option>
        <option value="last-three-months">Last 3 Months</option>
        <option value="last-six-months">Last 6 Months</option>
        <option value="last-year">Last year</option>
      </select>

    </div>
  </div>  
</div>
<!-- /FILTER SECTION -->

<div class="articles">
  <div class="articles__section tax-content">
    <div class="row">
      <div class="articles__wrapper">
         <?php 

         global $query_string;

         wp_parse_str( $query_string, $search_query );
         $search = new WP_Query( $search_query );

         /*echo '<pre>';
         var_dump($search);
         echo '</pre>';*/

         echo '<pre>';
         echo $GLOBALS['wp_query']->request;
         echo '</pre>';
        ?>
          <?php 
          if ( $search->have_posts() ) : while ( $search->have_posts() ) : $search->the_post(); ?>
          <?php
            $taxtype = get_the_term_list( $post->ID, 'category-type', '<span>', ', </span><span>', '</span>' );
          ?>
          <div class="large-6 columns articles__item article__remove">
            here
            <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><h3><?php the_title(); ?></h3></a>

            <?php if ( has_post_thumbnail() ): ?>
              <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><?php the_post_thumbnail('article'); ?></a>
            <?php else:  ?>
              <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><img src="<?php bloginfo('template_url'); ?>/assets/img/research/dft-1.png" width="180" height="135" alt="Default Article"/></a>
            <?php endif; ?>

            <div class="articles__description">
              <?php $post_date = get_the_date( 'F j, Y' );?>
              <?php $author = get_the_author(); ?>

              <div class="articles__info">
                <?php echo $post_date; ?>
                <?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : '';?>
                <?php echo ($taxtype) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxtype : ''; ?>
              </div>

              <?php if(get_the_excerpt()): ?>  
                <p><?php echo excerpt(25); ?></p>
              <?php endif;?>
            </div>
          </div>
          <?php endwhile; ?>
          <?php wp_reset_postdata(); // reset the query ?>
          <?php else : ?>
            <div class="large-12 columns">
              <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'twentyseventeen' ); ?></p>  
            </div>
          <?php endif; 
          ?>
      </div>
      <div class="pagination">
        <?php
        global $wp_query;

        $big = 999999999; // need an unlikely integer

        echo paginate_links( array(
         'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
         'format' => '?paged=%#%',
         'current' => max( 1, get_query_var('paged') ),
         'total' => $wp_query->max_num_pages
        ) );
        ?>
      </div> 
    </div>
  </div>  
</div>

<?php get_footer(); ?>