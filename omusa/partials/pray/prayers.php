<?php

    global $wpdb;
    $view_count = GFCache::get( 'get_view_count_per_form' );

    if ( empty( $view_count ) ){

        $sql        = 'SELECT form_id, sum(count) as view_count FROM wp_gf_form_view WHERE form_id = 4';
		$view_count = $wpdb->get_results( $sql );

    }

    $pray_w_us_active_icon = get_field('pray_w_us_active_icon');
    $pray_w_us_request_icon = get_field('pray_w_us_request_icon');

    $search_criteria = array(
        'start_date' => date( 'Y-m-01'),
        'end_date' => date( 'Y-m-t'),
        'status'        => 'active',
    );

    $total_prays = GFAPI::count_entries(4, $search_criteria);

?>

<section class="px-6 py-10 md:py-4">
    <div class="container">
        <div class="flex items-center flex-col md:flex-row justify-between">
            <div class="mb-4 md:mb-0">
                <div class="text-xl text-red-500 font-roboto font-light">
                    <?php the_field('pray_w_us_prayer_title'); ?>
                </div>
            </div>

            <div class="w-full md:w-4/5 flex items-center flex-col sm:flex-row justify-between">
                <div class="w-full md:w-1/2 mb-5 sm:mb-0 sm:mr-5">
                    <div class="flex items-center lg:justify-center px-5 lg:px-8 py-6 bg-card rounded-md">
                        <div class="flex-none">
                            <img src="<?= $pray_w_us_active_icon['url']; ?>" alt="<?= $pray_w_us_active_icon['alt']; ?>">
                        </div>

                        <div class="flex items-start lg:items-center flex-col lg:flex-row ml-6 lg:ml-0">
                            <div class="text-4xl text-default font-roboto font-light lg:mx-6">
                                <?= $view_count[0]->view_count; ?>
                            </div>

                            <div class="text-default leading-none">
                                <?php the_field('pray_w_us_active_prays_title'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-1/2">
                    <div class="flex items-center lg:justify-center px-5 lg:px-8 py-6 md:py-5 bg-card rounded-md">
                        <div class="flex-none">
                            <img src="<?= $pray_w_us_request_icon['url']; ?>" alt="<?= $pray_w_us_request_icon['title']; ?>">
                        </div>

                        <div class="flex items-start lg:items-center flex-col lg:flex-row ml-6 lg:ml-0">
                            <div class="text-4xl text-default font-roboto font-light lg:mx-6">
                                <?= $total_prays; ?>
                            </div>

                            <div class="text-default leading-none">
                                <?php the_field('pray_w_us_request_title'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>