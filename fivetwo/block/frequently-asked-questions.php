<section class="block-faqs">
	<div class="container">
		<div class="faq-title">
			<?php the_field('faq_title'); ?>
		</div>

		<?php if ( have_rows('faq_questions') ) : ?>
			<div class="questions-answers">
				<?php while ( have_rows('faq_questions') ) : the_row(); ?>
					<div class="faq-item">
						<div class="faq-question">
							<div class="the-question">
								<?php the_sub_field('question'); ?>
							</div>

							<div class="the-icon">
								<i class="fas fa-plus"></i>
							</div>
						</div>

						<div class="faq-answer">
							<?php the_sub_field('answer'); ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>

		<?php if ( have_rows('banner_button_layout') ) : ?>
			<div class="call-to-action">
				<?php while ( have_rows('banner_button_layout') ) : the_row(); ?>
					<?php
						if ( get_row_layout() !== 'link' ) :
							$type = get_row_layout() === 'Gravity Forms' ? 'gravity-form' : 'virtuous-form';
							$block_id = str_replace('block_', '', $block['id']);
					?>

						<button class="<?= $type === 'gravity-form' ? 'pink-button' : 'sign-up-blue-button'; ?> js-form-trigger" data-block-id="<?= $block_id; ?>" data-form-type="<?= $type; ?>" data-form-id="<?= get_sub_field('form_id'); ?>" type="button">
							<?php the_sub_field('button_text'); ?>
						</button>
						
					<?php
						else :
						$link = get_sub_field('button_link');
					?>
						<a class="pink-button" href="<?= $link['url']; ?>" target="<?= esc_attr( $link['target'] ?: '_self' ); ?>">
							<?= $link['title']; ?>
						</a>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
