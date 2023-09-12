<?php

	/*
	* Template Name: App registration
	*/

	if ( wp_is_mobile() ) {

		wp_redirect( home_url() );

		exit;

	}

	get_header('app');

?>

	<?php get_sidebar('bannerapp'); ?>

	<div id="registatrion-app-page">
		<div class="row">
			<div class="general_container app-container twelve columns">
				<div class="eight columns centered hide-text">
					<label>Please Register to Create Your Ovention Menu Screens and Custom Recipes</label>
					<?php theme_my_login( array( 'default_action' => 'register') ); ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer('app');
