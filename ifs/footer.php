<?php
  $footer_logo       = get_field('footer_logo', 'option');
  $footer_social     = get_field('footer_social', 'option');
  $footer_donate_btn = get_field('donate_btn', 'option');
  $footer_copyright  = get_field('footer_copyright', 'option');

  // echo "<pre>";
  // var_dump($footer_social);
?>
<div class="footer">
    
    <?php get_template_part( "partials/signup" ); ?>

    <hr>

  <div class="row footer__nav">
    <div class="medium-12 large-2 xlarge-3 columns footer__logo">

      <?php if ($footer_logo): ?>
      <a href="<?php bloginfo('url'); ?>" target="_self"><img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" class="svglogo"></a>
      <?php endif; ?>

    </div>
    <div class="medium-12 large-10 xlarge-9 columns navmenu footer__secmenu">
      <ul class="dropdown navmenu__secondary" data-dropdown-menu>
        <?php
          $defaults = array(
            'theme_location'  => 'prefooter_menu',
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
            'walker'        => new themeslug_walker_nav_menu_header
          );
        wp_nav_menu($defaults); ?>
      </ul>

      <div class="show-for-large" style="display: flex;">
        <?php get_search_form(); ?>
      </div>      
    </div>
  </div>
  <div class="row">
    <div class="large-12 column footer__content">
      <ul class="footer__menu">
        <?php
          $defaults = array(
            'theme_location'  => 'footer_menu',
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
            'walker'        => new themeslug_walker_nav_menu_header
          );
          wp_nav_menu($defaults); ?>

          <li class="hide-for-large fsearch-container">
            <?php get_search_form(); ?>
          </li>
          
          <?php if( have_rows('footer_social','option') ): ?>
          <li class="social">
            <?php while ( have_rows('footer_social','option') ) : the_row(); ?>

                <?php $footer_social_icon = get_sub_field('social_icon');  ?>
                <?php $footer_social_url  = get_sub_field('social_url');  ?>
                <a href="<?php echo $footer_social_url; ?>" class="social-icon social__item" target="_blank"><img src="<?php echo $footer_social_icon['url']; ?>" alt="<?php echo $footer_social_icon['alt']; ?>"></a>

            <?php endwhile; ?>
          </li>
          <?php endif; ?>
          <li class="donate-item">
            <a href="<?php echo $footer_donate_btn['url']; ?>" class="btn btn--yellow"><?php echo $footer_donate_btn['title']; ?></a>
          </li>
      </ul>

      <p><?php echo $footer_copyright; ?></p>
    </div>
  </div>
</div>


		<?php wp_footer(); ?>

		<!-- <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
		<script>
		WebFont.load({
			google: {
			families: ['Source Sans Pro','Neuton']
			}
		});
		</script> -->

</body>
</html>
