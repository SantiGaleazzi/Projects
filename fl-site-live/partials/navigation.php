<?php 
    
    $header_logo = get_field('header_logo','options');
	
    $subscribe_button = get_field('subscribe_button','options');
    $give_button = get_field('give_button','options');
    $give_button_target = $give_button['target'] ? $give_button['target'] : '_self';
?>

<header class="md:p-4 bg-nav relative">

    <div class="navigation-overlay"></div>

	<div class="container">
		<div class="flex flex-col md:flex-row items-center">
            <div class="w-full md:w-auto border-b border-gray-450 md:border-transparent p-4 md:p-0 flex items-center justify-between">
                <div>
                    <a href="<?= get_home_url(); ?>" aria-label="<?= $header_logo['alt']; ?>" class="w-16 md:w-24 lg:w-32 inline-block">
                        <img src="<?= $header_logo['url']; ?>" alt="<?= $header_logo['alt']; ?>">
                    </a>
                </div>

                <button type="button" class="hamburger" aria-label="Open Menu">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</button>
            </div>

            <div class="navigation flex-1 flex flex-col md:flex-row items-center">
                <ul class="list-menu w-full md:w-auto md:flex-1 lg:flex-auto text-lg relative flex flex-col md:flex-row md:items-center md:justify-center">
                    <?php
                        $defaults = array(
                            'theme_location'  => 'header_menu',
                            'menu'            => '',
                            'container'       => '',
                            'container_class' => '',
                            'container_id'    => '',
                            'menu_class'      => '',
                            'menu_id'         => '',
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'before'          => '',
                            'after'           => '',
                            'link_before'     => '',
                            'link_after'      => '',
                            'items_wrap' => '%3$s',
                            'depth'           => 0,
                            'walker'        => new themeslug_walker_nav_menu_header
                        );
                        
                        wp_nav_menu( $defaults );
                    ?>
                </ul>

                <div class="flex-none lg:flex-auto  w-full md:w-auto flex flex-col lg:flex-row items-center md:mb-3 lg:mb-0">
                    <div class="w-full lg:w-40 px-2 py-1 flex items-center border border-gold-light rounded relative mb-4 lg:mb-0 lg:mr-5">
                        <i class="fas fa-search text-gray-600 absolute top-0 left mt-2"></i>
                        <?php get_search_form(); ?>
                    </div>
                    
                    <div class="w-full flex flex-col md:flex-row items-center">
                        <div class="open-lightbox w-full text-white text-xl leading-none font-bold px-8 py-2 bg-blue-300 rounded cursor-pointer text-center inline-block mb-4 md:mb-0 md:mr-5" data-lightbox-trigger="subscribe">
                            <?= $subscribe_button; ?>               
                        </div>

                        <a href="<?= $give_button['url']; ?>" target="<?= esc_attr( $give_button_target ); ?>" class="w-full text-white text-xl leading-none font-bold rounded px-8 py-2 bg-red-500  cursor-pointer text-center inline-block">
                            <?= $give_button['title']; ?>                   
                        </a>
                    </div>
                </div>
            </div>
        </div>
	</div>
</header>