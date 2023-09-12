<div class="tw-col-span-1 <?= $post->post_content ? 'leader tw-cursor-pointer' : ''; ?>" data-leader-id="<?= get_the_ID(); ?>">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="js-leader-image tw-mb-4 tw-relative">
			<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="tw-w-full tw-object-cover">
		</div>
	<?php endif; ?>
	
	<div class="tw-text-orange-800 tw-font-bold">
		<?php the_title(); ?>
	</div>

	<div class="tw-text-sm">
		<?php the_field('team_members_position'); ?>
	</div>
</div>
