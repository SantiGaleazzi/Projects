<?php
    
    $current_state = strtolower( get_the_title() );

    get_header();
    
?>

    <div id="banner-active" class="breadcrumbs">
        <div class="row">
            <div class="large-12 columns">
                <?php custom_breadcrumbs(); ?>
            </div>
        </div>  
    </div>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <div class="main-banner">
                <div class="row">
                    <div class="large-7 columns main-banner__description">
                        <h1 class="main-banner__title"><?php the_title(); ?></h1>

                        <div class="state-rank-and-score">
                            <div class="state-rank">
                                <span class="option">Grade:</span> <span class="option-value"><?php the_field('post_state_grade'); ?></span>
                            </div>

                            <div class="data-separator"></div>

                            <div class="state-score">
                                <span class="option">Score:</span> <span class="option-value"><?php the_field('post_state_score_anti_slapp'); ?>%</span>
                            </div>
                        </div>

                        <div class="custom-states-dropdown">
                            <div class="comparison-title">
                                View Another State
                            </div>

                            <?php
                                $args = array(
                                    'post_type'       => 'anti-slapp-states',
                                    'posts_per_page'  => -1,
                                    'order'           => 'ASC'
                                );

                                $states_query = new WP_Query( $args );
                            ?>
                             <div class="states-dropdown">
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
                                </div>
                            </div>
                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>

                    <div class="large-5 columns wrap-relative">
                        <div class="small-10 small-centered medium-8 large-12 large-uncentered wrap-relative thumbnail-content">
                            <?php if ( has_post_thumbnail() ) : ?>

                               <?php the_post_thumbnail(); ?>

                                <?php if ( get_the_post_thumbnail_caption() ) : ?>
                                    <div class="caption-thumbnail">
                                        <?php the_post_thumbnail_caption();?>
                                    </div>
                                <?php endif; ?>
                                
                            <?php else: ?>
                                <img src="<?php bloginfo('template_url'); ?>/assets/img/research/dft-1.png" width="480" height="360" alt="Default Article"/>
                            <?php  endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="single">
                <div class="row">
                    <div class="large-8 columns single-content">
                        <div>
                            <?php the_content(); ?>
                        </div>

                        <div class="back-to-map">
                            <a href="<?php bloginfo('url')?>/anti-slapp-report">« Back to the map</a>
                        </div>
                    </div>

                    <div class="columns large-3 large-offset-1 single-sidebar">
                        <div class="single-author">
                            <?= get_avatar( get_the_author_meta( 'ID' ), 180 ); ?>

                            <h3 class="author-title"><?php the_author(); ?></h3>

                            <p class="author-bio">
                                <?php the_author_meta( 'description' ); ?>
                                <?= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>
                            </p>
                        </div>

                        <?php
                            $args = array(
                                'post_type'       => 'research',
                                'posts_per_page'  => 2,
                                'post__not_in'    => array( $post->ID ),
                                'orderby'         => 'rand',
                                'tax_query'       => array(
                                    array(
                                        'taxonomy' => 'category-state',
                                        'field'    => 'slug',
                                        'terms'    => $post->post_name,
                                    ),
                                )
                            );

                            $research_query = new WP_Query( $args );
                        ?>

                        <div class="single__related">
                            <?php if ( $research_query->have_posts() ) : ?>
                                <div class="articles__section">
                                    <div class="articles__header">
                                        <h1 class="articles__title">Related Content</h1>
                                        <a href="<?= get_post_type_archive_link( 'research' ); ?>" class="articles__more">See More Posts »</a>
                                    </div>

                                    <?php while ( $research_query->have_posts() ) : $research_query->the_post(); ?>

                                        <?php
                                            $taxCat = get_the_term_list( $post->ID, 'category-type', '<span>', ', </span><span>', '</span>' );
                                            $taxCatI = get_the_term_list( $post->ID, 'category-issue', '<span>', ', </span><span>', '</span>' );
                                        ?>

                                        <div class="articles__item">

                                            <?php if ( has_post_thumbnail() ): ?>
                                                <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><?php the_post_thumbnail('article'); ?></a>
                                            <?php else: ?>
                                                <img src="<?php bloginfo('template_url')?>/assets/img/research/dft-1.png" alt="Related Article" width="180" height="135">
                                            <?php endif; ?>

                                            <div class="articles__description">
                                                <a href="<?php the_permalink(); ?>" target="_blank" class="articles__blocklink"><h3><?php the_title(); ?></h3></a>

                                                <div class="articles__info">
                                                    <?php the_date( 'F j, Y' ); ?>
                                                    <?= get_the_author() ? '&nbsp;&nbsp;•&nbsp;&nbsp;By ' . get_the_author() : ''; ?>
                                                    <?php echo ($taxCat) ? '&nbsp;&nbsp;•&nbsp;&nbsp;' . $taxCat : ''; ?>
                                                    <?php echo ($taxCatI) ? '&nbsp;&nbsp;•&nbsp;&nbsp;' . $taxCatI : ''; ?>
                                                </div>

                                                <p><?= excerpt(25); ?></p>
                                            </div>
                                        </div>

                                    <?php endwhile; ?>

                                </div>

                            <?php wp_reset_postdata(); ?>

                            <?php else : ?>

                                <div class="row">
                                    <div class="large-12 columns">
                                        <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                                    </div>
                                </div>

                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>

        <?php endwhile; ?>
    <?php endif; ?>


<?php get_footer();
