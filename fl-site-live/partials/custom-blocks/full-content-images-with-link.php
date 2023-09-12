<?php
/*Two Columns Fields*/
    global $blocksBreakpoints;
    $block_number = get_row_index();
    $custom_blocks_images_width_link_background_color = get_sub_field('custom_blocks_images_width_link_background_color');
    $custom_blocks_images_width_link_background_image = get_sub_field('custom_blocks_images_width_link_background_image');
    $custom_blocks_images_width_link_display_image_on_mobile = get_sub_field('custom_blocks_images_width_link_display_image_on_mobile');
?>

<style>

  .custom_blocks_images_width_link_background--<?= $block_number; ?>{
      background-position: top center;
      background-size: cover;
      background-repeat: no-repeat;
      background-image: url(<?= $custom_blocks_images_width_link_background_image ?>);
      background-color: <?= $custom_blocks_images_width_link_background_color?>;
  }

  <?php if ($custom_blocks_images_width_link_display_image_on_mobile): ?>
      @media screen and (max-width: 640px) {
          .custom_blocks_images_width_link_background--<?= $block_number; ?>{
              background-image: none;
          }
      }
  <?php endif; ?>

</style>

<div class="custom_blocks_images_width_link--<?php echo $block_number; ?> custom_blocks_images_width_link_background--<?= $block_number; ?>">
    <div class="container px-6 sm:px-0">
        <?php if (have_rows('custom_blocks_images_width_link_repeater')): ?>
            <div class="mt-24 flex flex-wrap justify-center">
              <?php while (have_rows('custom_blocks_images_width_link_repeater')): the_row(); 
                $custom_blocks_images_width_link_image = get_sub_field('custom_blocks_images_width_link_image');
                $custom_blocks_images_width_link_link = get_sub_field('custom_blocks_images_width_link_link');
                $link_url = $custom_blocks_images_width_link_link['url'];
                $link_title = $custom_blocks_images_width_link_link['title'];
                $link_target = $custom_blocks_images_width_link_link['target'] ? $custom_blocks_images_width_link_link['target'] : '_self';
              ?>
                <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="custom_blocks_images_width_link -mt-10 mb-20 mx-3">
                  <img src="<?php echo esc_url($custom_blocks_images_width_link_image['url']); ?>" alt="<?php echo esc_attr($custom_blocks_images_width_link_image['alt']); ?>" class="w-auto mx-auto" />
                </a>
              <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>





