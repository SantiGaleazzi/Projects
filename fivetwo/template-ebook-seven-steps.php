<?php
 /*
  * Template name: Seven steps to start
  */
 ?>
 <?php get_header(); ?>

<!-- LANDING PAGE SECTION -->
<section id="section-ebook-form">
    <div class="section-steps" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/partials/20180818_FiveTwo_105.png);">
        <div class="container-auto">
            <a href="<?php bloginfo('url'); ?>">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/partials/logodark.png" class="logotop-black" width="180" height="67" alt="Five Two">
            </a>
            <div class="content-text">
                <div class="box-text-steps">
                    <p class="label-text">FREE Training Resource</p>
                    <p class="title-text">Get Your <br class="hidden-mobile-br"><i>Seven Steps to Start</i> <br class="hidden-mobile-br">eBook</p>
                    <strong class="subtitle-text">Turn your God-given dream into<br class="hidden-mobile-br"> a new ministry or organization!</strong>
                    <p class="description-text-steps">Have a God-given dream to start something new?<br class="hidden-mobile-br"> Our FREE, downloadable eBook will help <br>— in just 7 steps!</p>
                </div>
                <img class="image-books-steps" src="<?php bloginfo('template_url'); ?>/assets/img/partials/book.png" width="475" height="543" alt="Seven Steps Start">
            </div>
        </div>
    </div>
    <div class="container-auto margin-negative">
        <div class="container-left-form">
            <div>
                <p class="items-text-form"><strong><i>Seven Steps to Start: A Sacramental Entrepreneur’s Guide to Launching Startups That Thrive</i></strong> is a practical, easy-to-read tutorial about how you can reach lost people for Jesus when you start a new ministry or faith-based organization.</p>
                <h2 class="title-form-ebook">Get your <span>FREE eBook</span> now:</h2>
                <?php echo do_shortcode( '[gravityform id="23" title="false" description="false" ajax="true"]' ); ?>
            </div>
        </div>
        <div class="container-right-form">
            <div>
                <strong class="title-video-steps">FiveTwo Network Helps <br class="hidden-mobile-br">Christian Leaders Make <br class="hidden-mobile-br">an Eternal Difference</strong>
                <p class="description-video-steps">FiveTwo Network is a team of ministry experts, pastors, CEOs, and business leaders who equip Christian leaders to make an eternal difference in your community. See how we do it</p>
                <img class="watch-video vimeo" src="<?php bloginfo('template_url'); ?>/assets/img/partials/Video.png" width="261" height="182" alt="Watch Video" data-open="videoModal">
            </div>
        </div>
    </div>
</section>
<!-- END LANDING PAGE SECTION -->

<!-- THANK YOU SECTION -->
<section id="thankyou-ebook" style="display: none;">
    <div class="section-steps" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/partials/20180818_FiveTwo_105.png);">
        <div class="container-auto thankyou-content">
            <a href="<?php bloginfo('url'); ?>">
                <img src="<?php bloginfo('template_url'); ?>/assets/img/partials/logodark.png" class="logotop-black" width="180" height="67" alt="Five Two">
            </a>
            <p class="title-text margin-titleb">Thank You for Requesting <br>Our FREE Training eBook</p>
            <strong class="subtitle-text">Get ready to launch a successful new ministry or organization.</strong>
            <img class="image-books-steps" src="<?php bloginfo('template_url'); ?>/assets/img/partials/book-2.png" width="723" height="470" alt="Seven Steps Start">
        </div>
    </div>
    <div class="container-auto margin-negative">
        <div class="container-left-form thankyou-left-form">
            <div>
                <p class="items-text-form">We’re excited to help you bring to life what God wants to start through you — whether that’s a new ministry or a faith-based organization. Just click the button below to receive your FREE eBook — Seven Steps to Start: A Sacramental Entrepreneur’s Guide to Launching Startups That Thrive.</p>
                <a class="download-ebook" href="https://fivetwo-site.mysitebuild.com/wp-content/uploads/2020/03/FiveTwo-Seven-Steps-to-Start.pdf" download>Download Your FREE eBook Now&nbsp;»</a>
            </div>
        </div>
        <div class="container-right-form thankyou-right-form">
            <div>
               <div class="footer-thankyou">
                    <p class="footer-description">Learn more about FiveTwo Network and our training and resources when you visit us at <a href="<?php bloginfo('url'); ?>">fivetwo.com</a></p>
                    <a class="link-learnmore" href="<?php echo home_url( 'homepage-leaders' ); ?>">Learn More&nbsp;»</a>
               </div>
               <div class="social-icons-ebook">
                    Stay Connected – Follow Us
                    <a href="https://www.facebook.com/FiveTwoNetwork/"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://twitter.com/five2"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END THANK YOU SECTION -->

<!-- VIDEO MODAL -->
<div class="reveal" id="videoModal" data-reveal>
  <div class="responsive-embed">
        <div id="player" data-id="318835834"></div>
  </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<!-- END MODAL -->

<script type="text/javascript">
    (function($){
        $(document).on("gform_confirmation_loaded", function (e, form_id) {
            $('#section-ebook-form').css('display','none');
            $('#thankyou-ebook').css('display','block');
        });
    })(jQuery);
</script>
<?php get_footer();
