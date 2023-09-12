<?php

    $about_background_image = get_field('internships_about_image');

?>

<section class="section-quoted block md:hidden">
    <div class="container">
        <div class="headline text-2xl md:text-3xl text-default font-roboto relative z-10 mx-auto">
            <?php the_field('internships_about_title'); ?>
        </div>
    </div>
</section>

<section class="section-quoted px-4 pb-12">
    <div class="container">
        <div class="bg-page border-b-4 border-red-500 shadow-2xl">
            <div class="py-16 md:py-20 bg-red-500"></div>
            
            <div class="px-4 md:px-12 lg:px-24 -mt-24">
                <div class="bg-page">
                    <div class="px-4 md:px-12 py-24 md:py-32 bg-cover bg-center md:bg-right-top md:bg-contain bg-no-repeat relative" style="background-image: url('<?= $about_background_image['url']; ?>');">
                        <div class="headline text-2xl md:text-3xl text-default font-roboto relative z-10 ml-6 hidden md:block">
                            <?php the_field('internships_about_title'); ?>
                        </div>

                        <div class="w-full md:w-3/4 h-full bg-gradient-to-r from-page md:via-page to-transparent absolute top-0 left-0 lg:right-0 lg:mx-auto hidden md:block"></div>
                    </div>

                    <div class="p-6 md:px-24 md:py-12 has-wysiwyg text-default has-red-links">
                        <?php the_field('internships_about_content'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>