<?php

    get_header('access');

    $background_image = get_field('background_image');
    $title = get_field('title');
    $button = get_field('button');
    $button_target = $button['target'] ? $button['target'] : '_self';

?>

<section class="get-access">
    <div class="get-access__bg" style="background-image: url('<?= $background_image['url']; ?>');">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell large-6">
                    <img src="<?= esc_url($title['url']); ?>" alt="<?= esc_attr($title['alt']); ?>" >
                    <h2 class="get-access__subtitle">
                        <?php the_field('subtitle'); ?>
                    </h2>
                    <p class="get-access__description">
                        <?php the_field('get_access_description') ?>
                    </p>
                    <div class="access-features">
                        <?php
                            if( have_rows('items') ) :
                                while( have_rows('items') ): the_row();

                                $icon = get_sub_field('icon');
                        ?>
                                <div class="feature">
                                    <div class="feature__iconflex-initial">
                                        <img src="<?= $icon['url']; ?>" alt="<?= $icon['alt']; ?>">
                                    </div>

                                    <div class="feature__description">
                                        <?php the_sub_field('text'); ?>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>

                    <div class="access-footer">
                        <a href="<?= $button['url']; ?>" target="<?= esc_attr( $button_target ); ?>" class="access-donate-btn">
                        <?= $button['title']; ?>
                        </a>
                        <div class="access-copyright">
                            <?php the_field('copy_footer'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
	</div>
</section>

<div class="hidden">
	<?php get_footer(); ?>
</div>