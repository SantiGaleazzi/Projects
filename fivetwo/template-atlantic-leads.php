<?php
 /*
  * Template name: 2019 Atlantic Leads
  */

  get_header();
?>
<div class="Atlantic-leads">
  <div class="secondaryBanner banner h100" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/2019-Atlantic-Leads-Bg.jpg);">
    <div class="grid-container h100 relative">
      <div class="grid-x grid-margin-x align-middle h100">
        <div class="Atlantic-leads__campaign text-center medium-text-left">
          <h3 class="secondaryBanner__title title">Bring New Life into Your Church or Ministry with Our 24-Month <img src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/StartNew.png" alt="StartNew"> Incubator</h3>
          <p>
            FiveTwo is partnering with the Atlantic District to help churches like yours reach more people for Jesus in our communities. Make plans now to join us August 22-24 as we launch FiveTwo's StartNew incubator at Christ Church, Woodside, NY.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="Atlantic-leads__content grid-container">
    <div class="grid-x grid-margin-x">
      <div class="cell large-7">
        We’ll start the journey with you and your team of 3 to 5 leaders as we:
        <ul>
          <li><strong>EXPLORE</strong> what it means for you to live out the presence of Jesus in your community</li>
          <li><strong>DETERMINE</strong> the best way to connect with the people Jesus is calling you to reach</li>
          <li><strong>COACH</strong> you through bringing new life to your congregation in financially sustainable ways.</li>
        </ul>
        Plus, you’ll meet leaders like you who want to see their God-given dreams come to life — and trainers who know how to make this happen!
        <div class="Atlantic-leads__sign-up">
          <h5>Sign Up Now to Attend the StartNew Incubator Launch</h5>
          <h6>August 22-24, 2019 • Christ Church in Woodside, NY (Queens)</h6>
          <p>Please fill out your information in the form below to register for the 3DAY event. Then click the button to submit. We will contact you to complete your registration.</p>
          <div class="Atlantic-leads__sign-up-form">
            <?php echo do_shortcode( '[gravityform id="12" title="false" description="false" ajax="false"]' ); ?>
          </div>
          <div class="Atlantic-leads__webinar">
            <h5>Missed our Webinar? You can watch it here:</h5>
            <div class="responsive-embed">
              <iframe width="420" height="315" src="https://player.vimeo.com/video/345734092" frameborder="0" allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
      <div class="cell large-5">
        <div class="Atlantic-leads__container">
          <img style="position: absolute; top: -2.3rem; right: 0; left: 0; margin: auto; z-index: 1;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/Masking.png" alt="Sticky Note">
          <div class="Atlantic-leads__note-up">
            <h6>Watch how FiveTwo helps you make an eternal difference</h6>
            <img class="watch-video vimeo" data-open="videoModal" style="margin-top: -22px; cursor: pointer;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/2019-Atlantic-Video.png" alt="Watch how FiveTwo helps you make an eternal difference">
          </div>
          <div class="Atlantic-leads__note-down">
            <div>
              <img src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/2019-Atlantic-Quiz.png" alt="Start the Quiz now">
            </div>
            <div class="Atlantic-leads__note-quiz">
              <h6>Take the Self-Assessment Quiz</h6>
              <p>Find out if the StartNew Incubator is for you! It only takes a few minutes to answer 7 simple questions.</p>
              <span class="stayConnected__quiz-button button red" data-open="quizModal">Start the Quiz Now</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="reveal" id="videoModal" data-reveal>
  <div class="responsive-embed">
    <div id="player" data-id="https://vimeo.com/318835834"></div>
  </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
get_footer();
?>
