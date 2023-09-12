<?php
    $postId = get_the_ID();
    $args = array();

    if (is_singular( 'stories' )) {
        $title = 'SUCCESS STORIES';
        $customPostType = 'stories';
    }

    if (is_singular( 'resources' )){
        $terms = get_the_terms($postId, 'resources-types');
        $termPost = $terms[0];
        $title = strtoupper($termPost->name);
        $customPostType = 'resources';

        $arrayTaxonomy = array(
            'taxonomy' => 'resources-types',
            'field'    => 'slug',
            'terms'    => $termPost->slug,
        );
        $args['tax_query'] = array($arrayTaxonomy);
    }

    $args['post_type'] = $customPostType;
    $args['posts_per_page'] = 3;
    $args['post__not_in'] = array($postId);
    $args['order'] = 'DESC';
    $args['orderby'] = 'date';

    $articles = new WP_Query($args);

    if ($articles->have_posts()) :
?>

<div class="">
    <h4>More Stories For You:</h4>
    <div class="related-stories-container">
        <?php
            while ($articles->have_posts()) : $articles->the_post();
        ?>
                <!-- POST ITEM -->
                <?php get_template_part( 'partials/content', 'post' ); ?>
                <!-- /POST ITEM -->
        <?php
            endwhile;
            // Reset Post Data
        wp_reset_postdata();
        ?>
    </div>
</div>
<?php
    endif;
