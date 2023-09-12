<div class="block-data-table">

    <?php if ( have_rows('block_data_table_tables') ) : ?>
        <?php while ( have_rows('block_data_table_tables') ) : the_row(); ?>
            <div class="data-table">
                <div class="table-name">
                    <?php the_sub_field('table_name'); ?>
                </div>
                
                <?php if ( have_rows('table_items_repeater') ) : ?>
                    <div class="data-items">
                        <?php while ( have_rows('table_items_repeater') ) : the_row(); ?>
                            <div class="data-item">
                                <div class="item-name">
                                    <?php the_sub_field('item_name'); ?>
                                </div>
                                
                                <div class="item-value">
                                    <?php the_sub_field('item_value'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>

</div>