<?php 
    
    $button = get_field('page_not_found_button', 'option');
    $background_image = get_field('page_not_found_bg_image', 'option');

    get_header();
    
?>

    <div class="w-full py-32 md:py-0 md:h-full flex">
        <div class="w-full md:w-1/2 text-center md:text-left px-6 md:px-20 flex flex-col justify-center">
            <h4 class="text-5xl text-gray-400">404</h4>
            <h1 class="text-purple-500 text-3xl md:text-5xl mb-2"><?php the_field('page_not_found_title', 'option'); ?></h1>
            <p class="text-gray-500 mb-5"><?php the_field('page_not_found_description', 'option'); ?></p>
            <div>
                <a href="<?= $button['url']; ?>" class="text-sm text-center text-white px-5 py-3 bg-purple-500 rounded inline-block"> <?= $button['title']; ?> <i aria-hidden="true" class="fas fa-chevron-right ml-2"></i></a>
            </div>
        </div>
        
        <div class="hidden md:block w-1/2 bg-cover bg-no-repeat bg-center" style="background-image: url('<?= $background_image['url']; ?>');">

        </div>
    </div>

<?php get_footer(); ?>