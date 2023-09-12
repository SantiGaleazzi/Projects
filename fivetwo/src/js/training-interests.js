(function($){

    $('.training-interests .interest').on('click', function () {

        var type = $(this).data('type')

        if ( type == 'lightbox') {

            var lightbox_id = $(this).data('id');

            $('#' + lightbox_id + '.training-interests-lightbox' ).addClass('active');
            $('body').addClass('training-interests-overflow-hidden');

            // Close close modal
            $('#' + lightbox_id + ' .training-interests-form__close').on('click', function () {

                $('#' + lightbox_id).removeClass('active');
                $('body').removeClass('training-interests-overflow-hidden');

            });

        }

    });


})(jQuery);

(function($){

    $('.lb-banner .interest').on('click', function () {

        var type = $(this).data('type')

        if ( type == 'lightbox') {


            $('.lb-banner .training-interests-lightbox' ).addClass('active');
            $('body').addClass('training-interests-overflow-hidden');

            // Close close modal
            $('.lb-banner .training-interests-form__close').on('click', function () {

                $('.lb-banner .training-interests-lightbox' ).removeClass('active');
                $('body').removeClass('training-interests-overflow-hidden');

            });

        }

    });


})(jQuery);


