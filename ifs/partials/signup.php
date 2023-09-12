<?php   $footer_sigup = get_field('footer_sigup', 'option'); ?>

<div class="sign-up">
    <div class="row">
        <div class="large-12 columns">
          <h2><?php echo $footer_sigup; ?></h2>

          <?php gravity_form( 1, false, false, false, '', true );?>
        </div>
    </div>    
</div>
