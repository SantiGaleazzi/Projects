<script>
    if(document.cookie.search("tryresources") < 1){
        if(document.cookie.search("wp-settings-time") < 1){
            document.location.href="/";
        }
    }
</script>
<?php
    get_header('try-access');
?>

<div class="resources-page">
     <?php 
        $header_logo = get_field('header_logo', 'option');
        $copy_image = get_field('copy_image');
        $download_button = get_field('download_button');
        $download_button_target = $download_button['target'] ? $download_button['target'] : '_self';
        $access_button = get_field('access_button');
        $access_button_target = $access_button['target'] ? $access_button['target'] : '_self';
        $video = get_field('video');
    ?>
    <section class="min-h-screen access-resources-bg">
        <div class="grid-container access-resources-content">
            <div class="max-w-md text-left">
                <img src="<?= $copy_image['url']; ?>" alt="<?= $copy_image['alt']; ?>">
                    <a href="<?= $download_button['url']; ?>" target="<?= esc_attr( $download_button_target ); ?>" class="text-center leading-none text-white text-lg md:text-2xl font-bold rounded-full inline-block mb-6 buttons-resources w-full">
                    <div class="button-gradient-transparency">
                        <span><?= $download_button['title']; ?></span>
                    </div>
                </a>
                <a href="<?= $access_button['url']; ?>" target="<?= esc_attr( $access_button_target ); ?>" class="text-center leading-none text-white text-lg md:text-2xl font-bold px-8 py-5 bg-gradient rounded-full inline-block buttons-resources w-full">
                    <?= $access_button['title']; ?>
                </a>
            </div>
            <div class="iframe-resources">
                <?php the_field('video'); ?>
            </div>
        </div>
    </section>
</div>
<?php
    get_footer();


