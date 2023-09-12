<div class="post-item-single">
	<?php if ( get_the_post_thumbnail() ): ?>
		<div class="article__image">
			<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail(); ?>
			</a>
		</div>
	<?php endif ?>
	<span><?php $post_date = get_the_date( 'F j, Y' ); echo $post_date; ?></span>
	<div class="title-post-item">
		<a href="<?php the_permalink(); ?>">
			<?php the_title(); ?>
		</a>		
	</div>
	<a href="<?php the_permalink(); ?>">READ MORE&nbsp;></a>
</div>