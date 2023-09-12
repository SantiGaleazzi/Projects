
<?php
    
    function enqueue_search_for_episodes_script() {
    
        wp_enqueue_script( 'search_for_episodes', get_stylesheet_directory_uri() . '/assets/js/seasons-dropdown.js', array(), laravel_mix_asset( 'assets/js/seasons-dropdown.js' ), true );

        wp_localize_script( 'search_for_episodes', 'search_series_episodes_ajax', array( 'ajaxurl' => admin_url('admin-ajax.php') ) );

    }
    add_action( 'wp_enqueue_scripts', 'enqueue_search_for_episodes_script' );

    // Internships page content Filtering
    function search_series_episodes() {

        // Variables
        $series_id = (int) $_POST['series_id'];
        $season_id = (int) $_POST['season_id'];

		$data = (object)[]; // This line fixes the issue with PHP8.

        // Get all long term posts that are published.
        $args = array(
            'post_type' => 'resources',
            'posts_per_page' => -1,
            'order' => 'ASC',
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'taxonomy' => 'series',
                    'field' => 'term_id',
                    'terms' => array( $series_id )
                ),
                array(
                    'taxonomy' => 'type',
                    'field' => 'slug',
                    'terms' => array('series')
                ),
                array(
                    'taxonomy' => 'season',
                    'field' => 'term_id',
                    'terms' => array( $season_id )
                ),
            )
        );

        $search_episodes = new WP_Query( $args );

        if ( $search_episodes->have_posts() ) :

            $episodes_found = '';
            
            while ( $search_episodes->have_posts() ) : $search_episodes->the_post();

                $season_data = wp_get_post_terms( get_the_ID(), 'season', array( 'fields' => 'all') );

                $season_number = substr( $season_data[0]->slug, -1);

                $episodes_found .= '
                    <div class="episode w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 sm:px-2 flex" data-season-id="' . $season_number . '" data-episode-id="' . get_field('series_episode_number') . '" data-title="'. get_the_title()  .'" data-description="'. esc_html( get_the_content() ) .'" data-thumbnail-full="'. get_the_post_thumbnail_url( $post->ID, 'full' ) .'">
                        <div class="episode-cover player-media w-full flex flex-col border-2 border-gray-800 hover:border-white rounded-lg transition-all duration-100 ease-in-out overflow-hidden group cursor-pointer" data-media-id="' . get_field('series_player_media_id') . '" data-media-type="'. get_field('series_media_type') . '">
                            <div class="h-40 rounded-lg transition-all duration-100 ease-in-out overflow-hidden relative">
                                <div class="episode-thumb w-full h-full bg-center bg-cover bg-no-repeat rounded-lg transition-all transform duration-300 ease-in-out scale-100 group-hover:scale-105 overflow-hidden" style="background-image: url(' . get_the_post_thumbnail_url( $post->ID, 'medium' ) . ');"></div>

                                <div class="is-playing-text">
                                    Now Playing
                                </div>
                            </div>

                            <div class="episode-data flex-auto flex flex-col group-hover:bg-gray-850 p-3">
                                <div class="flex-auto mb-3">
                                    <div class="text-white text-lg uppercase font-bold mb-1">'
                                        . get_the_title() .
                                    '</div>

                                    <div>'
                                        . get_the_excerpt() .
                                    '</div>
                                </div>

                                <div class="flex-none text-sm text-gold-light cursor-pointer inline-block">
                                    <div><span class="underline">Watch Now</span> »</div>
                                </div>
                            </div>
                        </div>
                    </div>
                ';

            endwhile;

            wp_reset_postdata();

            $data->episodes = $episodes_found;

            echo json_encode( $data );
        
        else :

            $data->episodes = 
                '<div class="w-full text-center text-default">
                    No Episodes found
                </div>'
        ;

        echo json_encode( $data );

        endif;

        die();
        
    }
    add_action( 'wp_ajax_series_episode_search', 'search_series_episodes' );
    add_action( 'wp_ajax_nopriv_series_episode_search', 'search_series_episodes' );
