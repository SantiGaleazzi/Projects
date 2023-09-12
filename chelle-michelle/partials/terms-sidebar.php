<?php
	$taxonomy_terms = get_terms( array(
		'taxonomy' => 'work-type'
	));
?>

<div class="p-6 bg-zinc-800/70 rounded-lg">
	<div class="text-2xl font-bold mb-4">
		Categories
	</div>

	<?php foreach ( $taxonomy_terms as $term ) : ?>
		<div class="flex items-center mb-2 last:mb-0">
			<a class="font-normal hover:text-yellow-300 inline-flex cursor-pointer mr-2" href="<?= get_term_link( $term ); ?>">
				<?= $term->name; ?>
			</a>

			<div class="text-xs text-zinc-400 font-semibold leading-none px-3 py-1 bg-zinc-500/50 rounded-full">
				<?= $term->count; ?> 
			</div>
		</div>
	<?php endforeach; ?>
</div>

