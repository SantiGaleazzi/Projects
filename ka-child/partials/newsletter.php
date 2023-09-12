<?php

	$term = get_queried_object();

	if ( get_field('show_newsletter') || get_field('show_newsletter', $term) ) :
	
?>

	<section class="tw-px-5" style="background-color: <?php the_field('settings_newsletter_bg_color', 'option'); ?>;">
		<div class="tw-container">
			<div class="tw-flex tw-flex-col md:tw-flex-row tw-items-center tw-justify-between">
				<div class="tw-w-full md:tw-w-2/5">
					<img class="tw-h-72 tw-object-cover tw-object-top" src="<?php the_field('settings_newsletter_side_image', 'option'); ?>" alt="<?php the_field('settings_newsletter_title', 'option'); ?>">
				</div>

				<div class="tw-w-full md:tw-w-1/2 tw-py-10 md:tw-py-0">
					<div class="tw-text-4xl tw-font-extrabold tw-mb-4">
						<?php the_field('settings_newsletter_title', 'option'); ?>
					</div>

					<div class="tw-mb-5">
						<?php the_field('settings_newsletter_description', 'option'); ?>
					</div>

					<div>
						<?php the_field('settings_newsletter_form', 'option'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>
