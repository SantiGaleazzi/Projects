<?php

    $contact_email_address = get_field('contact_email_address');

?>

<section class="pt-12 md:pt-40 lg:pt-40 pb-12 md:pb-20">
	<div class="container">
		<div class="w-64 md:w-auto flex flex-col md:flex-row justify-center mx-auto">
			<div class="md:w-1/3 lg:w-1/4 text-center md:text-left text-black-400-new pb-8 md:pb-0">
				<div class="font-roboto text-2xl mb-6">
                    <?php the_field('contact_address_title'); ?>
                </div>

                <div class="">
                    <?php the_field('contact_address'); ?>
                </div>
			</div>
                    
			<div class="text-center md:text-left py-8 md:py-0 md:px-8 lg:px-20 border-t md:border-t-0 border-b md:border-b-0 md:border-l md:border-r border-separator">
                <div class="font-roboto text-2xl text-black-400-new mb-6">
                    <?php the_field('contact_phones_title'); ?>
                </div>

                <div>
                    <?php if ( have_rows('contact_phone_numbers') ) : ?>
                        <?php while ( have_rows('contact_phone_numbers') ) : the_row(); ?>
                            <div class="flex items-center justify-center md:justify-start">
                                <div class="text-black-400-new mr-1">
                                    <?php the_sub_field('phone_number'); ?> - 
                                </div>
                                
                                <div class="text-xs text-orange-500 font-bold uppercase">
                                    <?php the_sub_field('phone_type'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                   <?php endif; ?>
                </div>
			</div>

			<div class="md:w-1/3 lg:w-1/4 text-center md:text-left text-black-400-new md:pl-8 lg:pl-24 pt-8 md:pt-0">
                <div class="text-2xl font-roboto mb-6">
                    <?php the_field('contact_email_title'); ?>
                </div>

                <div>
                    <a href="<?= $contact_email_address['url']; ?>" class="underline"><?= $contact_email_address['title']; ?></a>
                </div>
			</div>
		</div>
	</div>
</section>