<?php

	$ID = get_the_ID();
	$post_type = get_post_type();
	$section = get_current_nav_item();
	$loop_title = theme_loop_get_title();
	$breadcrumb = array(
		'home' => '<a class="tw-text-white tw-font-normal" href="' . get_home_url() .'">Home</a>',
	);

	if ( $section && $section->object_id && ($ID != $section->object_id) ) {

		$breadcrumb[$section->object_id] = '<a class="tw-text-white tw-font-normal" href="'.get_permalink($section->object_id).'">'.$section->title.'</a>';
		
	}

	$hasBanner = $thumbnail_id ? true : false;

	switch ( $post_type ) {
		case 'country':

			$hasBanner = false;
			$term = get_the_term($ID, 'region');
			if ($term && $term->slug && ($p = get_post_by_slug( $term->slug, 'page')))
			$breadcrumb[$term->slug] = '<a class="tw-text-white" href="'.get_permalink($p->ID).'">' . $p->post_title . '</a>';

		case 'page':
			$parents = get_post_ancestors($ID);
			foreach ( array_reverse($parents) as $pID ) {

				if ( !isset( $breadcrumb[ $pID ] ) ) {

					$breadcrumb[$pID] = '<a class="tw-text-white tw-font-normal" href="' . get_permalink( $pID ) . '">'. get_the_title( $pID ) . '</a>';
					
				}
			}
		break;
		case 'post':
			$breadcrumb['post'] = '<a class="tw-text-white tw-font-normal" href="/blog/">Blog</a>';
		break;
		default:
		break;
	}

	if ( $loop_title ) {

		$breadcrumb[$ID] = '<span class="page-name tw-font-bold">' . $loop_title . '</span>';

	}

?>

<section class="<?php if ( $hasBanner ) echo 'banner'; ?> tw-text-white tw-text-xs tw-px-5 tw-py-6 tw-bg-gradient-to-r tw-from-blue-500 tw-to-orange-500">
	<div class="tw-container">
		<?= implode('&nbsp; » &nbsp;', $breadcrumb ); ?>
	</div>
</section>
