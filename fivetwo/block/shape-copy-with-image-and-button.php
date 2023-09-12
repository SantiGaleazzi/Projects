<?php
    $image       = get_field('image');
    $title       = get_field('title'); 
    $copy        = get_field('copy'); 
    $button      = get_field('button'); 
    $block_id    = get_field('block_id');
?>
<section id="<?= $block_id; ?>" class="shape-copy-image-section">
    <div class="faith-work-container">
        <div class="shape-copy-image-container <?php if($image){ echo ("shape-copy-image-margin"); } ?>">
            <?php 
                if($title){
                    ?>
                        <h2><?= $title; ?></h2>
                    <?php
                }
            ?>
            <div class="shape-copy-image-flex">
                <?php 
                    if($image){
                        ?>
                            <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" />
                        <?php
                    }
                ?>
                <div>
                    <?php 
                        if($copy){
                            ?>
                                <div><?= $copy; ?></div>
                            <?php
                        }
                    ?>
                    <?php if ($button): ?>
                        <div class="copy-button-slider-pink-button open-faith-work-lightbox"><?= $button; ?></div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</section>