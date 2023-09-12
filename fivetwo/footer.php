<?php
    $main_logo  = get_field('logo_header', 'option');
    $logo       = get_field('logo_footer', 'option');
    $address_footer       = get_field('address_footer', 'option');
    $donate_buttonfooter       = get_field('donate_buttonfooter', 'option');
    $copy       = get_field('copy', 'option');
    $facebook   = get_field('facebook', 'option');
    $youtube    = get_field('youtube', 'option');
    $instagram    = get_field('instagram', 'option');
    $linkedin    = get_field('linkedin', 'option');
    $faqs       = get_field('faqs', 'option');
    $donate     = get_field('donate_footer', 'option');

    $title          = get_field('title_quiz_lightbox', 'option');
    $subtitle       = get_field('subtitle_quiz_lightbox', 'option');
    $introduction   = get_field('introduction_quiz_lightbox', 'option');

    $return_policy  = get_field('return_policy', 'option');
    $footer_custom_links  = get_field('footer_custom_links', 'option');
?>
        </div>

        <footer class="footer">
            <div class="new-main-container footer-container">
				<?php if ( $logo ) : ?>
					<div class="footer__logo"> 
						<a href="<?php bloginfo('url'); ?>">
							<img width="<?= $logo['width']; ?>" height="<?= $logo['height']; ?>" src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
						</a>

						<div class="address-text">
							<?php if ( $address_footer ) : ?>
								<?= $address_footer; ?>
						<?php endif; ?>
						</div>

						<?php if ($donate_buttonfooter):
							$donate_buttonfooter_title = $donate_buttonfooter['title'] ? $donate_buttonfooter['title'] : 'DONATE NOW';
						?>
							<a class="pink-button" href="<?= $donate_buttonfooter['url']; ?>" target="<?= esc_attr( $donate_buttonfooter['target'] ?: '_self' ); ?>">
								<?= $donate_buttonfooter['title']; ?>
							</a>
						<?php endif; ?>    
					</div>
				<?php endif; ?>

				<div class="footer-text">
					<?php if ( $copy ) : ?>
						<div>
							<?= $copy; ?>
						</div>
					<?php endif; ?>
				</div>

				<div class="menu-footer">
					<div class="social-flex">
						<div class="footer-contact">
							<div class="blue-text-footer">
								Social
							</div>
							<?php if ( $youtube ) : ?>
								<a href="<?= $youtube; ?>" target="_blank" rel="noopener nofollow">
									Youtube
								</a>
							<?php endif; ?>

							<?php if ( $instagram ) : ?>
								<a href="<?= $instagram; ?>" target="_blank" rel="noopener nofollow">
									Instagram
								</a>
							<?php endif; ?>

							<?php if ( $facebook ) : ?>
								<a href="<?= $facebook; ?>" target="_blank" rel="noopener nofollow">
									Facebook
								</a>
							<?php endif; ?>

							<?php if ( $linkedin ) : ?>
								<a href="<?= $linkedin; ?>" target="_blank" rel="noopener nofollow">
									LinkedIn
								</a>
							<?php endif; ?>
						</div>

						<div class="other-links">
							<div class="blue-text-footer">
								Other Links
							</div>

							<ul class="dropdown" data-dropdown-menu>
							<?php
								$defaults = array(
								'theme_location'  => 'footer_menu',
								'menu'            => '',
								'container'       => '',
								'container_class' => '',
								'container_id'    => '',
								'menu_class'      => 'navigation',
								'menu_id'         => '',
								'echo'            => true,
								'fallback_cb'     => 'wp_page_menu',
								'before'          => '',
								'after'           => '',
								'link_before'     => '',
								'link_after'      => '',
								'items_wrap' => '%3$s',
								'depth'           => 0,
								'walker'        => new themeslug_walker_nav_menu_header
								);
								wp_nav_menu($defaults); ?>
							</ul>

							<div class="open-main-contact-lightbox">Contact</div>
							<?php if ($donate):
									$donate_url = $donate['url'];
									$donate_title = $donate['title'] ? $donate['title'] : 'GIVE NOW';
									$donate_target = $donate['target'] ? $donate['target'] : 'self';
							?>
								<a href="<?= esc_url($donate_url); ?>" target="<?= esc_attr($donate_target); ?>">
									<?= esc_html( $donate_title ); ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
            </div>
        </footer>
    </div>
</div>

<div class="homepage-lightbox gf-contact-form-lb">
    <div class="lightbox-contact-form form-style-container">
        <div class="close-lightbox-form">
            <span aria-hidden="true">×</span>
        </div>
        <h2 class="contactUs__title">CONTACT US</h2>

        <?= do_shortcode( '[gravityform id="2" title="false" description="false" ajax="true"]' ); ?>
    </div>
</div>

<div class="reveal quiz__bg" id="quizModal" data-reveal data-bg="0">
    <div class="reveal__container">
       <div class="text-center">
           <a href="<?php bloginfo('url'); ?>">
             <img src="<?= $main_logo['url']; ?>" alt="<?= $main_logo['alt']; ?>" />
           </a>
       </div>

       <div class="quiz__start">
          <?php if ( $subtitle ) : ?>
            <h6 class="subtitle">
				<?= $subtitle; ?>
			</h6>
          <?php endif; ?>

          <?php if ( $title ) : ?>
            <h5 class="title">
				<?= $title; ?>
			</h5>
          <?php endif; ?>

           <?php if ( $introduction ) : ?>
             <?= $introduction; ?>
           <?php endif; ?>
       </div>

       <?= do_shortcode( '[gravityform id="3" title="false" description="false" ajax="true"]' ); ?>

       <div class="text-center">
			<a href="#" class="button red nextScreen">Start the Quiz</a>
		</div>

       <button class="close-button" data-close aria-label="Close modal" type="button">
           <span>&times;</span>
       </button>
    </div>
</div>

<div class="reveal" id="returnPolicyModal" data-reveal>
    <div class="grid-container">
        <div class="grid-x grid-margin-x align-center">
            <div class="cell large-10">
                <h2 class="returnPolicyModal__title">RETURN POLICY</h2>
                <?php if ( $return_policy ) : ?>
					<?= $return_policy; ?>
				<?php endif; ?>
            </div>
        </div>
    </div>

    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php if ( !is_page_template('template-home.php') ) : ?>

	<div class="homepage-lightbox gf-contant-form">
		<div class="lightbox-contact-form form-style-container">
			<div class="close-lightbox-form">
				<span aria-hidden="true">×</span>
			</div>
			<?= do_shortcode('[gravityform id="34" title="false" description="false" ajax="true"]'); ?>
		</div>
	</div>

	<div class="homepage-lightbox virtuous-contact-form">
		<div id="container-virtuous-form" class="container-virtuous-form form-style-container">
			<div class="close-lightbox-form">
				<span aria-hidden="true">×</span>
			</div>

			<script>
				(function($){
					const elementClass = document.getElementsByClassName("b2b-form");
					const divElement = document.getElementById("container-virtuous-form");
					const script = document.createElement("script");
					script.setAttribute('src', "https://cdn.virtuoussoftware.com/virtuous.embed.min.js");

					if(elementClass.length){
						script.setAttribute('data-vform', "BA155705-2F70-4787-9946-9C6FD3044845");
						script.setAttribute('data-orgId', "1145");
						script.setAttribute('data-isGiving', "false");
						script.setAttribute('data-dependencies', "[]");
					}else{
						script.setAttribute('data-vform', "8B5DF9AC-564A-4D68-B716-CEDDA1FE2206");
						script.setAttribute('data-orgId', "1145");
						script.setAttribute('data-isGiving', "false");
						script.setAttribute('data-dependencies', "[]");
					}

					divElement.appendChild(script);
				})(jQuery);
			</script>
		</div>
	</div>

<?php endif; ?>

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
