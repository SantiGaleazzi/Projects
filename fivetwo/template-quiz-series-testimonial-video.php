<?php
 /*
  * Template name: Quiz Series - Testimonial Video
  */

  get_header();
?>
<div class="Testimonial-video">
  <div class="secondaryBanner banner h100" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/quizLPTestimonial/Banner.jpg);">
    <div class="grid-container h100 relative">
      <div class="grid-x grid-margin-x align-center-middle large-align-left h100">
        <div class="Testimonial-video__campaign">
          <h3 class="secondaryBanner__title title">It’s Time to Bring to Life What <br class="show-for-large"> God Wants to Start through You</h3>
        </div>
      </div>
    </div>
  </div>
  <div class="Testimonial-video__content grid-container">
    <div class="grid-x grid-margin-x align-justify">
      <div class="cell large-6">
        <p>
          As a Christian non-profit ministry, we’re joined by supporters who believe in Christian entrepreneurs like you — and want to help bring the presence of Jesus into your community.
        </p>
        <div class="text-center">
          <img class="watch-video vimeo" data-open="videoModal" style="margin-top: 1.5rem; margin-bottom: 1.5rem; cursor: pointer;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/quizLPTestimonial/Watch-video.png" alt="It’s Time to Bring to Life What God Wants to Start through You">
        </div>
        <p>
          We can help bring to life what God wants to start through you. Get started now with our StartNew Incubator 24-month training process.
        </p>
        <div class="Testimonial-video__sign-up">
          <div class="Testimonial-video__sign-up-form">
            <?php echo do_shortcode( '[gravityform id="13" title="false" description="false" ajax="true"]' ); ?>
          </div>
        </div>
      </div>
      <div class="cell large-5">
        <div class="Testimonial-video__container">
          <img style="position: absolute; top: -2.3rem; right: 0; left: 0; margin: auto; z-index: 1;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/Masking.png" alt="Sticky Note">
          <div class="Testimonial-video__note-up">
            <h6 class="small">DON’T FORGET!</h6>
            <h6 class="big relative">Your FREE eBook Is Waiting <img src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/quizLPTestimonial/arrow.png" style="position: absolute; bottom: -4rem; right: -1.5rem;" alt="Arrow"></h6>
            <img src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/quizLPTestimonial/Free-ebook.png" style="margin-bottom: -4.8rem;" alt="Your FREE eBook Is Waiting">
          </div>
          <div class="Testimonial-video__note-down">
            <div class="Testimonial-video__note-quiz">
              <p>After your informational call, we will send you a free copy of Rev. Bill Woolsey’s eBook &hellip;</p>
              <h6>Seven Steps to Start: A Sacramental Entrepreneur’s Guide to Launching Startups That Thrive</h6>
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
