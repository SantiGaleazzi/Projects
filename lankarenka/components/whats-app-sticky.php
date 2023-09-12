<div class="w-10 h-10 bg-green-whatsapp rounded-full fixed bottom-0 right-0 mb-20 mr-5 shadow-lg z-40">
    <a href="https://wa.me/<?php the_field('settings_whatsapp_number', 'option'); ?><?= get_field('settings_whatsapp_message', 'option') ? '?text=' . get_field('settings_whatsapp_message', 'option') : ''; ?>" target="_blank" rel="noopener noreferrer" class="w-full h-full flex items-center justify-center">
        <i class="fab fa-whatsapp text-white text-2xl"></i>
    </a>
</div>