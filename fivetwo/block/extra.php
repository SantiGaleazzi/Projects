<?php
    $option = get_field('do_you_want_to_see1');

    if( $option == "resources" ) {
        $args = array(
            'post_type' => 'resources',
            'posts_per_page' => 3,
            'order' => 'DESC',
            'orderby' => 'date'
        );

        $resources = new WP_Query($args);
    }
?>
<?php if (!empty($resources)): ?>
    <div class="resources">
        <div class="grid-container">
            <div class="flex-container flex-dir-column align-middle medium-flex-dir-row medium-align-justify">
                <h2 class="resources__title bigger">RESOURCES</h2>
                <div class="resources__button">
                    <a href="<?php echo get_post_type_archive_link( 'resources' ); ?>" class="button">SEE ALL RESOURCES</a>
                </div>
            </div>

            <div class="box__wrapper w100 flex-container flex-dir-row align-center large-align-justify">
            <?php
            while ($resources->have_posts()) : $resources->the_post();
            ?>
                <div class="box flex-container flex-dir-column">
                    <div class="box__container">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('full', ['class' => 'box__pic']); ?>
                        </a>
                        <h6 class="box__subtitle subtitle">Resources</h6>
                        <a href="<?php the_permalink(); ?>">
                            <h5 class="title"><?php the_title(); ?></h5>
                        </a>
                        <?php 
                        if( has_excerpt() ) :
                            the_excerpt(); 
                        else :
                            $content = get_the_content();
                        ?>
                            <p>
                                <?php echo wp_trim_words( $content , '55' );  ?>
                            </p>
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="box__button">
                        <a href="<?php the_permalink(); ?>" class="button light-blue">READ MORE</a>
                    </div>
                </div>
            <?php
            endwhile;
            ?>
            </div>
        </div>
    </div>
<?php 
    wp_reset_postdata();
    endif 
?>

<?php
if( $option == "stories" ) :
    $stories = get_field('select_stories');
    if( $stories ):
?>
<div class="storyOfSuccess">
    <div class="grid-container">
        <h2 class="storyOfSuccess__title bigger text-center">Here’s how congregations are leveraging FiveTwo training&hellip;</h2>
        <div class="box__wrapper w100 flex-container flex-dir-row align-center large-align-justify">
        <?php
        global $post;
        foreach( $stories as $post):
            setup_postdata($post);
        ?>
            <div class="box flex-container flex-dir-column">
                <div class="box__container">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('full', ['class' => 'box__pic']); ?>
                    </a>
                    <h6 class="box__subtitle subtitle">Story of Success</h6>
                    <a href="<?php the_permalink(); ?>">
                        <h5 class="title"><?php the_title(); ?></h5>
                    </a>
                    <?php 
                    if( has_excerpt() ) :
                        the_excerpt(); 
                    else :
                        $content = get_the_content();
                    ?>
                        <p>
                            <?php echo wp_trim_words( $content , '55' );  ?>
                        </p>
                    <?php
                    endif;
                    ?>
                </div>
                <div class="box__button">
                    <a href="<?php the_permalink(); ?>" class="button light-blue">READ MORE</a>
                </div>
            </div>
        <?php
        endforeach;
        ?>
        </div>
    </div>
</div>
<?php
    wp_reset_postdata();
    endif;
endif;
?>

<?php
if( $option == "experts" ) :
    $experts = get_field('select_experts');
    if( $experts ):
?>
<div class="expert">
    <div class="grid-container">
        <div class="flex-container flex-dir-column align-middle medium-flex-dir-row medium-align-justify">
            <h2 class="expert__title bigger">FEATURED EXPERTS</h2>
            <div class="expert__button">
                <a href="<?php bloginfo( 'siteurl' ); ?>/spot/our-team/" class="button">SEE ALL EXPERTS</a>
            </div>
        </div>
        <div class="box__wrapper w100 flex-container flex-dir-row align-center large-align-justify">
        <?php
        global $post;
        foreach( $experts as $post):
            setup_postdata($post);
        ?>
            <div class="box flex-container flex-dir-column">
                <div class="box__container team__member-lightbox" data-postid="<?php echo get_the_ID(); ?>">
                    <div class="box__pic-expert cursor-pointer">
                        <?php the_post_thumbnail('expert-picture', ['class' => '']); ?>
                    </div>
                    <h6 class="box__subtitle subtitle">Expert</h6>
                    <h5 class="title"><?php the_field('full_name', get_the_ID()); ?></h5>
                    <?php 
                    if( has_excerpt() ) :
                        the_excerpt(); 
                    else :
                        $content = get_the_content();
                    ?>
                        <p>
                            <?php echo wp_trim_words( $content , '55' );  ?>
                        </p>
                    <?php
                    endif;
                    ?>
                </div>
            </div>
        <?php
        endforeach;
        ?>
        </div>
    </div>
</div>
<?php
    wp_reset_postdata();
    endif;
endif;
?>

<div class="reveal" id="Biography" data-reveal>
</div>
