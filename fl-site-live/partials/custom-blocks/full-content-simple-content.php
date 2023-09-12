<?php 
/*One Column Fields*/
	global $blocksBreakpoints;
    $block_number = get_row_index();
    $simple_content_full_screen       = get_sub_field('simple_content_full_screen');
    $simple_content_full_screen_on    = ($simple_content_full_screen === true) ? 'full-screen' : '' ;
    $simple_content_background_color  = get_sub_field('simple_content_background_color');
    $simple_content_background_image  = get_sub_field('simple_content_background_image');
    $simple_content_display_image_on_mobile = get_sub_field('simple_content_display_image_on_mobile');
    $simple_content_font_color        = get_sub_field('simple_content_font_color');
    $simple_content_column_content    = get_sub_field('simple_content_column_content');
?>

<style>
    .oneColumns__wrap--<?= $block_number; ?>{
        padding: 30px 16px;
        background-position: top center;
        background-size: cover;
        margin-left: -1px;
        height: auto;
        background-image: url(<?= $simple_content_background_image ?>);
        background-color: <?= $simple_content_background_color?>;
    }

    body #content-page .oneColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) *:not(a),
    body .oneColumns__wrap--<?= $block_number; ?> .simple_content_column_content{
        color: <?= $simple_content_font_color; ?>;
    }

    body #content-page .oneColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) a *{
        color: inherit;
    }

    body #content-page .oneColumns__wrap--<?= $block_number; ?> .wp-caption{
        background-color: inherit;
    }    

    <?php if ($simple_content_display_image_on_mobile): ?>
        @media screen and (max-width: 640px) {
            .oneColumns__wrap--<?= $block_number; ?>{
                background-image: none;
            }
        }
    <?php endif; ?>

</style>

<div class="cb-videoWrap <?= $simple_content_full_screen_on; ?> oneColumns__wrap--<?= $block_number; ?>">
	<div class="container">
		<div class="cb-margin-x simple_content_column_content px-6 sm:px-0">
		    <?= $simple_content_column_content; ?>
		</div>
	</div>
</div>