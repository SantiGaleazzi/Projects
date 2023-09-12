<?php
    
    get_header();

    $listen_intro_side_image = get_field('listen_intro_side_image');
    $listen_intro_side_album_cover = get_field('listen_intro_side_album_cover');
    
?>

    <section class="section-quoted pt-24 md:pt-64 pb-16 md:pb-32 relative">
        <div class="container relative z-10">
            <div class="text-default lg:pl-12 xl:pl-24 ">
                <div class="headline mb-8">
                    <?php the_field('listen_intro_title'); ?>
                </div>

                <div class="md:w-3/5 xl:w-1/2">
                    <div class="text-3xl font-roboto font-bold leading-9">
                        <?php the_field('listen_intro_description'); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="hidden sm:block sm:w-3/5 lg:w-1/2 h-full bg-cover xl:bg-left-top bg-no-repeat absolute bottom-0 right-0 z-0" style="background-image: url('<?= $listen_intro_side_image['url']; ?>');"></div>
    </section>

    <section class="text-default px-6 bg-gray-150-new">
        <div class="container">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/4 text-center pt-12 lg:pt-16 md:pr-6 lg:pr-0">
                    <img src="<?= $listen_intro_side_album_cover['url']; ?>" alt="<?= $listen_intro_side_album_cover['alt']; ?>" class="inline-block">
                </div>

                <div class="flex-1 pt-12 lg:pt-16 md:pl-16 pb-10 md:border-l-20 border-white-pure">
                    <div class="lg:w-3/5 has-wysiwyg">
                        <?php the_field('listen_made_for_description'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="px-6 py-16">
        <div class="container">
            <div class="flex flex-col md:flex-row">
                <div class="w-full md:w-1/2 md:px-6 mb-8 md:mb-0">
                    <?php the_field('listen_contributors_podcast'); ?>
                </div>

                <div class="w-full md:w-1/2 md:px-6">
                    <div class="text-red-500 text-4xl lg:text-5xl font-roboto font-light leading-none mb-6">
                        <?php the_field('listen_contributors_title'); ?>
                    </div>

                    <div class="text-default has-red-links has-wysiwyg">
                       <?php the_field('listen_contributors_list'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer();
