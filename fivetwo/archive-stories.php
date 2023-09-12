<?php
    $subtitle     = get_field('archive_stories_subtitle', 'option');
    $summary      = get_field('archive_stories_summary', 'option');
    $image_prefooter_single   = get_field('image_prefooter_single','option');
    $copy_prefooter_single   = get_field('copy_prefooter_single','option');
    $button_text_prefooter_single   = get_field('button_text_prefooter_single','option');
    $image_add   = get_field('image_add','option');
?>

<?php get_header(); ?>

<div class="articles" data-cpt="stories">
    <div class="single-banner">
        Success Stories
    </div>

    <div class="archive-filters hide">
        <?php
            $arguments = array(
                'orderby'           => 'name',
                'order'             => 'ASC',
                'hide_empty'        => true
            );
            $area = 'area';
            $area_terms = get_terms($area, $arguments);
            $type = 'typeStory';
            $type_terms = get_terms($type, $arguments);
        ?>
        <div class="filters-container">
            <span class="open-leader">LEADER:</span>
            <div class="select-filter select-leader">
                <div class="select-filter select-leader">
                    <select class="filter" data-taxonomy="<?php echo $area; ?>">
                        <option value="">Choose one</option>
                        <?php foreach ($area_terms as $topic_area): ?>
                        <option value="<?php echo $topic_area->slug; ?>"><?php echo $topic_area->name; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="filters-container">
            <span class="open-leader">TYPE:</span>
            <div class="select-filter select-leader">                
                <div class="text-left">
                    <select class="filter" data-taxonomy="<?php echo $type; ?>">
                        <option value="">Choose one</option>
                        <?php foreach ($type_terms as $type_term): ?>
                        <option value="<?php echo $type_term->slug; ?>"><?php echo $type_term->name; ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>   
     
    <div class="archive-stories-section slug-stories">
        <div class="article__wrapper archive-stories-container">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                   <div class="post-item-single">
                        <?php if ( get_the_post_thumbnail() ): ?>
                            <div class="article__image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            </div>
                        <?php endif ?>
                        <span><?php $post_date = get_the_date( 'F j, Y' ); echo $post_date; ?></span>
                        <div class="title-post-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>        
                        </div>
                        <div class="the-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>">READ MORE&nbsp;></a>
                    </div>
                <?php endwhile;?>
            <?php endif; ?>
        </div>
        <div class="articles__navigation flex-container flex-dir-row align-center stories-archive-nav">
            <?php echo ea_archive_navigation(); ?>
        </div>
    </div>
</div>

<div class="pre-footer-single">   

    <div class="sign-up-single">
        <?php if ($image_prefooter_single): ?>
            <img src="<?= $image_prefooter_single['url']; ?>" alt="<?= $image_prefooter_single['alt']; ?>" />
        <?php endif ?>

        <div>
            <div>
                <?= $copy_prefooter_single; ?>
            </div>
            <div class="sign-up-button-single open-virtuous-lightbox">
                <?= $button_text_prefooter_single; ?>
            </div>
        </div>
    </div>

    <a href="<?php the_field('single_add_url', 'options'); ?>" target="_blank" class="add-single" style="background-image: url(<?php echo $image_add['url']; ?>);"></a>

    <!-- Article Sidebar -->
        <?php get_template_part('partials/partial-articles-sidebar'); ?>
    <!-- Article Sidebar -->

</div>

<?php get_footer();
