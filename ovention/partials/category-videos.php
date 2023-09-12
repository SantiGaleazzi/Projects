<div class="tw-px-8 tw-py-12 tw-bg-gray-800 tw-rounded-2xl tw-mx-auto category-sidebar ">
	<div>
		<div class="tw-text-white tw-text-[28px] tw-font-semibold tw-mb-6">
			Select an Oven
		</div>

        <div>
            <a class="tw-text-white hover:tw-text-white" href="<?= site_url(); ?>/videos/">
				All
			</a>
        </div>

        <?php

			$categories = get_categories( array(
              'taxonomy' => 'category-videos',
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
</div>
