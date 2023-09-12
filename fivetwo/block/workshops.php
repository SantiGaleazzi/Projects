<?php
    $background     = get_field('background_workshops');
    $title          = get_field('title_workshops');
    $subtitle       = get_field('subtitle_workshops');
    $description    = get_field('description_workshops');
    $button         = get_field('button_workshops');
?>

<div class="workshops">
    <div class="grid-container h100">
        <div class="grid-x h100 align-middle">
            <div class="cell medium-6">
                <div class="flex-container flex-dir-column">
                    <?php if ($subtitle): ?>
                        <h6 class="workshops__subtitle subtitle"><?php echo $subtitle; ?></h6>
                    <?php endif ?>

                    <?php if ($title): ?>
                        <h5 class="workshops__title title"><?php echo $title; ?></h5>
                    <?php endif ?>

                    <?php if ($description): ?>
                        <?php echo $description; ?>
                    <?php endif ?>

                    <?php
                    if( $button ):
                        $button_url = $button['url'];
                        $button_title = $button['title'];
                        $button_target = $button['target'] ? $button['target'] : '_self';
                        ?>
                        <div class="workshops__button">
                            <a class="button" href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"><?php echo esc_html($button_title); ?></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
