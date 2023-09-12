<?php
 /*
  * Template name: Issues
  */

	get_header();

	$banner_issues = get_field('issues_banner','option');

?>


	<?php if ( $banner_issues['banner']['banner_image'] ): ?>
		<!-- BANNER -->
		<div id="banner-active" class="banner banner--bg" style="background-image: url('<?= $banner_issues['banner']['banner_image']['url']; ?>');">
			<div class="banner--color">
				<div class="row h100">
					<div class="large-6 columns banner__description">

						<div class="table w100 h100">
							<div class="table-cell vAmiddle">

								<?php if ( $banner_issues['banner']['main_title'] ) : ?>
									<h1 class="banner__title">
										<?= $banner_issues['banner']['main_title']; ?>
									</h1>
								<?php endif; ?>

								<?php if ( $banner_issues['banner']['description'] ) : ?>
									<div class="content">
										<?= $banner_issues['banner']['description']; ?>  
									</div>
								<?php endif; ?>
								
							</div>
						</div>
						
					</div>

					<div class="banner__image show-for-large" style="background-image: url('<?= $banner_issues['banner']['banner_image']['url']; ?>');"></div>

				</div>  
			</div>  
		</div>
		<!-- /BANNER -->
	<?php endif; ?>


<!-- FILTER SECTION -->
	<div class="filter filter-issue">
		<div class="row">
			<div class="large-12 columns filter__container">
				<span>Filter by</span>

				<?php
					$tax_termsA = get_terms( 'category-issue' );
					$tax_termsB = get_terms( 'category-type' );
				?>
			
				<label for="" class="filter__left filter__label">Issue:</label>
		
				<select id="first-issueopt" class="filter__left filter__select">
					<option value="">All Issues</option>
					<?php foreach ( $tax_termsA as $tax_termA ): ?>      
						<option value="<?= $tax_termA->term_id; ?>">
							<a href="<?= esc_attr( get_term_link($tax_termA ) ); ?>">
								<?= $tax_termA->name; ?>
							</a>
						</option>      
					<?php endforeach; ?>
				</select>
		
				<label for="" class="filter__left filter__label">Category:</label>
				<select id="sec-issueopt" class="filter__left filter__select">
					<option value="">All Categories</option>
					<?php foreach ($tax_termsB as $tax_termB): ?>      
						<option value="<?= $tax_termB->term_id; ?>">
							<a href="<?= esc_attr( get_term_link( $tax_termB ) ); ?>">
								<?= $tax_termB->name; ?>
							</a>
						</option>      
					<?php endforeach; ?>
				</select>

			</div>
		</div>  
	</div>
	<!-- /FILTER SECTION -->

	<div class="row issues">
		<div class="large-3 columns categories-issue">
			<?php
				foreach ( $tax_termsA as $term ) :
				
					$term_link = get_term_link( $term );
			
					if ( is_wp_error( $term_link ) ) {
						continue;
					}
			?>
	
			<li>
				<a href="<?= esc_url( $term_link ) ?>">
					<?= $term->name; ?>
				</a>
			</li>
			<?php endforeach; ?>
		</div>
		<div class="large-9 columns  template-issues">
			<?php get_template_part( 'content', 'issues-featured' ); ?>
			<div id="response-issues"></div>
		</div>
	</div>

<?php get_footer();
