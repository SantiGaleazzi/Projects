<div class="sticky-bar sticky-bar-logo-start-new" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/partials/background-sticky.jpg);">
  <div class="arrow-close" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/img/partials/close.png);"></div>
  <img class="image-sticky" src="<?php bloginfo('template_url'); ?>/assets/img/partials/logo-start-new.png" width="114" alt="Start new" />
  <div class="form-sticky">
    <?php echo do_shortcode( '[gravityform id="20" title="false" description="false" ajax="true"]' ); ?>
  </div>
</div>
<style type="text/css">
  .arrow-close{
    position: absolute;
    top: 10px;
    right: 10px;
    width: 25px;
    height: 25px;
    background-size: contain;
    cursor: pointer;
  }
  .form-startnew{
    background-color: #eff7f9;
    border-radius: 5px;
    padding: 20px 35px 15px;
    max-width: 780px;
    width: 100%
  }
  .form-startnew .gfield_label{
    display: none !important;
  }
  .form-startnew .gform_body li{
    border: 0;
    padding: 0;
    margin: 0;
    border: none;
  }
  .form-startnew .ginput_complex label{
    display: none !important;
  }
  .form-startnew .gsection_description{
    color: #555555;
    font-family: 'Roboto' !important;
    font-size: 16px !important;
    line-height: 22px !important;
    font-weight: 700;
  }
  .form-startnew .ginput_container input{
    height: 40px;
    margin: 0;
  }
  .form-startnew .gform_footer{
    margin: 0 !important;
  }
  .form-startnew .gform_footer input{
    border-radius: 5px;
    font-size: 18px !important;
  }
  .sticky-bar{
    position: fixed;
    top: 0;
    bottom: 0;
    right: 0;
    margin: auto;
    z-index: 10;
    border-radius: 5px;
    box-shadow: 2px 0px 10px 0px #000;
    background-size: cover;
    width: 291px;
    height: 500px;
  }
  .image-sticky{
    display: block;
    margin: 50px 35px 0px auto;
  }
  .form-sticky{
    padding: 18px 28px 0px;
  }
  .sticky-bar .form-sticky li{
    border: 0;
    padding: 0 !important;
    margin: 0 !important;
  }
  .sticky-bar .form-sticky #field_19_3{
    margin-top: 40px;
  }
  .sticky-bar .form-sticky .gfield_label{
    display: none !important;
  }
  .sticky-bar .form-sticky .ginput_complex label{
    display: none !important;
  }
  .sticky-bar .form-sticky .ginput_container input{
    width: 100% !important;
    height: 40px;
    margin: 0;
  }
  .sticky-bar .gform_body #gform_fields_19{
    margin-top: 44px !important;
  }
  .sticky-bar .form-sticky .gform_footer{
    padding: 0; margin: 0;
  }
  .sticky-bar .form-sticky .gform_footer input{
    border-radius: 5px;
    font-size: 18px !important;
    margin-top: 15px !important;
  }
  .sticky-bar .form-sticky .gform_confirmation_message_20{
    margin-top: 80px;
    color: #ffffff;
  }
  .sticky-bar .form-sticky .gsection_description{
    color: #ffffff;
    font-family: 'Roboto';
    font-size: 16px;
    line-height: 22px;
    font-weight: 700;
  }
  .sticky-bar .name_first{
    padding-right: 0 !important;
    margin-bottom: 8px;
  }
  .sticky-bar .name_last{
    padding-right: 0 !important;
  }

  @media screen and (max-width: 600px){
    .sticky-bar {
        height: 520px;
    }
    .sticky-bar .form-sticky .gform_body .name_first{
      padding-right: 0px !important;
      margin-right: 0px;      
    }
    .sticky-bar .form-sticky .gform_body .name_last{
      padding-right: 0px !important;
    }
    .sticky-bar .form-sticky .gform_footer input{
      padding: 5px;
    }
    .image-sticky {
      margin: 50px 24px 0px auto;
    }
    .form-startnew .gform_footer input {
      border-radius: 5px;
      font-size: 18px !important;
      padding: 6px 0;
    }
  }
</style>
<script type="text/javascript">
    (function($){
       $(document).ready(function(){
        $('.sticky-bar-logo-start-new .arrow-close').on('click', function () {
            $('.sticky-bar-logo-start-new').css('display','none');
        });
       });
    })(jQuery);
</script>
