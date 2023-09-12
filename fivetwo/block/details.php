<?php
    $details   = get_field('details_event');
?>

<div class="event__details">
    <?php if ($details): ?>
        <?php echo $details; ?>
    <?php endif ?>
</div>
