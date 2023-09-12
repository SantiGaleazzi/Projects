<?php

  	/**
   	* Template Name: Our Leadership
   	*/

	get_header();

?>

	<?php get_template_part('partials/breadcrumbs'); ?>

	<section class="tw-px-5 tw-py-6 tw-bg-beige-500">
		<div class="tw-container">
			<div class="text-center tw-text-42 tw-text-blue-900 tw-font-extrabold">
				<?php the_title(); ?>
			</div>
		</div>
	</section>

	<section class="tw-px-5 tw-py-12">
		<div class="tw-container tw-max-w-xl">
			<div class="has-wysiwyg">
				<?php the_field('intro_description'); ?>
			</div>
		</div>
	</section>

	<?php

		$leadership_members = new WP_Query( array(
			'post_type' => 'team-members',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'area',
					'field' => 'slug',
					'terms' => 'leadership-team'
				)
			)
		));
		
		if ( $leadership_members->have_posts() ) :
		
	?>
		<section class="tw-px-5 tw-pb-10">
			<div class="tw-container tw-max-w-2xl">
				<div class="tw-text-center tw-text-blue-900 tw-text-3xl tw-mb-5">
					<?php the_field('leadership_team_title'); ?>
				</div>

				<div class="tw-text-center lg:tw-px-8 tw-mb-8">
					<?php the_field('leadership_team_description'); ?>
				</div>
			</div>

			<div class="tw-container tw-max-w-3xl">
				<div class="tw-grid sm:tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-5">
					<?php while ( $leadership_members->have_posts() ) : $leadership_members->the_post(); ?>
						<?php get_template_part('partials/our-leadership/leader'); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<?php

		$regional_members = new WP_Query( array(
			'post_type' => 'team-members',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'tax_query' => array(
				array(
					'taxonomy' => 'area',
					'field' => 'slug',
					'terms' => 'regional-leadership'
				)
			)
		));
		
		if ( $regional_members->have_posts() ) :
		
	?>
		<section class="tw-px-5 tw-pt-8 tw-pb-16">
			<div class="tw-container tw-max-w-2xl">
				<div class="tw-text-center tw-text-blue-900 tw-text-3xl tw-mb-5">
					<?php the_field('regional_team_title'); ?>
				</div>
			</div>

			<div class="tw-container tw-max-w-3xl">
				<div class="tw-grid sm:tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-5">
					<?php while ( $regional_members->have_posts() ) : $regional_members->the_post(); ?>
						<?php get_template_part('partials/our-leadership/leader'); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<?php

		$board_of_directors = new WP_Query( array(
			'post_type' => 'team-members',
			'posts_per_page' => -1,
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'tax_query' => array(
				array(
					'taxonomy' => 'area',
					'field' => 'slug',
					'terms' => 'board-of-directors'
				)
			)
		));
		
		if ( $board_of_directors->have_posts() ) :
		
	?>
		<section class="tw-px-5 tw-py-16 tw-bg-beige-800">
			<div class="tw-container tw-max-w-2xl">
				<div class="tw-text-center tw-text-blue-900 tw-text-3xl tw-mb-8">
					<?php the_field('directors_team_title'); ?>
				</div>
			</div>

			<div class="tw-container tw-max-w-3xl">
				<div class="tw-grid sm:tw-grid-cols-2 md:tw-grid-cols-3 tw-gap-5 md:tw-gap-y-12">
					<?php while ( $board_of_directors->have_posts() ) : $board_of_directors->the_post(); ?>
						<?php get_template_part('partials/our-leadership/leader'); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</section>
		<?php wp_reset_postdata(); ?>
	<?php endif; ?>

	<?php get_template_part('partials/lightboxes/leader'); ?>

<?php get_footer();
