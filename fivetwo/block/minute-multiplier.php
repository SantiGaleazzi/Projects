<?php
    $background_color = get_field('background_color');
    $header_text = get_field('header_text');
    $sub_header_text = get_field('sub_header_text');
    $left_body_copy_text = get_field('left_body_copy_text');
    $right_body_copy_text = get_field('right_body_copy_text');
    $form_shortcode = get_field('form_shortcode');
?>

    <section class="banner-multiplier" style="background-color: <?= $background_color;?>; ">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell medium-6 banner-multiplier__margin-auto">
                    <?php if ($header_text): ?>
                        <h1 class="banner-multiplier__title"><?php echo $header_text;?></h1>
                    <?php endif ?>
                    <?php if ($sub_header_text): ?>
                        <p class="banner-multiplier__sub-header"><?php echo $sub_header_text;?></p>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </section>
    <section class="grid-container grid-x grid-padding-x align-center">
        <?php if ($left_body_copy_text): $colums = 4;
            if (empty($right_body_copy_text)) {
                $colums = 8;
            }
        ?>
            <div class="cell medium-12 large-<?= $colums; ?> copy-multiplier">
                <div class="banner-multiplier__margin-auto">
                    <div class="copy-multiplier__body-copy">
                        <?php echo $left_body_copy_text; ?>
                    </div>
                    <?php if ($form_shortcode): 
                        echo do_shortcode($form_shortcode);                    
                    endif; ?>                    
                </div>
            </div>
        <?php endif; ?>

        <?php if ($right_body_copy_text): ?>
            <div class="cell medium-12 large-8 copy-multiplier">
                <div class="banner-multiplier__margin-auto">                
                    <div class="copy-multiplier__right-body-copy">
                        <?php echo $right_body_copy_text; ?>
                    </div>               
                </div>
            </div>
         <?php endif; ?>

    </section>
