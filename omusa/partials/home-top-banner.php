<?php if ( check_range( get_field('home_banner_starting_date', 'option'), get_field('home_banner_end_date', 'option') ) ) : ?>

	<section class="text-center px-5 py-2 bg-red-500">
		<div class="container">
			<div class="text-white-pure text-sm font-bold has-wysiwyg light-links">
				<?php the_field('home_banner_text', 'option'); ?>
			</div>
		</div>
	</section>

<?php endif; ?>
