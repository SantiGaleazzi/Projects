

<?php

    if ( is_single() && get_field('culinary_select_oven') ) :

?>

	<div class="tw-mb-10">
		<div class="tw-text-center tw-text-orange-600 tw-text-[28px] lg:tw-text-[32px] tw-font-bold tw-leading-none tw-border-b-2 tw-border-gray-400/30 tw-pb-8 tw-mb-8">
			Ovention Ovens Make It Easy
		</div>

		<div class="blog-aside-oven-variations">
			<?php

				$ovens = new WP_Query(array(
					'post_type' => 'oven',
					'posts_per_page' => -1
				));

				if ( $ovens->have_posts() ) :
					
			?>
				<?php while ( $ovens->have_posts() ) : $ovens->the_post(); ?>
					<div class="tw-mb-10">
						<div class="tw-mb-10">
							<img src="<?= get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
						</div>

						<div class="tw-text-orange-600 tw-text-[24px] tw-font-semibold tw-leading-none tw-mb-10">
							<?php the_title(); ?>
						</div>
							
						<div>
							<?php the_field('intro'); ?>
						</div>

						<div>
							<a class="tw-text-orange-600 hover:tw-text-orange-600 tw-font-semibold" href="<?php the_permalink(); ?>">
								Learn more »
							</a>
						</div>
					</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>

		<div class="tw-flex tw-flex-col tw-gap-y-6">
			<button class="demo-schedule-lightbox tw-text-white tw-font-semibold tw-px-12 tw-py-6 tw-bg-gradient-to-r tw-from-orange-600 tw-to-orange-900 tw-rounded-2xl" aria-label="Schedule a Demo">Schedule a Demo »</button>
			<button class="js-contact-in-site tw-text-white tw-font-semibold tw-px-12 tw-py-6 tw-bg-gradient-to-r tw-from-orange-600 tw-to-orange-900 tw-rounded-2xl" aria-label="Contact Us">Contact Us »</button>
		</div>
	</div>
<?php endif; ?>


<div class="tw-px-8 tw-py-12 tw-bg-gray-800 tw-rounded-2xl tw-mx-auto category-sidebar ">
	<div class="tw-border-b-2 tw-border-solid tw-border-gray-400/30 tw-pb-12 tw-mb-12">
		<div class="tw-text-white tw-text-[28px] tw-font-semibold tw-mb-6">
			Categories
		</div>

        <div>
            <a class="tw-text-white hover:tw-text-white" href="<?= site_url(); ?>/culinary-blog/">
				All
			</a>
        </div>

        <?php

			$categories = get_categories( array(
                'orderby' => 'name',
                'order'   => 'ASC'
            ));

            foreach ( $categories as $category ) :

		?>
			<div>
				<a class="tw-text-white hover:tw-text-white" href="<?= esc_url( get_category_link( $category->term_id ) ); ?>">
					<?= esc_html( $category->name ); ?>
				</a>
			</div>
        <?php endforeach; ?>
	</div>

	<div>
		<div class="tw-text-white tw-text-[28px] tw-font-semibold tw-mb-6">
			Archive
		</div>

        <?php
			wp_get_archives( array(
				'type' => 'monthly',
				'format' => 'custom',
				'before' => '<div>',
				'after' => '</div>',
				'limit' => 12
			));
		?>
	</div>
</div>
