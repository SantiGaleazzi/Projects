<?php
/*Two Columns Fields*/
    global $blocksBreakpoints;
    $block_number = get_row_index();
    $custom_blocks_separator_background_color  = get_sub_field('custom_blocks_separator_background_color');
    $custom_blocks_separator_height    = get_sub_field('custom_blocks_separator_height');
?>

<div style="background-color: <?= $custom_blocks_separator_background_color; ?>; height: <?= $custom_blocks_separator_height; ?>px;"></div>



