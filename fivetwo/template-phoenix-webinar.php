<?php
 /*
  * Template name: 2019 Phoenix Webinar
  */

  get_header();
?>
<div class="Atlantic">
  <div class="secondaryBanner banner h100" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/2019-Atlantic-Bg.jpg);">
    <div class="grid-container h100 relative">
      <div class="grid-x grid-margin-x align-middle h100">
        <div class="Atlantic__campaign text-center medium-text-left">
          <h3 class="secondaryBanner__title title">Learn More About FiveTwo’s <span class="nowrap">24-Month</span> <img src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/StartNew.png" alt="StartNew"> Incubator</h3>
          <p>
            FiveTwo wants to help churches — including yours — reach more people for Jesus in our communities. Learn more about FiveTwo's 24-Month StartNew Incubator in our free informational webinar on Wednesday, August 14, 9:00-10:00 a.m. PDT.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="Atlantic__content grid-container">
    <div class="grid-x grid-margin-x">
      <div class="cell large-7">
        <h5>Find out how our Christian entrepreneurial training process equips you and your team to make an eternal difference! Including &hellip;</h5>
        <ul>
          <li>Our team of pastors, CEOs, and ministry and business experts use their expertise and experience to prepare your new ministry, church, or faith-based startup for success.</li>
          <li>We blend Christian theology and lean business startup principles for an entrepreneurial approach that works in a variety of settings.</li>
          <li>Multiple face-to-face training events and monthly coaching sessions for your team of 3 to 5 people will equip you to make an eternal difference in your community.</li>
        </ul>
        <div class="Atlantic__sign-up">
          <div class="Atlantic__sign-up-form">
            <?php echo do_shortcode( '[gravityform id="15" title="false" description="false" ajax="true"]' ); ?>
          </div>
        </div>
      </div>
      <div class="cell large-5">
        <div class="Atlantic__sticky-note">
          <img style="position: absolute; top: -2.3rem; right: 0; left: 0; margin: auto;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/Masking.png" alt="Sticky Note">
          <img src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/Calendar.png" alt="SAVE THE DATE!">
          <h5>Save the Date!</h5>
          <h6>StartNew Incubator Launch</h6>
          <p>Our StartNew Incubator Launch 3DAY event is coming soon! We’ll tell you more about it during the informational webinar.</p>
          <span class="Atlantic__appointment">October 3-5, 2019<br> Christ's Greenfield Lutheran Church<br>Gilbert, AZ</span>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>
