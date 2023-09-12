<?php get_header(); ?>
<div class="articles" data-cpt="stories">
    <div class="grid-container">
        <div class="grid-x align-center">
            <div class="cell large-9 flex-container flex-dir-column relative">
                <div class="article__wrapper">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) :
                            
                            the_post();

                            
                        ?>
                            <div class="article article__remove flex-container flex-dir-column medium-flex-dir-row align-top align-center large-align-justify">
                                <?php if ( get_the_post_thumbnail() ): ?>
                                    <div class="article__image">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="article__image-empty">
                                    </div>
                                <?php endif ?>
                                <div class="article__data flex-container flex-dir-column">
                                    <a href="<?php the_permalink(); ?>">
                                        <h5 class="article__title"><?php the_title(); ?></h5>
                                    </a>
                                    <h6 class="article__subtitle">
                                        <?= the_date( 'F j, Y' ); ?>
                                    </h6>
                                    <?php the_excerpt(); ?>
                                    <div class="article__button">
                                        <a href="<?php the_permalink(); ?>" class="button">READ MORE</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile;?>
                    <?php endif; ?>
                </div>
                
                <div class="articles__navigation flex-container flex-dir-row align-center">
                    <?php echo ea_archive_navigation(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer();
