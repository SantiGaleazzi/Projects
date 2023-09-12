<?php
 /*
  * Template name: Quiz Series - Video And Quiz
  */

  get_header();
?>
<div class="Series-video">
  <div class="secondaryBanner banner h100" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/videoAndQuiz/Banner.jpg);">
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
          <strong>FiveTwo Network is a team of ministry experts, pastors, CEOs, and business leaders who equip Christian leaders like you to make an eternal difference in your community.</strong> Here’s how to do it. &hellip;
        </p>
        <div class="text-center">
          <img class="watch-video vimeo" data-open="videoModal" style="margin-top: 1.5rem; margin-bottom: 1.5rem; cursor: pointer;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/videoAndQuiz/Watch-video.png" alt="Reach More People in Your Community for Jesus ">
        </div>
        <p>
          <strong>We’re here to turn your God’ given dream into something that reaches more people for Jesus.</strong> Through our 24-month StartNew Incubator training process, we’ll surround you with everything you need to launch your sustainable, faith-based start-up. 
        </p>
        <div class="Series-video__quiz">
          <div class="medium-flex-container medium-flex-dir-row align-stretch">
            <div class="Series-video__quiz-left">
              <p class="Series-video__quiz-section">
                <strong>Find out if our StartNew Incubator is right for you by taking our online self-assessment quiz.</strong> It only takes a few minutes to answer 7 simple questions!
              </p>
            </div>
            <div class="Series-video__quiz-right flex-container flex-dir-row align-center-middle" data-open="quizModal">
              <div class="text-center Series-video__quiz-start">
                <img class="block m-0-auto" src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/videoAndQuiz/quiz-button.png" alt="Start the Quiz Now">
                Start the Quiz Now
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="cell large-5">
        <div class="Series-video__container text-center">
          <img style="position: absolute; top: -2.3rem; right: 0; left: 0; margin: auto; z-index: 1;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/atlantic/Masking.png" alt="Sticky Note">
          <h6>Share This with Your Friends</h6>
          <div class="Series-video__info">
            <p class="relative">
              Know of someone else with a God-given dream? Tell them about FiveTwo and our StartNew Incubator training process.
              <br><br>
              <strong>Just copy, paste, and send this brief information below</strong>
              <img style="position: absolute; bottom: -4rem; right: 4rem;" src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/videoAndQuiz/arrow.png" alt="arrow">
            </p>
          </div>
          <div class="Series-video__info-brief">
            Check out FiveTwo Network and their start-up training process — the StartNew Incubator. FiveTwo helps Christian entrepreneurs launch businesses and ministries to reach more people for Jesus in their communities! Learn more about how they can help:<br><a href="https://fivetwo.com/startnew">fivetwo.com/startnew</a>
          </div>
          <div class="Series-video__share flex-container flex-dir-row align-center">
            <div style="width: 21rem;" class="flex-container flex-dir-row align-justify align-middle">
              <span>Share via:</span>
              <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo bloginfo('url');?>/startnew" target="_blank">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/videoAndQuiz/facebook.png" alt="Facebook">
              </a>
              <a href="https://twitter.com/intent/tweet?url=&text=Check%20out%20FiveTwo%20Network%20and%20their%20start-up%20training%20process%20%E2%80%94%20the%20StartNew%20Incubator.%20FiveTwo%20helps%20Christian%20entrepreneurs%20launch%20businesses%20and%20ministries%20to%20reach%20more%20people%20for%20Jesus%20in%20their%20communities!%20Learn%20more%20about%20how%20they%20can%20help:%20<?php echo bloginfo('url');?>/startnew" target="_blank">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/videoAndQuiz/twitter.png" alt="Twitter">
              </a>
              <a href="mailto:?&subject=Reach More People in Your Community for Jesus &body=Check out FiveTwo Network and their start-up training process — the StartNew Incubator. FiveTwo helps Christian entrepreneurs launch businesses and ministries to reach more people for Jesus in their communities! Learn more about how they can help: <?php echo bloginfo('url');?>/startnew">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/internal/quizSeries/videoAndQuiz/email.jpg" alt="Email">
              </a>
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
