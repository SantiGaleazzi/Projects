<?php 

	$field = get_field_object('field_5b33de8eee82f');
	$banner_blog = get_field('cases_tab_banner','option');
	$cases_featured = get_field('cases_featured','option');

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
									<h1 class="banner__title"><?= $banner_blog['main_title']; ?></h1>
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
	<div class="filter filter--cases">
		<div class="row">
			<div class="large-12 columns filter__container">
				<span>Filter by</span>

				<?php
					$tax_termsA = get_terms( 'category-issue' );
					$tax_termsB = get_terms( 'category-state', array('hide_empty' => false ));
					$tax_termsC = get_terms( 'category-type');

					$tax_termsD = get_terms( 'category-type', array(
						'orderby'           => 'name', 
						'order'             => 'ASC',
						'hide_empty'        => true,
						'include'           => array(29,36,99),
						)
					);
				?>

				<label for="" class="filter__left filter__label">Type:</label>
				<select id="fourth-option" class="filter__left filter__select">
					<option value="0">Categories</option>
					<?php foreach ( $tax_termsD as $tax_termD ) : ?>      
						<option value="<?= $tax_termD->term_id; ?>">
							<a href="<?= esc_attr( get_term_link( $tax_termD ) ); ?>"><?= $tax_termD->name; ?></a>
						</option>      
					<?php endforeach; ?>
				</select>

				<label for="" class="filter__left filter__label">Status:</label>
				<?php if ( $field ) : ?>
					<select id="third-option" class="filter__left filter__select">
						<option value="0">Case Status</option>
						<?php foreach ( $field['choices'] as $k => $v ): ?>      
							<option value="<?= $v; ?>">
								<?= $k; ?>
							</option>
						<?php endforeach; ?>
					</select>
				<?php endif; ?>

				<label for="" class="filter__left filter__label">State:</label>
				<select id="sec-option" class="filter__left filter__select">
					<option value="0">All States</option>
					<?php foreach ($tax_termsB as $tax_termB): ?>
						<option value="<?= $tax_termB->term_id; ?>">
							<a href="<?= esc_attr(get_term_link( $tax_termB ))?>"><?= $tax_termB->name; ?></a>
						</option>      
					<?php endforeach; ?>
				</select>

				<div class="last-filter">
					<label for="" class="filter__left filter__label">Topic:</label>  
					<select id="first-option" class="filter__left filter__select">
						<option value="0">All Topics</option>
						<?php foreach ($tax_termsA as $tax_termA): ?>      
							<option value="<?= $tax_termA->term_id; ?>">
								<a href="<?= esc_attr(get_term_link( $tax_termA ) );?>"><?= $tax_termA->name; ?></a>
							</option>      
						<?php endforeach; ?>
					</select>  
				</div>
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
				)
			);

			foreach ( $termsTaxs as $term ){

				$tax_ids[$contx] = $term->term_id;  
				$contx++;
				
			}

			$args = array(
				'post_type' => array('cases'),
				// 'post__not_in' => array( $postExclude ), 
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

	<?php if ( $cases_featured ) : ?>
		<div class="destacada">
			<div class="row">
				<?php
					foreach( $cases_featured as $post ) :
						setup_postdata($post);

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

				<div class="<?= has_post_thumbnail() ? 'large-7': 'large-12'; ?> columns destacada__description">
					<a href="<?php the_permalink(); ?>" target="_self">
						<h2 class="destacada__title">
							<?php the_title(); ?>
						</h2>
					</a>

					<div class="destacada__info">
						<?= get_the_date( 'F j, Y' ); ?>
						<?= ($taxtype) ? '&nbsp;&nbsp;•&nbsp;&nbsp;' . $taxtype : ''; ?> 
						<?= ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;' . $taxissue : '';?>
					</div>

					<p>
						<?= excerpt(60); ?></p>
					
				</div>
				<?php endforeach; ?>
			</div>
			<?php wp_reset_postdata(); ?>  
		</div>
	<?php endif; ?>  
</div>

	<div id="response-cases">
	<?php //get_template_part( 'content', 'cases-loop' ); ?>
	</div> 

	<!-- YOUR RIGHTS-->
	<?php get_sidebar("your-rights"); ?>
	<!-- /YOUR RIGHTS-->
