<?php
    /**
     * Template Name: Single Video
     */


    $video_url = get_field('going_digital_video_url');

    get_header();
?>

<div class="simple-video-template full">
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
			<div class="cell align-center">

                <div class="simple-video-template__iframe">
                    <iframe src="<?= $video_url; ?>" width="100%" height="auto" frameborder="0" allow="autoplay; fullscreen" allowfullscreen=""></iframe>
                </div>

                <?php
                    if( have_rows('going_digital_repeater') ):
                        
                ?>
                    <div class="simple-video-template__buttons">
                
                        <?php while( have_rows('going_digital_repeater') ): the_row();

                            $button = get_sub_field('going_digital_button');
                        ?>
                    
                            <a class="video-btn" href="<?= $button['url']; ?>"><strong><?= $button['title']; ?></strong></a>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
		</div>
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