<?php
/*Two Columns Fields*/
    global $blocksBreakpoints;
    $block_number = get_row_index();
    $custom_blocks_two_columns_with_text                      = get_sub_field('custom_blocks_two_columns_with_text');
    $custom_blocks_two_columns_with_text_on                   = ($custom_blocks_two_columns_with_text === true) ? 'full-screen' : '' ;
    $custom_blocks_two_columns_with_text_vertical_alignment   = get_sub_field('custom_blocks_two_columns_with_text_vertical_alignment');
    $custom_blocks_two_columns_with_text_background_color     = get_sub_field('custom_blocks_two_columns_with_text_background_color');
    $custom_blocks_two_columns_with_text_background_image     = get_sub_field('custom_blocks_two_columns_with_text_background_image');
    $custom_blocks_two_columns_display_image_on_mobile        = get_sub_field('custom_blocks_two_columns_display_image_on_mobile');
    $custom_blocks_two_columns_with_text_font_color           = get_sub_field('custom_blocks_two_columns_with_text_font_color');
    $custom_blocks_two_columns_with_text_content_one          = get_sub_field('custom_blocks_two_columns_with_text_content_one');
    $custom_blocks_two_columns_with_text_position_content_one = get_sub_field('custom_blocks_two_columns_with_text_position_content_one');
    $custom_blocks_two_columns_with_text_content_two          = get_sub_field('custom_blocks_two_columns_with_text_content_two');
?>

<style>
    .twoColumns__wrap--<?= $block_number; ?>{
        padding: 30px 16px;
        background-position: top center;
        background-size: cover;
        margin-left: -1px;
        height: auto;
        background-image: url(<?= $custom_blocks_two_columns_with_text_background_image ?>);
        background-color: <?= $custom_blocks_two_columns_with_text_background_color?>;

    }

    body #content-page .twoColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) *:not(a){
        color: <?= $custom_blocks_two_columns_with_text_font_color; ?>;
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
        .twoColumns__wrap--<?= $block_number; ?> .twoColumns__mobileorder--<?= $custom_blocks_two_columns_with_text_content_one_order ?>{
            order: <?= $custom_blocks_two_columns_with_text_content_one_order ?>;
        }
        .twoColumns__wrap--<?= $block_number; ?> .twoColumns__mobileorder--<?= $custom_blocks_two_columns_with_text_content_two_order ?>{
            order: <?= $custom_blocks_two_columns_with_text_content_two_order ?>;
        }
    }

</style>

<div class="cb-videoWrap twoColumns__wrap--<?php echo $block_number; ?> <?= $custom_blocks_two_columns_with_text_on; ?>">
    <div class="cb-video-container">
        <div class="cb-flex-container-x <?= $custom_blocks_two_columns_with_text_vertical_alignment; ?>">
            <div class="cb-w-50 twoColumns__mobileorder--<?= $custom_blocks_two_columns_with_text_content_one_order ?>"> 
                <?php echo $custom_blocks_two_columns_with_text_content_one; ?>        
            </div>
            <div class="cb-w-50 twoColumns__mobileorder--<?= $custom_blocks_two_columns_with_text_content_two_order ?>">
                <?php echo $custom_blocks_two_columns_with_text_content_two; ; ?>
            </div>
        </div>
    </div>
</div>