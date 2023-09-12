<?php 

    $july_training_banner = check_range("16-07-2020", "31-07-2020");

    if( $july_training_banner  && ! isset( $_GET['banner'] ) || $_GET['banner'] == 'july-training-banner-2020' ) :

        $training_program_banner_bg_img = get_field('training_program_banner_bg_img');
        $training_program_banner_link = get_field('training_program_banner_link');
        $training_program_video_img = get_field('training_program_video_image');
        $training_program_banner_target = $training_program_banner_link['target'] ? $training_program_banner_link['target'] : '_self';
    
?>

    <section class="training-program-banner" style="background-image: url('<?= $training_program_banner_bg_img['url']; ?>');">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell medium-6">
                    <h1 class="training-program-banner__title"><?php the_field('training_program_banner_title'); ?></h1>
                    <p class="training-program-banner__description"><?php the_field('training_program_banner_description'); ?></p>
                    
                    <div class="cta-btn">
                        <a href="<?= $training_program_banner_link['url']; ?>" target="<?= esc_attr( $training_program_banner_target ); ?>" class="training-program-banner__link"><?= $training_program_banner_link['title']; ?></a>
                    </div>
                </div>

                <div class="cell medium-6">
                    <a href="<?= $training_program_banner_link['url']; ?>" target="<?= esc_attr( $training_program_banner_target ); ?>">
                        <img src="<?= $training_program_video_img['url']; ?>" alt="<?= $training_program_video_img['alt']; ?>">
                    </a>
                </div>
            </div>
        </div>
    </section>

<?php endif;
