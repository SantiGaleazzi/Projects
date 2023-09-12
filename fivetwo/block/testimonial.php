<!-- START NEW SLIDE -->
<?php
$testimonials = get_field('testimonals');
 if(is_array($testimonials) && count($testimonials) > 1) : ?>
    <div class="testimonials__slider">
        <div class="grid-container">
            <div class="grid-x align-center">
                <div class="cell small-11 medium-11 large-10">
                    <div class="testimonials__slider-slick">
                    <?php
                    if( have_rows('testimonals') ):
                        while ( have_rows('testimonals') ) : the_row();
                            $photo_testimonial  = get_sub_field('photo_testimonial');
                            $cite_testimonial   = get_sub_field('cite_testimonial');
                            $author_testimonial = get_sub_field('author_testimonial');
                    ?>
                        <div>
                            <div class="flex-container flex-dir-column medium-flex-dir-row align-center">
                            <?php
                            if( !empty($photo_testimonial) ): ?>
                                <div class="testimonials__slider-authorPicture text-center medium-text-left">
                                    <img src="<?php echo $photo_testimonial['url']; ?>" alt="<?php echo $photo_testimonial['alt']; ?>" />
                                </div>
                            <?php endif; ?>

                                <div class="testimonials__slider-quote">
                                    <?php echo $cite_testimonial; ?>
                                    <span class="testimonials__slider-author"> &mdash; <?php echo $author_testimonial; ?></span>
                                </div>
                            </div>
                        </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>
<?php if(is_array($testimonials) && count($testimonials) == 1) : ?>
    <div class="testimonials">
        <div class="grid-container">
            <div class="grid-x margin-grid-x">
                <div class="cell xlarge-11 flex-container flex-dir-column large-flex-dir-row align-middle align-spaced">
                    <?php
                    if( have_rows('testimonals') ):
                        while ( have_rows('testimonals') ) : the_row();
                            $photo  = get_sub_field('photo_testimonial');
                            $cite   = get_sub_field('cite_testimonial');
                            $author = get_sub_field('author_testimonial');
                    ?>
                    <?php if (!empty($photo)): ?>
                        <img class="testimonials__author-picture" src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt']; ?>" />
                    <?php endif ?>
                    <?php if ($cite): ?>
                        <div class="testimonials__quote">
                            <?php echo $cite; ?>
                            <?php if ($author): ?>
                                <cite>
                                    <?php echo $author; ?>
                                </cite>
                            <?php endif ?>
                        </div>
                    <?php endif ?>

                    <div class="testimonials__button">
                        <a href="<?php echo get_post_type_archive_link( 'stories' ); ?>" class="button yellow fill tiny">READ MORE TESTIMONIALS</a>
                    </div>
                    <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<!-- /START NEW SLIDE -->
