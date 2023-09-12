<section class="quiz-lightbox w-full h-full px-6 py-10 inset-0 fixed flex items-center justify-center z-50">

    <div class="close-ligtbox w-full h-full bg-lightbox absolute z-50"></div>

    <div class="w-full max-w-3xl h-full sm:h-auto px-6 py-10 md:px-12 bg-white-pure border-t-8 border-b-8 border-red-500 rounded relative z-50">
        <div class="close-ligtbox w-8 h-8 flex items-center justify-center bg-black-700-new rounded-full absolute top-0 right-0 -mt-4 -mr-4 cursor-pointer z-10">
            <i class="fas fa-times text-white-pure"></i>
        </div>

        <div class="h-full overflow-y-auto">
			<?php the_field('quiz_settings_form', 'option'); ?>
        </div>
    </div>
</section>