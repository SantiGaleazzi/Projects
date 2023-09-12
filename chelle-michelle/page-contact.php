<?php get_header(); ?>

<section class="px-5  py-10 md:py-20 relative overflow-hidden">
	<div class="container">
		<div class="flex flex-col md:flex-row items-center justify-between gap-y-20">
			<div class="w-full md:w-1/2 md:pr-12">
				<div class="text-7xl lg:text-8xl font-semibold mb-6">
					<?php the_field('contact_title'); ?>
				</div>

				<div class="has-wysiwyg mb-6">
					<?php the_field('contact_description'); ?>
				</div>

				<a class="w-full sm:w-auto text-center text-zinc-900 hover:text-yellow-300 text-lg font-semibold leading-none px-8 py-4 bg-yellow-300 hover:bg-yellow-300/10 border border-yellow-300 rounded-lg inline-block transition-colors duration-200 ease-in-out" href="#contact-me">
					Get in touch 💖
				</a>
			</div>

			<div class="w-full md:w-1/2 flex justify-center">
				<div class="w-full md:w-4/5 h-96 lg:h-100 bg-cover bg-left-top bg-no-repeat bg-yellow-300 relative" style="background-image: url('<?= get_field('contact_michelle'); ?>');">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="px-5 py-12">
	<div class="container">
		<?php if ( have_rows('work_experience') ) : ?>
			<div class="grid lg:grid-cols-2 gap-20">
				<?php while ( have_rows('work_experience') ) : the_row(); ?>
					<div>
						<div class="text-yellow-300 text-xl lg:text-2xl font-normal mb-2">
							<?php the_sub_field('company'); ?>
						</div>

						<div class="text-4xl md:text-6xl font-bold mb-1">
							<?php the_sub_field('title'); ?>
						</div>

						<div class="text-lg font-normal mb-4">
							<span class="text-zinc-400"><?php the_sub_field('start_date'); ?> -</span> <span class="font-semibold"><?= get_sub_field('end_date') ? get_sub_field('end_date') : 'Present'; ?></span>
						</div>

						<div class="text-lg text-zinc-400 font-normal has-wysiwyg">
							<?php the_sub_field('description'); ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>

<section id="contact-me" class="px-5 py-10 md:py-16">
	<div class="container">
		<div class="flex flex-col items-center">
			<div class="w-full md:w-3/4 lg:w-1/2">
				<div class="text-center text-5xl lg:text-6xl font-semibold mb-6">
					<?php the_field('contact_form_title'); ?>
				</div>

				<div class="rounded-xl">
					<?php the_field('contact_form'); ?>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer();
