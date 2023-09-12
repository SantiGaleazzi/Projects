<?php
    $logo               = get_field('logo_header', 'option');
    $title              = get_field('stay_connected_title', 'option');
    $info               = get_field('stay_connected_info', 'option');
?>

<div class="stayConnected">
    <div class="grid-container">
        <div class="grid-x align-center">
            <div class="cell large-7 text-center">
                <?php if ($title): ?>
                    <h2 class="title"><?php echo $title; ?></h2>
                <?php endif ?>
                <?php if ($info): ?>
                    <?php echo  $info; ?>
                <?php endif ?>
            </div>
        </div>
    </div>

    <div class="stayConnected__container grid-container stayConnected__container-blue">
        <div class="grid-x align-right">
            <div class="stayConnected__main">
                <div class="stayConnected__container-title">
                   Get & Stay Connected
                </div>
                <div class="stayConnected__container-subtitle">
                    Sign up to receive exclusive updates, including BILL'S <img src="<?php bloginfo('template_url'); ?>/assets/img/home/top-five.png" alt="Top Five">
                </div>
                
                
                <div class="flex-container flex-dir-row md-w100">
                    <div class="subscribe">
                        <?php echo do_shortcode( '[gravityform id="1" title="false" description="false" ajax="true"]' ); ?>
                    </div>
                </div>

            </div>
            
        </div>
        <img class="stayConnected__image" src="<?php bloginfo('template_url');?>/assets/img/home/stay-image_v2.png" alt="Bill">
    </div>
</div>


