<?php

    $global_fund_side_image = get_field('global_fund_side_image');

?>

<div id="specific-need" class="px-4 pt-14 lg:pt-16 bg-gray-150-new relative z-20">
    <div class="container">
        <div class="flex flex-col lg:flex-row text-default">
            <div class="w-full lg:w-1/3 mb-8 lg:mb-0 searcher-list">
                <div class="text-4xl font-roboto font-light leading-snug mb-4">
                    <?php the_field('global_fund_title'); ?>
                </div>

                <div class="mb-6">
                    <?php the_field('global_fund_description'); ?>
                </div>
                    
                <?php
                    if ( get_field('global_fund_button') ) :

                        $global_fund_button = get_field('global_fund_button');
                        $global_fund_button_target = $global_fund_button['target'] ? $global_fund_button['target'] : '_self';

                ?>
                    <div class="open-lightbox">
                        <a href="<?= $global_fund_button['url']; ?>" target="<?= esc_attr( $global_fund_button_target ); ?>" class="text-lg text-center text-white-pure leading-none font-black px-8 py-4 bg-orange-500 inline-block cursor-pointer"><?= $global_fund_button['title']; ?></a>
                    </div>
                <?php endif; ?>
            </div>

            <div class="w-full lg:w-2/3 flex flex-col-reverse md:flex-row md:items-end xl:items-start relative z-10">
                <div class="w-full md:w-1/2">
                    <img src="<?= $global_fund_side_image['url']; ?>" alt="<?= $global_fund_side_image['alt']; ?>" class="mx-auto md:-ml-6">
                </div>

                <div class="w-full md:w-1/2 md:pl-6 pb-8 xl:pb-0">
                    <div class="text-4xl font-roboto font-light leading-snug mb-4">
                        <?php the_field('specific_need_title'); ?>
                    </div>

                    <div class="font-medium mb-4">
                        <?php the_field('specific_need_description'); ?>
                    </div>

                    <div class="mb-3">
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

                            function getUrlParam( parameter ){
                                var urlparameter = cookievalue;

                                if ( window.location.href.indexOf(parameter) > -1 ) {

                                    urlparameter = getUrlVars()[parameter];

                                }

                                return urlparameter;
                            }

                            var scvalue = getUrlParam('sc');
                            var SC = "donate?sc=" + scvalue;
                        </script>

                        <div class="flex flex-col md:flex-row items-center">
                            <div class="w-full flex items-center flex-col md:flex-row searcher-giving">
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

                            <div class="w-full md:w-auto mt-4 md:mt-0 md:ml-4">
                                <input type="button" id="donation-submit" value="Search Now" class="w-full font-bold leading-none text-white-pure px-6 py-3 bg-orange-500 inline-block ">
                            </div>

                            <input type="hidden" id="designationid" value="">
                        </div>
                        
                    </div>
                        
                    <div class="text-xs leading-2">
                        <?php the_field('specific_need_caption'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>