<?php
	$culinary_bar = get_field('culinary_bar', 'option');
	$fanor = get_field('find_an_ovention_representative', 'option');
?>
<div class="repre-bar">
    <div class="row repre-bar__content">
        <a href="<?php echo $fanor['faor_bar_button']['url']; ?>" class="find-rep-btn repre-bar__button">
            <img src="<?php echo bloginfo('template_url') ?>/assets/img/point-button.png" alt="<?php echo $fanor['faor_bar_button']['title']; ?>">
            <?php echo $fanor['faor_bar_button']['title']; ?>
        </a>
    </div>
</div>
<div class="blog-bar hide">
	<div class="row blog-bar__content">
		<div class="medium-6 large-6 medium-offset-3 large-offset-3 columns">
			<h2><?= $culinary_bar['culinary_bar_title'];?></h2>
			<?= $culinary_bar['culinary_bar_content'];?>
		</div>
		<div class="medium-3 large-3 columns">
			<a href="<?= $culinary_bar['culinary_bar_button']['url'];?>" class="blog-bar__button ovention-button ovention-button--white"><?= $culinary_bar['culinary_bar_button']['title'];?> &raquo;</a>
		</div>
	</div>
</div>
