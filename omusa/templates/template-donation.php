<?php

    /**
    * Template Name: Donation Template
    */

    get_header();

    $logo = get_field('logo','options');
    $background_form_image = get_field('don_form_intro_background_image');
    $side_image = get_field('don_form_intro_side_image');

?>

    <section class="section-quoted bg-cover bg-left-top overflow-hidden" style="background-image: url('<?= $background_form_image['url']; ?>');">
        <div class="container">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="md:w-3/5 lg:w-2/3 pb-12 md:pb-20 xl:pb-32 relative z-10">
                    <div class="text-center mb-10 md:mb-6">   
                        <a href="<?= get_home_url(); ?>" class="inline-block">
							<div id="logo-nav" class="w-20 lg:w-32 h-20 lg:h-32 flex items-center justify-center bg-red-500">
								<img src="<?= esc_url($logo['url']); ?>" alt="<?= esc_attr($logo['alt']); ?>" class="w-14 lg:w-24">
							</div>
						</a>
                    </div>

                    <div class="headline leading-none text-default mx-auto">
                        <?php the_field('don_form_intro_title'); ?>
                    </div>

                    <div class="text-lg text-default text-center lg:px-8 xl:px-24">
                        <?php the_field('don_form_intro_description'); ?>
                    </div>
                </div>
                
                <div class="hidden md:block md:w-3/5 h-full md:bg-cover xl:bg-contain md:bg-left-top bg-no-repeat absolute top-0 right-0 md:-mr-32 lg:-mr-48 xl:-mr-56" style="background-image: url('<?= $side_image['url']; ?>');"></div>

                <div class="block md:hidden">
                    <img src="<?= $side_image['url']; ?>" alt="<?= $side_image['alt']; ?>">
                </div>
            </div>
        </div>
    </section>

    <section class="bg-card px-6 pt-5 pb-10 relative z-10">
        <div class="container">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-3/5 lg:w-2/3 flex-1 flex flex-col border-t-4 border-red-500 shadow-2xl -mt-16 xl:-mt-32">
                    <iframe class="mobile-iframe" id="<?php the_field('don_form_intro_form_id'); ?>" title="Global Mission Fund 9353" src="<?php the_field('don_form_intro_form'); ?>" width="100%" frameborder="0" scrolling="no" allowtransparency="true" allowpaymentrequest></iframe>
                </div>

                <div class="md:w-2/5 xl:w-1/3 pt-12 md:pt-0 md:pl-6">
                    <div class="text-default pb-6 border-b border-separator">
                        <div class="text-2xl font-roboto font-light leading-8">
                            <?php the_field('don_form_aside_title'); ?>
                        </div>

                        <div class="mb-3">
                            <?php the_field('don_form_aside_description'); ?>
                        </div>

                        <div class="searcher-donation">
                            <script>
                                // Code for appending SC var to RD search box

                                function getCookie(parameter) {
                                    var name = parameter + "=";
                                    var decodedCookie = decodeURIComponent(document.cookie);
                                    var ca = decodedCookie.split(';');
                                    for(var i = 0; i <ca.length; i++) {
                                        var c = ca[i];
                                        while (c.charAt(0) == ' ') {
                                            c = c.substring(1);
                                        }
                                        if (c.indexOf(name) == 0) {
                                            return c.substring(name.length, c.length);
                                        }
                                    }
                                    return "";
                                }

                                var cookievalue = getCookie('sourcecode','');

                                function getUrlVars() {
                                    var vars = {};
                                    var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
                                        vars[key] = value;
                                    });
                                    return vars;
                                }

                                function getUrlParam(parameter){
                                    var urlparameter = cookievalue;
                                        if(window.location.href.indexOf(parameter) > -1){
                                        urlparameter = getUrlVars()[parameter];
                                        }
                                    return urlparameter;
                                }

                                var scvalue = getUrlParam('sc');
                                var SC = "donate?sc=" + scvalue;
                            </script>

                            <script type='text/javascript'>
                                try {
                                    
                                    var parent_query = window.location.search;
                                    //console.log('parent query: ' + parent_query);                                                                          


                                    if ( parent_query.length ) {
                                        var res = parent_query.charAt(0);  
                                        //console.log('first char: ' + res);

                                        if ( res == '?' ) {
                                            parent_query = parent_query.replace('?', '&');
                                            //console.log('replacing ? with &: ' + parent_query);
                                        }

                                        var newEmbedUrl = document.getElementById('<?php the_field('don_form_intro_form_id'); ?>').getAttribute('src') + parent_query;
                                        //console.log('new embed url: ' + newEmbedUrl);

                                        document.getElementById('<?php the_field('don_form_intro_form_id'); ?>').setAttribute('src', newEmbedUrl); 
                                    }
                                
                                } catch(err) {

                                    //console.log(err);

                                }
                            </script>

                            <div class="flex flex-col sm:flex-row md:flex-col lg:flex-row items-center">
                                <div class="w-full searcher-giving">
                                    <script src="https://api.raisedonors.com/js/fundsearch.js" id="rd-fund-js"></script>

                                    <script>
                                            fundSearchJS.init(
                                                30289,                                    //orgId
                                                'https://give.omusa.org/',                //org base URL
                                                'rd-fund-js',                             //dom element id
                                                Awesomplete.FILTER_CONTAINS,              //custom filter provider
                                                true,                                     //debug info?
                                                SC,                                       //campaign/page url
                                            ); 
                                    </script>
                                </div>

                                <div class="w-full mt-6 sm:mt-0 md:mt-6 lg:mt-0">
                                    <input type="button" id="donation-submit" value="Search Now" class="searcher-form-submit lg:ml-4">
                                </div>

                                <input type="hidden" id="designationid" value="">
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 border-b border-separator">
                        <div>
                            <?php if( have_rows('don_form_block_repeater') ) : ?>
                                <?php while( have_rows('don_form_block_repeater') ) : the_row(); ?>
                                    <div class="text-default mb-5">
                                        <div class="text-3xl font-roboto font-light leading-none mb-1">
                                            <?php the_sub_field('title'); ?>
                                        </div>

                                        <div class="font-roboto tracking-wider uppercase mb-2">
                                            <?php the_sub_field('subtitle'); ?>
                                        </div>

                                        <div class="font-medium">
                                        <?php the_sub_field('description'); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>

                        <div class="flex items-center flex-wrap mb-5">
                            <?php if( have_rows('don_form_non_profit_repeater') ) : ?>
                                <?php
                                    while( have_rows('don_form_non_profit_repeater') ) : the_row();
                                    $logo_image = get_sub_field('logo');
                                ?>
                                    <div class="p-2">
                                        <img src="<?= $logo_image['url']; ?>" alt="<?= $logo_image['title']; ?>">
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="text-default mt-6 mb-4">
                        <?php the_field('don_form_give_by_check'); ?>
                    </div>

                    <div class="text-xs text-default">
                        <?php the_field('don_form_side_copyrights'); ?>
                    </div>

                    <div class="mt-6 flex items-center">
                        <div class="text-default">
							<div class="text-sm leading-none">
								Mode:
							</div>
							<div class="switch-color text-xs font-black">
								Light
							</div>
						</div>

                        <!-- Theme Switcher -->
                        <?php get_template_part('partials/theme-switcher'); ?>
                        <!-- Theme Switcher -->
                    </div>

                </div>
            </div>
        </div>
    </section>


<?php get_footer();
