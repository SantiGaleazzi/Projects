<?php

    $may_widget = check_range("20-06-2020", "12-12-2020");

    if( $may_widget && ! isset( $_GET['widget'] ) || $_GET['widget'] == 'may-widget-2020-1' ) :

        $webinar_widget_link = get_field('webinar_widget_link');
        $webinar_widget_image = get_field('webinar_widget_image');
        $webinar_widget_background_image = get_field('webinar_widget_background_image');

?>

<section class="webinar-widget">
    <div class="grid-container" style="background-image: url('<?= $webinar_widget_background_image['url']; ?>');">
        <div class="webinar-widget-content grid-x">
            <div class="webinar-widget-head">
                <h1 class="webinar-widget-head__title"><?php the_field('webinar_widget_title'); ?></h1>
                <p class="webinar-widget-head__description"><?php the_field('webinar_widget_description'); ?></p>
            </div>
            <div class="webinar-widget-body">
                <img src="<?= $webinar_widget_image['url']; ?>" alt="<?= $webinar_widget_image['alt']; ?>" class="webinar-widget-body__image">  
            </div>
            <div class="webinar-widget-footer">
                <a href="<?= $webinar_widget_link['url']; ?>" class="webinar-widget-footer__button"><?= $webinar_widget_link['title']; ?></a>
            </div>
        </div>
    </div>
</section>

<?php endif;
