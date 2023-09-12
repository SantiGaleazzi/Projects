<?php 

//Action bar
$content = get_field('content','options');
$background_color  = get_field('background_color','options');
$background_image  = get_field('background_image','options');
$show_banner = get_field('show_banner','options');

    if( ( $show_banner === true ) ) :

?>

<div class="action-bar block font-roboto-condensed text-lg" style="background-color: <?php echo $background_color; ?>;  background-image: url(<?php echo $background_image; ?>);">
	<div class="w-full">
		<div class="container flex justify-between items-center mx-auto py-3 md:py-4 text-center text-white px-4 lg:px-0 text-base lg:text-lg">
			<div class="text-center w-full action-bar-content">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</div>
<?php endif;
?>