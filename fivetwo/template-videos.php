<?php

    /**
     * Template Name: Video Template
    */
    
    get_header('videos');

?>

    <section class="video-section-intro">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
			    <div class="cell large-8">
                    <div class="title">
                        <?php the_field('template_video_title'); ?>
                    </div>
                </div>

                <div class="cell large-12">
                    <div class="description">
                        <?php the_field('template_video_description'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video-section-video">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
			    <div class="cell large-10">
                    <div class="has-video">
                        <?php the_field('template_video_vimeo'); ?>
                    </div>

                    <div class="caption">
                        <?php the_field('template_video_caption'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video-section-extras">
        <div class="grid-container">
            <div class="grid-x grid-padding-x align-center">
			    <div class="cell large-7">
                    <div class="explore-options">
                        <?php the_field('template_video_footer'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();