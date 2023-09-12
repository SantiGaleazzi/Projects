<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.2
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_lost_password_form' );
?>	

	<div class="lankarenka_reset_password">
	
		<form method="post" class="woocommerce-ResetPassword lost_reset_password">
			<h2 class="font-serif leading-none text-5xl"><?php _e('Perdiste tu Contraseña?', 'woocommerce'); ?></h2>

			<p><?php echo apply_filters( 'woocommerce_lost_password_message', esc_html__( 'Ingrese su nombre de usuario o dirección de correo electrónico. Recibirá un enlace para crear una nueva contraseña por correo electrónico.', 'woocommerce' ) ); ?></p><?php // @codingStandardsIgnoreLine ?>

			<p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
				<label for="user_login"><?php esc_html_e( 'Email Address', 'woocommerce' ); ?></label>
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="user_login" id="user_login" autocomplete="username" />
			</p>

			<div class="clear"></div>

			<?php do_action( 'woocommerce_lostpassword_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<input type="hidden" name="wc_reset_password" value="true" />
				<button type="submit" class="woocommerce-Button button" value="<?php esc_attr_e( 'Cambiar Contraseña', 'woocommerce' ); ?>"><?php esc_html_e( 'Cambiar Contraseña', 'woocommerce' ); ?></button>
			</p>

			<?php wp_nonce_field( 'lost_password', 'woocommerce-lost-password-nonce' ); ?>

		</form>
		
	</div>
<?php
do_action( 'woocommerce_after_lost_password_form' );
