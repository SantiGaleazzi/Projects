<?php

    $for_churches_request_link = get_field('for_churches_request_link');
    $for_churches_request_link_target = $for_churches_request_link['target'] ? $for_churches_request_link['target'] : '_self';

    $opens_ligtbox = get_field('for_churches_opens_lightbox');

?>

<section class="px-6">
    <div class="container">
        <div class="text-center md:text-left flex flex-col md:flex-row items-center justify-center py-8">
            <div class="md:flex-1 lg:flex-none text-default font-roboto font-light text-xl md:text-3xl">
                <?php the_field('for_churches_request_title'); ?>
            </div>

            <div class="w-full sm:w-auto mt-4 md:mt-0 md:pl-8 lg:pl-14">

                <?php if ( $opens_ligtbox == 'yes' ) : ?>

                    <button data-form-option="2" class="button w-full sm:w-auto text-xl lg:px-14 bg-teal-500 for-churches-btn">
                        <?=  $for_churches_request_link['title']; ?>
                    </button>

                <?php else : ?>
                    <a
                        href="<?=  $for_churches_request_link['url']; ?>"
                        target="<?= esc_attr(  $for_churches_request_link_target ); ?>"
                        class="button w-full sm:w-auto text-xl lg:px-14 bg-teal-500"
                    >
                        <?=  $for_churches_request_link['title']; ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>