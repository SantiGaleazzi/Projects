<?php get_header(); ?>

	<?php get_template_part('partials/general-banner'); ?>

	<section class="tw-px-6 tw-py-24 tw-bg-gray-100">
		<div class="tw-container tw-max-w-7xl">
			<div class="tw-p-8 md:tw-p-12 tw-bg-white tw-rounded-2xl has-wysiwyg has-mautic-form">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<?php the_content();?>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer();
