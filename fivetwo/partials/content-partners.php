<?php
    $title      = get_field('title_partners', 'option');
    $subtitle   = get_field('subtitle_partners', 'option');
    $intro      = get_field('intro_partners', 'option');
    $partners   = get_field('images_partners', 'option');
?>

<div class="partners">
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-center">
            <div class="cell small-10 large-9 text-center">
              <?php if ($subtitle): ?>
                <h6 class="subtitle"><?php echo $subtitle; ?></h6>
              <?php endif ?>
              <?php if ($title): ?>
                <h5 class="title"><?php echo $title; ?></h5>
              <?php endif ?>
              <?php if ($intro): ?>
                  <?php echo  $intro; ?>
              <?php endif ?>
                <div class="partners__slider autoplay">
                  <?php
                  if($partners) :
                    foreach($partners as $partner) :
                      $link   = $partner['url_partner'];
                      $image  = $partner['picture_partner'];
                  ?>
                    <div>
                      <?php if( $link ): ?>
                        <a href="<?php echo $link; ?>" target="_blank">
                      <?php endif; ?>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />
                      <?php if( $link ): ?>
                        </a>
                      <?php endif; ?>
                    </div>
                  <?php
                    endforeach;
                  endif;
                  ?>
                </div>
            </div>
        </div>
    </div>
</div>
