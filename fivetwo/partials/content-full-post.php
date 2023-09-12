<div class="post-item-single">
	<?php if ( get_the_post_thumbnail() ): ?>
		<div class="article__image">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail('large'); ?>
			</a>
		</div>
	<?php endif ?>

	<div class="title-post-item">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>		
	</div>
	
	<div class="the-excerpt">
		<?php the_excerpt(); ?>
	</div>
	<a href="<?php the_permalink(); ?>">READ MORE&nbsp;></a>
</div>