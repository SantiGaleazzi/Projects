<?php
	$user = wp_get_current_user();
?> 
<div class="w-auto sm:w-32 bg-blue-400 font-noto-cond-bold text-white text-base py-2 px-3 flex items-center fixed right-0 cursor-pointer get-help-widget hidden">
	<img  alt="Question Icon" src="<?php echo bloginfo('template_url'); ?>/assets/images/question-icon.png" />
	<span class="ml-3 leading-none hidden sm:block">Need Help?</span>
</div>
<div class="w-full bg-white fixed rounded form-widget">
	<div class="bg-blue-400 py-3 px-6 text-white font-noto-cond-bold text-base rounded cursor-pointer widget-heading">
		Email Us
	</div>
	<div class="w-full get-help-form px-6 pt-6 pb-2 ">
		<?php
			if ( in_array( 'group_leader', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ){
				echo do_shortcode('[gravityform id="6" title="false" description="true" ajax="false"]');
			}
			elseif ( in_array( 'subscriber', (array) $user->roles ) || in_array( 'administrator', (array) $user->roles ) ){
				echo do_shortcode('[gravityform id="4" title="false" description="true" ajax="false"]');
			}
		?>		
	</div>
</div>
