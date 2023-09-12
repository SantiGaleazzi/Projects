<?php

    $current_state = strtolower( get_the_title() );

?>

<section>
    <div class="custom-states-dropdown in-column">
        <div class="comparison-title">
            Hover over and click on any state for more information, or select a state:
        </div>

        <?php

            $args = array(
                'post_type'       => 'states',
                'posts_per_page'  => -1,
                'order'           => 'ASC'
            );

            $states_query = new WP_Query( $args );

        ?>
        
        <div class="states-dropdown is-block">
            <div class="selected-option">
                Select a State
            </div>
                                
            <div class="options-in-dropdown">
                <?php if ( $states_query->have_posts() ) : ?>
                    <?php while ( $states_query->have_posts() ) : $states_query->the_post(); ?>
                        <div class="option">
                            <a href="<?php the_permalink(); ?>" class="state-link <?php if ( strtolower(get_the_title()) == $current_state ) { echo 'is-selected'; }?>"><?php the_title(); ?></a>
                        </div>
                    <?php endwhile; ?>
                <?php else : ?>
                    <div class="empty-state">
                        Not states found
                    </div>
                    <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>

<div>
    <div id="map-chart" style="width: 100%; height: 500px;"></div>
</div>