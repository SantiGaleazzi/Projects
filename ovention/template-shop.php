<?php

	/**
	 * Template Name: Custom Shop
	 *
	 * @package WooCommerce\Classes\Products
	 */
		
	get_header();
	
?>

	<!-- FULL PAGE -->
	<div class="full-width-page gray-bgrd">
		<div class="row">
			<div class="columns small-12">
				<?php
					/**
					 * Woocommerce_before_main_content hook.
					 *
					 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
					 * @hooked woocommerce_breadcrumb - 20
					 */
					do_action( 'woocommerce_before_main_content' );
				?>
				<div class="small-centered ">
					<div class="prod-list-wrap">
						<div class="prod-list-child prod-filters">
							<div class="filter-expand-btn">Filters</div>
							<?php echo do_shortcode( '[searchandfilter id="27181"]' ); ?>
						</div>
						<div class="prod-list-child prod-list">
							<?php echo do_shortcode( '[searchandfilter id="27181" show="results"]' ); ?>
						</div>
					</div>
				</div>

			</div>
		</div>

	</div>
	<!-- /FULL PAGE -->

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer();
