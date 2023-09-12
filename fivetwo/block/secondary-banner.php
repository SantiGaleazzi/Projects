<?php
    $background     = get_field('background_secondary_banner');
    $title          = get_field('title_secondary_banner');
    $medium         = get_field('medium_header_secondary_banner');
    $subtitle       = get_field('subtitle_secondary_banner');
    $script         = get_field('script_secondary_banner');
    $description    = get_field('description_secondary_banner');
    $button_quiz    = get_field('button_quiz_secondary_banner');
    $button         = get_field('button_secondary_banner');
    $startNew       = get_field('start_new_secondary_banner');
    $startNewLogo   = get_field('start_new_logo');
    $videoImg       = get_field('video_image_secondary_banner');
    $videoId        = get_field('video_id_secondary_banner');

    $hostingVideo   = get_field('video_secondary_banner');
    if ($hostingVideo == 'youtube') {
        $video  = get_field('id_youtube_secondary_banner');
    } else {
        $video  = get_field('id_vimeo_secondary_banner');
    }
?>
<div class="secondaryBanner banner h100" style="background-image: url(<?php echo $background; ?>);">
    <div class="grid-container h100 relative">
        <div class="grid-x grid-margin-x align-middle h100">
            <div class="cell large-7 text-center medium-text-left">
                <?php if ($subtitle): ?>
                    <h5 class="secondaryBanner__subtitle subtitle"><?php echo $subtitle; ?></h5>
                <?php endif ?>

                <?php if ($medium): ?>
                    <div class="secondaryBanner__medium subtitle"><?php echo $medium; ?></div>
                <?php endif ?>

                <?php if ($title): ?>
                    <h3 class="secondaryBanner__title title"><?php echo $title; ?></h3>
                <?php endif ?>

                <?php if ($script): ?>
                    <h2 class="secondaryBanner__script"><?php echo $script; ?></h2>
                <?php endif ?>

                <?php if ($description): ?>
                    <?php echo $description; ?>
                <?php endif ?>

                <?php if ($button_quiz): ?>
                    <span data-open="quizModal" class="hero__button button green">TAKE THE QUICK QUIZ</span>
                <?php endif ?>

                <?php if ($button):
                    $button_url = $button['url'];
                    $button_title = $button['title'];
                    $button_target = $button['target'] ? $button['target'] : '_self';
                ?>
                        <a href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>" class="hero__button button red"><?php echo esc_html($button_title); ?></a>
                <?php endif ?>
            </div>
            <div class="cell large-5 text-center">
                <?php if(!empty($videoImg)): ?>
                    <img class="secondaryBanner__video watch-video <?php echo $hostingVideo; ?>" data-open="videoModal" src="<?php echo $videoImg['url']; ?>" alt="<?php echo $videoImg['alt']; ?>" />
                <?php endif; ?>

                <?php if($startNew): ?>
                    <div class="startNew__box">
                        <?php if(!empty($startNewLogo)): ?>
                            <img class="startNew__logo" src="<?php echo $startNewLogo['url']; ?>" alt="<?php echo $startNewLogo['alt']; ?>" />
                            <span class="button light-blue watch-video <?php echo $hostingVideo; ?>" data-open="videoModal"><i class="far fa-play-circle"></i> WATCH THE VIDEO</span>
                        <?php endif ?>
                    </div>
                <?php endif ?>
            </div>
        </div>
        <img class="secondaryBanner__incubator show-for-large" src="<?php echo bloginfo('template_url');?>/assets/img/internal/incubator/startNew-Person.png" alt="StartNew Person">
    </div>
</div>

<div class="reveal" id="videoModal" data-reveal>
  <div class="responsive-embed">
    <?php if ( $video ): ?>
        <div id="player" data-id="<?php echo $video; ?>"></div>
    <?php endif ?>

  </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
