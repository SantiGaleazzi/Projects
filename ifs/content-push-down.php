<?php
  $footer_logo = get_field('footer_logo', 'option');
  if(is_page_template( 'template-home.php' )):
?>
<div class="push-down hide">

  <div class="row push-down__ffz hide">
    <div class="columns large-6">
      <div class="push-down__ffz--logo">
        <?php if ($footer_logo): ?>
        <a href="<?php bloginfo('url'); ?>" target="_self"><img width="232" src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" class="svglogo"></a>
        <?php endif; ?>
      </div>

      <h3>Fund the Fight for Free Speech</h3>
      <p>
        The Institute for Free Speech promotes and defends the First Amendment rights to freely speak, assemble, publish, and petition the government through strategic litigation, communication, activism, training, research, and education.
      </p>
      <p>
        Your tax-deductible donation is both needed and greatly appreciated as the Institute for Free Speech stands up for your First Amendment rights. Thank you for your support!
      </p>
    </div>
    <div class="columns large-6">
      <?php echo do_shortcode('[flexformz id="15082" type="inline" ]'); ?>
    </div>
  </div>

  <div class="row push-down__signUp hide">
    <div class="columns large-6 large-centered">
      <div class="push-down__signUp text-center">
        <?php if ($footer_logo): ?>
        <a href="<?php bloginfo('url'); ?>" target="_self"><img width="232" src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>" class="svglogo"></a>
        <?php endif; ?>
      </div>

      <div class="push-down__signUp--wrapper text-center">
        <h3>Get the Latest Updates</h3>
        <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]') ?>
      </div>
    </div>
  </div>

  <div class="push-down__close">
    <i class="fa fa-times-circle" aria-hidden="true"></i>
  </div>
</div>
<?php 
  endif;
?>
