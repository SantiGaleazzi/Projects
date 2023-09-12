<?php
/*Two Columns Fields*/
    global $blocksBreakpoints;
    $block_number = get_row_index();
    $custom_blocks_video_background_color = get_sub_field('custom_blocks_video_background_color');
    $custom_blocks_video_font_color = get_sub_field('custom_blocks_video_font_color');
    $custom_blocks_video_title = get_sub_field('custom_blocks_video_title');
    $custom_blocks_video_margin = get_sub_field('custom_blocks_video_margin');
    $custom_blocks_video_id = get_sub_field('custom_blocks_video_id');
?>

<style>

    .cb-videoWrap--<?= $block_number; ?>{
      background-color: <?= $custom_blocks_video_background_color; ?>;
      color: <?= $custom_blocks_video_font_color; ?>;
    }

    <?php if (!empty($custom_blocks_video_title) && $custom_blocks_video_margin != 1): ?>
      .cb-videoWrap--<?= $block_number; ?> .custom_blocks_video{
        margin-top: 2.5rem;
        margin-bottom: 2.5rem;
      }

    <?php endif; ?>

    <?php if ($custom_blocks_video_margin == 1): ?>
      .cb-videoWrap--<?= $block_number; ?> .custom_blocks_video{
        bottom: -4rem;
      }
      .cb-videoWrap--<?= $block_number; ?>{
        padding-bottom: 0;
        margin-bottom: 9rem;
      }
    <?php endif; ?>

    body #content-page .twoColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) *:not(a){
        color: inherit;
    }
    body #content-page .twoColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) a *{
        color: inherit;
    }
    body #content-page .twoColumns__wrap--<?= $block_number; ?> .wp-caption{
        background-color: inherit;
    }

</style>

<div class="cb-videoWrap--<?php echo $block_number; ?> pt-10 pb-16 sm:pt-16 sm:pb-20">
    <div class="container px-6 sm:px-0">
        <h1 class="text-center font-bold text-4xl font-antonio sm:text-6xl"><?= $custom_blocks_video_title; ?></h1>
        <div class="custom_blocks_video mx-auto relative bg-center bg-cover bg-no-repeat relative">
            <div class="thumb bg-cover bg-center bg-no-repeat video-embed relative" id="<?= $custom_blocks_video_id; ?>" style="background-image: url('https://cdn.jwplayer.com/v2/media/<?= $custom_blocks_video_id; ?>/poster.jpg');">
              <div class="absolute w-full h-full flex justify-center items-center">
                <img src="<?php bloginfo('template_url')?>/assets/images/home-images/youtube-icon.png" class="cursor-pointer" alt="Icon Play">
              </div>
            </div>
        </div>
    </div>
</div>




