<?php
/*Two Columns Fields*/
    global $blocksBreakpoints;
    $block_number = get_row_index();
    $custom_blocks_two_columns_full_screen                = get_sub_field('custom_blocks_two_columns_full_screen');
    $custom_blocks_two_columns_full_scree_on              = ($custom_blocks_two_columns_full_screen === true) ? 'full-screen' : '' ;
    $custom_blocks_two_columns_animation                  = get_sub_field('custom_blocks_two_columns_animation');
    $custom_blocks_two_columns_vertical_alignment         = get_sub_field('custom_blocks_two_columns_vertical_alignment');
    $custom_blocks_two_columns_block_height_small_screen  = checkNumber(get_sub_field('custom_blocks_two_columns_block_height_small_screen'));
    $custom_blocks_two_columns_block_height_medium_screen = checkNumber(get_sub_field('custom_blocks_two_columns_block_height_medium_screen'));
    $custom_blocks_two_columns_block_height_large_screen  = checkNumber(get_sub_field('custom_blocks_two_columns_block_height_large_screen'));
    $custom_blocks_two_columns_background_color           = get_sub_field('custom_blocks_two_columns_background_color');
    $custom_blocks_two_column_background_image            = get_sub_field('custom_blocks_two_column_background_image');
    $custom_blocks_two_columns_display_image_on_mobile    = get_sub_field('custom_blocks_two_columns_display_image_on_mobile');
    $custom_blocks_two_column_video_type                  = get_sub_field('custom_blocks_two_column_video_type');
    $custom_blocks_two_column_video_id                    = get_sub_field('custom_blocks_two_column_video_id');
    $custom_blocks_two_columns_font_color                 = get_sub_field('custom_blocks_two_columns_font_color');
    $custom_blocks_two_columns_content_left               = get_sub_field('custom_blocks_two_columns_content_left');
    $custom_blocks_two_columns_content_right              = get_sub_field('custom_blocks_two_columns_content_right');
    $custom_blocks_two_columns_content_left_order         = get_sub_field('custom_blocks_two_columns_content_left_order');
    $custom_blocks_two_columns_content_right_order        = get_sub_field('custom_blocks_two_columns_content_right_order');
?>

<style>
    .twoColumns__wrap--<?= $block_number; ?>{
        padding: 30px 16px;
        background-position: top center;
        background-size: cover;
        margin-left: -1px;
        height: auto;
        <?php
            if(
                $custom_blocks_two_column_video_type == "none"
                || !isset($custom_blocks_two_column_video_type)
                || isIosDevices()
            ):
        ?>
            background-image: url(<?= $custom_blocks_two_column_background_image ?>);
            background-color: <?= $custom_blocks_two_columns_background_color?>;
        <?php
            endif;
        ?>
        color: <?= $custom_blocks_two_columns_font_color; ?>;
    }

    body #content-page .twoColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) *:not(a){
        color: <?= $custom_blocks_two_columns_font_color; ?>;
    }
    body #content-page .twoColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) a *{
        color: inherit;
    }
    body #content-page .twoColumns__wrap--<?= $block_number; ?> .wp-caption{
        background-color: inherit;
    }

    <?php if ($custom_blocks_two_columns_display_image_on_mobile): ?>
        @media screen and (max-width: 640px) {
            .twoColumns__wrap--<?= $block_number; ?>{
                background-image: none;
            }
        }
    <?php endif; ?>

    @media only screen and (max-width: <?= $blocksBreakpoints['medium']; ?>px) {
        .twoColumns__wrap--<?= $block_number; ?> .twoColumns__row{
            display: flex;
            flex-direction: column;
        }
        .twoColumns__wrap--<?= $block_number; ?> .twoColumns__mobileorder--<?= $custom_blocks_two_columns_content_left_order ?>{
            order: <?= $custom_blocks_two_columns_content_left_order ?>;
        }
        .twoColumns__wrap--<?= $block_number; ?> .twoColumns__mobileorder--<?= $custom_blocks_two_columns_content_right_order ?>{
            order: <?= $custom_blocks_two_columns_content_right_order ?>;
        }
    }

    <?php
        //Small styles
        if (
            isset($custom_blocks_two_columns_block_height_small_screen)
            && $custom_blocks_two_columns_block_height_small_screen >= 0
            && $custom_blocks_two_columns_full_screen !== true
        ) :
    ?>
            @media only screen and (min-width: <?= $blocksBreakpoints['small']; ?>px) {
                .twoColumns__wrap--<?= $block_number; ?>{
                    height: <?= ($custom_blocks_two_columns_block_height_small_screen == 0 ) ? 'auto' : $custom_blocks_two_columns_block_height_small_screen.'px' ; ?>;
                }
            }
    <?php
        endif;

        //Medium styles
        if (
            isset($custom_blocks_two_columns_block_height_medium_screen)
            && $custom_blocks_two_columns_block_height_medium_screen >= 0
            && $custom_blocks_two_columns_full_screen !== true
        ) :
    ?>
            @media only screen and (min-width: <?= $blocksBreakpoints['medium']; ?>px) {
                .twoColumns__wrap--<?= $block_number; ?>{
                    height: <?= ($custom_blocks_two_columns_block_height_medium_screen == 0) ? 'auto' : $custom_blocks_two_columns_block_height_medium_screen.'px' ; ?>;
                }
            }
    <?php
        endif;

        //Large styles
        if (
            isset($custom_blocks_two_columns_block_height_large_screen)
            && $custom_blocks_two_columns_block_height_large_screen >= 0
            && $custom_blocks_two_columns_full_screen !== true
        ) :
    ?>
            @media only screen and (min-width: <?= $blocksBreakpoints['large']; ?>px) {
                .twoColumns__wrap--<?= $block_number; ?>{
                    height: <?= ($custom_blocks_two_columns_block_height_large_screen == 0) ? 'auto' : $custom_blocks_two_columns_block_height_large_screen.'px'; ?>;
                }
            }
    <?php
        endif;
    ?>
</style>

<div class="cb-videoWrap twoColumns__wrap--<?php echo $block_number; ?> <?= $custom_blocks_two_columns_full_scree_on; ?>">
    <div class="cb-video-container flex">
        <div class="cb-flex-container-x <?= $custom_blocks_two_columns_vertical_alignment; ?>">            
            <div class="cb-w-50 <?php if($custom_blocks_two_columns_animation):?> wow fadeInUp <?php endif; ?> cb-padding-x twoColumns__mobileorder--<?= $custom_blocks_two_columns_content_left_order ?>"> 
                <?php echo $custom_blocks_two_columns_content_left; ?>        
            </div>
            <div class="cb-w-50 <?php if($custom_blocks_two_columns_animation):?> wow fadeInUp <?php endif; ?> cb-padding-x twoColumns__mobileorder--<?= $custom_blocks_two_columns_content_right_order ?>">
                <?php echo $custom_blocks_two_columns_content_right; ; ?>
            </div>
        </div>
    </div>
    <?php
        if (
            $custom_blocks_two_column_video_type === 'youtube'
            && ! isIosDevices()
        ) {

            echo '<iframe id="player-video-' . $block_number . '" class="cb-fullvid cb-fullvidYoutube" width="1280" height="720" src="https://www.youtube.com/embed/' . $custom_blocks_two_column_video_id . '?enablejsapi=1&hd=1&modestbranding=1&iv_load_policy=3&loop=1&rel=0&showinfo=0&autoplay=1&controls=0&mute=1;" allow="autoplay;" frameborder="0" allowfullscreen></iframe>';
        }

        if (
            $custom_blocks_two_column_video_type === 'vimeo'
            && ! isIosDevices()
        ) {
            echo '<iframe class="fullvid" width="1280" height="720" src="https://player.vimeo.com/video/' . $custom_blocks_two_column_video_id . '?loop=1&autoplay=1&background=1&muted=1&autopause=0" allow="autoplay;" frameborder="0" allowfullscreen></iframe>';
        }
    ?>
</div>