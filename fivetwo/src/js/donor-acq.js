(function($){

    $('.donor-acq-content__play').on('click', function() {
        
        if (!$('.donor-acq-lightbox').hasClass('active')) {
            $('.donor-acq-lightbox').addClass('active');
            $('body').addClass('donor-acq-overflow-hidden');
        }
    });

    // Close close modal
    $('.donor-acq-video__close').on('click', function () {
        $('.donor-acq-lightbox').removeClass('active');
        $('body').removeClass('donor-acq-overflow-hidden');
    });

    // Container click close modal
    $('.donor-acq-lightbox').on('click', function () {
        $('.donor-acq-lightbox').removeClass('active');
        $('body').removeClass('donor-acq-overflow-hidden');
    });

})(jQuery);