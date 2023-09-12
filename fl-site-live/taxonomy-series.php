<?php

    get_header();
    
    $term = get_queried_object();
    $series_name = get_term( $term->term_id )->name;
	$series_description = get_term( $term->term_id )->description;

    // Share Season and if the season exists.
    // If does not exists the default will be season 1.
    if ( isset( $_GET['season'] ) && ( term_exists( 'season-' . $_GET['season'], 'season' ) !== 0 ) && ( term_exists( 'season-' . $_GET['season'], 'season' ) !== null ) ) {

        $season_param = 'season-' . $_GET['season'];

    } else {

        $season_param  = 'season-1';

    }
    
    // This snippet is for the season dropdown.
    // Variable that allows us to store the available seasons for the current serie.
    $total_of_seasons_in_serie = array();

    // Get all seasons registrated in custom post.
    $all_seasons = array(); // Used to store all seasons id's, which will be filtered later.
    $seasons = get_terms( array(
        'taxonomy' => 'season',
        'hide_empty' => true,
    ));
    
    // Adds all seasons id's to the array
    foreach ( $seasons as $season ) {

        array_push( $all_seasons, $season->term_id );
    
    }

    // Search in all posts.
    $series_seasons = new WP_Query( array(
        'post_type' => 'resources',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'tax_query' => array(
            'relation' => 'IN',
            array(
                'taxonomy' => 'series',
                'field' => 'term_id',
                'terms' => array( $term->term_id )
            ),
            array(
                'taxonomy' => 'type',
                'field' => 'slug',
                'terms' => array('series')
            ),
            array(
                'taxonomy' => 'season',
                'field' => 'term_id',
                'terms' => $all_seasons
            ),
        )
    ));

    if ( $series_seasons->have_posts() ) {

        while ( $series_seasons->have_posts() ) {
            
            $series_seasons->the_post();

            // Get episode season.
            $episode_season = get_the_terms( $post->ID, 'season' );
            
            // Loop through the episodes.
            foreach ( $episode_season as $season_related ) {

                // Check if the season is already in the array.
                if ( !in_array( $season_related->term_id, $total_of_seasons_in_serie ) ) {
                    
                    // Filter only the available seasons for the current serie.
                    array_push( $total_of_seasons_in_serie, $season_related->term_id );

                }

            }

        }

        // Sort the seasons by number.
        sort( $total_of_seasons_in_serie );

        wp_reset_postdata();

    }
?>

<section id="series-info" class="series-info px-4 md:px-0 text-white relative">
    <div class="container h-full relative z-20">
        <div class="h-full flex items-center">
            <div class="w-full lg:w-3/5 xl:w-1/2">
                <?php
                    if ( get_field('series_name_logo', $term) ) :

                        $term_logo = get_field('series_name_logo', $term);
                ?>
                    <div class="mb-5">
                        <img src="<?= $term_logo['url'];?>" alt="<?= $term_logo['alt'];?>">
                    </div>
                <?php endif; ?>

                <div class="series-name text-3xl md:text-5xl leading-none font-bold mb-2" data-series-name="<?= $series_name; ?>">
                    <?= $series_name; ?>
                </div>

                <div class="series-description text-xl md:text-2xl font-light episode-has-wysiwyg" data-series-description="<?= strip_tags( get_field('series_name_full_description', $term) ); ?>">
                    <?php the_field('series_name_full_description', $term); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="w-3/5 h-full bg-gradient-to-l from-transparent to-black absolute top-0 left-0 z-10"></div>

    <div class="series-cover w-full h-full absolute inset-0 bg-cover bg-center md:bg-right-top bg-no-repeat" style="background-image: url('<?php the_field( 'series_name_background', $term ); ?>');" data-series-cover="<?php the_field( 'series_name_background', $term ); ?>"></div>

    <div class="video-player-container has-player z-30">
        <div class="close-video absolute top-0 right-0 mt-6 mr-10 z-10 cursor-pointer">
            <i class="far fa-times-circle text-3xl text-white"></i>
        </div>
		
        <div id="video-element"></div>
    </div>
</section>

<section class="px-4 py-12">
    <div class="container">
        <div class="flex flex-col sm:flex-row sm:items-center mb-4">
            <div class="mr-4">
                <div class="text-white text-3xl font-bold mb-2 sm:mb-0">
                    Episodes
                </div>
            </div>

            
            <?php
                if ( !empty( $total_of_seasons_in_serie ) ) :

                    // This gets the first season in the list.
                    $first_season = get_term( $total_of_seasons_in_serie[0] )->name;
                
            ?>
                <div class="series-season-dropdown w-full sm:w-56 relative z-20 cursor-pointer" data-series-id="<?= $term->term_id; ?>" data-total-of-seasons="<?= count( $all_seasons ); ?>">
                    <div class="season-selected leading-none px-3 py-2 bg-gray-600 bg-opacity-75 flex items-center rounded-lg relative z-10">
                        <div class="season-name flex-1 text-gray-300" data-first-season="<?= $first_season; ?>">
                            <?= $first_season; ?>
                        </div>

                        <div class="flex-none flex items-center">
                            <div class="loading-spinner"></div>
                            <i class="fas fa-angle-down season-icon text-gold-light"></i>
                        </div>
                    </div>
                    
                    <div class="seasons-available text-white leading-none pt-2 blurry bg-gray-450 bg-opacity-50 rounded-b-lg absolute top-0 mt-6 overflow-hidden">
                        <?php
                            foreach ( $total_of_seasons_in_serie as $season_id ) :

                                // Gets term name.
                                $season_name = get_term( $season_id )->name;
                        ?>
                            <div class="season-option px-3 py-2 hover:bg-gold transition-all duration-200 ease-in-out cursor-pointer <?php if ( get_term( $season_id )->slug === $season_param ) { echo 'bg-gold-light'; } ?>" data-season="<?= $season_id; ?>">
                                <?= $season_name; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <?php

            
            $series_episodes = new WP_Query( array(
                'post_type' => 'resources',
                'posts_per_page' => -1,
                'order' => 'ASC',
                'tax_query' => array(
                    'relation' => 'IN',
                    array(
                        'taxonomy' => 'series',
                        'field' => 'term_id',
                        'terms' => array( $term->term_id )
                    ),
                    array(
                        'taxonomy' => 'type',
                        'field' => 'slug',
                        'terms' => array('series')
                    ),
                    array(
                        'taxonomy' => 'season',
                        'field' => 'slug',
                        'terms' => array($season_param)
                    ),
                )
            ));

            if ( $series_episodes->have_posts() ) :

        ?>
            <div class="series-episodes flex flex-wrap gap-y-4">
                <?php
                    while ( $series_episodes->have_posts() ) : $series_episodes->the_post();

                    $season_data = wp_get_post_terms( get_the_ID(), 'season', array( 'fields' => 'all') );

                    $season_number = substr( $season_data[0]->slug, -1 );

                ?>
                    <div class="episode w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 sm:px-2 flex" data-season-id="<?= $season_number; ?>" data-episode-id="<?php the_field('series_episode_number'); ?>" data-title="<?php the_title(); ?>" data-description="<?= esc_html(get_the_excerpt()); ?>" data-thumbnail-full="<?php the_post_thumbnail_url('full'); ?>">
                        <div class="episode-cover player-media w-full flex flex-col border-2 border-gray-800 hover:border-white rounded-lg transition-all duration-100 ease-in-out overflow-hidden group cursor-pointer" data-media-id="<?php the_field('series_player_media_id'); ?>" data-media-type="<?php the_field('series_media_type'); ?>">
                            <div class="h-40 rounded-lg transition-all duration-100 ease-in-out overflow-hidden relative">
                                <div class="episode-thumb w-full h-full bg-center bg-cover bg-no-repeat rounded-lg transition-all transform duration-300 ease-in-out scale-100 group-hover:scale-105 overflow-hidden" style="background-image: url('<?php the_post_thumbnail_url('medium'); ?>');">
                                </div>

                                <div class="is-playing-text">
                                    Now Playing
                                </div>
                            </div>

                            <div class="episode-data flex-auto flex flex-col justify-betweem group-hover:bg-gray-850 p-3 transition-colors duration-200 ease-in-out">
                                <div class="flex-auto mb-3">
                                    <div class="text-white text-lg uppercase font-bold mb-1">
                                        <?php the_title(); ?>
                                    </div>

                                    <div>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>

                                <div class="flex-none text-sm text-gold-light cursor-pointer inline-block">
                                    <div><span class="underline">Watch Now</span> »</div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>

            <?php wp_reset_postdata(); ?>

        <?php else : ?>

            <div class="text-center text-xl text-white">
                No Episodes Found
            </div>

        <?php endif; ?>
    </div>
</section>

<?php get_footer();
