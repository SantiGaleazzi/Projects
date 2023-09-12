<?php

    $lightbox_background_image = get_field('lightbox_background_image', 'options');

?>

<section class="lightbox w-full h-full px-5 flex items-center justify-center top-0 left-0 fixed z-50">

    <div class="lightbox__overlay w-full h-full bg-gray-800 opacity-50 inset-0 absolute"></div>

    <div class="lightbox__container w-full max-w-2xl flex flex-col sm:flex-row bg-white rounded-md relative">

        <button class="w-8 h-8 text-sm text-purple-100 bg-purple-500 hover:bg-purple-600 rounded-full flex items-center justify-center absolute top-3 right-3 sm:-top-4 sm:-right-4 transition duration-200 ease-in-out close">
            <i class="fas fa-times"></i>
        </button>

        <div class="w-full sm:w-2/3 text-center sm:text-left px-6 py-10">

            <h1 class="text-xl sm:text-2xl text-purple-600 mb-1"><?php the_field('lightbox_title', 'options'); ?></h1>
            <p class="text-sm text-gray-400 mb-4"><?php the_field('lightbox_description', 'options'); ?></p>
            <div class="lighbox-form">
                <?php the_field('lightbox_form', 'options'); ?>
            </div>
            <ul class="text-xl">
                <li class="inline-block text-gray-400 hover:text-purple-500 px-2 transition duration-200 ease-in-out">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                </li>
                <li class="inline-block text-gray-400 hover:text-purple-500 px-2 transition duration-200 ease-in-out">
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </li>
            </ul>
        </div>

        <div class="hidden sm:inline-block flex-1 bg-cover bg-no-repeat bg-right-top rounded-bl-md sm:rounded-bl-none rounded-br-md" style="background-image: url('<?= $lightbox_background_image['url']; ?>');">
        </div>
        
    </div>
</section>