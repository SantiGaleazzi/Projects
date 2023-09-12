<?php
/*Two Columns Fields*/
    global $blocksBreakpoints;
    $block_number = get_row_index();
    $custom_blocks_two_columns_full_screen_with_numeration                = get_sub_field('custom_blocks_two_columns_full_screen_with_numeration');
    $custom_blocks_two_columns_full_screen_with_numeration_on              = ($custom_blocks_two_columns_full_screen_with_numeration === true) ? 'full-screen' : '' ;
    $custom_blocks_two_columns_vertical_alignment_with_numeration         = get_sub_field('custom_blocks_two_columns_vertical_alignment_with_numeration');
    $custom_blocks_two_columns_background_color_with_numeration           = get_sub_field('custom_blocks_two_columns_background_color_with_numeration');
    $custom_blocks_two_column_background_image_with_numeration            = get_sub_field('custom_blocks_two_column_background_image_with_numeration');
    $custom_blocks_two_columns_with_numeration_display_image_on_mobile    = get_sub_field('custom_blocks_two_columns_with_numeration_display_image_on_mobile');
    $custom_blocks_two_column_video_type_with_numeration                  = get_sub_field('custom_blocks_two_column_video_type_with_numeration');
    $custom_blocks_two_column_video_id_with_numeration                    = get_sub_field('custom_blocks_two_column_video_id_with_numeration');
    $custom_blocks_two_columns_font_color_with_numeration                 = get_sub_field('custom_blocks_two_columns_font_color_with_numeration');
    $custom_blocks_two_columns_title_with_numeration                      = get_sub_field('custom_blocks_two_columns_title_with_numeration');
    $custom_blocks_two_columns_content_left_with_numeration               = get_sub_field('custom_blocks_two_columns_content_left_with_numeration');
?>

<style>
    .twoColumns__wrap--<?= $block_number; ?>{
        padding: 30px 16px;
        background-position: top center;
        background-size: cover;
        margin-left: -1px;
        height: auto;
    }

    .custom_blocks_two_columns_with_numeration-<?= $block_number; ?>{
        background-position: center;
        background-size: contain;
        background-repeat: no-repeat;
        <?php
            if(
                $custom_blocks_two_column_video_type_with_numeration == "none"
                || !isset($custom_blocks_two_column_video_type_with_numeration)
                || isIosDevices()
            ):
        ?>
            background-image: url(<?= $custom_blocks_two_column_background_image_with_numeration ?>);
            background-color: <?= $custom_blocks_two_columns_background_color_with_numeration?>;
        <?php
            endif;
        ?>
    }

    @media only screen and (min-width: 800px){
        .scrollTop{
            margin-top: 120px;
            transition: all .7s;
        }
    }

    <?php if ($custom_blocks_two_columns_with_numeration_display_image_on_mobile): ?>
        @media screen and (max-width: 640px) {
            .custom_blocks_two_columns_with_numeration-<?= $block_number; ?>{
                background-image: none;
            }
        }
    <?php endif; ?>

    body #content-page .twoColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) *:not(a){
        color: <?= $custom_blocks_two_columns_font_color_with_numeration; ?>;
    }
    body #content-page .twoColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) a *{
        color: inherit;
    }
    body #content-page .twoColumns__wrap--<?= $block_number; ?> .wp-caption{
        background-color: inherit;
    }

    @media only screen and (max-width: <?= $blocksBreakpoints['medium']; ?>px) {
        .twoColumns__wrap--<?= $block_number; ?> .twoColumns__row{
            display: flex;
            flex-direction: column;
        }
    }

</style>

<div class="cb-videoWrap twoColumns__wrap--<?php echo $block_number; ?> <?= $custom_blocks_two_columns_full_screen_with_numeration_on; ?>">
    <div class="cb-video-container container custom_blocks_two_columns_with_numeration-<?= $block_number; ?> custom_blocks_two_columns_with_numeration pb-10">
        <div class="leading-tight mb-16 sm:mb-24 wow fadeInUp px-4 sm:px-0">
            <?php echo $custom_blocks_two_columns_title_with_numeration; ?>
        </div>
        <div class="cb-flex-container-x <?= $custom_blocks_two_columns_vertical_alignment_with_numeration; ?>">            
            <div class="px-6 w-full sm:w-auto custom_blocks_two_columns_content_left_with_numeration wow fadeInUp"> 
                <?php echo $custom_blocks_two_columns_content_left_with_numeration; ?>        
            </div>
            <div class="px-6 pt-6 sm:pt-0 w-full sm:w-auto custom_blocks_two_columns_content_right_with_numeration scrollTop">
                <?php 
                    if (have_rows('custom_blocks_two_columns_content_right_with_numeration')): $count = 1; $delay = 5;
                     while (have_rows('custom_blocks_two_columns_content_right_with_numeration')): the_row(); 
                        $custom_blocks_two_columns_content_right_box_with_numeration = get_sub_field('custom_blocks_two_columns_content_right_box_with_numeration');
                ?>
                        <div class="flex items-center mt-2 justify-end wow fadeInUp" data-wow-delay=".<?= $delay;?>s">
                            <div class="text-yellow-900 font-normal text-4xl my-0 sm:text-5xl m-0 mr-6 "><?= $count; ?></div>
                            <div class="bg-gray-900 text-white py-4 px-5 rounded-md w-10/12 sm:max-w-xs sm:text-sm custom_blocks_two_columns_content_right_box_with_numeration">
                                <?= $custom_blocks_two_columns_content_right_box_with_numeration; ?>
                            </div>
                        </div>
                    <?php $count++; $delay+2; endwhile;
                endif; ?>
            </div>
        </div>
    </div>
    <?php
        if (
            $custom_blocks_two_column_video_type_with_numeration === 'youtube'
            && ! isIosDevices()
        ) {

            echo '<iframe id="player-video-' . $block_number . '" class="cb-fullvid cb-fullvidYoutube" width="1280" height="720" src="https://www.youtube.com/embed/' . $custom_blocks_two_column_video_id_with_numeration . '?enablejsapi=1&hd=1&modestbranding=1&iv_load_policy=3&loop=1&rel=0&showinfo=0&autoplay=1&controls=0&mute=1;" allow="autoplay;" frameborder="0" allowfullscreen></iframe>';
        }

        if (
            $custom_blocks_two_column_video_type_with_numeration === 'vimeo'
            && ! isIosDevices()
        ) {
            echo '<iframe class="fullvid" width="1280" height="720" src="https://player.vimeo.com/video/' . $custom_blocks_two_column_video_id_with_numeration . '?loop=1&autoplay=1&background=1&muted=1&autopause=0" allow="autoplay;" frameborder="0" allowfullscreen></iframe>';
        }
    ?>
</div>


