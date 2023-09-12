/*Lightbox Actions*/

$(".open-lightbox").click(function(){
	$('.lightbox-form').show();
});

$(".close-lightbox").click(function(){
	$('.lightbox-form').hide();
});

$(".lightbox-form").click(function(){
	$('.lightbox-form').hide();
});

$(".gform_wrapper").click(function(e){
	e.stopPropagation();
});


/*Count up Animation*/
function animateValue(obj, start = 0, end = null, duration = 3000) {
    
    if (obj) {

        var textStarting = obj.innerHTML;

        end = end || parseInt(textStarting.replace(/\D/g, ""));

        var range = end - start;

        // no timer shorter than 50ms (not really visible any way)
        var minTimer = 50;

        // calc step time to show all interediate values
        var stepTime = Math.abs(Math.floor(duration / range));

        // never go below minTimer
        stepTime = Math.max(stepTime, minTimer);

        // get current time and calculate desired end time
        var startTime = new Date().getTime();
        var endTime = startTime + duration;
        var timer;

        function run() {
            var now = new Date().getTime();
            var remaining = Math.max((endTime - now) / duration, 0);
            var value = Math.round(end - (remaining * range));
            // replace numeric digits only in the original string
            obj.innerHTML = textStarting.replace(/([0-9]+)/g, value);
            if (value == end) {
                clearInterval(timer);
            }
        }

        timer = setInterval(run, stepTime);
        run();
    }
}

animateValue(document.getElementById('workers'));
animateValue(document.getElementById('countries'));
animateValue(document.getElementById('years'));
animateValue(document.getElementById('active-prayer'));
animateValue(document.getElementById('prayer-request'));

$(".label-map").click(function(){
    $('html,body').animate({ scrollTop: $('#trigger-map').offset().top }, 'slow');
});


/*Prayer Counter*/
var cookiename;
var cookievalue; 
var prayname;
var cookieValor;

//$('.pray-number').data('count', 0);

$('.pray-box').click(function(){

    cookiename = $(this).find('.cookie-name').text();
   
    document.cookie = cookiename+ "=1" ; 

    cookievalue = document.cookie.split('; ').find(row => row.startsWith('pray')).split('=')[1];
    $(this).find('.bg-gray-50-new').click(false); 
    location.reload();
    //$(this).find('.pray-number').html( cookieValue);
    $(this).find('.pray-btn').css('opacity','0.3').text("I Prayed For This Request").click(false);
    
    
});

$('.pray-box').each(function(){

    prayname = $(this).find('.cookie-name').text();

    if ( document.cookie.indexOf(prayname) != -1 ){

        $(this).find('.pray-btn').css('opacity','0.3').text("I Prayed for You").click(false);
        $(this).find('.bg-gray-50-new').click(false);

    }
});

$('.pray-country').click(function(){
    cookiename = $(this).find('.cookie-post').text();
    document.cookie = cookiename+ "=1" ; 
    cookievalue = document.cookie.split('; ').find(row => row.startsWith('pray')).split('=')[1];
    $(this).click(false).css('opacity','0.3');
    $(this).find('.country-text').text("I Prayed for You").click(false);
    location.reload();
});

$('.pray-country').each(function(){
    countryname = $(this).find('.cookie-post').text();
    if (document.cookie.indexOf(countryname) != -1){
        $(this).click(false).css('opacity','0.3');
        $(this).find('.country-text').text("I Prayed for You").click(false);
    }
});

$('.pray-country-afghanistan').click(function(){
    cookiename = $(this).find('.cookie-post').text();
    document.cookie = cookiename+ "=1" ; 
    cookievalue = document.cookie.split('; ').find(row => row.startsWith('pray')).split('=')[1];
    $(this).click(false).css('opacity','0.3');
    $(this).find('.country-text').text("I Prayed for You").click(false);
    location.reload();
});

$('.pray-country-afghanistan').each(function(){
    countryCode = $(this).find('.cookie-post').text();

    if ( document.cookie.indexOf(countryCode) != -1 ){
        $(this).click(false).css('opacity', '0.3');
        $(this).find('.country-text').text("I Prayed for Afghanistan").click(false);
    }
});

/*Move GF Field*/
$("#field_6_4").insertAfter("#input_6_3_5_container");
$(".download-form").insertAfter("#gform_submit_button_6");


var button = document.getElementById("donation-submit");
var searchBox = document.querySelector('[id^="rd_fund_search_"]');
	
if ( searchBox != null ) {

    searchBox = searchBox.id;

    ! function() {

        var e = "hidden";
    
        function t(t) {
            var n = t.attributeName;
            t.target;
            n === e && !document.getElementById("awesomplete_list_1").getElementsByTagName("li").length >= 1 && (button.addEventListener("click", function() {
                window.location.href = "https://give.omusa.org/om/per-your-request?comment=" + document.getElementById(searchBox).value + "&sc=" + scvalue
            }, !1), searchBox.addEventListener("keydown", function(e) {
                13 === e.keyCode && (e.preventDefault(), window.location.href = "https://give.omusa.org/om/per-your-request?comment=" + document.getElementById(searchBox).value + "&sc=" + scvalue)
            }, !1))
        }
        new MutationObserver(function(e) {
            e.forEach(t)
        }).observe(document.body, {
            subtree: !0,
            attributes: !0
        })
    }(), document.getElementById(searchBox).addEventListener("blur", function() {
        document.getElementById("awesomplete_list_1").hasAttribute("hidden") && button.addEventListener("click", function() {
            window.location.href = "https://give.omusa.org/om/per-your-request?comment=" + document.getElementById(searchBox).value + "&sc=" + scvalue
        }, !1)
    }); 

}
