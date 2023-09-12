<?php

	/*
	* Template name: Homepage
	*/

	get_header();

?>

	<div class="homepage">

		<!-- BANNER -->
		<?php get_sidebar("banner"); ?>
		<!-- /BANNER -->

		<!-- SIGNUP -->
		<div class="sign-up">
			<div class="row">
				<div class="large-12 columns">
					<?php   $footer_sigup = get_field('footer_sigup', 'option'); ?>
					<h2><?= $footer_sigup; ?></h2>

					<?php gravity_form( 5, false, false, false, '', true );?>
				</div>
			</div>    
		</div>
		<!-- /SIGNUP -->

		<!-- MOST RECENT -->
		<?php get_template_part( 'content', 'home-recent-post' ); ?>
		<!-- /MOST RECENT -->

		<!-- FEATURED CASE -->


		
			<?php $posts = get_field("featured_case");?>
			<?php if ( $posts ) : ?>
				<?php
					foreach( $posts as $post):
					setup_postdata($post);
				?>
						
						<div class="featured-case">
							<div class="row articles" data-equalizer> 
								<div class="large-6 columns" data-equalizer-watch>
									<?php the_post_thumbnail();?>
								</div>
								<div class="large-6 columns" data-equalizer-watch> 
									<div class="featured-case__text wrap-relative">
										<a href="<?php bloginfo('url')?>/cases" class="articles__more">Cases</a> 
										<a href="<?php the_permalink(); ?>"><h1 class="articles__title"><?php the_title();?></h1></a>
										<h3><?php the_field("single_subtitle"); ?></h3>
										<p><?= excerpt(200); ?></p>
										<a href="<?php the_permalink();?>" class="btn--blue no-margin-left">Read more</a> 
										<a href="<?php bloginfo('url')?>/cases" class="btn--blue">Cases</a>        
										<a href="<?php bloginfo('url')?>/contact-an-attorney/" class="btn--blue">Get Help</a>
										<img src="<?php bloginfo('template_url'); ?>/assets/img/home/candle.png" class="candle"> 
									</div>
								</div> 
							</div> 
						</div>

				<?php endforeach; ?>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>


	<!-- /FEATURED CASE --> 

		<!-- DONATION FORM-->
		<?php get_sidebar("donation"); ?>
		<!-- /DONATION FORM-->

		
		<div class="filter filter-issue home">
			<div class="row">
				<div class="large-12 columns filter__container filter-home">
				
					<h2>Issues</h2>
					<a href="<?= get_site_url() .'/issues'; ?>" class="articles__more more-home">See More Posts »</a>
				
					<span>Filter by</span>

					<?php
						$tax_termsA = get_terms( 'category-issue' );
						$tax_termsB = get_terms( 'category-type' );
					?>
				
					<label for="" class="filter__left filter__label">Issue:</label>
				
					<select id="first-issueopt" class="filter__left filter__select">
						<option value="">All Issues</option>
						<?php foreach ( $tax_termsA as $tax_termA ) : ?>      
							<option value="<?= $tax_termA->term_id; ?>">
								<a href="<?= esc_attr( get_term_link( $tax_termA ) ); ?>">
									<?= $tax_termA->name; ?>
								</a>
							</option>      
						<?php endforeach; ?>
					</select>
				
					<label for="" class="filter__left filter__label">Category:</label>
					<select id="sec-issueopt" class="filter__left filter__select">
						<option value="">All Categories</option>
						<?php foreach ( $tax_termsB as $tax_termB ): ?>      
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

		<div class="container-issues">
			<?php get_template_part( 'content', 'issues-featured' ); ?>
			<div id="response-issues" class="home-issues"></div>    
		</div>

		<!-- YOUR RIGHTS-->
		<?php get_sidebar("your-rights"); ?>
		<!-- /YOUR RIGHTS-->

		<?php wp_reset_query(); ?>
	</div>

<?php get_footer();
