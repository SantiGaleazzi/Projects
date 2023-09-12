<section class="w-full h-screen fixed top-0 left-0 flex justify-center items-center z-50 px-6 enroll-users-lightbox lightbox-styles add-new-users-lb hidden">
	<div class="bg-white w-full rounded relative enroll-users-container">
		<div class="bg-yellow-500 py-4 px-5 font-noto-cond-bold text-white rounded-tl rounded-tr flex justify-between items-start">
			<span>Enroll New Users</span>
			<div class="close-lightbox cursor-pointer close-enrollment-lightbox relative -mt-4 mr-2"></div>
		</div>
		<div class="enroll-form-container py-5">
			<span class="block text-gray-500 text-base font-normal leading-none mb-4">Choose a Group for Your New Users</span>
				<select name="taskOption" class="groups-select" id="groups-select">
					<option selected="true" disabled="disabled">Select the Group</option>
					<?php 
						$user = get_current_user_id();
						$groups =	learndash_get_groups( true, $user );

						foreach($groups as $item) {
						    $group_title = get_the_title($item); 

					        echo '<option value='.$item.' name='.$item.'>'.$group_title.'</option>';
						}
					?>
				</select>
			<?php echo do_shortcode('[gravityform id="5" title="false"]'); ?>			
		</div>
		<div class="bg-yellow-500 sm:w-40 text-white font-noto-cond-bold sm:text-xl text-center absolute cursor-pointer cancel-enrollment close-enrollment-lightbox">
			Cancel
		</div>
	</div>
</section>

<section class="w-full h-screen fixed top-0 left-0 flex justify-center items-center z-50 px-6 enroll-users-lightbox lightbox-styles confirmation-message-lb hidden">
	<div class="bg-white w-full rounded relative enroll-users-container py-24 px-10 text-center">
		<h4 class="pb-12 text-blue-500 text-xl">Your users have been added</h4>
		<div class="-ml-12">
			<a href="." class="bg-yellow-500 sm:w-40 text-white font-noto-cond-bold sm:text-xl text-center relative block left-0 top-0 bottom-0 right-0 cursor-pointer cancel-enrollment close-enrollment-lightbox mx-auto px-6 no-underline">
				Close
			</a>
		</div>
	</div>
</section>

