<?php
/*Two Columns Fields*/
    global $blocksBreakpoints;
    $block_number = get_row_index();
    $custom_blocks_archive              = get_sub_field('custom_blocks_archive');
    $custom_blocks_archive_on           = ($custom_blocks_archive === true) ? 'full-screen' : '' ;
    $custom_blocks_archive_title        = get_sub_field('custom_blocks_archive_title');
?>

<style>
    .twoColumns__wrap--<?= $block_number; ?>{
        padding: 30px 16px;
        background-position: top center;
    }

    body #content-page .twoColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) *:not(a){
        color: inherit;
    }
    body #content-page .twoColumns__wrap--<?= $block_number; ?> *:not([class^="ffz-"]) a *{
        color: inherit;
    }
    body #content-page .twoColumns__wrap--<?= $block_number; ?> .wp-caption{
        background-color: inherit;
    }

</style>

<div class="cb-videoWrap twoColumns__wrap--<?= $block_number; ?> <?= $custom_blocks_archive_on; ?>">
    <div class="cb-video-container">
        <div class="custom_blocks_archive pb-24">
            <h1 class="text-5xl sm:text-6xl text-gray-800 text-center font-antonio font-bold w-full border-t-3 border-b-3 border-yellow-900 py-2 sm:py-1 leading-none sm:leading-tight mt-16 sm:mt-40 mb-24 sm:mb-40 relative z-10"><?= $custom_blocks_archive_title; ?></h1>
            <img class="absolute inset-x-0 top-0 m-auto w-9/12 sm:w-auto -mt-20 sm:-mt-40" src="<?= bloginfo('template_url');?>/assets/images/home-images/earth-icon.png" alt="Earth">
            <?php 
                if (have_rows('custom_blocks_external_posts_post')): 
                    while (have_rows('custom_blocks_external_posts_post')): the_row(); 
                        $custom_blocks_external_posts_post_image = get_sub_field('custom_blocks_external_posts_post_image');
                        $custom_blocks_external_posts_post_title = get_sub_field('custom_blocks_external_posts_post_title');
                        $custom_blocks_external_posts_post_content = get_sub_field('custom_blocks_external_posts_post_content');
                        $custom_blocks_external_posts_post_button = get_sub_field('custom_blocks_external_posts_post_button');
            ?>
                    <div class="sm:flex justify-between mt-16 custom_blocks_archive_post mx-auto items-start">
                        <?php if ($custom_blocks_external_posts_post_image): ?>
                            <img src="<?= esc_url($custom_blocks_external_posts_post_image['url']); ?>" alt="<?= esc_attr($custom_blocks_external_posts_post_image['alt']); ?>" class="custom_blocks_archive-image" />
                        <?php endif; ?>
                        <div class="max-w-xl mt-4 sm:mt-0">
                            <h3 class="text-gray-700 font-oswald font-medium text-2xl sm:text-4xl uppercase leading-none"><?= $custom_blocks_external_posts_post_title; ?></h3>
                            <div class="text-gray-700 font-oswald font-light sm:text-lg leading-tight mt-3 mb-2"><?= $custom_blocks_external_posts_post_content; ?></div>
                            <?php if ($custom_blocks_external_posts_post_button): 
                                $link_url = $custom_blocks_external_posts_post_button['url'];
                                $link_title = $custom_blocks_external_posts_post_button['title'];
                                $link_target = $custom_blocks_external_posts_post_button['target'] ? $custom_blocks_external_posts_post_button['target'] : '_self';
                            ?>
                                <a class="button-yellow text-xl px-6 py-2 min-w-auto" href="<?= esc_url( $link_url ); ?>" target="<?= esc_attr( $link_target ); ?>"><?= esc_html( $link_title ); ?></a>
                            <?php endif; ?>                            
                        </div>
                    </div>
            <?php 
                    endwhile;
                endif; 
            ?>
        </div>
    </div>
</div>



