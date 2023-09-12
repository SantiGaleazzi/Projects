
<div class="block-report-card">

    <?php if ( get_field('block_report_card_need_file') == 'yes' ) : ?>

        <a href="<?php the_field('block_report_card_attach_file'); ?>" class="card-link"><?php the_field('block_report_card_label_name'); ?> »</a>

    <?php
    
        else :
        
        $card = get_field('block_report_card_button_link');
        $card_target = $card['target'] ? $card['target'] : '_self';

    ?>

        <a  class="card-link" href="<?= $card['url']; ?>" target="<?= esc_attr( $card_target ); ?>"><?= $card['title']; ?> »</a>

    <?php endif; ?>

</div>