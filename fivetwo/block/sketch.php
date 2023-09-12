<?php if( have_rows('sketch_block') ): ?>
    <div class="sketch">
        <div class="grid-container">
            <div class="grid-x grid-margin-x align-center xlarge-align-justify">
    <?php while( have_rows('sketch_block') ): the_row();
        $picture                    = get_sub_field('picture_sketch_block');
        $button_color               = get_sub_field('button_color_sketch_block');
        $button_bg                  = get_sub_field('button_background_sketch_block');
        $is_a_form_on_a_lightbox    = get_sub_field('is_a_form_on_a_lightbox');
        $button_text_sketch_block   = get_sub_field('button_text_sketch_block') ? get_sub_field('button_text_sketch_block') : 'MULTIPLY Your Impact for Jesus';
        $form_id_sketch_block       = get_sub_field('form_id_sketch_block');
    ?>
        <div class="cell medium-6 xlarge-4 sketch__discover flex-container flex-dir-column align-justify">
            <?php if ($is_a_form_on_a_lightbox): ?>
                <span data-open="multiplyImpact" class="sketch__button button xlarge <?php echo $button_color.' '.$button_bg; ?>"><?php echo esc_html($button_text_sketch_block); ?>&nbsp;&raquo;</span>
            <?php else: 
                $button             = get_sub_field('button_link_sketch_block');
                    $button_url     = $button['url'];
                    $button_title   = $button['title'];
                    $button_target  = $button['target'] ? $button['target'] : '_self';
            ?>    
                <a href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>" class="sketch__button button xlarge <?php echo $button_color.' '.$button_bg; ?>"><?php echo esc_html($button_title); ?>&nbsp;&raquo;</a>
            <?php endif ?>

            <?php if (!empty($picture)):
                $size = 'large';
                $thumb = $picture['sizes'][ $size ];
                $width = $picture['sizes'][ $size . '-width' ];
                $height = $picture['sizes'][ $size . '-height' ];
                $alt = $picture['alt'];
            ?>
            <a href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>" class="text-center">
                <img class="sketch__picture align-self-bottom" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
            </a>
            <?php endif ?>
        </div>
    <?php endwhile; ?>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="reveal assessment__multiply-form" id="multiplyImpact" data-reveal>
  <h6 class="subtitle">Five Two</h6>
  <h2 class="title">MULTIPLY Your Impact for Jesus</h2>
  <p>Please provide your contact information and a FiveTwo expert will contact you shortly.</p>
  <?php echo do_shortcode( '[gravityform id="'.$form_id_sketch_block.'" title="false" description="false" ajax="true"]' ); ?>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
