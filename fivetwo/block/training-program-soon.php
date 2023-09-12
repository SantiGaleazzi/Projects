<?php 

    $august_banner = check_range("01-08-2020", "31-08-2085");

    if( $august_banner  && ! isset( $_GET['banner'] ) || $_GET['banner'] == 'august-banner-2020' ) :

        $training_program_soon_bg_img = get_field('training_program_soon_bg_img');
        $training_program_soon_link = get_field('training_program_soon_link');
        $training_program_soon_title_img = get_field('training_program_soon_title_img');
        $triggers_lightbox_banner = get_field('triggers_lightbox_banner');
        $training_program_banner_target = $training_program_soon_link['target'] ? $training_program_soon_link['target'] : '_self';
    
?>

    <section class="training-program-soon" style="background-image: url('<?= $training_program_soon_bg_img['url']; ?>');">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell medium-6">
                    <h1 class="training-program-soon__title"><img src="<?= $training_program_soon_title_img['url']; ?>" alt="<?= $training_program_soon_title_img['alt']; ?>"></h1>
                    <p class="training-program-soon__description"><?php the_field('training_program_soon_description'); ?></p>
                    
                    <div class="cta-btn lb-banner">
                         <?php
                            // If item has lightbox
                            if ( $triggers_lightbox_banner == 'yes') :
                        ?>

                            <div class="training-program-soon__link interest"  data-id="1" data-type="<?php if ( $triggers_lightbox_banner == 'yes') : echo 'lightbox'; endif; ?>"> <?php the_field('button_text'); ?></div>
                            <?php else : ?>
                                <div>
                                    <a href="<?= $training_program_soon_link['url']; ?>" target="<?= esc_attr( $training_program_banner_target ); ?>" class="training-program-soon__link"><?= $training_program_soon_link['title']; ?></a>
                                </div>

                        <?php endif; ?>
                        <?php
                            // If item has lightbox
                            if ( $triggers_lightbox_banner == 'yes') :
                        ?>

                            <div id="1" class="training-interests-lightbox">
                                <div class="training-interests-lightbox__container lightbox-banner">
                                    <div class="training-interests-form">
                                        <div class="training-interests-form__close" aria-hidden="true"><i class="fas fa-times"></i></div>
                                        <p class="training-interests-form__date"><?php the_field('date_form'); ?></p>
                                        <h1 class="training-interests-form__title"><?php the_field('form_title_banner'); ?></h1>
                                        <?php the_field('form_banner'); ?>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endif;
