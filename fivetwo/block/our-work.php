<section class="block-out-work">
	<div class="container">
		<?php if ( get_field('block_our_work_title') ) : ?>
			<div class="our-work-title">
				<?php the_field('block_our_work_title'); ?>
			</div>
		<?php endif; ?>
		
		<?php if ( get_field('block_our_work_description') ) : ?>
			<div class="our-work-description">
				<?php the_field('block_our_work_description'); ?>
			</div>
		<?php endif; ?>

		<?php if ( have_rows('block_work_repeater') ) : ?>
			<?php while ( have_rows('block_work_repeater') ) : the_row(); ?>
				<div class="work-developed">
					<div class="copy-content">
						<div class="story-title">
							<?php the_sub_field('title'); ?>
						</div>

						<div class="story-description">
							<?php the_sub_field('description'); ?>
						</div>
						
						<?php if ( get_sub_field('file') ) : ?>
							<a class="story-link" href="<?php the_sub_field('file'); ?>" target="__blank">
								<?php the_sub_field('button_text'); ?>
							</a>
						<?php endif; ?>
					</div>

					<div class="media-content <?= get_sub_field('media_type') === 'video' ? 'media-type-video': ''?>">
						<?php if ( get_sub_field('media_type') === 'image' ) : ?>

							<img src="<?=get_sub_field('image')['url']?>" alt="<?= get_sub_field('image')['alt']; ?>">
							
						<?php else : ?>

							<div class="has-video">
								<iframe src="<?php the_sub_field('embed_url'); ?>" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
							</div>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>
