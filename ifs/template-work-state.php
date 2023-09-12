<?php

	/*
	* Template name: States
  	*/

  	$feautured_work_in_your_state = get_field('feautured_work_in_your_state', 'option');
	get_sidebar('banner');

	get_header();

?>

	<!-- FILTER SECTION -->
	<div class="filter states">
		<div class="row">
			<div class="large-12 columns filter__container">
				<span>Filter by</span>

				<?php
					$tax_termsA = get_terms( 'category-state' , array('hide_empty' => false));
					$tax_termsB = get_terms( 'category-issue' );
					$tax_termsC = get_terms( 'category-type' );
				?>
			
				<label for="" class="filter__left filter__label">State:</label>
		
				<select id="first-option" name='option[0]' data-opt="1" class="filter__left filter__select">
					<option value="">All States</option>
					<?php foreach ( $tax_termsA as $tax_termA ): ?>      
						<option value="<?= $tax_termA->term_id; ?>">
							<a href="<?= esc_attr( get_term_link( $tax_termA ) ); ?>"><?= $tax_termA->name; ?></a>
						</option>      
					<?php endforeach; ?>
				</select>
	
				<label for="" class="filter__left filter__label">Topic:</label>

				<select id="sec-option" name='option[1]' data-opt="2" class="filter__left filter__select">
					<option value="">All Topics</option>
					<?php foreach ( $tax_termsB as $tax_termB ): ?>      
						<option value="<?= $tax_termB->term_id; ?>">
							<a href="<?= esc_attr( get_term_link( $tax_termB ) ); ?>"><?= $tax_termB->name; ?></a>
						</option>
					<?php endforeach; ?>
				</select>

				<label for="" class="filter__left filter__label">Categories:</label>

				<select id="third-option" name='option[2]' data-opt="3" class="filter__left filter__select">
					<option value="">All Categories</option>
					<?php foreach ($tax_termsC as $tax_termC): ?>
						<option value="<?= $tax_termC->term_id; ?>">
							<a href="<?= esc_attr( get_term_link( $tax_termC ) ); ?>"><?= $tax_termC->name; ?></a>
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

				$tax_ids[ $contx ] = $term->term_id;  
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

		?>

	<?php if ( $feautured_work_in_your_state ) : ?>
		<div class="destacada">
			<div class="row">
				<?php
					
					foreach ( $feautured_work_in_your_state as $post ) :

						setup_postdata( $post );
						$namecpt = get_post_type( $post->ID );
						$cptName = $post->post_type;

						$idwiys = $post->ID;
						$taxissue = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );
						$taxtype = get_the_term_list( $post->ID, 'category-type', '<span>', ', </span><span>', '</span>' );      

				?>
					<?php if ( has_post_thumbnail() ): ?>
						<div class="large-5 columns">
							<?php the_post_thumbnail('article-destacada'); ?>
						</div>
					<?php else: ?>
						<div class="large-5 columns">
							<a href="<?php the_permalink(); ?>" target="_self"><img src="<?php bloginfo('template_url'); ?>/assets/img/research/dft-1.png" width="480" height="360" alt="Default Article">
							</a>
						</div>
					<?php endif; ?>

					<div class="large-7 columns destacada__description">
						<a href="<?php the_permalink(); ?>" target="_self"><h2 class="destacada__title"><?php the_title(); ?></h2></a>
						
						<?php $author = get_the_author(); ?>
						<div class="destacada__info">
							<?= get_the_date( 'F j, Y' ); ?>
							<?php echo ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By '.$author : ''; ?>
							<?php echo ($taxtype) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxtype : ''; ?>
							<?php echo ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxissue : ''; ?>
						</div>

						<p><?php echo excerpt(60); ?></p>
					
					</div>
				<?php endforeach; ?>
			</div>

			<?php wp_reset_postdata(); ?>  
		</div>
	<?php endif; ?>
	</div>

	<div id="response-states"></div>

<?php get_footer();
