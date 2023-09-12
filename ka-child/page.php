<?php

	if ( !isset($isWideColumn) ) add_body_class('single-column');

	get_header();
	the_post();
	$thumbnail_id = get_post_thumbnail_id();
	
	get_template_part('partials/breadcrumbs');

?>

<?php if ( $thumbnail_id ) : ?>
	<div id="banner">
		<h1 class="section-title"><?php the_title(); ?></h1>
	</div>
<?php endif; ?>

<div id="main" class="wrap">
<div id="content">

<?php if (!$thumbnail_id):?>
<h1 id="pagetitle"><?php the_title(); ?></h1>
<?php endif;
?>
<?php the_content();
do_action('content_post');

?>
</div></div>

<div class="section" id="bottom">
  <?php $HOMEPAGE_ID = page-id-4; ?>
  <h2><?php echo esc_html(get_post_meta($HOMEPAGE_ID, 'diff-feature-headline', true));?></h2>
  <div class="side-scroller">
    <div class="slides carousel">
      <?php


for($i=1;$i<=3;$i++):
	$html = get_post_meta($HOMEPAGE_ID, 'diff-feature-'.$i, true);
	$title = get_post_meta($HOMEPAGE_ID, 'diff-feature-title-'.$i, true);
	$icon = get_post_meta($HOMEPAGE_ID, 'diff-feature-icon-'.$i, true);
	$link = get_post_meta($HOMEPAGE_ID, 'diff-feature-link-'.$i, true);

?>
      <div class="slide box">
        <div class="round-icon <?php echo $icon;?>"></div>
        <h4><?php echo $title;?></h4>
        <p> <?php echo apply_filters('the_content', $html);?> </p>
        <p><a href="<?php echo $link;?>" class="button green"><?php echo $title;?></a></p>
      </div>
      <?php
endfor;
?>
    </div>
  </div>
</div>

<?php

	if ($thumbnail_id) {
		theme_print_banner_styles($thumbnail_id);
	}

	get_footer();
