

<section class="training-interests">

    <div class="grid-container">

        <div class="grid-x grid-padding-x">

            <?php
            
                if( have_rows('training_interests_block_repeater') ) :
                
                $counter = 0;
                
            ?>

                <?php
                    
                    while( have_rows('training_interests_block_repeater') ): the_row();

                    $counter++;

                    $link = get_sub_field('link');
                    $side_img = get_sub_field('image');
                    $has_link = get_sub_field('has_link');
                    $triggers_lightbox = get_sub_field('triggers_lightbox');
                    $image_link_target = $link['target'] ? $link['target'] : '_self';

                ?>

                    <div class="cell medium-4">
                        
                        
                        <div class="interest" data-id="<?= $counter; ?>" data-type="<?php if ( $triggers_lightbox == 'yes') : echo 'lightbox'; elseif ( $has_link == 'yes') : echo 'link'; else : echo 'undefined'; endif; ?>">
                            <?php if ( $has_link == 'yes' ) : ?>
                                <a href="<?= $link['url']; ?>" target="<?= esc_attr( $image_link_target ); ?>">
                                    <img src="<?= $side_img['url']; ?>" alt="<?= $side_img['alt'] ?>">
                                </a>

                                <?php else : ?>
                                    <img src="<?= $side_img['url']; ?>" alt="<?= $side_img['alt'] ?>">
                            <?php endif; ?>

                        </div>

                        <?php
                            // If item has lightbox
                            if ( $triggers_lightbox == 'yes') :
                        ?>

                            <div id="<?= $counter; ?>" class="training-interests-lightbox">
                                <div class="training-interests-lightbox__container">
                                    <div class="training-interests-form">
                                        <div class="training-interests-form__close" aria-hidden="true"><i class="fas fa-times"></i></div>
                                        <p class="training-interests-form__date"><?php the_sub_field('event_date'); ?></p>
                                        <h1 class="training-interests-form__title"><?php the_sub_field('form_title'); ?></h1>
                                        <?php the_sub_field('form'); ?>
                                    </div>
                                </div>
                            </div>

                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>
                
            <?php endif; ?>

        </div>

    </div>

</section>