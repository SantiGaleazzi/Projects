<?php
 /*
  * Template name: Faith - Work
  */

get_header('faith-work');
?>
<div class="faith-work-nav">
   <div class="header-container">
      <?php
      $logo             = get_field('logo_header', 'option');
      $button_text_nav  = get_field('button_text_nav');
      $virtuous_script  = get_field('virtuous_script', 'option');
      ?>
      <div class="nav-menu">
         <div class="mobile-menu align-justify" data-responsive-toggle="responsive-menu" data-hide-for="medium">
            <div class="title-bar-title">
               <?php if (!empty($logo) ): ?>
               <div class="header__logo">
                  <a href="<?php bloginfo('url'); ?>">
                     <img width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                  </a>
               </div>
               <?php endif ?>
            </div>
            <button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
         </div>
         <div class="flex-container flex-dir-column medium-flex-dir-row align-justify" id="responsive-menu">
            <?php if (!empty($logo) ): ?>
            <div class="header__logo show-for-medium">
               <a href="<?php bloginfo('url'); ?>">
                  <img width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
               </a>
            </div>
            <?php endif ?>
            <div>
               <?php if ($button_text_nav): ?>
               <div class="copy-button-slider-pink-button open-faith-work-lightbox"><?php echo esc_html($button_text_nav); ?></div>
               <?php endif ?>
            </div>
         </div>
      </div>
   </div>
</div>
<?php

 if (have_posts()) :
    while (have_posts()) :
        the_post();

        the_content();

    endwhile;
endif;

get_footer();
