<?php
  $logo             = get_field('logo_header', 'option');
  $startMyTraining  = get_field('start_my_training', 'option');
  $header_button  = get_field('header_button', 'option');
?>
<div class="nav-menu">

  <div class="mobile-menu align-justify" data-responsive-toggle="responsive-menu" data-hide-for="large">
    <div class="title-bar-title">
      <?php if (!empty($logo) ): ?>
        <div class="header__logo">
          <a href="<?php bloginfo('url'); ?>">
            <img width="<?= $logo['width']; ?>" height="<?= $logo['height']; ?>" src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>" />
          </a>
        </div>
      <?php endif ?>
    </div>
    <button class="menu-icon" type="button" data-toggle="responsive-menu"></button>
  </div>

  <div class="flex-container flex-dir-column medium-flex-dir-row align-justify" id="responsive-menu">
    <?php if (!empty($logo) ) : ?>
      <div class="header__logo show-for-large">
        <a href="<?php bloginfo('url'); ?>">
          <img width="<?= $logo['width']; ?>" height="<?= $logo['height']; ?>" src="<?= $logo['url']; ?>" alt="<?= $logo['alt']; ?>" />
        </a>
      </div>
    <?php endif; ?>

    <div class="header__menu flex-container flex-dir-column large-flex-dir-row">
      <ul class="dropdown menu flex-dir-column large-flex-dir-row" data-dropdown-menu>
        <?php
			wp_nav_menu( array(
				'theme_location'  => 'header_menu',
				'menu'            => '',
				'container'       => '',
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'navigation',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap' => '%3$s',
				'depth'           => 0,
				'walker'          => new themeslug_walker_nav_menu_header
			));
		  ?>
      </ul>

      <?php if ( have_rows('banner_button_layout', 'option') ) : ?>
			<?php while ( have_rows('banner_button_layout', 'option') ) : the_row(); ?>
				<?php
					if ( get_row_layout() !== 'link' ) :
						$type = get_row_layout() === 'Gravity Forms' ? 'gravity-form' : 'virtuous-form';
				?>

					<button class="<?= $type === 'gravity-form' ? 'pink-button' : 'sign-up-blue-button'; ?> js-form-trigger" data-form-type="<?= $type; ?>" data-form-id="<?= get_sub_field('form_id'); ?>" type="button">
						<?php the_sub_field('button_text'); ?>
					</button>
					
				<?php
					else :
					$link = get_sub_field('button_link');
				?>
					<a class="pink-button" href="<?= $link['url']; ?>" target="<?= esc_attr( $link['target'] ?: '_self' ); ?>">
						<?= $link['title']; ?>
					</a>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
    </div>
  </div>

</div>
