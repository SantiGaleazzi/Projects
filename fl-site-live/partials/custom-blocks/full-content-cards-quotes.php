<?php
/*Two Columns Fields*/
    global $blocksBreakpoints;
    $block_number = get_row_index();
    $custom_blocks_cards_quotes_full                = get_sub_field('custom_blocks_cards_quotes_full');
    $custom_blocks_cards_quotes_full_on             = ($custom_blocks_cards_quotes_full === true) ? 'full-screen' : '' ;
    $custom_blocks_cards_quotes_vertical_alignment  = get_sub_field('custom_blocks_cards_quotes_vertical_alignment');
    $custom_blocks_cards_quotes_background_color    = get_sub_field('custom_blocks_cards_quotes_background_color');
    $custom_blocks_cards_quotes_background_image    = get_sub_field('custom_blocks_cards_quotes_background_image');
    $custom_blocks_cards_quotes_display_image_on_mobile = get_sub_field('custom_blocks_cards_quotes_display_image_on_mobile');
    $custom_blocks_cards_quotes_font_color          = get_sub_field('custom_blocks_cards_quotes_font_color');
    $custom_blocks_cards_quotes_title               = get_sub_field('custom_blocks_cards_quotes_title');
    $custom_blocks_quotes_description         = get_sub_field('custom_blocks_quotes_description');
?>

<style>
    .twoColumns__wrap--<?= $block_number; ?>{
        padding: 30px 16px;
        background-position: top center;
        background-size: cover;
        margin-left: -1px;
        height: auto;
        background-image: url(<?= $custom_blocks_cards_quotes_background_image ?>);
        background-color: <?= $custom_blocks_cards_quotes_background_color?>;
    }

    body #content-page .twoColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) *:not(a),
    .custom_blocks_quotes{
        color: <?= $custom_blocks_cards_quotes_font_color; ?>;
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

    <?php if ($custom_blocks_cards_quotes_display_image_on_mobile): ?>
        @media screen and (max-width: 640px) {
            .twoColumns__wrap--<?= $block_number; ?>{
                background-image: none;
            }
        }
    <?php endif; ?>

</style>

<div class="cb-videoWrap twoColumns__wrap--<?php echo $block_number; ?> <?= $custom_blocks_cards_quotes_full_on; ?>">
    <div class="cb-video-container">
        <div class="custom_blocks_quotes <?= $custom_blocks_cards_quotes_vertical_alignment; ?>">
            <?php if ($custom_blocks_cards_quotes_title): ?>
                <h1 class="text-5xl sm:text-6xl text-center font-antonio font-bold w-full custom_blocks_cards_quotes_title py-2 sm:py-1 leading-none sm:leading-tight mt-16"><?= $custom_blocks_cards_quotes_title; ?></h1>
            <?php endif; ?>            
            <div class="flex flex-wrap justify-center">
                <?php if (have_rows('custom_blocks_cards_quotes_cards')):
                         while (have_rows('custom_blocks_cards_quotes_cards')): the_row();
                            $custom_blocks_cards_quotes_cards_image = get_sub_field('custom_blocks_cards_quotes_cards_image');
                            $custom_blocks_cards_quotes_cards_content = get_sub_field('custom_blocks_cards_quotes_cards_content');
                            $custom_blocks_cards_quotes_cards_show_quote_icon = get_sub_field('custom_blocks_cards_quotes_cards_show_quote_icon');
                ?>
                       <div class="card-quote mb-4 sm:m-2">
                            <?php if (get_sub_field('custom_blocks_cards_quotes_cards_image')): ?>
                                <div class="image-quote bg-center bg-cover bg-no-repeat" style="background-image: url(<?php echo esc_url($custom_blocks_cards_quotes_cards_image['url']); ?>);"></div>
                            <?php endif; ?>      
                            <?php if ($custom_blocks_cards_quotes_cards_content): ?>
                                <div class="px-6 py-6 font-oswald text-lg <?php if($custom_blocks_cards_quotes_cards_show_quote_icon):?> custom_blocks_cards_quotes_cards_content <?php endif; ?>">
                                    <?= $custom_blocks_cards_quotes_cards_content; ?>
                                </div>
                            <?php endif; ?>
                       </div>
                    <?php endwhile; 
                 endif; ?>
            </div>
        </div>
    </div>
</div>



