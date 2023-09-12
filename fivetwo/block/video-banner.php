<?php

    $banner_video = get_field('home_banner_video_2019');
    $form_link = get_field('video_banner_form_link');
    $video_lightbox = get_field('video_banner_lightbox_video_url');
?>

    <!-- Video Banner -->
    <div class="grid-container">
        <div class="grid-x">
            <div class="main-video">
                <div id="custom-video" data-id="<?= $banner_video; ?>"></div>
                <a href="<?= $form_link['url']; ?>" style="position:absolute; top:0; left:0; display:inline-block; width:100%; height:0;  padding-bottom: 43.25%; z-index:1;"></a>
            </div>
        </div>

        <div class="grid-x">
            <?php if( have_rows('youtube_banner') ): ?>
                <?php while( have_rows('youtube_banner') ): the_row();
                    $youtube_image = get_sub_field('youtube_logo');
                ?>
                    <span class="video-banner" style="width:100%; cursor:pointer;" data-open="videoBannerModal">
                        <div class="youtube-banner">
                            <div class="youtube-banner__banner">
                                <img src="<?= $youtube_image['url']; ?>" alt="<?= $youtube_image['alt']; ?>">
                            </div>
                            <div class="youtube-banner__title">
                                <?php the_sub_field('title'); ?>
                            </div>
                        </div>
                    </span>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- Video Banner -->

<div class="reveal" id="videoBannerModal" data-reveal>
    <div class="responsive-embed">
        <?php if ( $video_lightbox ): ?>
            <div id="banner-video" data-id="<?php echo $video_lightbox; ?>"></div>
        <?php endif ?>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
