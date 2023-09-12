<?php 

// Enqueue ajax and script
function enqueue_load_more_videos() {
 
    wp_enqueue_script( 'videos-search-script', get_stylesheet_directory_uri() . '/resources/js/videos/load-more-videos.js', array('jquery') , '1', false );
   
    wp_localize_script( 'videos-search-script', 'videos_search_script_ajax', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );

}
add_action( 'wp_enqueue_scripts', 'enqueue_load_more_videos' );

// Videos Filtering
function load_more_videos() {

    $page = $_POST['page_number'] + 1;

    // Get all videos posts that are published.
	$args = array(
		'post_type' => 'videos',
		'orderby' => 'date',
		'posts_per_page' => 9,
        'paged' => $page
	);

	$more_videos_query = new WP_Query( $args );
 
	if ( $more_videos_query->have_posts() ) :

        $default_post_thumbnail = get_field('settings_default_thumbnail', 'options');

        $videos_to_load = ''; // Is used to get the videos as string

		while( $more_videos_query->have_posts() ) : $more_videos_query->the_post();

            $post_name = get_the_title();
            $post_excerpt = get_the_excerpt();
            $thumbnail_image = get_the_post_thumbnail_url();
            $video_id = get_field('internship_stories_video_id');
            $thumbnail_image ? $thumbnail_image : $default_post_thumbnail['url'];

            if ( $video_id ) {

                $videos_to_load .=
                    '<div class="intern-video w-full sm:w-1/2 md:w-1/3 flex p-3">'.
                        '<div class="w-full bg-white-pure rounded-lg overflow-hidden shadow-2xl flex flex-col">'.
                            '<div class="py-32 bg-top bg-cover bg-no-repeat relative" style="background-image: url(' . $thumbnail_image .');">'.
                                '<div class="play-video w-14 h-14 flex items-center justify-center bg-red-500 rounded-full absolute left-0 bottom-0 ml-5 mb-5 cursor-pointer" data-video-id="'. $video_id .'">'.
                                    ' <i class="fas fa-play text-white-pure text-3xl leading-none pl-1"></i>'.
                                '</div>'.
                            '</div>'.

                            '<div class="text-white-pure text-xl lg:text-2xl leading-none font-bold p-4 bg-red-500">'.
                                $post_name .
                            '</div>'.

                            '<div class="flex-auto text-sm p-4">'.
                                $post_excerpt .
                            '</div>'.
                        '</div>'.
                    '</div>'
                ;

            } else {

                $videos_to_load .=
                    '<div class="intern-video w-full sm:w-1/2 md:w-1/3 flex p-3">'.
                        '<div class="w-full bg-white-pure rounded-lg overflow-hidden shadow-2xl flex flex-col">'.
                            '<div class="py-32 bg-top bg-cover bg-no-repeat relative" style="background-image: url(' . $thumbnail_image .');">'.
                            '</div>'.

                            '<div class="text-white-pure text-xl lg:text-2xl leading-none font-bold p-4 bg-red-500">'.
                                $post_name .
                            '</div>'.

                            '<div class="flex-auto text-sm p-4">'.
                                $post_excerpt .
                            '</div>'.
                        '</div>'.
                    '</div>'
                ;

            }

		endwhile;

        wp_reset_postdata(); 

        $data->videos = $videos_to_load; // String of jobs found in the query.
        $data->page = $page;
        $data->num_max = $more_videos_query->max_num_pages;

        echo json_encode( $data );
        
	else :

        $data->videos =
            '<div class="w-full text-center text-default">
                No videos found
            </div>'
        ;

        $data->page = 1;
        $data->num_max = 1;

        echo json_encode( $data );

	endif;

	die();

}
add_action('wp_ajax_load_more_videos', 'load_more_videos');
add_action('wp_ajax_nopriv_load_more_videos', 'load_more_videos');