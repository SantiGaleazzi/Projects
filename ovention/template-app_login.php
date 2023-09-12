<?php
	/*
	* Template Name: App Login
	*/
	
	if ( is_user_logged_in() ) {

		wp_redirect( get_bloginfo('url' ).'/recipes/' );
		
		exit; 

	}

	if ( wp_is_mobile() ) {

		wp_redirect( home_url() );

		exit;
	}

	get_header("app");

	$args = array(
		'echo'           => true,
		'redirect'       => get_bloginfo('url' ).'/recipes/', 
		'form_id'        => 'loginform',
		'label_username' => __( 'User' ),
		'label_password' => __( 'Password' ),
		'label_remember' => __( 'Remember Me' ),
		'label_log_in'   => __( 'Login' ),
		'id_username'    => 'user_login',
		'id_password'    => 'user_pass',
		'id_remember'    => 'rememberme',
		'id_submit'      => 'wp-submit',
		'remember'       => false,
		'value_username' => NULL,
		'value_remember' => false
	); 

	$register = ( isset( $_GET['register'] ) ) ? $_GET['register'] : '';
?>

	<div ng-controller="GlobalCtrl">
		<?php get_sidebar('bannerapp'); ?>
	</div>

	<div id="login-app-page">
		<div class="row">
			<div class="general_container app-container twelve columns">
				<h1>Welcome to Ovention’s Culinary Corner.</h1>
				<br>
				
				<div class="six columns" id="login-copy">
					<p>
						You are about to experience the extraordinary power and flexibility of Ovention Ovens... 
					</p>

					<p>
						<strong>Recipe & Touchsceen Customization</strong>
					</p>

					<p>
						Once you login or register/login you will be able to:
					</p>

					<ul>
						<li>Create a custom recipe list for your Ovention Ovens</li>
						<li>Select from more than 300 Ovention recipes</li>
						<li>Add recipes already on your Ovention Ovens</li>
						<li>Create custom recipes for your Ovention Ovens</li>
						<li>Save and download your new recipe list and oven screen configurations to your Ovention Ovens</li>
					</ul>
				</div>
				
				<div class="five columns" id="login-form">
					<div class="twelve columns right">
						<?php if ( $register == 'confirm') : ?>
							<div class="reg-suc">
								Your registration has been successfully completed. Please log in.
							</div>
							<br>
						<?php endif; ?>
						
						<?php wp_login_form( $args ); ?>

						<div id="buttons-login">
							or &nbsp; <a href="<?php bloginfo('url'); ?>/app-registration/" class="app-button app-red">Register</a>
						</div>

						<!-- <div class="social_login">
							<?php do_action( 'wordpress_social_login' ); ?> 
								<div id="fb-register" class="wp-social-login-widget">
									Register or Login with Facebook
								</div>
								<div id="tw-register" class="wp-social-login-widget">
									Register or Login with Twitter
								</div>
						</div> --> 
						<a id="lostpassword" href="<?php bloginfo('url'); ?>/lostpassword/">Lost Password</a>
					</div>
				</div>
				<div class="one columns"></div>
				<img src="<?php bloginfo('template_url') ?>/assets/img/login-oven.png" id="big_oven">
			</div>
		</div>
	</div>

<?php get_footer("app");
