<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * Transform WooCommerce tabbed content into accordion component.
 *
 * @see woocommerce_default_product_tabs()
 */
$ov_tabs = apply_filters( 'woocommerce_product_tabs', array() );

$product_id = get_the_ID(); 
$certification_images = get_post_meta( $product_id, "certification_logos", TRUE );
$images_html = "";
if( $certification_images )
{
	foreach( $certification_images as $ce ){
		if( $ce == "Made in the USA" ){
			$images_html .= '<image src="/wp-content/uploads/2022/03/Made-in-the-USA.png" class="optional-logo" />';
		}
		if( $ce == "cULus logo" ){
			$images_html .= '<image src="/wp-content/uploads/2022/03/cuslistv.png" class="optional-logo" />';
		}
		if( $ce == "UL EPH logo" ){
			$images_html .= '<image src="/wp-content/uploads/2022/03/listv.png" class="optional-logo" />';			
		}
	}	
	echo $images_html;
}

if ( ! empty( $ov_tabs ) ) : ?>
	<div class="custom-tabs-ovention">
		<?php $index = 1; foreach ( $ov_tabs as $key => $ov_accordion ) : ?>
			<div class="custom-tab <?= $index === 1 ? 'active' : '' ?>">
				<div class="custom-tab-title" data-tab="<?php echo esc_attr( $key ); ?>">
					<div>
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $ov_accordion['title'], $key ) ); ?>
					</div>

					<div>
						<i class="fa fa-plus"></i>
					</div>
				</div>

				<div class="tab-content">
					<?php
						if ( isset( $ov_accordion['callback'] ) ) {
							call_user_func( $ov_accordion['callback'], $key, $ov_accordion );
						}
					?>
				</div>
			</div>
		<?php $index++; endforeach;  ?>
	</div>

<?php endif; ?>
