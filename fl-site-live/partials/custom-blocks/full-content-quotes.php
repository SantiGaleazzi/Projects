<?php
/*Two Columns Fields*/
    global $blocksBreakpoints;
    $block_number = get_row_index();
    $custom_blocks_quotes                     = get_sub_field('custom_blocks_quotes');
    $custom_blocks_quotes_on                  = ($custom_blocks_quotes === true) ? 'full-screen' : '' ;
    $custom_blocks_quotes_vertical_alignment  = get_sub_field('custom_blocks_quotes_vertical_alignment');
    $custom_blocks_quotes_background_color    = get_sub_field('custom_blocks_quotes_background_color');
    $custom_blocks_quotes_background_image    = get_sub_field('custom_blocks_quotes_background_image');
    $custom_blocks_quotes_display_image_on_mobile = get_sub_field('custom_blocks_quotes_display_image_on_mobile');
    $custom_blocks_quotes_font_color          = get_sub_field('custom_blocks_quotes_font_color');
    $custom_blocks_quotes_title               = get_sub_field('custom_blocks_quotes_title');
    $custom_blocks_quotes_description         = get_sub_field('custom_blocks_quotes_description');
?>

<style>
    .twoColumns__wrap--<?= $block_number; ?>{
        padding: 30px 16px;
        background-position: top center;
        background-size: cover;
        margin-left: -1px;
        height: auto;
        background-image: url(<?= $custom_blocks_quotes_background_image ?>);
        background-color: <?= $custom_blocks_quotes_background_color?>;
    }

    body #content-page .twoColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) *:not(a),
    .custom_blocks_quotes{
        color: <?= $custom_blocks_quotes_font_color; ?>;
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

    <?php if ($custom_blocks_quotes_display_image_on_mobile): ?>
        @media screen and (max-width: 640px) {
            .twoColumns__wrap--<?= $block_number; ?>{
                background-image: none;
            }
        }
    <?php endif; ?>

</style>

<div class="cb-videoWrap twoColumns__wrap--<?php echo $block_number; ?> <?= $custom_blocks_quotes_on; ?>">
    <div class="cb-video-container">
        <div class="custom_blocks_quotes <?= $custom_blocks_quotes_vertical_alignment; ?>">
            <h1 class="text-5xl sm:text-6xl text-center font-antonio font-bold w-full custom_blocks_quotes_title py-2 sm:py-1 leading-none sm:leading-tight mt-16"><?= $custom_blocks_quotes_title; ?></h1>
            <div class="my-16 custom_blocks_quotes_description"><?= $custom_blocks_quotes_description; ?></div>
            <?php if (have_rows('custom_blocks_quotes_quote')):
                     while (have_rows('custom_blocks_quotes_quote')): the_row();
                        $custom_blocks_quotes_quote_name = get_sub_field('custom_blocks_quotes_quote_name');
                        $custom_blocks_quotes_quote_label = get_sub_field('custom_blocks_quotes_quote_label');
                        $custom_blocks_quotes_quote_body_copy = get_sub_field('custom_blocks_quotes_quote_body_copy');
            ?>
                   <div class="sm:flex justify-between items-start mx-auto mb-10 box-quote">
                        <div class="text-center">
                            <?php if (get_sub_field('custom_blocks_quotes_quote_image')): ?>
                                <img src="<?php the_sub_field('custom_blocks_quotes_quote_image'); ?>" alt="<?= $custom_blocks_quotes_quote_name; ?>" class="custom_blocks_quotes_quote_image m-auto sm:m-0" />
                            <?php endif ?>                            
                        </div>
                        <?php if ($custom_blocks_quotes_quote_body_copy): ?>
                            <div class="custom_blocks_quotes_quote_body_copy bg-no-repeat bg-auto pl-6 pt-2 sm:pt-0 mt-4 sm:mt-0">
                                <img src="<?= bloginfo('template_url')?>/assets/images/home-images/quote-icon.png" alt="Quotes">
                                <div class="mt-4"><?= $custom_blocks_quotes_quote_body_copy; ?></div>
                                <div class="mt-4 font-thin leading-tight italic">
                                    <?php if ($custom_blocks_quotes_quote_name): ?>
                                        <span>&horbar; <?= $custom_blocks_quotes_quote_name; ?></span>, 
                                    <?php endif; ?>
                                    <?php if ($custom_blocks_quotes_quote_label): ?>
                                        <span><?= $custom_blocks_quotes_quote_label;?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                   </div>
                <?php endwhile; 
             endif; ?>
        </div>
    </div>
</div>



