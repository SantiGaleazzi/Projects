<?php 
/*One Column Fields*/
	global $blocksBreakpoints;
    $block_number = get_row_index();
    $custom_blocks_one_column_full_screen                = get_sub_field('custom_blocks_one_column_full_screen');
    $custom_blocks_one_column_full_screen_on             = ($custom_blocks_one_column_full_screen === true) ? 'full-screen' : '' ;
    $custom_blocks_one_column_vertical_alignment         = get_sub_field('custom_blocks_one_column_vertical_alignment');
    $custom_blocks_one_column_block_height_small_screen  = checkNumber(get_sub_field('custom_blocks_one_column_block_height_small_screen'));
    $custom_blocks_one_column_block_height_medium_screen = checkNumber(get_sub_field('custom_blocks_one_column_block_height_medium_screen'));
    $custom_blocks_one_column_block_height_large_screen  = checkNumber(get_sub_field('custom_blocks_one_column_block_height_large_screen'));
    $custom_blocks_one_column_background_color           = get_sub_field('custom_blocks_one_column_background_color');
    $custom_blocks_one_column_background_image           = get_sub_field('custom_blocks_one_column_background_image');
    $custom_blocks_one_column_display_image_on_mobile    = get_sub_field('custom_blocks_one_column_display_image_on_mobile');
    $custom_blocks_one_column_video_type                 = get_sub_field('custom_blocks_one_column_video_type');
    $custom_blocks_one_column_video_id                   = get_sub_field('custom_blocks_one_column_video_id');
    $custom_blocks_one_column_font_color                 = get_sub_field('custom_blocks_one_column_font_color');
    $custom_blocks_one_column_content                    = get_sub_field('custom_blocks_one_column_content');
?>

<style>
    .oneColumns__wrap--<?= $block_number; ?>{
        padding: 30px 16px;
        background-position: top center;
        background-size: cover;
        margin-left: -1px;
        height: auto;
        <?php
            if(
                $custom_blocks_one_column_video_type == "none"
                || !isset($custom_blocks_one_column_video_type)
                || isIosDevices()
            ):
        ?>
            background-image: url(<?= $custom_blocks_one_column_background_image ?>);
            background-color: <?= $custom_blocks_one_column_background_color?>;
        <?php
            endif;
        ?>
    }

    body #content-page .oneColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) *:not(a),
    body .oneColumns__wrap--<?= $block_number; ?> .cb-flex-container-y{
        color: <?= $custom_blocks_one_column_font_color; ?>;
    }

    body #content-page .oneColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) a *{
        color: inherit;
    }

    body #content-page .oneColumns__wrap--<?= $block_number; ?> .wp-caption{
        background-color: inherit;
        color: <?= $custom_blocks_one_column_font_color; ?>;
    }

    <?php if ($custom_blocks_one_column_display_image_on_mobile): ?>
        @media screen and (max-width: 640px) {
            .oneColumns__wrap--<?= $block_number; ?>{
                background-image: none;
            }
        }
    <?php endif; ?>

    <?php
        //Small styles
        if (
            isset($custom_blocks_one_column_block_height_small_screen)
            && $custom_blocks_one_column_block_height_small_screen >= 0
            && $custom_blocks_one_column_full_screen !== true
        ) :
    ?>
            @media only screen and (min-width: <?= $blocksBreakpoints['small']; ?>px) {
                .oneColumns__wrap--<?= $block_number; ?>{
                    height: <?= ($custom_blocks_one_column_block_height_small_screen == 0) ? 'auto' : $custom_blocks_one_column_block_height_small_screen.'px' ; ?>;
                }
            }
    <?php
        endif;

        //Medium styles
        if (
            isset($custom_blocks_one_column_block_height_medium_screen)
            && $custom_blocks_one_column_block_height_medium_screen >= 0
            && $custom_blocks_one_column_full_screen !== true
        ) :
    ?>
            @media only screen and (min-width: <?= $blocksBreakpoints['medium']; ?>px) {
                .oneColumns__wrap--<?= $block_number; ?>{
                    height: <?= ($custom_blocks_one_column_block_height_medium_screen == 0) ? 'auto' : $custom_blocks_one_column_block_height_medium_screen.'px' ; ?>;
                }
            }
    <?php
        endif;

        //Large styles
        if (
            isset($custom_blocks_one_column_block_height_large_screen)
            && $custom_blocks_one_column_block_height_large_screen >= 0
            && $custom_blocks_one_column_full_screen !== true
        ) :
    ?>
        @media only screen and (min-width: <?= $blocksBreakpoints['large']; ?>px) {
            .oneColumns__wrap--<?= $block_number; ?>{
                height: <?= ($custom_blocks_one_column_block_height_large_screen == 0) ? 'auto' : $custom_blocks_one_column_block_height_large_screen.'px'; ?>;
            }
        }
    <?php
        endif;
    ?>
</style>

<div class="videoWrap <?= $custom_blocks_one_column_full_screen_on; ?> oneColumns__wrap--<?= $block_number; ?>">
	<div class="cb-video-container cb-padding-x">
		<div class="cb-flex-container-y <?= $custom_blocks_one_column_vertical_alignment; ?>">
		    <div>
                <?= $custom_blocks_one_column_content; ?>
            </div>
		</div>
	</div>
	<?php
		if (
			$custom_blocks_one_column_video_type === 'youtube'
			&& ! isIosDevices()
		) {

			echo '<iframe id="player-video-' . $block_number . '" class="cb-fullvid cb-fullvidYoutube" width="1280" height="720" src="https://www.youtube.com/embed/' . $custom_blocks_one_column_video_id . '?enablejsapi=1&hd=1&modestbranding=1&iv_load_policy=3&loop=1&rel=0&showinfo=0&autoplay=1&controls=0&mute=1;" allow="autoplay;" frameborder="0" allowfullscreen></iframe>';
		}

		if (
			$custom_blocks_one_column_video_type === 'vimeo'
			&& ! isIosDevices()
		) {
			echo '<iframe class="cb-fullvid" width="1280" height="720" src="https://player.vimeo.com/video/' . $custom_blocks_one_column_video_id . '?loop=1&autoplay=1&background=1&muted=1&autopause=0" allow="autoplay;" frameborder="0" allowfullscreen></iframe>';
		}
	?>
</div>