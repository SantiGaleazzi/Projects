<?php
    $image_desktop_sub_banner = get_field('image_desktop_sub_banner');
    $image_mobile_sub_header = get_field('image_mobile_sub_header');
    $link_sub_banner = get_field('link_sub_banner');
    $link_sub_banner_target = $link_sub_banner['target'] ? $link_sub_banner['target'] : '_self';
?>

    <section class="sub-banner-header grid-container">
        <?php if ($link_sub_banner): ?>
            <a href="<?= $link_sub_banner['url']?>" target="<?= $link_sub_banner_target;?>">
                <!--Desktop Version-->
                <?php if ($image_desktop_sub_banner): ?>
                    <img src="<?= $image_desktop_sub_banner['url']?>" alt="<?= $image_desktop_sub_banner['title']?>" title="<?= $image_desktop_sub_banner['title']?>" class="image-banner-desktop">
                <?php endif ?>
                <!--Mobile Version-->
                <?php if ($image_mobile_sub_header): ?>
                    <img src="<?= $image_mobile_sub_header['url']?>" alt="<?= $image_mobile_sub_header['title']?>" title="<?= $image_mobile_sub_header['title']?>" class="image-banner-mobile">
                <?php endif ?>
            </a>
            <?php else: ?>
                <!--Desktop Version-->
                <?php if ($image_desktop_sub_banner): ?>
                    <img src="<?= $image_desktop_sub_banner['url']?>" alt="<?= $image_desktop_sub_banner['title']?>" title="<?= $image_desktop_sub_banner['title']?>" class="image-banner-desktop">
                <?php endif ?>
                <!--Mobile Version-->
                <?php if ($image_mobile_sub_header): ?>
                    <img src="<?= $image_mobile_sub_header['url']?>" alt="<?= $image_mobile_sub_header['title']?>" title="<?= $image_mobile_sub_header['title']?>" class="image-banner-mobile">
                <?php endif ?>
        <?php endif; ?>
    </section>
