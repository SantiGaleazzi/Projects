<?php
    // get the current taxonomy term
    $term = get_queried_object();

    $title      = get_field('title_team', $term);
    $subtitle   = get_field('subtitle_team', $term);
    $summary    = get_field('summary_team', $term);

    $incubator    = get_field('incubator', 'option');
?>

<?php get_header(); ?>

<!-- NAVIGATION SECONDARY -->
<?php get_template_part( 'partials/content', 'menu-secondary' ); ?>
<!-- /NAVIGATION SECONDARY -->

<div class="team">
    <div class="grid-container">
        <div class="grid-y">
            <div class="internal__header grid-container">
                <div class="grid-x align-middle">
                    <div class="cell large-9 internal__banner">
                        <?php if ($subtitle): ?>
                            <h6 class="internal__subtitle"><?php echo $subtitle; ?></h6>
                        <?php endif ?>

                        <?php if ($title): ?>
                            <h2 class="internal__title"><?php echo $title; ?></h2>
                        <?php endif ?>

                        <?php if ($summary): ?>
                            <?php echo $summary; ?>
                        <?php endif ?>
                    </div>
                    <div class="cell large-3">
                        <div class="internal__incubators text-center">
                            <?php 
                            if( $incubator ): 
                                $incubator_url = $incubator['url'];
                                $incubator_title = $incubator['title'];
                                $incubator_target = $incubator['target'] ? $incubator['target'] : '_self';
                                ?>
                                <span class="block">Why not learn more?</span>
                                <a class="button yellow" href="<?php echo esc_url($incubator_url); ?>" target="<?php echo esc_attr($incubator_target); ?>"><?php echo esc_html($incubator_title); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="team__wrapper grid-container">
            <?php 
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();

                        $isSticky = get_field('sticky');

                        ($isSticky) ? $stickyArray[] = get_the_ID() : '';
                    } 
                }
                
                $terms = array(
                    'taxonomy'               => 'spot',
                    'orderby'                => 'term_order',
                    'order'                  => 'ASC',
                    'exclude'               => array('32', '31'),
                    'hide_empty'             => true,
                );
                $allTerms = new WP_Term_Query($terms);

                foreach($allTerms->get_terms() as $term) :
                    if ($term->slug == 'trainers' && ($stickyArray)) {
                        $arg = array(
                            'post_type'     => 'team',
                            'post_status'   => 'publish',
                            'orderby'       => 'title',
                            'order'         => 'DESC',
                            'numberposts'   => '-1',
                            'post__in'      => $stickyArray,
                            'tax_query'     => array(
                                array(
                                    'taxonomy' => 'spot',
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                ),
                            ),
                        );
                        $stickyPost = get_posts( $arg );

                        $arg = array(
                            'post_type'     => 'team',
                            'post_status'   => 'publish',
                            'orderby'       => 'title',
                            'order'         => 'ASC',
                            'numberposts'   => '-1',
                            'post__not_in'  => $stickyArray,
                            'tax_query'     => array(
                                array(
                                    'taxonomy' => 'spot',
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                ),
                            ),
                        );
                        $notStickyPost = get_posts( $arg );

                    } else {
                        $arg = array(
                            'post_type'     => 'team',
                            'post_status'   => 'publish',
                            'orderby'       => 'title',
                            'order'         => 'ASC',
                            'numberposts'   => '-1',
                            'tax_query'     => array(
                                array(
                                    'taxonomy' => 'spot',
                                    'field' => 'slug',
                                    'terms' => $term->slug,
                                ),
                            ),
                        );
                        $team = get_posts( $arg );
                    }
                    ?>
                    <h2 id="<?php echo $term->slug; ?>" class="title uppercase"><?php echo $term->name; ?></h2>
                    <div class="grid-x align-top">
                <?php
                    if ( $stickyPost && ($term->slug == 'trainers') ) :
                        foreach ( $stickyPost as $post ) :
                            setup_postdata( $post );
                ?>
                    <div class="team__member flex-container flex-dir-column large-flex-dir-row align-center large-align-justify">
                        <div class="<?php echo (empty(get_the_post_thumbnail())) ? 'team__picture-empty' : 'team__picture'; ?>">
                            <?php the_post_thumbnail('team-picture'); ?>
                        </div>
                        <div class="team__envelope flex-container flex-dir-column">
                            <h2 class="team__member-name title"><?php the_field('full_name'); ?></h2>
                            <h6 class="team__member-spot subtitle"><?php the_field('spot'); ?></h6>
                            <h6 class="team__member-location title"><?php the_field('location_member'); ?></h6>
                            <p>
                                <?php 
                                    echo get_the_custom_excerpt();
                                ?>
                            </p>
                            <div class="team__member-read">
                                 <span class="button light-blue team__member-lightbox" data-postid="<?php echo get_the_ID(); ?>">READ MORE</span>
                            </div>
                           
                        </div>
                    </div>
                <?php  
                        endforeach;
                        wp_reset_postdata();
                    endif;

                    if ( $notStickyPost && ($term->slug == 'trainers') ) :
                        foreach ( $notStickyPost as $post ) :
                            setup_postdata( $post );
                ?>
                    <div class="team__member flex-container flex-dir-column large-flex-dir-row align-center large-align-justify">
                        <div class="<?php echo (empty(get_the_post_thumbnail())) ? 'team__picture-empty' : 'team__picture'; ?>">
                            <?php the_post_thumbnail('team-picture'); ?>
                        </div>
                        <div class="team__envelope flex-container flex-dir-column">
                            <h2 class="team__member-name title"><?php the_field('full_name'); ?></h2>
                            <h6 class="team__member-spot subtitle"><?php the_field('spot'); ?></h6>
                            <h6 class="team__member-location title"><?php the_field('location_member'); ?></h6>
                            <p>
                                <?php 
                                    echo get_the_custom_excerpt();
                                ?>
                            </p>
                            <div class="team__member-read">
                                 <span class="button light-blue team__member-lightbox" data-postid="<?php echo get_the_ID(); ?>">READ MORE</span>
                            </div>
                           
                        </div>
                    </div>
                <?php  
                        endforeach;
                        wp_reset_postdata();
                    endif;

                    if ( $team ) :
                        foreach ( $team as $post ) :
                            setup_postdata( $post );
                ?>
                    <div class="team__member flex-container flex-dir-column large-flex-dir-row align-center large-align-justify">
                        <div class="<?php echo (empty(get_the_post_thumbnail())) ? 'team__picture-empty' : 'team__picture'; ?>">
                            <?php the_post_thumbnail('team-picture'); ?>
                        </div>
                        <div class="team__envelope flex-container flex-dir-column">
                            <h2 class="team__member-name title"><?php the_field('full_name'); ?></h2>
                            <h6 class="team__member-spot subtitle"><?php the_field('spot'); ?></h6>
                            <h6 class="team__member-location title"><?php the_field('location_member'); ?></h6>
                            <p>
                                <?php 
                                    echo get_the_custom_excerpt();
                                ?>
                            </p>
                            <div class="team__member-read">
                                 <span class="button light-blue team__member-lightbox" data-postid="<?php echo get_the_ID(); ?>">READ MORE</span>
                            </div>
                           
                        </div>
                    </div>
                <?php  
                        endforeach;
                        wp_reset_postdata();
                ?>
                    </div>
                <?php
                    endif;
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>

<div class="reveal" id="Biography" data-reveal>
</div>

<!-- CONTENT PARTNERS -->
<?php get_template_part( 'partials/content', 'partners' ); ?>
<!-- /CONTENT PARTNERS -->
<?php get_footer();
