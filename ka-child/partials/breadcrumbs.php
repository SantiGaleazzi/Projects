<?php

	global $post;
	$breadcrumbs = array();

	if ( !is_home() ) {

		$breadcrumbs['home'] = '<a class="tw-text-white tw-font-normal" href="' . get_home_url() . '">Home</a>';

		if ( $post->post_type === 'country') {
			
			$breadcrumbs['where-we-work'] = '<a class="tw-text-white tw-font-normal" href="/where-we-work/">Where We Work</a>';

		}
		
		if ( is_category() || is_single() ) {

			$post_terms = wp_get_post_terms( get_the_ID(), 'region', array( 'fields' => 'all' ) );

			$breadcrumbs['category'] = '<a class="tw-text-white tw-font-normal is-category" href="' . get_category_link( $post_terms[0]->term_id ) . '">' . $post_terms[0]->name . '</a>';

			if ( is_single() ) {

				$breadcrumbs['single'] = '<span class="page-name tw-font-bold is-single">' . get_the_title() . '</span>';

			}

		} elseif ( is_tax() ) {

			$term = get_queried_object();
			$filtered_post = get_post_by_slug( $term->slug, 'page' );

			$breadcrumbs['term_' . $term->slug] = '<span class="page-name tw-font-bold is-term">' . $filtered_post->post_title . '</span>';
			
		} elseif ( is_page() ) {

			if ( $post->post_parent) {
				
				$ancestors = get_post_ancestors( $post->ID );

				foreach ( $ancestors as $ancestor ) {

					if ( !isset( $breadcrumbs[$ancestors] ) ) {

						$breadcrumbs[$ancestor] = '<a class="tw-text-white tw-font-normal is-parent-page" href="' . get_permalink( $ancestor ) . '">' . get_the_title( $ancestor ) . '</a>';

					}

				}

				$breadcrumbs['page'] = '<span class="page-name tw-font-bold is-page">' . get_the_title() . '</span>';

			} else {

				$breadcrumbs['page'] = '<span class="page-name tw-font-bold">' . get_the_title() . '</span>';

			}

		}

	}

?>

<section class="tw-text-white tw-text-xs tw-px-5 tw-py-6 tw-bg-gradient-to-r tw-from-blue-500 tw-to-orange-500">
	<div class="tw-container">
		<?= implode('&nbsp; » &nbsp;', $breadcrumbs ); ?>
	</div>
</section>
