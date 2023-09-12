<?php

    $banner_image = get_field('top_five_banner_image');

    get_header(); ?>

    <section class="top-5-banner">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
                <div class="cell large-10">
                    <div class="grid-x">
                        <div class="cell large-8">
                            <h1 class="top-5-banner__title"><?php the_field('top_five_title'); ?></h1>
                            <p class="top-5-banner__headline"><?php the_field('top_five_headline'); ?></p>
                            <p class="top-5-banner__description"><?php the_field('top_five_description'); ?></p>
                        </div>
                        <div class="cell large-4 show-for-large">
                            <div class="top-5-banner__img">
                                <img src="<?= $banner_image['url']; ?>" alt="<?= $banner_image['alt']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="top-5-form">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
                <div class="cell large-10">
                    <div class="top-5-form__form">
                        <h1 class="top-5-form__title"><?php the_field('top_five_form_title'); ?></h1>
                        <?php the_field('top_five_form'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="top-5-posts">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
                <div class="cell large-10">
                    <p class="top-5-posts__description"><?php the_field('top_five_post_description'); ?></p>
                    <span class="top-5-posts__date"><?php the_field('top_five_post_date'); ?></span>
                </div>
            </div>
            <div class="grid-x align-center">
                <div class="cell large-10">
                    <div class="grid-x">
                        <?php
                            if( have_rows('posts_repeater') ) :
                            $count = 0;
                        ?>

                            <?php 
                                while( have_rows('posts_repeater') ): the_row();

                                $count++;
                                $post_image = get_sub_field('image');
                            ?>
                                <div class="cell <?php if ($count % 3 == 0) : echo 'medium-12'; else:  echo 'medium-6'; endif; ?>">
                                    <div class="post-info <?php if ($count % 3 == 0) : echo 'is-third'; endif; ?>">
                                        <div class="post-info__img" style="background-image: url('<?= $post_image['url'] ?>');"></div>
                                        <div class="post-content">
                                            <h3 class="post-info__title"><?php the_sub_field('title'); ?></h3>
                                            <p class="post-info__description"><?php the_sub_field('description'); ?></p>
                                            <a href="<?php the_sub_field('url'); ?>" class="post-info__link" target="_blank" rel="no-rel">Learn More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>