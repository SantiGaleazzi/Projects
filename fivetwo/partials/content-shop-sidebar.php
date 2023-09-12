<?php
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

    <div class="shopSidebar">
        <div class="shopSidebar__wrapper">
            <div class="flex-container flex-dir-column">
                <div class="shopSidebar__image text-center">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                </div>
                <div class="shopSidebar__summary">
                    <a class="shopSidebar__title title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <?php the_excerpt(); ?>
                </div>
                <div class="shopSidebar__button">
                    <a href="<?php echo $shop_page_url; ?>" class="button">VISIT STORE</a>
                </div>
            </div>
        </div>
    </div>

<?php endforeach;
wp_reset_postdata();
?>
