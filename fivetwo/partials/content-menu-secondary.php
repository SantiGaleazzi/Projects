 <div class="secondaryNavigation">
     <div class="grid-container">
         <div class="grid-x align-center">
            <div class="cell large-10 xlarge-8">
              <div class="secondaryNavigation__button-secondary hide-for-large flex-container flex-dir-row align-justify" data-toggle="offCanvasLeft1">
                <span>About Us</span>
                <span class="secondaryNavigation__hamburger"></span>
              </div>
              <ul class="menu flex-dir-row align-center show-for-large">
                <?php
                    $defaults = array(
                      'theme_location'  => 'secondary_menu',
                      'menu'            => '',
                      'container'       => '',
                      'container_class' => '',
                      'container_id'    => '',
                      'menu_class'      => 'secondaryNavigation__menu',
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
                wp_nav_menu($defaults); ?>
              </ul>
            </div>
         </div>
         <div class="grid-x">
           <div class="cell">
             <div class="off-canvas-wrapper">
              <div class="off-canvas position-left" id="offCanvasLeft1" data-off-canvas>
                <!-- Your menu or Off-canvas content goes here -->
                <ul class="vertical menu">
                  <?php
                    $defaults = array(
                      'theme_location'  => 'secondary_menu',
                      'menu'            => '',
                      'container'       => '',
                      'container_class' => '',
                      'container_id'    => '',
                      'menu_class'      => 'secondaryNavigation__menu',
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
                  wp_nav_menu($defaults); ?>
                </ul>
              </div>
             </div>
           </div>
         </div>
     </div>
 </div>
