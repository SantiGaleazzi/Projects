<?php
	
	/**
	 * Theme Functions
	 *
	 * @since 2.0
	 */

	$includes = [
		'laravel-mix-asset.php',
		'add-async-or-defer-to-scripts.php',
		'add-rel-preload-to-styles.php',
		'add-meta-image-upload.php',
		'icons.php',
		'enqueue-files.php',
		'custom-post-type.php',
		'protected-api.php',
		'change-recovery-mode-email.php',
		'acf-site-settings.php',
		'acf-blocks.php',
		'menu.php',
		'remove-wp-json-oembed.php',
		'blog-redirect.php',
		'change-wp-default-permalink.php',
		'theme-support.php',
		'ovens-requests.php',
		'order-search-results-by-type.php'
	];

	foreach ( $includes as $include ) {

		if ( file_exists( TEMPLATEPATH . "/functions/" . $include ) ) {

			require_once( TEMPLATEPATH . "/functions/" . $include );

		}

	}


	/************************
	 *
	 * Woocommerce customisations.
	*/
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	// remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation_add_to_cart_button', 20 );

	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 15 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 25 );

/**
 *
 * Add label to price.
 *
 * @param number $price product price.
 * @param id     $product product id.
 *
 * @return string $price.
 */
function ov_variable_product_price_starting_from( $price, $product ) {

	if ( $product->is_type( 'simple' ) ) {
		return $price;
	} elseif ( $product->is_type( 'variable' ) ) {
		$prices = $product->get_variation_prices( true );

		if ( ! empty( $prices['price'] ) ) {
			$min_price     = current( $prices['price'] );
			$max_price     = end( $prices['price'] );
			$min_reg_price = current( $prices['regular_price'] );

			if ( $min_price !== $min_reg_price ) {
				$price = sprintf( '%1s %2s', wc_get_price_html_from_text(), wc_format_sale_price( wc_price( $min_reg_price ), wc_price( $min_price ) ) );
			} elseif ( $min_price !== $max_price ) {
				$price = sprintf( __( '%1s %2s' ), wc_get_price_html_from_text(), wc_price( $min_price ) );
			}
		}
	}

	return $price;
}
add_filter( 'woocommerce_get_price_html', 'ov_variable_product_price_starting_from', 10, 2 );

/**
 *
 * @snippet       Move upsells - WooCommerce Single Product
*/
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_upsell_display', 35 );


/**
 * Override loop template and show quantities next to add to cart buttons
 */

function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
	if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
		$html  = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart" method="post" enctype="multipart/form-data">';
		$html .= woocommerce_quantity_input( array(), $product, false );
		$html .= '<button type="submit" class="button alt">' . esc_html( $product->add_to_cart_text() ) . '</button>';
		$html .= '</form>';
	}
	return $html;
}
add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );


/**
 * Change upsells h2 text.
 *
 * @return string
 */
function ov_translate_may_also_like() {
	return 'Add Options';
}
add_filter( 'woocommerce_product_upsells_products_heading', 'ov_translate_may_also_like' );

/**
 * Use a shortcode to display product reviews.
 * Format: [product_reviews id="123"]
 *
 * If there are no reviews for a product, nothing is returned to the browser.
 *
 * @param id $atts product reviews.
 * @return string
 */
function ov_product_reviews_shortcode( $atts ) {

	if ( empty( $atts ) ) {
		return '';
	}

	if ( ! isset( $atts['id'] ) ) {
		return '';
	}

	$comments = get_comments( 'post_id=' . $atts['id'] );

	if ( ! $comments ) {
		return '';
	}

	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}

}
add_shortcode( 'product_reviews', 'ov_product_reviews_shortcode' );

/**
 *
 * Customise product tabs.
 *
 * @param content $tabs tab content.
 * @return $tabs.
 */
function woo_custom_product_tabs( $tabs ) {

	// 1) Removing tabs

	unset( $tabs['description'] );              // Remove the description tab.
	unset( $tabs['reviews'] );                  // Remove the reviews tab.
	unset( $tabs['additional_information'] );   // Remove the additional information tab.

	// 2 Adding new tabs and set the right order.
	$prod_id                   = get_the_ID();
	$tab_content_features      = get_field( 'standard_features', $prod_id, true );
	$tab_content_tech          = get_field( 'tech_specs', $prod_id, true );
	$tab_content_performance   = get_field( 'performance', $prod_id, true );
	$tab_content_documentation = get_field( 'documentation', $prod_id, true );

	if ( ! empty( $tab_content_features ) ) {
		// Attribute standard features tab.
		$tabs['standard_feat_tab'] = array(
			'title'    => __( 'Standard Features', 'woocommerce' ),
			'priority' => 100,
			'callback' => 'woo_standard_feat_tab_content',
		);
	}

	if ( ! empty( $tab_content_tech  ) ) {
		// Attribute tech specs tab.
		$tabs['tech_spec_tab'] = array(
			'title'    => __( 'Tech Specs', 'woocommerce' ),
			'priority' => 110,
			'callback' => 'woo_tech_spec_products_tab_content',
		);
	}

	if ( ! empty( $tab_content_performance ) ) {
		// Adds performance tab.
		$tabs['performance_tab'] = array(
			'title'    => __( 'Performance', 'woocommerce' ),
			'priority' => 120,
			'callback' => 'woo_performance_products_tab_content',
		);
	}

	if ( ! empty( $tab_content_documentation ) ) {
		// Adds documentation tab.
		$tabs['documentation_tab'] = array(
			'title'    => __( 'Documentation', 'woocommerce' ),
			'priority' => 120,
			'callback' => 'woo_documentation_products_tab_content',
		);
	}


	$tabs['reviews_tab'] = array(
		'title'    => __( 'Reviews', 'woocommerce' ),
		'priority' => 120,
		'callback' => 'woo_reviews_tab_content',
	);

	return $tabs;

}
add_filter( 'woocommerce_product_tabs', 'woo_custom_product_tabs' );


function display_certification_logos(){
  ob_start();  
  ?>
  <h1>Certification</h1>
  <?php
  die();
  return ob_get_clean();
}
add_action( 'woocommerce_product_before_tabs', 'display_certification_logos', 20 );


function woo_standard_feat_tab_content() {
	// The new tab content.
	$prod_id = get_the_ID();
	echo '<div>' . get_field( 'standard_features', $prod_id, true ) . '</div>';
}

function woo_reviews_tab_content() {
	// The new tab content.
	$prod_id = get_the_ID();

	$output      = '<div class="o-product-reviews">';
		$output .= do_shortcode( '[wpbr_collection]' );
		$output .= do_shortcode( '[gravityform id="20"]' );
	$output     .= '</div>';

	// echo '<div>' . do_shortcode( '[wpbr_collection id=$prod_id]' ) . '</div>';
	echo $output;
}

function woo_tech_spec_products_tab_content() {
	// The new tab content.
	$prod_id = get_the_ID();
	echo '<div>' . get_field( 'tech_specs', $prod_id, true ) . '</div>';
}

function woo_performance_products_tab_content() {

	echo '<div>' . get_field( 'performance', get_the_ID(), true ) . '</div>';
}

function woo_documentation_products_tab_content() {

	$documents = get_field( 'documentation', get_the_ID() );

?>
	<div class="ov-list-documents">
		<?php foreach ( $documents as $document ) : ?>
			<div class="pdf-document">
				<i class="fas fa-file-pdf"></i>

				<a href="<?php echo $document['document']['url']; ?>" target="_blank">
					<?php echo $document['document']['title']; ?>
				</a>
			</div>
		<?php endforeach; ?>
	</div>
	<?php
}

/**
 * Remove the breadcrumbs
 */
function bc_remove_wc_breadcrumbs() {

	remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );

}
add_action( 'init', 'bc_remove_wc_breadcrumbs' );

if ( ! function_exists( 'return_to_shop_link' ) ) {

	/**
	 * Add custom link for return to shop page.
	 * This does not add breadcrumbs to posts, pages, or non-WooCommerce content in most cases.
	 */
	function return_to_shop_link() {
		if ( ! is_shop() ) {

			$shop_page_url = get_permalink( wc_get_page_id( 'shop' ) );

			$output  = '<nav class="o-breadcrumb">';
			$output .= '<a href="' . esc_url( $shop_page_url ) . '" class="o-breadcrumb-link">< Return to Shop</a>';
			$output .= '</nav>';

			echo $output; // phpcs:ignore
		}
	}
}

if ( ! function_exists( 'return_to_cart_link' ) ) {

	/**
	 * Add custom link for return to shop page.
	 * This does not add breadcrumbs to posts, pages, or non-WooCommerce content in most cases.
	 */
	function return_to_cart_link() {
		if ( ! is_shop() ) {

			$cart_page_url = get_permalink( wc_get_page_id( 'cart' ) );

			$output  = '<nav class="o-breadcrumb">';
			$output .= '<a href="' . esc_url( $cart_page_url ) . '" class="o-breadcrumb-link">< Return to Cart</a>';
			$output .= '</nav>';

			echo $output; // phpcs:ignore
		}
	}
}

add_action( 'woocommerce_before_main_content', 'return_to_shop_link', 20, 0 );
add_action( 'woocommerce_before_cart', 'return_to_shop_link', 20, 0 );
add_action( 'woocommerce_before_checkout_form_cart_notices', 'return_to_cart_link', 20, 0 );

/**
 * Add custom field to the checkout page.
 */
function ov_custom_checkout_field( $checkout ) {

	echo '<div id="ov_custom_checkout_field">';

	woocommerce_form_field(
		'checkout_text_preferred_dealer_name',
		[
			'type'        => 'text',
			'class'       => [
				'ov-checkout-text form-row',
			],
			'label_class' => ['woocommerce-form__label woocommerce-form__label-for-text text'],
			'input_class' => ['woocommerce-form__input woocommerce-form__input-text input-text'],
			'required'    => true,
			'label'       => 'Do you have a preferred dealer? Enter name or type N/A',
		]
	);

	woocommerce_form_field(
		'checkout_checkbox_liftgate',
		[
			'type'        => 'checkbox',
			'class'       => [
				'ov-checkout-checkbox form-row',
			],
			'label_class' => ['woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'],
			'input_class' => ['woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'],
			'required'    => false,
			'label'       => 'Liftgate needed',
		]
	);

	echo '</div>';
}
add_action( 'woocommerce_after_order_notes', 'ov_custom_checkout_field' );

/**
 * Update the value given in custom field.
 */
function ov_custom_checkout_field_update_order_meta( $order_id ) {

	if ( ! empty( $_POST['checkout_checkbox_liftgate'] ) ) {
		update_post_meta( $order_id, 'checkout_checkbox_liftgate', sanitize_text_field( $_POST['checkout_checkbox_liftgate'] ) );
	}

}
add_action( 'woocommerce_checkout_update_order_meta', 'ov_custom_checkout_field_update_order_meta' );

	/**
	 * Display field value on the backend WooCommerce order and emails.
	 */
	function ov_checkout_field_display_order_meta( $order ) {
		$meta_liftgate = get_post_meta( $order->get_id(), 'checkout_checkbox_liftgate', true );
		$meta_liftgate = ( $meta_liftgate ) ? 'Yes' : 'No';
		echo '<p>' . esc_html( 'Liftgate needed' ) . ': ' . esc_html( $meta_liftgate ) . '<p>';
	}
	add_action( 'woocommerce_order_details_after_order_table', 'ov_checkout_field_display_order_meta', 10, 1 );
	add_action( 'woocommerce_admin_order_data_after_billing_address', 'ov_checkout_field_display_order_meta', 10, 1 );
	add_action( 'woocommerce_email_after_order_table', 'ov_checkout_field_display_order_meta', 10, 1 );


	/**
	 * Remove related products section.
	 */
	remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

	/**
	 * Replace above with cross-sells products.
	 */
	function ov_add_cross_sells() {

		$crosssell_ids = get_post_meta( get_the_ID(), '_crosssell_ids' );
		$crosssell_ids = $crosssell_ids[0];

		if ( $crosssell_ids ) :
			?>

			<div class="cross-sells">
				<?php
				$heading = apply_filters( 'woocommerce_product_cross_sells_products_heading', __( 'You May Also Like&hellip;', 'woocommerce' ) );

				if ( $heading ) :
					?>
					<h2><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>

				<?php woocommerce_product_loop_start(); ?>

					<?php foreach ( $crosssell_ids as $crosssell_id ) : ?>

						<?php
							$post_object = get_post( $crosssell_id );

							setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

							wc_get_template_part( 'content', 'product' );
						?>

					<?php endforeach; ?>

				<?php woocommerce_product_loop_end(); ?>

			</div>
			<?php
		endif;

		wp_reset_postdata();

	}
	add_action( 'woocommerce_after_single_product_summary', 'ov_add_cross_sells', 20 );

	remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );


	/***************************
	 * GOOGLE TAG MANAGER
	 ****************************/

	/* pass the currently logged in user info to GTM */
	function user_to_datalayer() {

		$current_user = wp_get_current_user();
		$company      = get_user_meta( $current_user->ID, 'company', true );

		if ( is_user_logged_in() ) {

			wp_add_inline_script( 'user-to-datalayer', 'window.dataLayer = window.dataLayer || []; window.dataLayer.push(wp_user_email: "' . $current_user->user_email . '", wp_user_first: "' . $current_user->user_firstname . '", wp_user_last: "' . $current_user->user_lastname . '", wp_user_company: "' . $company . '" }}]);', 'before' );

		}

	}
	add_action( 'wp_footer', 'user_to_datalayer' );


	function social_widgets_init() {

		register_sidebar(
			array(
				'name'          => 'Social Widget',
				'id'            => 'social_widget',
				'before_widget' => '<div>',
				'after_widget'  => '</div>',
			)
		);

	}
	add_action( 'widgets_init', 'social_widgets_init' );

	// Quiz
	function after_submission_handler( $confirmation, $form, $entry, $ajax ) {

		$site_url     = network_site_url( '/' );
		$quiz_results = $site_url . 'my-quiz-results/';

		$cook_per_hour = rgar( $entry, '7' );
		$cook_using_a  = rgar( $entry, '9' ); // If question 7 answer is 1-20
		$cook_using_b  = rgar( $entry, '10' ); // If question 7 answer is 20-40

		$solution_a_c = rgar( $entry, '14' );
		$solution_b   = rgar( $entry, '12' );

		$plan_to_prepare_oven   = rgar( $entry, '15' );
		$plan_to_prepare_oven_b = rgar( $entry, '17' );

		if ( $cook_per_hour == '40 or More' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=C2600' );

		elseif ( $cook_using_a == '16” round pizza pan' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=M1718,MiLO-Double,S2000' );

		elseif ( $cook_using_a == '14” round pizza pan' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=S1600' );

		elseif ( $cook_using_b == '¼ size sheet pan' || $cook_using_b == '12” round pizza pan' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=S1200' );

		elseif ( $cook_using_b == 'Full-size sheet pan' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=C2600' );

		elseif ( $solution_b == 'Very important I’ve got a shoebox to work with- small is critical.' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=MiLO-Double,M360-14' );

		elseif ( $solution_b == 'Somewhat important I’ll dedicate the space for the right solution.' || $solution_b == 'Not a strong consideration I have plenty of space.' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=M1718,S2000' );

		elseif ( $plan_to_prepare_oven_b == 'No one product only, over and over.' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=C2000' );

		elseif ( $plan_to_prepare_oven_b == 'Somewhat I have other options, but I’d like flexibility' || $plan_to_prepare_oven_b == 'Absolutely I need to do multiple products to make my business work' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=S2000' );

		elseif ( $solution_a_c == 'Very important I’ve got a shoebox to work with- small is critical.' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=MiLO-Single,M360-14,M360-12,MiSA' );

		elseif ( $solution_a_c == 'Somewhat important I’ll dedicate the space for the right solution.' || $solution_a_c == 'Not a strong consideration I have plenty of space.' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=M1313,C1400' );

		elseif ( $plan_to_prepare_oven == 'No one product only, over and over.' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=C2000,C2600' );

		elseif ( $plan_to_prepare_oven == 'Somewhat I have other options, but I’d like flexibility' || $plan_to_prepare_oven == 'Absolutely I need to do multiple products to make my business work' ) :

			$confirmation = array( 'redirect' => $quiz_results . '?ovens=S2000' );

		endif;

		return $confirmation;
	}
	add_filter( 'gform_confirmation_1', 'after_submission_handler', 10, 4 );

	function send_quiz_results( $notification, $form, $entry ) {

		$site_url     = network_site_url( '/' );
		$quiz_results = $site_url . 'my-quiz-results/';

		$cook_per_hour = rgar( $entry, '7' );
		$cook_using_a  = rgar( $entry, '9' );
		$cook_using_b  = rgar( $entry, '10' );

		$solution_a_c = rgar( $entry, '14' );
		$solution_b   = rgar( $entry, '12' );

		$plan_to_prepare_oven   = rgar( $entry, '15' );
		$plan_to_prepare_oven_b = rgar( $entry, '17' );

		if ( $notification['to'] === 'connect@oventionovens.com, test@digizent.com' ) {

			if ( $cook_per_hour == '40 or More' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Conveyor 2600</strong>
					</div>
				</div>';

			elseif ( $cook_using_a == '16” round pizza pan' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>M1718, MiLO-Double, S2000</strong>
					</div>
				</div>';

			elseif ( $cook_using_a == '14” round pizza pan' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Shuttle® 1600</strong>
					</div>
				</div>';

			elseif ( $cook_using_b == '¼ size sheet pan' || $cook_using_b == '12” round pizza pan' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Shuttle® 2000/1600/1200</strong>
					</div>
				</div>';
				

			elseif ( $cook_using_b == 'Full-size sheet pan' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Conveyor 2600</strong>
					</div>
				</div>';

			elseif ( $solution_b == 'Very important I’ve got a shoebox to work with- small is critical.' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Double MiLO and Matchbox® 360-14</strong>
					</div>
				</div>';

			elseif ( $solution_b == 'Somewhat important I’ll dedicate the space for the right solution.' || $solution_b == 'Not a strong consideration I have plenty of space.' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Matchbox 1718® and Shuttle® 2000</strong>
					</div>
				</div>';

			elseif ( $plan_to_prepare_oven_b == 'No one product only, over and over.' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Conveyor 2000</strong>
					</div>
				</div>';

			elseif ( $plan_to_prepare_oven_b == 'Somewhat I have other options, but I’d like flexibility' || $plan_to_prepare_oven_b == 'Absolutely I need to do multiple products to make my business work' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Shuttle® 2000</strong>
					</div>
				</div>';

			elseif ( $solution_a_c == 'Very important I’ve got a shoebox to work with- small is critical.' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Single MiLO, MiSA-a12, Matchbox® 360-14 and Matchbox® 360-12</strong>
					</div>
				</div>';

			elseif ( $solution_a_c == 'Somewhat important I’ll dedicate the space for the right solution.' || $solution_a_c == 'Not a strong consideration I have plenty of space.' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Matchbox 1313® and Conveyor 1400</strong>
					</div>
				</div>';

			elseif ( $plan_to_prepare_oven == 'No one product only, over and over.' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Conveyor 2600 and Conveyor 2000</strong>
					</div>
				</div>';

			elseif ( $plan_to_prepare_oven == 'Somewhat I have other options, but I’d like flexibility' || $plan_to_prepare_oven == 'Absolutely I need to do multiple products to make my business work' ) :

				$notification['message'] .= '<div>
					<div>
						The winner is: <strong>Shuttle® 2000</strong>
					</div>
				</div>';

			endif;

			error_log( print_r( $notification['message'], true ) );

		}

		return $notification;

	}
	add_filter( 'gform_notification_1', 'send_quiz_results', 10, 3 );

/*******************
* SEND Custom Email
*/
	function before_email( $email, $message_format, $notification, $entry ) {

		$site_url        = network_site_url( '/' );
		$quiz_results    = $site_url . 'my-quiz-results/';
		$theme_directory = get_template_directory();

		$form        = $entry['form_id'];
		$name        = rgar( $entry, '61.3' );
		$user_email  = rgar( $entry, '62' );
		$server_year = date( 'Y' );

		if ( $form == 1 && $notification['name'] == 'Client Notification') {

			$email['to']      = $user_email;
			$email['subject'] = 'Your Ovention Quiz Results';
		
			$cook_per_hour = rgar( $entry, '7' );
			$cook_using_a  = rgar( $entry, '9' ); // If question 7 answer is 1-20
			$cook_using_b  = rgar( $entry, '10' ); // If question 7 answer is 20-40
		
			$solution_a_c = rgar( $entry, '14' );
			$solution_b   = rgar( $entry, '12' );
		
			$plan_to_prepare_oven   = rgar( $entry, '15' );
			$plan_to_prepare_oven_b = rgar( $entry, '17' );
		
			$ovens_for_you         = array();
			$ovens_html            = '';
			$quiz_oven_results_url = '';
		
			if ( $cook_per_hour == '40 or More' ) {
		
				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Conveyor 2600',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/big-conveyor.png',
					)
				);
		
				$quiz_oven_results_url = $quiz_results . '?ovens=C2600';
		
			}	elseif ( $cook_using_a == '16” round pizza pan' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Matchbox® 1718',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/matchbox-1718-1116x588.png',
					),
					array(
						'oven_name'  => 'Double MiLO®',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/m360-1.png',
					),
					array(
						'oven_name'  => 'Shuttle® 2000',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/shuttle-1116x588.png',
					)
				);
			
				$quiz_oven_results_url = $quiz_results . '?ovens=M1718,MiLO-Double,S2000';

			} elseif ( $cook_using_a == '14” round pizza pan' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Shuttle® 1600',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/shuttle-1116x588.png',
					)
				);

				$quiz_oven_results_url = $quiz_results . '?ovens=S1600';

			} elseif ( $cook_using_b == '¼ size sheet pan' || $cook_using_b == '12” round pizza pan' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Shuttle® 1200',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/shuttle-1116x588.png',
					)
				);
			
				$quiz_oven_results_url = $quiz_results . '?ovens=S1200';

			} elseif ( $cook_using_b == 'Full-size sheet pan' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Conveyor 2600',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/big-conveyor.png',
					)
				);
			
				$quiz_oven_results_url = $quiz_results . '?ovens=C2600';

			} elseif ( $solution_b == 'Very important I’ve got a shoebox to work with- small is critical.' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Double MiLO®',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/m360-1.png',
					),
					array(
						'oven_name'  => 'Matchbox® 360 14',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/matchbox-1718-1116x588.png',
					)
				);
			
				$quiz_oven_results_url = $quiz_results . '?ovens=MiLO-Double,M360-14';

			} elseif ( $solution_b == 'Somewhat important I’ll dedicate the space for the right solution.' || $solution_b == 'Not a strong consideration I have plenty of space.' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Matchbox® 1718',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/matchbox-1718-1116x588.png',
					),
					array(
						'oven_name'  => 'Shuttle® 2000',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/shuttle-1116x588.png',
					)
				);
			
				$quiz_oven_results_url = $quiz_results . '?ovens=M1718,S2000';

			} elseif ( $plan_to_prepare_oven_b == 'No one product only, over and over.' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Conveyor 2000',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/big-conveyor.png',
					)
				);
			
				$quiz_oven_results_url = $quiz_results . '?ovens=C2000';

			} elseif ( $plan_to_prepare_oven_b == 'Somewhat I have other options, but I’d like flexibility' || $plan_to_prepare_oven_b == 'Absolutely I need to do multiple products to make my business work' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Shuttle® 2000',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/shuttle-1116x588.png',
					)
				);
			
				$quiz_oven_results_url = $quiz_results . '?ovens=S2000';

			} elseif ( $solution_a_c == 'Very important I’ve got a shoebox to work with- small is critical.' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Single MiLO®',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2019/05/single_MiLO.png',
					),
					array(
						'oven_name'  => 'Matchbox® 360 14',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/matchbox-1718-1116x588.png',
					),
					array(
						'oven_name'  => 'Matchbox® 360 12',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/matchbox-1718-1116x588.png',
					),
					array(
						'oven_name'  => 'MiSA',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2020/06/MiSAFront_V2-e1600965204262.png',
					)
				);
			
				$quiz_oven_results_url = $quiz_results . '?ovens=MiLO-Single,M360-14,M360-12,MiSA';

			} elseif ( $solution_a_c == 'Somewhat important I’ll dedicate the space for the right solution.' || $solution_a_c == 'Not a strong consideration I have plenty of space.' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Matchbox® 1313',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/matchbox-1718-1116x588.png',
					),
					array(
						'oven_name'  => 'Conveyor 1400',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/big-conveyor.png',
					)
				);
			
				$quiz_oven_results_url = $quiz_results . '?ovens=M1313,C1400';

			} elseif ( $plan_to_prepare_oven == 'No one product only, over and over.' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Conveyor 2000',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/big-conveyor.png',
					),
					array(
						'oven_name'  => 'Conveyor 2600',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/big-conveyor.png',
					)
				);
			
				$quiz_oven_results_url = $quiz_results . '?ovens=C2000,C2600';

			} elseif ( $plan_to_prepare_oven == 'Somewhat I have other options, but I’d like flexibility' || $plan_to_prepare_oven == 'Absolutely I need to do multiple products to make my business work' ) {

				array_push(
					$ovens_for_you,
					array(
						'oven_name'  => 'Shuttle® 2000',
						'oven_image' => 'https://oventionovens.com/wp-content/uploads/2018/04/shuttle-1116x588.png',
					)
				);
			
				$quiz_oven_results_url = $quiz_results . '?ovens=S2000';

			}

			$html_base = '
			<tr>
				<td align="left" style="padding-left: 20px; padding-right: 20px; padding-bottom: 20px; ">
				<table class="w100" border="0" cellpadding="0" cellspacing="0" width="500" align="center" style="width: 500px; margin: 0 auto;">
					<tbody>
					<tr>
						<td align="center" style="font-family: Arial, Helvetica, sans-serif; font-size: 20px; line-height: 24px; font-weight: bold; color:#404041; padding-bottom: 20px;">
						{{ oven_name }}
						</td>
					</tr>
					<tr>
						<td align="center" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 22px; font-weight: bold; color:#3d4852; padding-bottom: 20px;">
						<a href="{{ oven_url }}" style="display: inline-block;">
							<img src="{{ oven_image }}" alt="Ovention Ovens" style="display:block; border: none; max-width: 200px;" />
						</a>
						</td>
					</tr>
					<tr>
						<td align="center" style="font-family: Arial, Helvetica, sans-serif; font-size: 16px; line-height: 24px; font-weight: normal; color:#ffffff;">
						<a href="{{ oven_url }}" style="font-size: 16px; line-height: 16px; color: #ffffff; font-weight: bold; display: inline-block; padding: 15px 35px 15px 35px; background-color: #ff8a2c; border-radius: 30px; text-decoration: none;">View results &#187;</a>
						</td>
					</tr>
					</tbody>
				</table>
				</td>
			</tr>
			';

			foreach ( $ovens_for_you as $oven ) {

				$parts_to_mod = array( '{{ oven_name }}', '{{ oven_image }}', '{{ oven_url }}' );
				$oven_parts   = array( $oven['oven_name'], $oven['oven_image'], $quiz_oven_results_url );

				$result = str_replace( $parts_to_mod, $oven_parts, $html_base );

				$ovens_html = $ovens_html . $result;

			}

			if ( file_exists( $theme_directory . '/email-template.html' ) ) {

				$match_phrase = 'this is the right oven for you:';

				if ( count( $ovens_for_you ) > 1 ) {

					$match_phrase = 'these are the right ovens for you:';

				}

				$email_template = file_get_contents( $theme_directory . '/email-template.html' );
				$parts_to_mod   = array( '{{ name }}', '{{ best_match_phrase }}', '{{ recommended_ovens }}', '{{ year }}' );
				$replace_with   = array( $name, $match_phrase, $ovens_html, $server_year );

				for ( $i = 0; $i < count( $parts_to_mod ); $i++ ) {

					$email_template = str_replace( $parts_to_mod[ $i ], $replace_with[ $i ], $email_template );

				}
			}

			$email['message'] = '<html>' . $email_template . '</html>';

			// error_log(print_r('Email structure ' . $email , true));

		}

		return $email;

	}
	add_filter( 'gform_pre_send_email', 'before_email', 10, 4 );



	function pagination( $prev = 'Prev', $next = 'Next' ) {

		global $wp_query, $wp_rewrite;

		$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;

		$pagination = array(
			'base'      => @add_query_arg( 'paged', '%#%' ),
			'format'    => '',
			'total'     => $wp_query->max_num_pages,
			'current'   => $current,
			'prev_text' => __( $prev ),
			'next_text' => __( $next ),
			'type'      => 'plain',
		);

		echo paginate_links( $pagination );

	};

	function wpdocs_custom_excerpt_length( $length ) {

		return 20;
		
	}
	add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

	// Load Posts
	function ajax_pizza_calculator() {

		locate_template( '/calculator-pizza-loop.php', true, false );

		die();
		
	}
	add_action( 'wp_ajax_nopriv_ajaxPost', 'ajax_pizza_calculator' );
	add_action( 'wp_ajax_ajaxPost', 'ajax_pizza_calculator' );

	function get_location() {

		$url = 'https://www.hatcocorp.com/en/api/v1/location';
		$ch  = curl_init();

		curl_setopt( $ch, CURLOPT_URL, $url );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
		curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 4 );

		$json = curl_exec( $ch );
		curl_close( $ch );

		echo ( $json );

		die();
		
	}
	add_action( 'wp_ajax_get_location', 'get_location' );
	add_action( 'wp_ajax_nopriv_get_location', 'get_location' );

	/*ADD CUSTOM COLUMNS ON CUSTOM POSTS*/
	function my_edit_recipes_columns( $columns ) {

		$columns = array(
			'cb'          => '<input type="checkbox" />',
			'title'       => __( 'Recipe' ),
			'course'      => __( 'Course' ),
			'dish_type'   => __( 'Dish Type' ),
			'image'       => __( 'Image' ),
			'recipe_type' => __( 'Owner' ),
		);

		return $columns;
		
	}
	add_filter( 'manage_edit-recipes_columns', 'my_edit_recipes_columns' );

	/***************************************
	CREATE CUSTOM COLUMNS ON RECIPES CUSTOM POST
	*/
	/*CREATE COLUMNS*/
	function my_manage_recipes_columns( $column, $post_id ) {
		global $post;

		switch ( $column ) {

			case 'course':
				$terms = get_the_terms( $post_id, 'category_recipes' );

				/* Get the post meta. */
				if ( $terms && ! is_wp_error( $terms ) ) :

					$draught_links = array();

					foreach ( $terms as $term ) {
						$draught_links[] = $term->name;
					}

					$on_draught = join( ', ', $draught_links );
					echo $on_draught;
				endif;
				break;

			case 'dish_type':
				/* Get the post meta. */
				$dish_type = get_field( 'dish_type', $post_id );

				echo ( $dish_type != '' ) ? $dish_type : '';
				break;

			case 'image':
				/* Get the post meta. */
				$image = get_field( 'image', $post_id, false );
				echo wp_get_attachment_image( $image, 'thumbnail' );
				// echo (!empty($image['sizes']['thumbnail']) ) ? "<img src='".$image['sizes']['thumbnail']."' alt=''>" : "";

				break;

			case 'recipe_type':
				/* Get the post meta. */
				$recipe_owner = get_field( 'recipe_type', $post_id );

				echo ( $recipe_owner == 'community' ) ? 'Community' : 'Ovention Approved';
				break;

			/* Just break out of the switch statement for everything else. */
			default:
				break;
		}
	}
	add_action( 'manage_recipes_posts_custom_column', 'my_manage_recipes_columns', 10, 2 );

	/*
	SORTABLE COLUMNS*/
	/*Configure filter: manage_edit-{post_type}_sortable_columns’*/
	function my_recipes_sortable_columns( $columns ) {

		$columns['course']      = 'course';
		$columns['dish_type']   = 'dish_type';
		$columns['recipe_type'] = 'recipe_type';

		return $columns;

	}
	add_filter( 'manage_edit-recipes_sortable_columns', 'my_recipes_sortable_columns' );

	/***************************************
	ADD SELECT FILTER ON RECIPES CUSTOM POST
	*/
	/*CREATE SELECT */

	function filter_by_type() {

		global $typenow;

		if ( $typenow == 'recipes' ) {
			echo "<select name='filter_owner'>";
			echo "<option value=''>All recipes</option>";
			echo "<option value='community'> Community</option>";
			echo "<option value='ovention_approved'> Ovention Approved</option>";
			echo '</select>';
		}

	}
	add_action( 'restrict_manage_posts', 'filter_by_type' );

	/*ADD VALUES TO QUERY */
	
	function modify_filter_owner( $query ) {

		global $typenow;
		global $pagenow;

		if ( $pagenow == 'edit.php' && $typenow == 'recipes' && isset( $_GET['filter_owner'] ) ) {
			$query->query_vars['meta_key']   = 'recipe_type';
			$query->query_vars['meta_value'] = 'community';

			if ( $_GET['filter_owner'] == 'community' ) {
				$query->query_vars['meta_compare'] = '==';
			} else {
				$query->query_vars['meta_compare'] = '!=';
			}
		}

	}
	add_filter( 'parse_query', /*array( $this, */'modify_filter_owner' /*)*/ );

/*
 Automatically set the image Title, Alt-Text, Caption & Description upon upload
-----------------------------------------------------------------------*/

	function disable_tml_updates( $value ) {

		if ( ( isset( $value ) ) && ( is_object( $value ) ) ) {

			if ( isset( $value->response['theme-my-login/theme-my-login.php'] ) ) {

				unset( $value->response['theme-my-login/theme-my-login.php'] );
				
			}

			return $value;

		}
		
	}
	add_filter( 'site_transient_update_plugins', 'disable_tml_updates' );


	/**
	 * It creates a shortcode called [year] that returns the current year
	 * 
	 * @return The current year.
	 */
	function year_shortcode() {

		$year = date( 'Y' );

		return $year;

	}
	add_shortcode( 'year', 'year_shortcode' );


	function acf_load_oven_field_choices( $field ) {

		// reset choices
		$field['choices'] = array();

		// if has rows
		if ( have_rows( 'blog_ovens_repeater', 'options' ) ) {

			// while has rows
			while ( have_rows( 'blog_ovens_repeater', 'options' ) ) {

				// instantiate row
				the_row();

				// vars
				$value = get_sub_field( 'oven_name' );
				$label = get_sub_field( 'oven_title' );

				$field['choices'][ $value ] = $label;
			}
		}

		$field['default_value'] = array( 'milo', 'matchbox1718' );

		return $field;

	}
	add_filter( 'acf/load_field/name=culinary_select_oven', 'acf_load_oven_field_choices' );


	function login_failed_403() {

		status_header( 403 );
		
	}
	add_action( 'wp_login_failed', 'login_failed_403' );

	/**************************************************
	PUSH SEGMENTATION INFORMATION TO GOOGLE TAG MANAGER
	**************************************************/
	// contact steve.robinson@brilliantmetrics with questions
	function segmentation_to_datalayer() {

		echo "<script>\n";
		echo "dataLayer = dataLayer || [];\n";
		echo "dataLayer.push({\n";

		if ( get_field('journey_state', get_the_ID() ) ) {

			echo '  "journeyStateContent": "' . strtolower(get_field('journey_state', get_the_ID())) . '",' . "\n";

		}

		if ( get_field('market_segment', get_the_ID() ) ) {

			echo '  "marketSegmentContent": "' . strtolower(get_field('market_segment', get_the_ID())) . '",' . "\n";

		}

		if ( get_field('market_subsegment', get_the_ID() ) ) {

			echo '  "marketSubsegmentContent": "' . strtolower(get_field('market_subsegment', get_the_ID())) . '",' . "\n";

		}

		echo '  "action": "segmentation-signal"' . "\n";
		echo "});\n";
		echo "</script>\n";

	}
	add_action( 'wp_footer', 'segmentation_to_datalayer' );


	function wpdocs_register_my_custom_menu_page() {

		add_menu_page(
			__( 'API Settings', 'textdomain' ),
			'API Settings',
			'manage_options',
			'myplugin/myplugin-admin.php',
			'',
			plugins_url( 'myplugin/images/icon.png' ),
			6
		);

	}
	add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );

	require_once __DIR__ . '/hatcocorp-api-functions.php';


	// -----------------------------------------
	// 1. Add custom field input @ Product Data > Variations > Single Variation
	//add_action( 'woocommerce_variation_options_pricing', 'bbloomer_add_custom_field_to_variations', 10, 3 );

	function bbloomer_add_custom_field_to_variations( $loop, $variation_data, $variation ) {
		// woocommerce_wp_text_input( array(
		// 'id' => 'custom_field[' . $loop . ']',
		// 'class' => 'short',
		// 'label' => __( 'Power Required', 'woocommerce' ),
		// 'value' => get_post_meta( $variation->ID, 'power', true )
		// ) );

		woocommerce_wp_select(
			array( // Text Field type
				'id'      => 'custom_field[' . $loop . ']',
				'label'   => __( 'Custom Field', 'woocommerce' ),
				'options' => array(
					''   => __( 'Select Power Required', 'woocommerce' ),
					'30' => __( '30 Amp', 'woocommerce' ),
					'50' => __( '50 Amp', 'woocommerce' ),
				),
				'value'   => get_post_meta( $variation->ID, 'custom_field', true ),
			)
		);
	}

	// -----------------------------------------
	// 2. Save custom field on product variation save

	// add_action( 'woocommerce_save_product_variation', 'bbloomer_save_custom_field_variations', 10, 2 );

	function bbloomer_save_custom_field_variations( $variation_id, $i ) {

		$custom_field = $_POST['custom_field'][ $i ];

		if ( isset( $custom_field ) ) {

			update_post_meta( $variation_id, 'custom_field', esc_attr( $custom_field ) );

		}
		
	}

	// -----------------------------------------
	// 3. Store custom field value into variation data

	// add_filter( 'woocommerce_available_variation', 'bbloomer_add_custom_field_variation_data' );

	function bbloomer_add_custom_field_variation_data( $variations ) {

		$variations['custom_field'] = '<div class="woocommerce_custom_field">Power: <span>' . get_post_meta( $variations['variation_id'], 'custom_field', true ) . '</span></div>';

		return $variations;

	}

	//Check range
	function check_range( $start_date, $end_date ) {
		$current_date = current_time('d-m-Y', false);

		$end_date = strtotime($end_date);
		$start_date = strtotime($start_date);
		$current_date = strtotime($current_date);

		if ( ( $current_date >= $start_date) && ($current_date <= $end_date) ) {

			return true;

		} else {

			return false;

		}
		
	}
	

	/**
	 * It adds a class of "view" to the anchor tag of the archive links
	 * 
	 * @param link The archive link.
	 * 
	 * @return The archive links are being returned with a class of "view"
	 */
	function get_archive_links_css_class( $link ) {

    	return str_replace( 'href', 'class="tw-text-white hover:tw-text-white" href', $link );

	}
	add_filter( 'get_archives_link', 'get_archive_links_css_class' );
