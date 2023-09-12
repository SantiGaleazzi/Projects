<?php
/*Three Columns Fields*/
    global $blocksBreakpoints;
    $block_number = get_row_index();
    $custom_blocks_three_columns_full_screen                = get_sub_field('custom_blocks_three_columns_full_screen');
    $custom_blocks_three_columns_full_screen_on             = ($custom_blocks_three_columns_full_screen === true) ? 'full-screen' : '' ;
    $custom_blocks_three_columns_vertical_alignment         = get_sub_field('custom_blocks_three_columns_vertical_alignment');
    $custom_blocks_three_columns_block_height_small_screen  = checkNumber(get_sub_field('custom_blocks_three_columns_block_height_small_screen'));
    $custom_blocks_three_columns_block_height_medium_screen = checkNumber(get_sub_field('custom_blocks_three_columns_block_height_medium_screen'));
    $custom_blocks_three_columns_block_height_large_screen  = checkNumber(get_sub_field('custom_blocks_three_columns_block_height_large_screen'));
    $custom_blocks_three_columns_background_color           = get_sub_field('custom_blocks_three_columns_background_color');
    $custom_blocks_three_column_background_image            = get_sub_field('custom_blocks_three_column_background_image');
    $custom_blocks_three_columns_display_image_on_mobile    = get_sub_field('custom_blocks_three_columns_display_image_on_mobile');
    $custom_blocks_three_column_video_type                  = get_sub_field('custom_blocks_three_column_video_type');
    $custom_blocks_three_column_video_id                    = get_sub_field('custom_blocks_three_column_video_id');
    $custom_blocks_three_columns_font_color                 = get_sub_field('custom_blocks_three_columns_font_color');
    $custom_blocks_three_columns_content_left               = get_sub_field('custom_blocks_three_columns_content_left');
    $custom_blocks_three_columns_content_center             = get_sub_field('custom_blocks_three_columns_content_center');
    $custom_blocks_three_columns_content_right              = get_sub_field('custom_blocks_three_columns_content_right');
    $custom_blocks_three_columns_content_left_order         = get_sub_field('custom_blocks_three_columns_content_left_order');
    $custom_blocks_three_columns_content_center_order       = get_sub_field('custom_blocks_three_columns_content_center_order');
    $custom_blocks_three_columns_content_right_order        = get_sub_field('custom_blocks_three_columns_content_right_order');
?>

<style>
    .threeColumns__wrap--<?= $block_number; ?>{
        padding: 30px 16px;
        background-position: top center;
        background-size: cover;
        margin-left: -1px;
        height: auto;
        <?php
            if(
                $custom_blocks_three_column_video_type == "none"
                || !isset($custom_blocks_three_column_video_type )
                || isIosDevices()
            ):
        ?>
            background-image: url(<?= $custom_blocks_three_column_background_image ?>);
            background-color: <?= $custom_blocks_three_columns_background_color?>;
        <?php
            endif;
        ?>
    }

    body #content-page .threeColumns__wrap--<?php echo $block_number; ?> *:not([class^="ffz-"]) *:not(a){
        color: <?php echo $custom_blocks_three_columns_font_color; ?>;
    }
    body #content-page .threeColumns__wrap--<?php echo $block_number; ?> *:not([class^="ffz-"]) a *{
        color: inherit;
    }
    body #content-page .threeColumns__wrap--<?php echo $block_number; ?> .wp-caption{
        background-color: inherit;
    }

    <?php if ($custom_blocks_three_columns_display_image_on_mobile): ?>
        @media screen and (max-width: 640px) {
            .threeColumns__wrap--<?= $block_number; ?>{
                background-image: none;
            }
        }
    <?php endif; ?>

    @media only screen and (max-width: <?= $blocksBreakpoints['medium']; ?>px) {
        .threeColumns__wrap--<?= $block_number; ?> .threeColumns__row{
            display: flex;
            flex-direction: column;
        }
        .threeColumns__wrap--<?= $block_number; ?> .threeColumns__mobileorder--<?= $custom_blocks_three_columns_content_left_order ?>{
            order: <?= $custom_blocks_three_columns_content_left_order ?>;
        }
        .threeColumns__wrap--<?= $block_number; ?> .threeColumns__mobileorder--<?= $custom_blocks_three_columns_content_center_order ?>{
            order: <?= $custom_blocks_three_columns_content_center_order ?>;
        }
        .threeColumns__wrap--<?= $block_number; ?> .threeColumns__mobileorder--<?= $custom_blocks_three_columns_content_right_order ?>{
            order: <?= $custom_blocks_three_columns_content_right_order ?>;
        }
    }

    <?php
        //Small styles
        if (
            isset($custom_blocks_three_columns_block_height_small_screen)
            && $custom_blocks_three_columns_block_height_small_screen >= 0
            && $custom_blocks_three_columns_full_screen !== true
        ) :
    ?>
            @media only screen and (min-width: <?= $blocksBreakpoints['small']; ?>px) {
                .threeColumns__wrap--<?= $block_number; ?>{
                    height: <?= ($custom_blocks_three_columns_block_height_small_screen == 0) ? 'auto' : $custom_blocks_three_columns_block_height_small_screen.'px' ; ?>;
                }
            }
    <?php
        endif;

        //Medium styles
        if (
            isset($custom_blocks_three_columns_block_height_medium_screen)
            && $custom_blocks_three_columns_block_height_medium_screen >= 0
            && $custom_blocks_three_columns_full_screen !== true
        ) :
    ?>
            @media only screen and (min-width: <?= $blocksBreakpoints['medium']; ?>px) {
                .threeColumns__wrap--<?= $block_number; ?>{
                    height: <?= ($custom_blocks_three_columns_block_height_medium_screen == 0) ? 'auto' : $custom_blocks_three_columns_block_height_medium_screen.'px' ; ?>;
                }
            }
    <?php
        endif;

        //Large styles
        if (
            isset($custom_blocks_three_columns_block_height_large_screen)
            && $custom_blocks_three_columns_block_height_large_screen >= 0
            && $custom_blocks_three_columns_full_screen !== true
        ) :
    ?>
            @media only screen and (min-width: <?= $blocksBreakpoints['large']; ?>px) {
                .threeColumns__wrap--<?= $block_number; ?>{
                    height: <?= ($custom_blocks_three_columns_block_height_large_screen == 0) ? 'auto' : $custom_blocks_three_columns_block_height_large_screen.'px' ; ?>;
                }
            }
    <?php
        endif;
    ?>
</style>

<div class="cb-videoWrap <?= $custom_blocks_three_columns_full_screen_on; ?> threeColumns__wrap--<?php echo $block_number; ?>">
    <div class="cb-video-container cb-padding-x">
       <div class="cb-flex-container-x cb-margin-x <?= $custom_blocks_three_columns_vertical_alignment; ?>">
           <div class="cb-w-33 threeColumns__mobileorder--<?= $custom_blocks_three_columns_content_left_order ?>">
               <?php echo $custom_blocks_three_columns_content_left; ?>
           </div>
           <div class="cb-w-33 threeColumns__mobileorder--<?= $custom_blocks_three_columns_content_center_order ?>">
               <?php echo $custom_blocks_three_columns_content_center;  ?>
           </div>
           <div class="cb-w-33 threeColumns__mobileorder--<?= $custom_blocks_three_columns_content_right_order ?>">
               <?php echo $custom_blocks_three_columns_content_right; ?>
           </div>
       </div> 
    </div>
    <?php
        if (
            $custom_blocks_three_column_video_type === 'youtube'
            && ! isIosDevices()
        ) {

            echo '<iframe id="player-video-' . $block_number . '" class="cb-fullvid cb-fullvidYoutube" width="1280" height="720" src="https://www.youtube.com/embed/' . $custom_blocks_three_column_video_id . '?enablejsapi=1&hd=1&modestbranding=1&iv_load_policy=3&loop=1&rel=0&showinfo=0&autoplay=1&controls=0&mute=1;" allow="autoplay;" frameborder="0" allowfullscreen></iframe>';
        }

        if (
            $custom_blocks_three_column_video_type === 'vimeo'
            && ! isIosDevices()
        ) {
            echo '<iframe class="fullvid" width="1280" height="720" src="https://player.vimeo.com/video/' . $custom_blocks_three_column_video_id . '?loop=1&autoplay=1&background=1&muted=1&autopause=0" allow="autoplay;" frameborder="0" allowfullscreen></iframe>';
        }
    ?>
</div>