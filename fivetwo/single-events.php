<?php
    require 'inc/Carbon-2.12.0/autoload.php';

    use Carbon\Carbon;

    get_header();

    $month_event    = get_field('month_event');
    $year_event     = get_field('year_event');
    $info           = get_field('event_info');
    $url            = get_field('event_url');
    $map            = get_field('id_map');
    $register       = get_field('event_register');

    /*echo '<pre>';
    var_dump($month_event);
    echo '</pre>';
    die();*/

    $event_full_date = array();

    if( have_rows('specific_event_day') ):
        while ( have_rows('specific_event_day') ) : the_row();
            $finish_event = '';
            $begin_event = '';
            $divider = ' - ';

            $start_event        = get_sub_field('start_event');
            $hour_start_event   = get_sub_field('hour_start_event');
            $hour_end_event     = get_sub_field('hour_end_event');

            $carbon_date_event      = new Carbon($start_event);

            if($hour_start_event) {
                $begin_event = ' @ '.$hour_start_event;
            } else {
                $divider = ' @ ';
            }

            if($hour_end_event) {
                $finish_event = $divider.$hour_end_event;
            } 

            $event_full_date[] = $carbon_date_event->format('F j\\, Y').$begin_event.$finish_event; 
        endwhile;
    else :
        $event_full_date[] = ucfirst($month_event).' '.$year_event;
    endif;
?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <div class="singlePage">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell large-9">
                        <div class="flex-container flex-dir-column">
                            <h2 class="title"><?php the_title(); ?></h2>
                            <div class="singlePage__meta flex-container flex-dir-row align-justify">
                                <div class="event__date">
                                    <?php
                                    $separator = ' — ';

                                    foreach ($event_full_date as $index => $date) :
                                        if( ($index + 1) == count($event_full_date) ) {
                                            $separator = '';
                                        }
                                        echo $date.$separator;
                                    endforeach;?>
                                </div>
                                <div class="singlePage__share flex-container flex-dir-row align-spaced">
                                    <strong>Share on:</strong>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>

                                    <a href="https://twitter.com/home?status=<?php echo get_the_title(); ?>%0A<?php echo get_permalink(); ?>" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell large-9">
                        <div class="singlePage__content">
                            <?php the_content(); ?>

                            <?php if ($register): ?>
                                <div class="event__register">
                                    <?php
                                    $register_url = $register['url'];
                                    $register_title = $register['title'];
                                    $register_target = $register['target'] ? $register['target'] : '_self';
                                    ?>
                                    <a class="button" href="<?php echo esc_url($register_url); ?>" target="<?php echo esc_attr($register_target); ?>"><?php echo esc_html($register_title); ?></a>
                                </div>
                            <?php endif ?>
                            
                            <div class="event__details">
                                <h5>Details</h5>
                                <p>
                                <?php
                                    foreach ($event_full_date as $index => $date) :
                                    ?>
                                        <strong><?php echo $date; ?></strong> <br>
                                    <?php
                                    endforeach;?>
                                </p>
                                <?php echo $info; ?>
                                <?php if ($url): ?>
                                    <p>
                                        <a href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?></a>
                                    </p>
                                <?php endif ?>
                                <?php if ($map): ?>
                                    <div class="event__map">
                                    <?php echo do_shortcode( '[wpgmza id="'.$map.'"]' ); ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="singlePage__back">
                    <a href="<?php echo get_post_type_archive_link( 'events' ); ?>">&laquo; Back to Events</a>
                </div>
            </div>
        </div>
    <?php endwhile;?>
<?php endif; ?>
<?php get_footer();
