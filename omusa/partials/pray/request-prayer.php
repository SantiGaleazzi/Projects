<section id="request-prayer" class="px-6">
    <div class="container pt-16 border-t border-separator">
        <div class="pt-6 px-8 pb-6 sm:pb-32 md:pb-8 lg:py-12 bg-red-500 rounded-md shadow-2xl">
			<div class="w-full lg:w-4/5 flex justify-end mx-auto">
                <div class="md:w-2/6">
                    <div class="text-3xl text-white-pure font-roboto font-bold leading-none mb-6">
						<?php the_field('pray_w_us_prayer_request_title'); ?>
					</div>

                    <div class="text-white-pure">
                        <?php the_field('pray_w_us_prayer_request_description'); ?>
                    </div>
                </div>
			</div>
        </div>
    </div>
</section>

<section class="py-12 sm:pt-0 sm:pb-64 md:pb-56 xl:pb-24">
    <div class="container">
        <div class="w-full lg:w-4/5 md:pl-8 lg:pl-0 sm:-mt-24 md:-mt-48 mx-auto">
            <div class="md:w-4/6 has-form">
                <div class="w-full sm:absolute top-0 left-0 px-6 md:pr-16 lg:pr-20 md:pl-0">
                    <?php the_field('pray_w_us_prayer_form'); ?>
                </div>
            </div>
        </div>
    </div>
</section>