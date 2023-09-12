<style type="text/css">
	.store-sticky-bar{
		max-width: 120px;
		background-color: #ebebeb;
		position: fixed;
		right: 0px;
		top: calc(50% - 190px);
		padding: 10px 10px 20px;
		text-align: center;
		z-index: 50;
		box-shadow: -6px -6px 34.8px 5.2px rgba(0, 0, 0, 0.23);
		background-image: url(<?php bloginfo('template_url') ?>/assets/img/kitchen-bg.png);
		background-size: cover;
		background-position: center;
		background-repeat: no-repeat;
	}

	.store-sticky-bar__title_sticky{
		font-size: 21px;
		color: #3f4449;
		line-height: 24px;
		font-weight: bolder;
		text-align: center;
		text-transform: uppercase;
		margin-bottom: 30px;
		font-family: "Montserrat";
	}

	.store-sticky-bar__close{
		color: #3f4449;
		text-align: right;
		margin-bottom: 5px;
		cursor: pointer;
	}

	.store-sticky-bar__button{
		font-size: 18px;
		font-weight: bold;
		line-height: 21px;
		border-radius: 8px;
		background: linear-gradient(90deg, #e27d3d, #faaa42);
		padding: 8px 20px;
		text-transform: uppercase;
		margin-top: 20px;
		color: #FFF;
		display: block;
	}

	.store-sticky-bar__button:hover{
		color: #FFF !important;
	}
</style>

<?php 
	$title_store_sticky = get_field('title_store_sticky','option');
	$image_store_sticky = get_field('image_store_sticky','option');
	$button_store_sticky = get_field('button_store_sticky','option');

if($title_store_sticky){
	?>
		<div class="store-sticky-bar">
			<div class="store-sticky-bar__close"><i class="fas fa-times close-store-sticky"></i></div>
			<?php 
				if($title_store_sticky){
					?>
						<div class="store-sticky-bar__title_sticky"><?php echo($title_store_sticky); ?></div>
					<?php
				}
			?>	
			<?php 
				if($image_store_sticky){
					?>
						<img src="<?= $image_store_sticky['url']; ?>" alt="<?= $image_store_sticky['alt']; ?>">
					<?php
				}
			?>
			<?php 
				if($button_store_sticky){
					?>
						<a href="<?= $button_store_sticky['url'] ?>" class="store-sticky-bar__button"><?= $button_store_sticky['title'] ?></a>
					<?php
				}
			?>		
		</div>
	<?php
}
?>

<script type="text/javascript">
	(function($){
		$(document).ready(function(){

			$('.close-store-sticky').on('click', function(){
	      $('.store-sticky-bar').hide( "fast" );
	    });

		});
		
	})(jQuery);
</script>
