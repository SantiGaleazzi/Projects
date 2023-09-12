<?php
 /*
  * Template name: Quiz Series - Schedule Call
  */

  get_header();
?>
<div class="Schedule-call">
  <div class="secondaryBanner banner h100" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/scheduleCall/Banner.jpg);">
    <div class="grid-container h100 relative">
      <div class="grid-x grid-margin-x align-center-middle large-align-left h100">
        <div class="Schedule-call__campaign">
          <h3 class="secondaryBanner__title title">Begin Your Startup Training and Turn<br class="show-for-large"> Your God-Given Dream into a Reality</h3>
          <p>
            We’re here to help entrepreneurial Christian leaders. Our team of pastors,<br class="show-for-large"> CEOs, and ministry and businesses experts is ready to pour courage and<br class="show-for-large"> confidence into creative and action-oriented people like you. 
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="Schedule-call__content grid-container">
    <div class="grid-x grid-margin-x align-justify">
      <div class="cell large-7">
        <h6>
          Our 24-month training process — the StartNew Incubator — prepares you and your team of 3 to 5 members to launch a new ministry, organization or outreach.
        </h6>
        <p>
          We’re here to help entrepreneurial Christian leaders. Our team of pastors, CEOs, and ministry and businesses experts is ready to pour courage and confidence into creative and action-oriented people like you.
        </p>
        <div class="Schedule-call__sign-up">
          <div class="Schedule-call__sign-up-form">
            <?php echo do_shortcode( '[gravityform id="14" title="false" description="false" ajax="true"]' ); ?>
          </div>
        </div>
      </div>
      <div class="cell large-5">
        <div class="Schedule-call__container">
          <img style="position: absolute; top: -2.3rem; right: 0; left: 0; margin: auto; z-index: 1;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/Masking.png" alt="Sticky Note">
          <div class="Schedule-call__note">
            <h6 class="small">DON’T FORGET!</h6>
            <h6 class="big relative">Your FREE eBook Is Waiting </h6>
            <img src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/scheduleCall/Free-ebook.png" style="" alt="Your FREE eBook Is Waiting">
            <div class="text-left">
              <p>After your informational call, we will send you a free copy of Rev. Bill Woolsey’s eBook &hellip;</p>
              <h6 class="book-title">Seven Steps to Start:<br>A Sacramental Entrepreneur’s Guide to Launching Startups That Thrive</h6>
              <p>It’s a practical, easy-to-read tutorial about how you can reach lost people for Jesus when you start your new ministry or faith-based business.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="reveal" id="videoModal" data-reveal>
  <div class="responsive-embed">
    <div id="player" data-id="https://vimeo.com/347179316"></div>
  </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
get_footer();
?>
