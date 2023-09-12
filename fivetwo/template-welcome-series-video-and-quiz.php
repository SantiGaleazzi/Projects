<?php
 /*
  * Template name: Welcome Series - Video And Quiz
  */

  get_header();
?>
<div class="Series-video">
  <div class="secondaryBanner banner h100" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/internal/welcomeSeries/Banner.jpg);">
    <div class="grid-container h100 relative">
      <div class="grid-x grid-margin-x align-center-middle large-align-left h100">
        <div class="Series-video__campaign">
          <h3 class="secondaryBanner__title title">Reach More People in Your<br class="show-for-large"> Community for Jesus </h3>
          <p>
            Have a God-given dream to launch a new ministry? Create a new faith-based<br class="show-for-large"> business? Start a new outreach? Whether you want to plant a church or start<br class="show-for-large"> something outside of a typical congregational setting, we’re here to help.
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="Series-video__content grid-container">
    <div class="grid-x grid-padding-x align-justify">
      <div class="cell large-6">
        <p>
          <strong>FiveTwo Network is a team of ministry experts, pastors, CEOs, and business leaders who equip Christian leaders to make an eternal difference in communities across America.</strong> Here’s how to do it. &hellip;
        </p>
        <div class="text-center">
          <img class="watch-video vimeo" data-open="videoModal" style="margin-top: 1.5rem; margin-bottom: 1.5rem; cursor: pointer;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/videoAndQuiz/Watch-video.png" alt="Reach More People in Your Community for Jesus ">
        </div>
      </div>
      <div class="cell large-5">
        <div class="Series-video__container Series-video__container-training text-center">
          <img style="position: absolute; top: -2.3rem; right: 0; left: 0; margin: auto; z-index: 1;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/Masking.png" alt="Sticky Note">
          <div class="Series-video__training">
            <p class="relative" style="margin-bottom: 0;">
              <strong>If you’re ready to reach more people for Jesus, we’re here to help you grow your God-given dream.</strong> It’s easy to begin your Christian entrepreneurial training process. Just fill out the simple online form, and let’s get started! 
              <a href="<?php bloginfo('url'); ?>/start-my-training/" class="button red flex-container align-center-middle" style="margin-top: 2rem;">
                <img class="block m-0-auto" src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/videoAndQuiz/quiz-button.png" alt="Start the Quiz Now"> START MY TRAINING NOW
              </a>
            </p>
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
