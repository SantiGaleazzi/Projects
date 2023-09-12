<?php
	$title = get_field('title','option');
	$copy = get_field('copy','option');
	$form_footer = get_field('form_footer','option');
?>
<section class="w-full h-screen fixed top-0 left-0 flex justify-center items-center px-6 login-lightbox lightbox-styles">
	<div class="bg-purple-400 w-full relative enroll-users-container pt-14 px-10 pb-8 text-center">
		<div>
			<div class="close-login-lightbox"></div>
			<?php 
				if($title){
					?>
						<h2 id="error" class="font-noto-extra-cond-black-italic text-purple-400 white-stroke leading-none text-6xxl"><?= $title; ?></h2>
					<?php
					}
				?>	
				<?php 
					if($copy){
						?>
							<div class="font-noto-sans-cond text-2xxl sm:text-xl text-white mt-8"><?= $copy; ?></div>
						<?php
					}
				?>				
				<div class="mt-10 wordpress-login-form">
					<?php wp_login_form(); ?>
				</div>		
				<?php 
					if(isset($_GET['login']))
					{
					    ?>
							<div class="font-noto-extra-cond-bold text-center text-red-500 text-xl">
								ERROR: Invalid Log In
							</div>
						<?php
					}
				?>		
				<?php 
					if($form_footer){
						?>
							<div class="font-noto-sans-regular text-sm sm:text-xs text-blue-400 my-4"><?= $form_footer; ?></div>
						<?php
					}
			?>	
		</div>
	</div>
</section>
