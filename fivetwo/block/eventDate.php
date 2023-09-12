<?php
    $date       = get_field('event_date');
    $day        = $date['event_day'];
    $startHour  = $date['event_start'];
    $endHour    = $date['event_end'];
?>

<div class="singlePage__meta flex-container flex-dir-row align-justify">
    <div class="event__date">
        <?php echo $day; ?> @ <?php echo $startHour; ?> - <?php echo $endHour; ?>
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


