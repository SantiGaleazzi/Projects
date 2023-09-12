<?php

	function wpdocs_custom_password_form() {
		global $post;

		$loginurl = site_url() . '/wp-login.php?action=postpass';

		ob_start();
	?>
	<div class="text-center max-w-lg p-6 bg-zinc-800 rounded-xl mx-auto">			
		<form action="<?= esc_attr( $loginurl ) ?>" method="post" role="search">
			<div class="text-4xl font-bold mb-2">
				Password Protected
			</div>

			<div class="text-zinc-300 px-6 md:px-10 mb-6">
				This content is password protected. To view it please enter your password below
			</div>

			<div class="flex gap-3 flex-col sm:flex-row sm:items-center sm:justify-center">
				<input class="w-full flex-grow text-zinc-900 leading-none px-4 py-3 rounded-md" name="post_password" id="post_password" type="password" placeholder="Password" /><input class="w-full flex-grow text-zinc-900 hover:text-yellow-300 text-lg font-semibold leading-none px-8 py-3 bg-yellow-300 hover:bg-yellow-300/10 border border-yellow-300 rounded-lg inline-block transition-colors duration-200 ease-in-out cursor-pointer" type="submit" name="Submit" value="<?php esc_attr_e( "Access" ) ?>" />			
			</div>
		</form>
	</div>

<?php
	return ob_get_clean();
}	
add_filter( 'the_password_form', 'wpdocs_custom_password_form', 9999 );
