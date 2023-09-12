<?php

    $specific_need_aside_image = get_field('specific_need_aside_image');

?>

<div id="specific-need" class="py-20 md:py-20 bg-gray-150-new relative z-20">
    <div class="container px-6">
        <div class="flex">
            <div class="sm:w-1/2 md:w-3/5 xl:w-1/2 text-default relative z-10 searcher-list">
                <div class="text-4xl font-roboto font-light leading-none mb-4">
                    <?php the_field('specific_need_title'); ?>
                </div>

                <div class="text-lg font-bold leading-none mb-8">
                    <?php the_field('specific_need_pre_title'); ?>
                </div>

                <div class="mb-5">
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

                        <div class="w-full mt-6 md:mt-0">
                            <input type="button" id="donation-submit" value="Search Now" class="searcher-form-submit md:ml-4">
                        </div>

                        <input type="hidden" id="designationid" value="">
                    </div>
                    
                </div>
                    
                <div class="text-xs leading-2 text-default">
                    <?php the_field('specific_need_caption'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="hidden sm:block sm:w-3/5 lg:w-1/2 h-full bg-cover xl:bg-center bg-no-repeat absolute top-0 right-0" style="background-image: url('<?= $specific_need_aside_image['url']; ?>');"></div>
</div>