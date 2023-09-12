<?php
    $title          = get_field('title_strategy');
    $subtitle       = get_field('subtitle_strategy');
    $description    = get_field('description_strategy');
?>

<!-- STRATEGY -->
<div class="strategy">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell large-11">
                <div class="grid-x">
                    <div class="cell large-10">
                        <?php if ($subtitle): ?>
                            <h6 class="subtitle"><?php echo $subtitle; ?></h6>
                        <?php endif ?>

                        <?php if ($title): ?>
                            <h2 class="title"><?php echo $title; ?></h2>
                        <?php endif ?>

                        <?php if ($description): ?>
                            <?php echo $description; ?>
                        <?php endif ?>
                    </div>
                </div>
                <?php if( have_rows('row_strategy') ): ?>
                    <?php while( have_rows('row_strategy') ): the_row();
                        $icon       = get_sub_field('icon_row_strategy');
                        $title      = get_sub_field('title_row_strategy');
                        $summary    = get_sub_field('summary_row_strategy');
                        ?>
                        <div class="grid-x strategy__row">
                            <?php if ( !empty($icon) ): ?>
                            <div class="cell large-2 text-center large-text-right">
                                <img class="strategy__icon" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>" />
                            </div>
                            <?php endif ?>
                            <div class="cell large-10">
                                <?php if ($title): ?>
                                    <h4 class="title"><?php echo $title; ?></h4>
                                <?php endif ?>

                                <?php if ($summary): ?>
                                    <?php echo $summary; ?>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- /STRATEGY -->
