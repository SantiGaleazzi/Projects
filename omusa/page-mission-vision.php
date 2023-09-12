<?php get_header(); ?>

<div class="pt-24 md:pt-56 pb-24">
	<div class="container px-6 lg:px-0 relative">
		<div class="bg-black-500-new shadow-2xl">
			<div class="text-black-600-new text-sm">
				<?php get_template_part('partials/about/navigation'); ?>
			</div>

			<div>
                <div class="text-4xl md:text-5xl text-white-200-new text-center leading-none font-roboto font-light py-6 px-2 bg-red-500">
					<?php the_title(); ?>
				</div>

				<div class="relative">
                    <div class="lg:w-4/5 text-default px-4 md:px-12 py-12 mx-auto has-wysiwyg">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer();
