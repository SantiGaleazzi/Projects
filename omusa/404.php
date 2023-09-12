<?php get_header(); ?>

    <div class="text-center flex flex-col h-screen px-6 items-center justify-center">
        <h1 class="font-roboto font-light text-red-500 text-5xl mb-2">Oops! Something went wrong</h1>
        <p class="text-base text-default mb-5">Sorry, but the page you are looking for was either not found or does not exist.</p>
        <div>
            <a href="<?= get_home_url(); ?>" class="text-center font-black text-white-pure px-8 py-3 bg-red-500">Go to Home</a>
        </div>
    </div>

<?php get_footer();
