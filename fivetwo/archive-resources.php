<?php
    $image_prefooter_single   = get_field('image_prefooter_single','option');
    $copy_prefooter_single   = get_field('copy_prefooter_single','option');
    $button_text_prefooter_single   = get_field('button_text_prefooter_single','option');
    $image_add   = get_field('image_add','option');
?>
<?php get_header(); ?>
<div class="articles" data-cpt="resources">
    <div class="single-banner">
        Resources
    </div>

    <div class="archive-filters">
        <?php

            $type_terms = get_terms('resources-types', array(
                                'orderby' => 'name',
                                'order' => 'ASC',
                                'hide_empty' => false
                            ));
        ?>

        <div class="filters-container">
            <span class="open-leader">TYPE:</span>
            <div class="select-filter select-leader">
                <div class="select-filter select-leader">
                    <select class="filter" data-taxonomy="resources-types">
                        <option value="">Choose one</option>
                        <?php foreach ($type_terms as $type): ?>
                            <option value="<?= $type->slug; ?>"><?= $type->name; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="archive-stories-section">
        <div class="article__wrapper archive-stories-container">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post();

                    $terms = wp_get_post_terms( $post->ID, 'resources-types');
					if ( $terms && ! is_wp_error( $terms ) ) {
						$title = $terms[0]->name;
					}
                    $isDownload     = get_field('is_a_download_resource');
                    $downloadPath   = get_field('resource_path');
                    $isGated        = get_field('is_gated');
                    $buttonText     = $isDownload ? 'DOWNLOAD' : 'READ MORE';
                    $href           = $isDownload ? $downloadPath : get_the_permalink();
                    $gated          = ($isDownload && $isGated) ? 'gated' : 'not-gated';
            ?>
                <!-- POST ITEM -->
                <?php get_template_part( 'partials/content', 'full-post' ); ?>
                <!-- /POST ITEM --> 
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
