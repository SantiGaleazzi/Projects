<?php
if(is_post_type_archive( "cases" )){
    $rights_background_image        =  get_field("background", "option");
    $rights_background_color_bool   =  get_field("background_overlay", "option");
    $rights_background_color        =  ($rights_background_color_bool) ? get_field("background_overlay_color", "option") : "";
    list($r, $g, $b)                =  sscanf($rights_background_color, "#%02x%02x%02x");
    $rgba_colour                    =  'rgba(' . $r . ',' . $g . ',' . $b . ', 0.8)';
    $rights_title                   =  get_field("your_rights_title", "option");
    $rights_content                 =  get_field("your_rights_content", "option");
    $rights_link                    =  get_field("your_rights_link", "option");
}

if(is_front_page()){
    $rights_background_image        =  get_field("background");
    $rights_background_color_bool   =  get_field("background_overlay");
    $rights_background_color        =  ($rights_background_color_bool) ? get_field("background_overlay_color") : "";
    list($r, $g, $b)                =  sscanf($rights_background_color, "#%02x%02x%02x");
    $rgba_colour                    =  'rgba(' . $r . ',' . $g . ',' . $b . ', 0.8)';
    $rights_title                   =  get_field("your_rights_title");
    $rights_content                 =  get_field("your_rights_content");
    $rights_link                    =  get_field("your_rights_link");
}
?>
<div class="your-rights" style="background-image: url(<?php echo $rights_background_image?>)">
  <div class="your-rights__overlay" style="background-color: <?php echo $rgba_colour?>">
    <div class="row">
      <div class="large-12 columns">
        <div class="your-rights__box">
          <h2><?php echo $rights_title?></h2>

          <p><?php echo $rights_content?></p>

          <a href="<?php echo $rights_link['url']?>" target="<?php echo $rights_link['target']?>" class="your-rights__contact"><?php echo $rights_link['title']?></a>
        </div>   
      </div>       
    </div>  
  </div>  
</div>
