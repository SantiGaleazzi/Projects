<?php

    $intro_side_image = get_field('internship_contact_intro_side_image');
    $contact_email_address = get_field('internship_contact_email_address');

?>

<section class="section-quoted pt-12">
    <div class="container">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 lg:w-2/5 lg:pl-24 mb-8 md:mb-0">
                <div class="headline text-default mx-auto md:mx-0">
                    <?php the_field('internship_contact_intro_title'); ?>
                </div>

                <div class="text-default leading-7 mt-10 lg:mt-14">
                    <?php the_field('internship_contact_intro_description'); ?>
                </div>
            </div>

            <div class="md:w-1/2 flex justify-center relative">
                <img src="<?= esc_url( $intro_side_image['url'] ); ?>" alt="<?= esc_attr( $intro_side_image['alt'] ); ?>">
            </div>
        </div>
    </div>
</section>

<section class="px-4 md:pb-64">
	<div class="container px-6 md:px-10 lg:pl-20 lg:pr-10 py-6 md:py-8 lg:pt-12 lg:pb-20 bg-red-500 rounded relative">
        <div class="flex flex-col md:flex-row justify-between">
            <div class="md:w-3/5 lg:w-4/6 form-contact-t relative mb-6 md:mb-0">
                <div class="w-full md:absolute top-0 left-0 md:pr-12">
                    <?php the_field('internship_contact_form'); ?>
                </div>
            </div>

            <div class="md:w-2/5 lg:w-2/6 font-roboto text-white-pure contact-info-box">
                <div>
                    <div class="font-bold text-lg">
                        <?php the_field('internship_contact_form_office_hours_title'); ?>
                    </div>

                    <div class="font-light text-lg">
                        <?php the_field('internship_contact_form_office_open_hours'); ?>
                    </div>

                    <div class="font-light  text-lg">
                        <?php the_field('internship_contact_form_office_week_days'); ?>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>

<section class="pt-12 md:pt-56 pb-12 md:pb-20">
	<div class="container">
		<div class="w-64 md:w-auto flex flex-col md:flex-row justify-center mx-auto">
			<div class="md:w-1/3 lg:w-1/4 text-center md:text-left text-black-400-new pb-8 md:pb-0">
				<div class="font-roboto text-2xl mb-6">
                    <?php the_field('internship_contact_address_title'); ?>
                </div>

                <div>
                    <?php the_field('internship_contact_address'); ?>
                </div>
			</div>
                    
			<div class="text-center md:text-left py-8 md:py-0 md:px-8 lg:px-20 border-t md:border-t-0 border-b md:border-b-0 md:border-l md:border-r border-separator">
                <div class="font-roboto text-2xl text-black-400-new mb-6">
                    <?php the_field('internship_contact_mailing_title'); ?>
                </div>

                <div>
                    <div class="flex items-center justify-center md:justify-start">
                        <div class="text-black-400-new mr-1">
                            <?php the_field('internship_contact_mailing_address'); ?>
                        </div>
                    </div>
                </div>
			</div>

			<div class="md:w-1/3 lg:w-1/4 text-center md:text-left text-black-400-new md:pl-8 lg:pl-24 pt-8 md:pt-0">
                <div class="text-2xl font-roboto mb-6">
                    <?php the_field('internship_contact_email_title'); ?>
                </div>

                <div>
                    <a href="<?= $contact_email_address['url']; ?>" class="underline"><?= $contact_email_address['title']; ?></a>
                </div>
			</div>
		</div>
	</div>
</section>