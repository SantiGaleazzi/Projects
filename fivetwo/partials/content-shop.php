<?php
$show = get_field('do_you_want_to_see_the_store_section');
if( $show ) :
/*
* GET URL SHOP
*/
$shop_page_id = wc_get_page_id( 'shop' );
$shop_page_url = $shop_page_id ? get_permalink( $shop_page_id ) : '';

$args = array(
    'posts_per_page'   => 1,
    'orderby'          => 'rand',
    'post_type'        => 'product' );

$random_products = get_posts( $args );
foreach ( $random_products as $post ) : setup_postdata( $post ); ?>

    <div class="storeInternal">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell large-11 flex-container flex-dir-column medium-flex-dir-row align-spaced">
                    <div class="storeInternal__image text-center">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                    </div>
                    <div class="storeInternal__summary">
                        <a class="storeInternal__title title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                        <?php the_excerpt(); ?>
                        <a href="<?php echo $shop_page_url; ?>" class="button">VISIT STORE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endforeach;
wp_reset_postdata();
endif;
?>


