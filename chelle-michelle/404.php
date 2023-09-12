<?php get_header(); ?>

    <section class="px-5 py-32 text-center">
        <div class="container">
            <h1 class="text-5xl mb-2">
                Oops! Something went wrong
            </h1>
            <p class="text-zinc-500 mb-5">
                Sorry, but the page you are looking for was either not found or does not exist.
            </p>
            <div>
                <a href="<?= get_home_url(); ?>" class="text-white px-6 py-3 bg-zinc-700 rounded-lg inline-block">Go to Home</a>
            </div>
        </div>
    </section>

<?php get_footer();
