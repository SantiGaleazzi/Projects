<?php
 /*
  * Template name: 2019 Webinar
  */

  get_header();

  $gravityform_id = get_field('webinar_gravityform_id') ?? 15;
?>
<div class="Atlantic">
  <div class="secondaryBanner banner h100" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/2019-Atlantic-Bg.jpg);">
    <div class="grid-container h100 relative">
      <div class="grid-x grid-margin-x align-middle h100">
        <div class="Atlantic__campaign text-center medium-text-left">
          <?php the_field('webinar_banner'); ?>
        </div>
      </div>
    </div>
  </div>
  <div class="Atlantic__content grid-container">
    <div class="grid-x grid-margin-x">
      <div class="cell large-7">
        <?php the_field('webinar_description'); ?>
        <div class="Atlantic__sign-up">
          <div class="Atlantic__sign-up-form">
            <?php the_field('webinar_appointment'); ?>
            <?php echo do_shortcode( '[gravityform id="'.$gravityform_id.'" title="false" description="false" ajax="true"]' ); ?>
          </div>
        </div>
      </div>
      <div class="cell large-5">
        <div class="Atlantic__sticky-note">
          <img style="position: absolute; top: -2.3rem; right: 0; left: 0; margin: auto;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/Masking.png" alt="Sticky Note">
          <?php the_field('webinar_save_the_date'); ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>
