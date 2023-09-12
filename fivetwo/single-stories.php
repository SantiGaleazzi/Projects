<?php
    $title = 'Stories of Success';
    $customPostType = 'stories';
    $backLink = get_post_type_archive_link( $customPostType );
    $image_prefooter_single   = get_field('image_prefooter_single','option');
    $copy_prefooter_single   = get_field('copy_prefooter_single','option');
    $button_text_prefooter_single   = get_field('button_text_prefooter_single','option');
    $image_add   = get_field('image_add','option');
    get_header();
?>
<div class="single-banner">
    Success Stories
</div>
<?php if (have_posts()) : ?>
<?php while (have_posts()) : the_post(); ?>
<div class="singlePage">
    <div class="container-single-stories">
        <div class="general-info-single">
            <h2 class="title"><?php the_title(); ?></h2>
            <div class="share-links-single">
                Share on:
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="link-share-icon">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="https://twitter.com/home?status=<?= get_the_title(); ?>%0A<?= get_permalink(); ?>" target="_blank" class="link-share-icon">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
        </div>
        <div class="content-single">
            <?php the_content(); ?>
        </div>
        <div class="prev-next-single-buttons">
            <?php previous_post_link( '<div class="custom-link-career custom-link-prev">%link</div>', 'PREVIOUS' ); ?>
            <?php next_post_link( '<div class="custom-link-career pl-12 custom-link-next">%link</div>', 'NEXT' ); ?>
        </div>
    </div>
    <div class="related-stories-single stories-date">
        <!-- CONTENT RESOURCES/STORIES -->
            <?php get_template_part( 'partials/content', 'more-articles' ); ?>
        <!-- /CONTENT RESOURCES/STORIES -->
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
<?php endwhile;?>
<?php endif; ?>
<?php get_footer();
