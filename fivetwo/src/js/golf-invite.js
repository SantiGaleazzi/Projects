(function($){

    $('.golf-invite--open-video').on('click', function() {
        
        if (!$('.golf-invite-lightbox').hasClass('active')) {
            
            $('.golf-invite-lightbox').addClass('active');
            $('body').addClass('golf-invite-overflow-hidden');

        }

    });

    // Close close modal
    $('.golf-invite-video__close').on('click', function () {

        $('.golf-invite-lightbox').removeClass('active');
        $('body').removeClass('golf-invite-overflow-hidden');

        $("iframe#custom-video-golf").attr("src", function(index, attr){ 
            return attr;
        });

    });

    // Container click close modal
    $('.golf-invite-lightbox').on('click', function () {

        $('.golf-invite-lightbox').removeClass('active');
        $('body').removeClass('golf-invite-overflow-hidden');

        $("iframe#custom-video-golf").attr("src", function(index, attr){ 
            return attr;
        });
        
    });

})(jQuery);