<?php
    require 'inc/Carbon-2.12.0/autoload.php';

    use Carbon\Carbon;

    $subtitle     = get_field('archive_event_subtitle', 'option');
    $summary      = get_field('archive_event_summary', 'option');
?>

<?php get_header(); ?>

<div class="articles" data-cpt="events">
    <div class="grid-container">
        <div class="grid-x align-middle">
            <div class="cell large-9 internal__banner">
                <?php if ($subtitle): ?>
                    <h6 class="internal__subtitle"><?php echo $subtitle; ?></h6>
                <?php endif ?>

                <h2 class="internal__title">EVENTS</h2>
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
                        <div class="cell large-7 flex-container flex-dir-column medium-flex-dir-row align-spaced align-middle large-align-justify">
                            <?php
                                $arguments = array(
                                    'post_type'     => 'events',
                                    'orderby'       => 'term_order',
                                    'order'         => 'ASC',
                                    'hide_empty'    => true
                                );

                                $type       = 'typeEvent';
                                $type_terms = get_terms($type, $arguments);
                            ?>
                            <label class="text-left">Type:
                                <select class="filter" data-taxonomy="<?php echo $type; ?>">
                                    <option value="">Choose one</option>
                                    <?php foreach ($type_terms as $type_term): ?>
                                      <option value="<?php echo $type_term->slug; ?>"><?php echo $type_term->name; ?>
                                      </option>
                                    <?php endforeach; ?>
                                </select>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="article__wrapper">
                    <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post();
                            $month_event    = get_field('month_event');
                            $year_event     = get_field('year_event');
                            $info           = get_field('event_info');

                            $event_full_date = array();

                            if( have_rows('specific_event_day') ):
                                while ( have_rows('specific_event_day') ) : the_row();
                                    $finish_event = '';
                                    $begin_event = '';
                                    $divider = ' - ';

                                    $start_event        = get_sub_field('start_event');
                                    $hour_start_event   = get_sub_field('hour_start_event');
                                    $hour_end_event     = get_sub_field('hour_end_event');

                                    $carbon_date_event  = new Carbon($start_event);

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
                            <div class="article__remove flex-container flex-dir-column">
                                <div class="article__details">
                                    <a href="<?php the_permalink(); ?>">
                                        <h5 class="article__title"><?php the_title(); ?></h5>
                                    </a>
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
                                    <?php echo $info; ?>
                                </div>
                                <div class="article flex-container flex-dir-column medium-flex-dir-row align-top align-center large-align-justify">
                                    <div class="flex-container flex-dir-column">
                                        <?php if ( get_the_post_thumbnail() ): ?>  
                                            <div class="article__image">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail(); ?>
                                                </a>
                                            </div>
                                        <?php else: ?>
                                            <div class="article__image-empty">
                                            </div>
                                        <?php endif ?>
                                    </div>
                                    <div class="article__data flex-container flex-dir-column">
                                        <?php the_excerpt(); ?>
                                        <div class="article__button">
                                            <a href="<?php the_permalink(); ?>" class="button">READ MORE</a>
                                        </div>
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

                <!-- CONTENT SHOP -->
                <?php //get_template_part( 'partials/content', 'shop-sidebar' ); ?>
                <!-- /CONTENT SHOP -->

            </div>
        </div>
    </div>
</div>

<?php get_footer();
