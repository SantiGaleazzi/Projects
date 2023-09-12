<a class="cols-span-1 pb-full border border-zinc-900 hover:border-yellow-300 bg-cover bg-center relative group" style="background-image: url(<?= get_the_post_thumbnail_url(); ?>);" href="<?php the_permalink(); ?>">

	<?php if ( get_field('project_hover_image') ) : ?>
		<div class="flex items-center justify-center absolute inset-0 bg-zinc-800/50 backdrop-blur-md opacity-0 group-hover:opacity-100  transition-opacity duration-300 ease-in-out">
			<img class="h-full object-contain" src="<?php the_field('project_hover_image'); ?>" alt="<?php the_title(); ?>" loading="lazy">
		</div>
	<?php endif; ?>

	<div class="w-1/2 text-zinc-900 p-6 bg-white absolute bottom-6 right-6 opacity-0 md:group-hover:opacity-100 shadow-xl transition-opacity duration-300 ease-in-out">
		<div class="text-xl font-bold mb-1">
			<?php the_title(); ?>
		</div>

		<div class="text-sm ">
			<?php the_excerpt(); ?>
		</div>
	</div>
</a>
