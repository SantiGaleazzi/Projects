<?php

	if ( wp_is_mobile() ) {

		wp_redirect( home_url() ); exit; 

	}

	get_header("app");

?>

<!--wrapCTrl-->
<div id="content" ng-controller="GlobalCtrl">
	<?php get_sidebar('bannerapp'); ?>

	<!-- APP CONTAINER -->
	<div ng-show="validateLogIn">
		<div class="row">
			<div class="general_container">
				<div id="side-bar-mylist" class="three columns min-height sidebar-background" ng-controller="sidebarCtrl">
					<div ng-show="loggedIn">
						<h4 class="sidebar-title">My Recipes</h4>
						<!-- <input type="text" placeholder="Search Recipe" class="search-box small-input" name="search" ng-model="query.title"> -->
						<a ng-href="/recipes/#/recipe/newRecipe" class="option_sidebar">Create New Recipe</a>
						<br>
						<a ng-href="/recipes/#/upload-recipe" class="option_sidebar">Upload Your Recipes</a>
						<br>
						<div id="empty-list-container" ng-show="favorites.length == 0">
						<p>Add recipes here by:</p>
						<ol>
							<li>
							<a ng-href="/recipes/#/upload-recipe">Uploading your current recipes.</a>
							</li>
							<li>
							<a ng-href="/recipes/#/">Searching our recipe file.</a>
							</li>
							<li>
							<a ng-href="/recipes/#/recipe/newRecipe">Creating a new recipe now.</a>
							</li>
						</ol>
					</div>
					<div class="list-container">
						<ul id="favorites" ng-model="favorites">
							<li id="favorite-recipe-{{recipe.ID}}" class="draggable" ng-repeat="recipe in favorites | filter: query">
								<span ng-bind-html="recipe.title | addEllipsis | capitalize" title="{{recipe.title}}">...</span>
								<div class="icons-list">
									<a ng-click="openPreview(recipe)" class="table-button preview-button"></a>
									<a ng-click="remove(recipe)" class="table-button trash-button"></a>
									<a href="javascript:void(0);" class="table-button drag-button"></a>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			
			<div class="nine columns min-height" id="left-container">
				<a href="#/help/" class="app-button app-green special-button help-button right" style="margin-top: 10px;">Help</a>
				<h2 class="section-title">{{section_title}}</h2>
				<div id="content-box">
					<div id="content-box-top" ng-view></div>
					<div id="content-box-bottom" ng-show="globals.show_content_footer">
					<div id="bottom-shadow"></div>
					</div>
				</div>
			</div>
			<div class="clean"></div>
		</div>
	</div>
	<div class="clean"></div>
	<!-- /APP CONTAINER -->

	<!-- Angular Templates -->
		<script type="text/ng-template" id="ovenPageWrapper.html">
			<div class="pagination-controls" ng-show="screen_mode == 'group'">
				<div class="group-pagination-button previous" ng-click="previousGroupPage()">
					<img ng-src="{{plugin_url}}/images/left-red-arrow.png">
				</div>
				<div class="group-pagination-button next" ng-click="nextGroupPage()">
					<img ng-src="{{plugin_url}}/images/right-red-arrow.png">
				</div>
			</div>

			<div class="screen-box" ng-class="screen_mode">
				<div class="top-box">
					<h4 class="screen-title">
					<span ng-click="goBack()" class="page" ng-class="{'back-to-screen': screen_mode == 'group'}">Screen: {{index + 1}}</span>
					<span ng-if="screen_mode == 'group'"> > </span>
					Category: <span ng-if="screen_mode == 'group'" class="group" ng-class="{'back-to-screen': screen_mode == 'group'}">{{group_name}}</span>
					<span ng-if="screen_mode == 'group'"> > </span>
					<span ng-if="screen_mode == 'group'">Page: {{active_group_page + 1}}</span>
					</h4>
					<div class="toggle-screen">
						<div class="icons-list">
							<a ng-click="goBack()" class="table-button back-button" ng-show="screen_mode == 'group'"></a>
							<a ng-click="toggleScreen()" class="table-button preview-button"></a>
							<a ng-click="confirmPageRemoval()" class="table-button trash-button"></a>
						</div>
					</div>
				</div>
				<div ng-hide="hide_screen">
					<div class="pages-wrapper animate-switch" ng-show="screen_mode == 'page'">
						<div oven-page page="page" type="page"></div>
					</div>
					<div class="group-pages-wrapper animate-switch" ng-repeat="group in page.groups" ng-show="screen_mode == 'group' && group.is_visible">
						<div class="group-pages">
							<div oven-page page="group_page" type="group" ng-repeat="group_page in group.pages" ng-show="$index == active_group_page"></div>
						</div>
					</div>
				</div>
			</div>
		</script>

		<script type="text/ng-template" id="ovenPage.html">
			<div class="screen-buttons">
				<div oven-button ng-repeat="button in page.buttons" button="button" index="$index" page-type="{{type}}"></div>
			</div>
		</script>

		<script type="text/ng-template" id="ovenButton.html">
			<div class="oven-button screen-button-drag" ng-class="state_class">
				<div id="button-{{index}}" class="screen-content screen-buttons-container" ng-class="{'empty-screen': button.type == 'empty'}">
					<div class="actions">
						<a href="javascript:void(0);" class="screen-button preview-button app-tooltip" title="View" ng-click="view(button)"></a>
						<a href="javascript:void(0);" class="screen-button trash-button app-tooltip" title="Remove" ng-click="clear()"></a>
					</div>
					<div class="mid-content">
						<img ng-src="{{theme_url}}/src/appstyles/icons/drop-arrow-bigger.png" alt="Empty Button Icon" ng-if="button.type == 'empty'">
						<img ng-src="{{theme_url}}/src/appstyles/icons/folder.png" alt="Group Button Icon" ng-if="button.type == 'group'">
						<br>
						<div class="empty-button-text" ng-if="button.type == 'empty'">
							<strong>Drop Recipe Here</strong><br>
							<span ng-if="pageType == 'page'">or</span><br>
							<a class="create-category" ng-click="insertGroup()" ng-if="pageType == 'page'">Create Category</a>
						</div>
						<span ng-click="changeName(index)" ng-hide="title_in_edit_mode" ng-bind-html="button.title" class="pencil-button"  ng-if="button.type == 'group'"></span>
						<span ng-click="changeName(index)" ng-hide="title_in_edit_mode" ng-bind-html="button.title"  ng-if="button.type != 'group'"></span>
						<div ng-if="title_in_edit_mode"> 
							<input id="group_title_{{index}}" type="text" ng-model="button.title" style="position:absolute; left:0; height:25px">
							<button class="app-button app-green button-slim" ng-click="closeChangeName()" style="position:absolute; right:0; top:60px">Ok</button>
						</div> 
					</div>
				</div>
			</div>
		</script>

		<script type="text/ng-template" id="downloadDialog1.html">
			<div class="warning-dialog">
				<img ng-src="{{theme_url}}/images/warning.png" alt="Warning!" />
				<h2>Warning!</h2>
				<p class="big-text red-text bold">Downloading these recipes and settings and uploading them to your oven will overwrite the recipes and settings currenty in your oven.</p>
				<p class="medium-text">Please make sure you have uploaded your existing recipes to this online tool.</p>
				<p class="small-text italics">If you have not already done so, you may <span class=" small-text red-text underlined" ng-click="redirectToUpload(closeThisDialog)">upload</span> current recipes from your oven to this online recipe tool. You will then need to modify your recipe list before downloading the new recipes and settings.</p>
				<br>
				<button class="app-button app-gray button-slim" ng-click="closeThisDialog()">Cancel</button>
				&nbsp;
				<button class="app-button app-red special-button download-button button-slim" ng-click="confirm()">Accept &amp; Download New Oven Recipes &amp; Settings</button>
			</div>
		</script>

		<script type="text/ng-template" id="alert-message.html">
			<div class="warning-dialog">
				<br><br><br><br>
				<h2>This item has been added to My Recipes.</h2> <br>
				<p class="big-text  bold"> If you would like to modify it, click on the eye and change the settings.</p>
				<br>
				<img ng-src="{{add_recipes}}" alt="Add Recipe!" />
				<br>
			</div>
		</script>

		<script type="text/ng-template" id="downloadDialog2.html">
			<div class="warning-dialog">
				<img ng-src="{{theme_url}}/images/warning.png" alt="Warning!" />
				<h2>Do not change the file name!</h2>
				<p class="red-text bold">There are precise limitations on the oven recipe file name.</p>
				<p class="bold">If you make changes to the file name you are downloading <br>it may NOT upload the new recipes to your oven.</p>
				<br>
				<button class="app-button app-gray button-slim" ng-click="closeThisDialog()">Cancel</button>
				&nbsp;
				<a ng-click="closeModal(confirm)" ng-href="?my-oven={{selected_oven.ID}}" target="_blank" class="app-button app-red special-button download-button button-slim" style="padding-top: 4px; padding-bottom: 1px;">Accept &amp; Download New Oven Recipes &amp; Settings</a>
			</div>
		</script>
	<!-- / Angular Templates -->

		<?php get_footer("app"); ?>
	</div>
</div><!--/wrapCTrl-->
