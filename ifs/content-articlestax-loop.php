<!-- ARTICLES-SECTION -->
<div class="articles">
	
	<?php
		$cpt_name = get_query_var( 'cptname' );
		$cptname = $_REQUEST['cptname'] ? $_REQUEST['cptname'] : $cpt_name;

		$termsIssue = get_terms( array( 'taxonomy' => 'category-issue', 'hide_empty' => false) );
		$termsType = get_terms( array( 'taxonomy' => 'category-type', 'hide_empty' => false) );

		foreach ( $termsIssue as $keyterm => $termIss ) {

			$tax_idsIssue[$keyterm] = $termIss->term_id;    

		}

		switch ($cptname) {
			case 'research':
				$termsCPT = array(15,16,17);
			break;

			case 'blog':
				$termsCPT = array(30);
			break;

			case 'experts':
				$termsCPT = array(32);
			break;

			case 'news':
				$termsCPT = array(33,34,35);
			break;
			
			default:
			break;
		}

		$namecpt = $cptname .'_featured';
		$cases_featured = get_field("'.$namecpt.'",'option');

		if ( $cases_featured ) : ?>
			<?php foreach( $cases_featured as $post ) : ?>
				<?php setup_postdata( $post ); ?>
				<?php $idExclude = $post->ID; ?>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

		<?php foreach ( $termsCPT as $keyTermCPT => $valueTermCPT ) :

			$args = array(
				'post__not_in' => array( $idExclude ), 
				'post_type' => $cptname,     
				'tax_query' => array(
					array(
					'taxonomy' => 'category-type',
					'field' => 'term_id',
					'terms' => $valueTermCPT
					)
				),
				'orderby' => 'date',
				'order'   => 'DESC',
				'posts_per_page' => 10
			); 

    		$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>

				<div class="articles__section">
					<div class="row">      
						<div class="large-12 columns articles__header">
							<?php
								$termname = get_term( $valueTermCPT, 'category-type' );
								$term_link = get_term_link( $termname);
							?>
							<h1 class="articles__title"><?= $termname->name;?></h1> 

							<a href="<?= $term_link; ?>" class="articles__more">See More Posts »</a>
						</div>
					</div>

					<div class="row">
						<?php
							while ( $the_query->have_posts() ) : $the_query->the_post();

								$taxissue = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );
								$taxissue .= get_the_term_list( $post->ID, 'category-type', ', <span>', ', </span><span>', '</span>' );
						?>
						<div class="large-6 columns articles__item">
							<a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><h3><?php the_title(); ?></h3></a>

							<?php if ( has_post_thumbnail() ): ?>
								<a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><?php the_post_thumbnail('article'); ?></a>
							<?php else: ?>
								<a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><img src="<?php bloginfo('template_url'); ?>/assets/img/research/dft-1.png" width="180" height="135" alt="Default Article"/></a>
							<?php endif; ?>

							<div class="articles__description">
								<?php $author = get_the_author(); ?> 

								<div class="articles__info"><?= get_the_date( 'F j, Y' ); ?><?= ($author) ? '&nbsp;&nbsp;•&nbsp;&nbsp;By ' . $author : ''; ?> <?= ($taxissue) ? '&nbsp;&nbsp;•&nbsp;&nbsp;'.$taxissue : ''; ?></div>

								<p><?= excerpt(25); ?></p>
							
							</div>
						</div>
						
						<?php endwhile; ?>
					</div>
				</div>      
				<?php wp_reset_postdata(); ?>

			<?php endif; ?>
		<?php endforeach; ?>

</div>
<!-- ARTICLES-SECTION -->
