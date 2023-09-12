<?php
  $subtitle     = get_field('archive_resources_subtitle', 'option');
  $summary      = get_field('archive_resources_summary', 'option');
  $incubator    = get_field('incubator', 'option');

    $terms = get_the_terms( $post->ID, 'topic');
    $termPost = $terms[0];
    $title = $termPost->name;

  get_header();
?>

<div class="articles" data-cpt="resources">
    <div class="grid-container">
        <div class="grid-x">
            <div class="cell large-9 internal__banner">
                <?php if ($subtitle): ?>
                    <h6 class="internal__subtitle"><?php echo $subtitle; ?></h6>
                <?php endif ?>

                <h2 class="internal__title">RESOURCES</h2>
                <?php if ($summary): ?>
                    <?php echo $summary; ?>
                <?php endif ?>
            </div>
        </div>
    </div>

    <div class="grid-container">
        <div class="grid-x">
            <div class="cell large-9 flex-container flex-dir-column relative">
                <div class="articles__filter">
                    <div class="grid-x">
                        <div class="cell large-8 flex-container flex-dir-column medium-flex-dir-row align-spaced align-middle large-align-justify">
                            <?php
                            $arguments = array(
                                'orderby'           => 'name',
                                'order'             => 'ASC',
                                'hide_empty'        => true
                            );

                            $topic = 'topic';
                            $topic_terms = get_terms($topic, $arguments);

                            $format = 'format';
                            $format_terms = get_terms($format, $arguments);
                            ?>
                            <label class="text-left">Topic:
                                <select class="filter" data-taxonomy="<?php echo $topic; ?>">
                                    <option value="">Choose one</option>
                                    <?php foreach ($topic_terms as $topic_term): ?>
                                      <option value="<?php echo $topic_term->slug; ?>"><?php echo $topic_term->name; ?>
                                      </option>
                                    <?php endforeach; ?>
                                </select>
                            </label>

                            <label class="text-left">Format:
                                <select class="filter" data-taxonomy="<?php echo $format; ?>">
                                    <option value="">Choose one</option>
                                    <?php foreach ($format_terms as $format_term): ?>
                                      <option value="<?php echo $format_term->slug; ?>"><?php echo $format_term->name; ?>
                                      </option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="article__wrapper">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) :
                            the_post();

                            $isDownload       = get_field('is_a_download_resource');
                            $downloadPath   = get_field('resource_path');
                            $isGated        = get_field('is_gated');

                            $buttonText     = $isDownload ? 'DOWNLOAD' : 'READ MORE';
                            $href           = $isDownload ? $downloadPath : get_the_permalink();
                            $gated          = ($isDownload && $isGated) ? 'gated' : 'not-gated';
                        ?>
                            <div class="article article__remove flex-container flex-dir-column medium-flex-dir-row align-top align-center large-align-justify">
                                <?php if ( get_the_post_thumbnail() ): ?>
                                    <div class="article__image">
                                        <a href="<?php echo $href; ?>" class="<?php echo $gated; ?>" data-id="<?php echo get_the_ID(); ?>">
                                            <?php the_post_thumbnail(); ?>
                                        </a>
                                    </div>
                                <?php else: ?>
                                    <div class="article__image-empty">
                                    </div>
                                <?php endif ?>
                                <div class="article__data flex-container flex-dir-column">
                                    <a href="<?php echo $href; ?>" class="<?php echo $gated; ?>" data-id="<?php echo get_the_ID(); ?>">
                                        <h5 class="article__title"><?php the_title(); ?></h5>
                                    </a>
                                    <h6 class="article__subtitle"><?php the_date(); ?> · <?= $title; ?></h6>
                                    <?php the_excerpt(); ?>
                                    <div class="article__button">
                                        <?php if ($isDownload && $isGated): ?>
                                            <span class="button <?php echo $gated; ?>" data-id="<?php echo get_the_ID(); ?>" data-open="resourcesDownload"><?php echo $buttonText; ?></span>
                                        <?php else: ?>
                                            <a href="<?php echo $href; ?>" class="button <?php echo $gated; ?>" data-id="<?php echo get_the_ID(); ?>"><?php echo $buttonText; ?></a>
                                        <?php endif; ?>
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
            <div class="cell large-3">

                <!-- Article Sidebar -->
                <?php get_template_part('partials/partial-articles-sidebar'); ?>
                <!-- Article Sidebar -->

            </div>
        </div>
    </div>
</div>

<div class="reveal assessment__download-form" id="resourcesDownload" data-reveal>
  <h6 class="subtitle">Five Two</h6>
  <h2 class="title">Download Resource</h2>
  <?php echo do_shortcode( '[gravityform id="9" title="false" description="false" ajax="true"]' ); ?>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php get_footer();
