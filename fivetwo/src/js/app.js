var customVideoContainer = document.querySelector('#custom-video');
var customVideoId;
var customVideo;
var duration = 0;

if (customVideoContainer !== null) {

  customVideoId = customVideoContainer.getAttribute('data-id');

  // Vimeo control
  var customVideoOptions = {
    id: customVideoId,
    controls: false,
    autoplay: true,
    muted: true,
  };

  customVideo = new Vimeo.Player('custom-video', customVideoOptions);

  var onPlay = function (data) {

    if (data.seconds > 25) {
      customVideo.pause();
    }

  }

  customVideo.ready().then(function () {

    customVideo.on('timeupdate', onPlay);

  });

  customVideo.off('play', onPlay); // Callback Function
}


// 0. Get the videoId
var videoElement = document.querySelector('#player');
var videoId;

if (videoElement !== null) {
  videoId = videoElement.getAttribute('data-id');
}

// Popup Video Banner
var videoBanner = document.querySelector('#banner-video');
var videoBannerId;
if (videoBanner !== null) {
  videoBannerId = videoBanner.getAttribute('data-id');
}

// 1. This code loads the IFrame Player API code asynchronously.
var tag = document.createElement('script');

if($('.watch-video').hasClass('youtube')) {
  tag.src = "https://www.youtube.com/iframe_api";
  var firstScriptTag = document.getElementsByTagName('script')[0];
  firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
}

// 2. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    height: '315',
    width: '420',
    videoId: videoId,
    events: {
      //'onReady': onPlayerReady,
      //'onStateChange': onPlayerStateChange
    }
  });
}

// Play Video.
function playYouTubeVideo() {
  player.playVideo()
}

// Pause Video.
function pauseYouTubeVideo() {
  player.pauseVideo()
}

// Vimeo control
var optionsVimeo = {
  id: videoId,
  width: 420
};

var vimeoOptionsBanner = {
  id: videoBannerId,
  width: 420
};


(function($){
    $(document).foundation();

    // Updates to main form
    if(
      $('body').hasClass('donation-multiply-ministries') ||
      $('body').hasClass('donation-1912givingtuesday') ||
      $('body').hasClass('donation-1912gifts')
    ) {
      var div = $('<div></div>')
                .addClass('ffz-headline3')
                .text('Make your donation in these 3 easy, secure steps:');

      $('.ffz-headline2').after(div);
      $('.ffz-full__info .ffz-custom-title-bar-bg').prepend('Step 3:');
    }

    //Hidden menu bar - Seven Steps to start
    if ($('body').hasClass('page-seven-steps-to-start')) {
        $('header').css('display','none');
    }

    $('.autoplay').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      autoplaySpeed: 2000,
      centerMode: true,
      responsive: [
          {
            breakpoint: 640,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              centerMode: true,
              variableWidth: true,
            }
          },
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 2,
              infinite: true
            }
          }
        ]
    });

    $('.testimonials__slider-slick').slick({
      infinite: true,
      speed: 300,
      slidesToShow: 1,
      adaptiveHeight: true
    });

    $(document).ready(function(){

      var vimeoPlayer;
      var vimeoBannerPlayer;

      /* QUIZ */
      var quizQuestions = $('.quiz li');

      /* ENABLE NEXT BUTTON */
      $('.quiz input[type="radio"]').on('click', function() {
        if($('input[type="radio"]:visible').is(':checked')) {
          $('.nextScreen').removeClass('disabled');
        }
      });

      $('.nextScreen').on('click', function(event) {
        var currentScreen;

        if( !$(this).hasClass('disabled') ){
          $(this).addClass('disabled');

          if($('.quiz__start:visible').length == 1) {
            $('.quiz__start').hide();
            quizQuestions.first().addClass('active');
            $('.nextScreen').text('NEXT QUESTION');
          } else {
            $('.gfield.active').removeClass('active').next().addClass('active');
          }

          // Change BG on each screen
          currentScreen = $('.gfield.active').index() + 1;
          $('#quizModal').attr('data-bg', currentScreen);

          if($('.gfield.active').hasClass('getYourResults')){
            $('.getYourResults').show();
            $(this).hide();
            $('.quiz .gform_footer').show();
          } else {
            Foundation.Motion.animateIn('.gfield.active', 'slide-in-right');
          }

          /* IS LAST QUESTION */
          if($('.gfield.active').next().hasClass('getYourResults')){
            $('.nextScreen').text('SEE RESULTS');
          }
        }
      });



      /*Survey*/

      /* ENABLE NEXT BUTTON */
      $('#gform_wrapper_29 input').on('click', function() {
        if($('input:visible').is(':checked')){
            $('.survey-button').removeClass('disabled');
          $(this).fadeOut(100).fadeIn(100).fadeOut(100).fadeIn(100);
        }
      });

      var url = window.location.href;
      if((url.includes('survey')) && (url.includes('name')))
      {
        $('body').one('click', function() {
          if($('#input_29_5').val()){
            $('.survey-button').removeClass('disabled');
          }
        });
      }

      var surveyQuestions = $('#gform_fields_29 li');

      $('.survey-button').on('click', function(event) {
        var currentScreen;

        $('.survey').removeAttr('style');

        function inputnotempty(){
          if($('#input_29_4 input').val() && $('#input_29_5').val()){
              $('.survey-button').removeClass('disabled');
            }
        }

        if( !$(this).hasClass('disabled') ){
          $(this).addClass('disabled');

          if($('.quiz__start:visible').length == 1) {
            $('.quiz__start').hide();
            $('.desc-survery').hide();
            surveyQuestions.first().addClass('active');
            $('.survey-button').text('NEXT QUESTION');
            inputnotempty();
          } else {
            $('.gfield.active').removeClass('active').next().addClass('active');
          }

          if($('#field_29_4:visible').length == 1){
            $('#field_29_5').addClass('active');
          }
          else{
            $('#field_29_5').removeClass('active');
          }

          if($('#field_29_6:visible').length == 1){
            $('.survey-button').hide().addClass('disabled');
            $('#input_29_6 input').click(function(){
              $('.gfield.active').removeClass('active');
              $('#field_29_7').css('top','200px').animate({top: '0px'}, "slow").addClass('active');
              checkb();
            });
          }

          function checkb(){
            if($('#field_29_7:visible').length == 1){
              $('.survey-button').show().addClass('disabled');
              $('.survey-button').click(function(){
                $('.gfield.active').removeClass('active');
                $('#field_29_9').removeClass('active');
                $('#field_29_8').css('top','200px').animate({top: '0px'}, "slow").addClass('active');
                lastquestion();
              });
            }
          }


          function lastquestion(){
            if($('#field_29_8:visible').length == 1){
              $('.survey-button').hide();
              $('#choice_29_8_0').click(function(){
                $('.survey-button').hide();
                $('.survey .gform_footer').hide();
                $('.gfield.active').removeClass('active');
                $('#field_29_9').css('top','200px').animate({top: '0px'}, "slow").addClass('active');
                $("#choice_29_9_0").prop('disabled', false);
                $("#choice_29_9_1").prop('disabled', false);
                $("#choice_29_9_2").prop('disabled', false);
              });
              $('#input_29_9 input').click(function(){
                $('.survey .gform_footer').animate({top: '0px'}, "slow").addClass('active').show();
              });
              $('#choice_29_8_1').click(function(){
                $('.survey-button').hide();
                $('.survey .gform_footer').show();
              });
            }
          }

          $('#input_29_4_3').change(function(){
            $('#input_29_4_3').each(function(){
              if($('#input_29_5').val()){
                if(!$('#input_29_4_3').val())
                {
                  $('.survey-button').addClass('disabled');

                }
                else
                {
                   $('.survey-button').removeClass('disabled');
                }
              }
            });
          });

          $('#input_29_4_6').change(function(){
            $('#input_29_4_6').each(function(){
               if($('#input_29_5').val()){
                if(!$('#input_29_4_6').val())
                {
                  $('.survey-button').addClass('disabled');

                }
                else
                {
                   $('.survey-button').removeClass('disabled');
                }
              }
            });
          });

          function validateemail(email){
            var status = false;


              var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

                if (reg.test(email)) {
                  return true;
                }
                else{
                  return false;
                }
          }

          $('#input_29_5').change(function () {
            var status = false;
            var email = $('#input_29_5').val();

            status = validateemail(email);

            //$('#input_29_5').val(email);
            if (!status) {
              $('.survey-button').addClass('disabled');
                return false;
            }
            else if($('#input_29_4 input').val()){
               $('.survey-button').removeClass('disabled');
            }

             $( "body" ).keydown(function() {
              if (!status) {
                  $('.survey-button').addClass('disabled');
                }
               else if($('#input_29_4 input').val()){
                   $('.survey-button').removeClass('disabled');
                }
            });
          });

          $( "#input_29_5" ).keydown(function() {
            if (!status) {
                $('.survey-button').addClass('disabled');
              }
             else if($('#input_29_4 input').val()){
                 $('.survey-button').removeClass('disabled');
              }
          });

        }
      });
      $('.survey-button').click(function(e) {
        $('.survey').css('top','200px').animate({top: '0px'}, "fast");
      });

      $('#input_29_7 input[type=checkbox]').on('change', function (e) {
          $(this).attr( 'checked', 'checked' );
          if ($('input[type=checkbox]:checked').length == 4) {
              $(this).prop('checked', false);
               $('.survey-button').removeClass('disabled');
          }
          else if($('input[type=checkbox]:checked').length <3){
            $('.survey-button').addClass('disabled');
          }
      });

      /* SHOP */
      $('.input-text.qty').on('change', function() {
        var sku = $(this).parent().next('.add_to_cart_button').data('product_sku');
        $(this).parent().next('.add_to_cart_button').attr('data-quantity', $(this).val());
      });

      $(document).on('moved.zf.slider', '.gfield:visible .slider', function(){
        var rating = parseInt($(this).find('.slider-handle').attr('aria-valuenow')) - 1;
        var questionNumber = parseInt($('#quizModal').attr('data-bg')) - 1;

        $('.gfield_radio').eq(questionNumber).find('li input')[rating].checked = true;
        $('.nextScreen').removeClass('disabled');
      });

      if ( $( ".gform_confirmation_message_1" ).length ) {
        $([document.documentElement, document.body]).animate({
                scrollTop: $(".storyOfSuccess").offset().top
            }, 2000);
      }

      $('.watch-video').on('click', function(){
        if( $(this).hasClass('youtube') ) {
          playYouTubeVideo();
        }
        if( $(this).hasClass('vimeo') ) {
          vimeoPlayer = new Vimeo.Player('player', optionsVimeo);
          vimeoPlayer.setVolume(0.3);
          vimeoPlayer.play();
        }
      });



      // Popup Video Banner
      $('.video-banner').on('click', function () {
        vimeoBannerPlayer = new Vimeo.Player('banner-video', vimeoOptionsBanner);
        vimeoBannerPlayer.setVolume(0.3);
        vimeoBannerPlayer.play();
      });
      $('#videoBannerModal').on('closed.zf.reveal', function (e) {
        vimeoBannerPlayer.pause();
      });



      $('#videoModal').on('closed.zf.reveal', function(e){
        if( $('.watch-video').hasClass('youtube') ) {
          if(videoElement !== null){
            pauseYouTubeVideo();
          }
        } else {
          if(videoElement !== null){
            vimeoPlayer.pause();
          }
        }
      });

      /* ARCHIVE RESOURCES */
      $('.gated').on('click', function() {
        var postId = $(this).attr('data-id');
        $('#input_9_4').val(postId);
      });

      $(document).bind('gform_confirmation_loaded', function(event, formId){
          if( formId === 9 ){
              var download_url = $("#downloadLink").attr('href');
              if(download_url) {
                  var delay = 2000;
                  setTimeout( function(){ window.open(download_url); }, delay );
              }
          }
      });

    });


})(jQuery);

/* GRAVITY FORMS UTM */
function getQueryParams(qs){
    qs = qs.split("+").join(" ");
    var params = {}, tokens, re = /[?&]?([^=]+)=([^&]*)/g;
    while (tokens = re.exec(qs)){
        params[decodeURIComponent(tokens[1])] = decodeURIComponent(tokens[2]);
    }
    return params;
}

function addValueToField(fieldElement, valueUtm){
    fieldElement.forEach(function (element) {
        element.setAttribute('value', valueUtm);
    });
}

var query_params = getQueryParams(document.location.search),
    utm_source = document.querySelectorAll('.utm_source input'),
    utm_medium= document.querySelectorAll('.utm_medium input'),
    utm_campaign = document.querySelectorAll('.utm_campaign input'),
    utm_content = document.querySelectorAll('.utm_content input');

if(utm_source.length && query_params.utm_source) addValueToField(utm_source, query_params.utm_source);
if(utm_medium.length && query_params.utm_medium) addValueToField(utm_medium, query_params.utm_medium);
if(utm_campaign.length && query_params.utm_campaign) addValueToField(utm_campaign, query_params.utm_campaign);
if(utm_content.length && query_params.utm_content) addValueToField(utm_content, query_params.utm_content);
/* GRAVITY FORMS UTM */

/*Try Access Cookie*/

var form = document.querySelector("#gform_32");

if (form) {
    form.onsubmit = submitted.bind(form);
}

function submitted(event) {
    function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    setCookie("tryresources", "true", "10000");
}


function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin == -1) {
        begin = dc.indexOf(prefix);
        if (begin != 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end == -1) {
        end = dc.length;
        }
    }
    return decodeURI(dc.substring(begin + prefix.length, end));
} 

$(document).ready(function(){
  $('.testimonial-slider-section').slick({
      autoplay: true,
      infinite: true,
      speed: 2000,
      adaptiveHeight: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplaySpeed: 2000,
      centerMode: true,
      centerPadding: '80px',
      variableWidth: true,
      responsive: [
          {
            breakpoint: 640,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              centerMode: true,
              variableWidth: true,
            }
          }
        ]
  });
});

$(document).ready(function(){
  $('.reader-slider').slick({
      autoplay: true,
      infinite: true,
      speed: 2000,
      adaptiveHeight: false,
      slidesToShow: 2,
      slidesToScroll: 1,
      autoplaySpeed: 2000,
      centerMode: true,
      centerPadding: '80px',
      variableWidth: true,
      responsive: [
          {
            breakpoint: 640,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              centerMode: true,
              variableWidth: true,
            }
          }
        ]
  });
});

$(document).ready(function(){
  $('.copy-button-slider-container').slick({
      autoplay: true,
      infinite: true,
      speed: 2000,
      adaptiveHeight: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      autoplaySpeed: 2000,
      centerMode: true,
      centerPadding: '20px',
      variableWidth: true,
      responsive: [
          {
            breakpoint: 640,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              centerMode: true,
              variableWidth: true,
            }
          }
        ]
  });
});

$('.copy-button-slider-container img').on('click', function() {
  $('#overlay')
    .css({backgroundImage: `url(${this.src})`})
    .addClass('open')
    .one('click', function() { $(this).removeClass('open'); });
});

$('.open-contact-lightbox').on('click', function() {
  $('.gf-contant-form').addClass('lightbox-visible');        
});

$('.close-lightbox-form').on('click', function() {
  $('.homepage-lightbox').removeClass('lightbox-visible');        
});

$('.open-virtuous-lightbox').on('click', function() {
  $('.virtuous-contact-form').addClass('lightbox-visible');        
});

$('.open-main-contact-lightbox').on('click', function() {
  $('.gf-contact-form-lb').addClass('lightbox-visible');        
});

$('.open-virtuous-lightbox-horizontal').on('click', function() {
  $('.virtuous-contact-form-horizontal').addClass('lightbox-visible');        
});

$('.open-faith-work-lightbox').on('click', function() {
  $('.faith-work-form').addClass('lightbox-visible');        
});
