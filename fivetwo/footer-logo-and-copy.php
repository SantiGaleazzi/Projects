<?php
    $main_logo  = get_field('logo_header', 'option');
    $logo       = get_field('logo_footer', 'option');
    $copy       = get_field('copy', 'option');
    $address_footer       = get_field('address_footer', 'option');
    $title          = get_field('title_quiz_lightbox', 'option');
    $subtitle       = get_field('subtitle_quiz_lightbox', 'option');
    $introduction   = get_field('introduction_quiz_lightbox', 'option');

    $return_policy  = get_field('return_policy', 'option');
    $footer_custom_links  = get_field('footer_custom_links', 'option');
?>
        </div>
        <footer class="footer">
            <div class="new-main-container footer-container">
                    <?php if ( !empty($logo) ): ?>
                        <div class="footer__logo"> 
                          <a href="<?php bloginfo('url'); ?>">
                            <img width="<?php echo $logo['width']; ?>" height="<?php echo $logo['height']; ?>" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
                          </a>
                          <div class="address-text">
                              <?php if ($address_footer): ?>
                                   <?php echo $address_footer; ?>
                            <?php endif ?>
                          </div>
                        </div>
                    <?php endif ?>
                    <div class="footer-text">
                        <?php if ($copy): ?>
                           <div>
                               <?php echo $copy; ?>
                           </div>
                        <?php endif ?>
                    </div>
            </div>
        </footer>
    </div>
</div>

<div class="reveal" id="contactUsModal" data-reveal>
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-center">
            <div class="cell large-10">
                <?php if ( !empty($main_logo) ): ?>
                    <div class="contactUs__logo text-center">
                      <a href="<?php bloginfo('url'); ?>">
                        <img src="<?php echo $main_logo['url']; ?>" alt="<?php echo $main_logo['alt']; ?>" />
                      </a>
                    </div>
                <?php endif ?>

                <h2 class="contactUs__title">CONTACT US</h2>

                <?php echo do_shortcode( '[gravityform id="2" title="false" description="false" ajax="true"]' ); ?>
            </div>
        </div>
    </div>

    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="reveal quiz__bg" id="quizModal" data-reveal data-bg="0">
    <div class="reveal__container">
       <div class="text-center">
           <a href="<?php bloginfo('url'); ?>">
             <img src="<?php echo $main_logo['url']; ?>" alt="<?php echo $main_logo['alt']; ?>" />
           </a>
       </div>
       <div class="quiz__start">
          <?php if ($subtitle): ?>
            <h6 class="subtitle"><?php echo $subtitle; ?></h6>
          <?php endif ?>

          <?php if ($title): ?>
            <h5 class="title"><?php echo $title; ?></h5>
          <?php endif ?>

           <?php if ($introduction): ?>
             <?php echo $introduction; ?>
           <?php endif ?>
       </div>
       <?php echo do_shortcode( '[gravityform id="3" title="false" description="false" ajax="true"]' ); ?>
       <div class="text-center"><a href="#" class="button red nextScreen">Start the Quiz</a></div>
       <button class="close-button" data-close aria-label="Close modal" type="button">
           <span aria-hidden="true">&times;</span>
       </button>
    </div>
</div>

<div class="reveal" id="returnPolicyModal" data-reveal>
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-center">
            <div class="cell large-10">
                <h2 class="returnPolicyModal__title">RETURN POLICY</h2>
                <?php if($return_policy){ echo $return_policy; } ?>
            </div>
        </div>
    </div>

    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<div class="homepage-lightbox virtuous-contact-form">
    <div class="container-virtuous-form form-style-container">
        <div class="close-lightbox-form">
            <span aria-hidden="true">×</span>
        </div>
        <script 
            src="https://cdn.virtuoussoftware.com/virtuous.embed.min.js" 
            data-vform="5A308AAD-D30B-4609-88A5-CB66DC99F704" 
            data-orgId="1145" 
            data-isGiving="false"
            data-dependencies="[]">
        </script>
    </div>
</div>

<?php wp_footer(); ?>

<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery(document).on('gform_confirmation_loaded', function(event, formId){
            if(formId == 10) {
                // Event snippet for Start My Training Contact Form Lead conversion page
                var script = document.createElement("script");
                script.innerHTML = "gtag('event', 'conversion', {'send_to': 'AW-878794234/JImQCIHQ4acBEPqrhaMD'});";
                document.head.appendChild(script);
            } else if(formId == 2) {
                // Event snippet for General Contact Form Lead conversion page
                var script = document.createElement("script");
                script.innerHTML = "gtag('event', 'conversion', {'send_to': 'AW-878794234/bO_jCIv17KcBEPqrhaMD'});";
                document.head.appendChild(script);
            } else if(formId == 1) {
                // Event snippet for Bill's Updates Sign Up conversion page
                var script = document.createElement("script");
                script.innerHTML = "gtag('event', 'conversion', {'send_to': 'AW-878794234/qJ-_CNjT4acBEPqrhaMD'});";
                document.head.appendChild(script);
            } else if(formId == 8) {
                // Event snippet for Multiply Your Impact for Jesus Leader Form Lead conversion page
                var script = document.createElement("script");
                script.innerHTML = "gtag('event', 'conversion', {'send_to': 'AW-878794234/zdWjCNWy-qcBEPqrhaMD'});";
                document.head.appendChild(script);
            }
        });
    })
</script>

<!--Pixel Code-->
<script>
  !function(f,e,a,t,h,r){if(!f[h]){r=f[h]=function(){r.invoke?
  r.invoke.apply(r,arguments):r.queue.push(arguments)},
  r.queue=[],r.loaded=1*new Date,r.version="1.0.0",
  f.FeathrBoomerang=r;var g=e.createElement(a),
  h=e.getElementsByTagName("head")[0]||e.getElementsByTagName("script")[0].parentNode;
  g.async=!0,g.src=t,h.appendChild(g)}
  }(window,document,"script","https://cdn.feathr.co/js/boomerang.min.js","feathr");

  feathr("fly", "5db87e34e1cc9004ecf8e248");
  feathr("sprinkle", "page_view");
</script>
<style type="text/css">
    .ffz-close {
        z-index: 10;
    }
</style>
</body>
</html>
