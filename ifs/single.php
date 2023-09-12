<?php get_header(); ?>

	<div class="breadcrumbs">
		<div class="row">
			<div class="large-12 columns">
				<?php custom_breadcrumbs(); ?>
			</div>
		</div>  
	</div>

	<?php get_template_part( 'content', 'single-article' ); ?>

<?php get_footer();
