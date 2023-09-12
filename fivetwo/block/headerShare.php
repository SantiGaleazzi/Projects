<?php
    $title      = get_field('title_header_share');
    $subtitle   = get_field('subtitle_header_share');
?>
<!-- <div class="grid-container full">
    <div class="grid-x">
        <div class="cell large-9"> -->
            <div class="full__header flex-container flex-dir-column medium-flex-dir-row align-justify medium-align-middle">
                <div>
                    <?php if ($subtitle): ?>
                        <h6 class="subtitle"><?php echo $subtitle; ?></h6>
                    <?php endif ?>
                    <?php if ($title): ?>
                        <h2 class="title"><?php echo $title; ?></h2>
                    <?php endif ?>
                </div>
                <div class="flex-container flex-dir-row align-right">
                    <div class="full__share flex-container flex-dir-row align-spaced">
                        <strong>Share on:</strong>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>

                        <a href="https://twitter.com/home?status=<?php echo get_the_title(); ?>%0A<?php echo get_permalink(); ?>" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </div>
                </div>
            </div>
        <!-- </div>
    </div>
</div> -->