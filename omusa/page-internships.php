<?php get_header(); ?>

    <section class="pt-24 md:pt-40">
        <div class="container">

            <div class="pb-16 xl:pt-12">
                <?php get_template_part('partials/internships/navigation'); ?>
            </div>
        </div>
    </section>

    <div class="internships-content" data-internship-content="home">

        <?php get_template_part('partials/internships/home'); ?>
        
    </div>

    <div class="internships-content hidden" data-internship-content="about-internships">

        <?php get_template_part('partials/internships/about-internships'); ?>
        
    </div>

    <div class="internships-content hidden" data-internship-content="degree-tracks">

        <?php get_template_part('partials/internships/degree-tracks'); ?>
        
    </div>

    <div class="internships-content hidden" data-internship-content="stories">

        <?php get_template_part('partials/internships/stories'); ?>
        
    </div>

    <div class="internships-content hidden" data-internship-content="faqs">

        <?php get_template_part('partials/internships/faqs'); ?>
        
    </div>

    <div class="internships-content hidden" data-internship-content="covid">

        <?php get_template_part('partials/internships/covid'); ?>
        
    </div>

    <div class="internships-content hidden" data-internship-content="faculty">

        <?php get_template_part('partials/internships/faculty'); ?>
        
    </div>

    <div class="internship-video-lightbox w-full h-full px-4 py-10 inset-0 fixed flex items-center justify-center z-50">
        <div class="close-ligtbox w-full h-full bg-lightbox absolute z-50"></div>

        <div class="w-full max-w-3xl h-auto bg-white-pure border-t-8 border-b-8 border-red-500 rounded relative z-50">
            <div class="close-ligtbox w-8 h-8 flex items-center justify-center bg-black-700-new rounded-full absolute top-0 right-0 -mt-4 -mr-4 cursor-pointer z-10">
                <i class="fas fa-times text-white-pure"></i>
            </div>

            <div class="h-full overflow-y-auto has-video">
                <iframe src="" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen allow="autoplay"></iframe>
            </div>
        </div>
    </div>

<?php get_footer();
