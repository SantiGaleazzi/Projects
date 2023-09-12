<?php

    $background     = get_field('background_main_banner');
    $title          = get_field('title_main_banner');
    $subtitle       = get_field('subtitle_main_banner');
    $contact_us     = get_field('contact_us_main_banner');
    $image          = get_field('image_main_banner');
    $button_quiz    = get_field('button_quiz_main_banner');
    $button         = get_field('button_main_banner');

    $hostingVideo   = get_field('video_main_banner');

    if ( $hostingVideo == 'youtube' ) {

        $video = get_field('id_youtube_main_banner');

    } else {

        $video = get_field('id_vimeo_main_banner');

    }
?>
    <div class="hero banner h100" style="background-image: url(<?= $background; ?>);">
        <div class="grid-container h100">
            <div class="grid-x grid-margin-x align-middle h100">
                <div class="cell large-7 text-center large-text-left">
                    <?php if ($title): ?>
                        <h1 class="hero__title"><?= $title; ?></h1>
                    <?php endif ?>

                    <?php if ($subtitle): ?>
                        <h3 class="hero__subtitle"><?= $subtitle; ?></h3>
                    <?php endif ?>

                    <?php if ($contact_us) : ?>
                        <span class="hero__button button green" data-open="contactUsModal">CONTACT FIVE TWO</span>
                    <?php endif ?>

                    <?php if ($button_quiz) : ?>
                        <span data-open="quizModal" class="hero__button button green">TAKE A QUICK QUIZ</span>
                    <?php endif; ?>

                    <?php if ($button):
                        $button_url = $button['url'];
                        $button_title = $button['title'];
                        $button_target = $button['target'] ? $button['target'] : '_self';
                        ?>
                            <a href="<?= esc_url($button_url); ?>" target="<?= esc_attr($button_target); ?>" class="hero__button button red"><?= esc_html($button_title); ?></a>
                    <?php endif; ?>

                    <?php if ( !empty($image) ): ?>
                        <div class="hero__video">
                            <img class="watch-video <?= $hostingVideo; ?>" data-open="videoModal" src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" />
                        </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>

    <div class="reveal" id="videoModal" data-reveal>
    <div class="responsive-embed">
        <?php if ( $video ): ?>
            <div id="player" data-id="<?= $video; ?>"></div>
        <?php endif ?>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
