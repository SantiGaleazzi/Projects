<?php 

	$user = wp_get_current_user();
	$header = get_field('header', 'option'); 

 ?>

<!--  BANNER  -->
<div id="app_banner">
	<div class="row">
		<div class="three columns no-padding-left">
			<div id="logo_app">
				<a href="<?php echo esc_url( home_url( '/' )); ?>"><img src="<?= $header['header_logo']['url']; ?>" alt="<?= $header['header_logo']['alt']; ?>"></a>
			</div>
		</div>

		<div class="seven columns">
			<img src="<?php bloginfo('template_url') ?>/assets/img/milo-banner.png" alt="MiLO recipes coming soon" class="milobanner">
			<a href="/recipes/#/my-ovens" class="app-button app-red" ng-show="loggedIn" ng-class="{active: active_section == 'my_ovens'}">My Ovens</a>
			<a href="/recipes/#/" class="app-button app-red" ng-class="{active: active_section == 'search_recipes'}">Ovention Recipes</a>
			<a  href="/recipes/#/upload-recipe"  class="app-button app-red" ng-class="{active: active_section == 'upload_recipes'}">Upload Your Oven's Recipes</a>
			<a href="/recipes/#/recipe/newRecipe" class="app-button app-red" ng-class="{active: active_section == 'create_recipe'}">Create New Recipe</a>
		</div>

		<div class="two columns postion_bot">
			<div id="not-logged-icon" ng-show="!loggedIn">
				<a href="/app-registration/" class="right">
					Register
				</a>

				<a href="/app-login/" class="login-link">
					Log in
				</a>
			</div>
			
			<div id="logged-icon" ng-show="loggedIn">
				<div class="user_name">
					<span>
						<?= $user->display_name; ?>
					</span>

					<?php if ( get_avatar( $user->ID ) ) : ?>

						<?= get_avatar( $user->ID ); ?>

					<?php else: ?>

						<img src="<?php bloginfo('theme_url'); ?>/assets/img/User.png" alt="User">

					<?php endif; ?>
				</div>

				<a href="<?= wp_logout_url( home_url() ); ?>" id="logout">Log out</a> 	

			</div>
		</div>
	</div>
</div>
<!--  /BANNER  --> 
