// AJAX Job Search
jQuery( document ).ready( function( $ ) {

    // Load the missing videos
    $('.load-more-video-stories').click( function() {

        $.ajax({
            url: videos_search_script_ajax.ajaxurl,
            type: 'POST',
            data: {
              'action': 'load_more_videos',
              'page_number' : $('#current_videos_page').val()
            },
            dataType: 'json',
            success: function( response ) {

                var page = parseInt( response.page );
                var max_page = parseInt( response.num_max );

                $('.internships-videos').append( response.videos );

                if ( page === max_page ) {

                    $('.load-more-video-stories').hide();

                } else {

                    $('input#current_videos_page').val( page );

                }

                console.log(page)

                reset_videos_lightbox();

            }

        });

        return false;

    });

});

/*

    Name: Internship
    Page: Internships
    URL: /internships
    Comments:

*/
function reset_videos_lightbox() {

    const video_collection = document.querySelectorAll('.internships-videos');

    if ( video_collection != null ) {

        video_collection.forEach( function (internships_videos) {

            const all_videos = internships_videos.querySelectorAll('.intern-video');
            const internships_lightbox = document.querySelector('.internship-video-lightbox');
            const close_lightbox = internships_lightbox.querySelectorAll('.close-ligtbox');

            const base_vimeo_url = 'https://player.vimeo.com/video/';

            all_videos.forEach( function ( video ) {

                const video_playback = video.querySelector('.play-video');
                    
                // Play Videos
                video_playback.addEventListener('click', function() {

                    const video_id = video_playback.dataset.videoId;
                    internships_lightbox.querySelector('iframe').src = base_vimeo_url + video_id + '?autoplay=1';
                        
                    setTimeout( function() {

                        internships_lightbox.classList.add('active');
                        document.body.classList.add('overflow-hidden');

                    }, 200);
                        
                });
                
            });

            // Close Actions
            close_lightbox.forEach( function () {

                close.addEventListener('click', function() {

                    document.body.classList.remove('overflow-hidden');
                    internships_lightbox.classList.remove('active');
                    internships_lightbox.querySelector('iframe').src = '';

                });

            });
        });

    }
} 
