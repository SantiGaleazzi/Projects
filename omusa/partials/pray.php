<?php
	
	$settings_pray_side_image = get_field('settings_pray_side_image', 'options');
	$settings_pray_button = get_field('settings_pray_button', 'options');
	$settings_pray_target = $settings_pray_button['target'] ? $settings_pray_button['target'] : '_self';

?>

<section class="bg-gray-150-new relative">
	<div class="hidden md:block w-1/2 h-full absolute top-0 left-0 bg-cover bg-no-repeat bg-top" style="background-image: url('<?= $settings_pray_side_image['url']; ?>');"></div>

	<div class="container px-6">	
		<div class="flex justify-end py-16 text-default">
			<div class="w-full md:w-1/2">
				<div class="font-roboto font-light leading-none text-4xl lg:text-5xl mb-6">
					<?php the_field('settings_pray_title', 'options'); ?>
				</div>

				<div class="leading-7 mb-10">
					<?php the_field('settings_pray_description', 'options'); ?>
				</div>

				<?php if ( $settings_pray_button['url'] ) : ?>
					<div>
						<a href="<?= esc_url( $settings_pray_button['url'] ); ?>" rel="nofollow" target="<?= esc_attr( $settings_pray_target ); ?>" class="text-center text-white-pure text-lg font-black px-8 py-3 bg-green-500">
							<?= $settings_pray_button['title']; ?>
						</a>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
