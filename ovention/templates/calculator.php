<?php

	/*
	* Template name: Calculator
	*/

	get_header();

?>

	<?php get_template_part('partials/general-banner'); ?>

	<section class="tw-px-6 tw-py-24 tw-bg-gray-100">
		<div class="tw-container tw-max-w-7xl">
			<div class="tw-p-8 md:tw-p-12 tw-bg-white tw-rounded-2xl has-wysiwyg has-mautic-form">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content();?>
					<?php endwhile; ?>
				<?php endif; ?>

				<?php

					$query = new WP_Query( array(
						'post_type' => 'calculator',
						'posts_per_page' => -1, 
						'order'   => 'DESC',
						'orderby' => 'post_date'
					));


					if ( $query->have_posts() ) :

				?>
					<select name="" id="ovenpost">
						<option value="0">Choose Ovention Model</option>
						<?php while ( $query->have_posts() ) : $query->the_post(); ?>
							<option value="<?php the_ID(); ?>"><?php the_title(); ?></option>
						<?php endwhile;?>
						<?php wp_reset_postdata();?>
					</select>

					<select name="" id="pizza">
						<option value="0">Choose Pizza Type</option>
						<?php
							$field = get_field_object('field_58d418375e8dc');
							foreach ( $field['choices'] as $k => $v ) :
						?>
							<option value="<?= $k; ?>"><?= $v; ?></option>
						<?php endforeach; ?>
					</select>

					<div class="responsehtml"></div>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer();
