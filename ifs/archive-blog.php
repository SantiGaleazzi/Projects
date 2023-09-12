<?php

	$blog_featured = get_field('blog_featured','option');
  	$banner_blog = get_field('tab_blog_banner','option');
  	$archive_name = strtolower( post_type_archive_title( '', false ) ) ;

	get_header();
 
?>

	<?php if ( $banner_blog ): ?>
		<!-- BANNER -->
		<div id="banner-active" class="banner banner--bg" style="background-image: url('<?= $banner_blog['banner_image']['url']; ?>');">
			<div class="banner--color">
				<div class="row h100">
					<div class="large-6 columns banner__description">

						<div class="table w100 h100">
							<div class="table-cell vAmiddle">

								<?php if ( $banner_blog['main_title'] ) : ?>
									<h1 class="banner__title">
										<?= $banner_blog['main_title']; ?>
									</h1>
								<?php endif; ?>

								<?php if ( $banner_blog['description'] ) : ?>
									<div class="content">
										<?= $banner_blog['description']; ?>  
									</div>
								<?php endif; ?>
								
							</div>
						</div>
						
					</div>
					<div class="banner__image show-for-large" style="background-image: url('<?= $banner_blog['banner_image']['url']; ?>');"></div>
				</div>  
			</div>  
		</div>
		<!-- /BANNER -->
	<?php endif; ?>

	<!-- FILTER SECTION -->
	<div class="filter filter-research" data-archi="<?= $archive_name; ?>">
		<div class="row">
			<div class="large-12 columns filter__container">
				<span>Filter by</span>
				<?php

					$tax_termsA = get_terms(
						'category-issue', array(
							'orderby'           => 'name', 
							'order'             => 'ASC',
							'hide_empty'        => true
						)
					);
				?>
			
				<label for="" class="filter__left filter__label">Issue:</label>
			
				<select id="first-option" class="filter__left filter__select" >
					<option value="">All Issues</option>
					<?php foreach ( $tax_termsA as $tax_termA ) : ?>      
						<option value="<?= $tax_termA->term_id; ?>">
							<a href="<?= esc_attr(get_term_link($tax_termA ) ); ?>">
								<?= $tax_termA->name; ?>
							</a>
						</option>      
					<?php endforeach; ?>
				</select>

			</div>
		</div>  
	</div>
	<!-- /FILTER SECTION -->

<div class="articles"> 
  <!-- MOST-RECENT -->
  <?php 

	$contx = 0;
	$tax_ids = array();

    $termsTaxs = get_terms( array(
        'taxonomy' => 'category-issue',
        'hide_empty' => false,
    ) );

    foreach ( $termsTaxs as $term ) {

      	$tax_ids[$contx] = $term->term_id;
    	$contx++;

    }

	$args = array(
		'post_type' => array('cases'),
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
	$cptname = 'blog';

  ?>

  <?php if ( $blog_featured ) : ?>
    <div class="destacada">
      <div class="row">
      <?php foreach( $blog_featured as $post):  ?>
        <?php setup_postdata($post); ?>
        <?php          
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
          
          <?php $author = get_the_author(); ?> 
          <div class="destacada__info">
            <?= get_the_date( 'F j, Y' ); ?>
            <?= ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : '';?>
            <?= ($taxtype) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxtype : ''; ?>
            <?= ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxissue : ''; ?>
          </div>

          <p><?= excerpt(60); ?></p>
          
        </div>
      <?php endforeach; ?>
      </div>

    <?php wp_reset_postdata(); ?>  
    </div>
  <?php endif; ?>  

  <?php set_query_var( 'cptname', $cptname ); ?>
</div>

<div id="response-articles">
  <?php //get_template_part( 'content', 'articlestax-loop' ); ?>
</div>

<?php get_footer();
