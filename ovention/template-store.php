<?php

	/*
	*Template Name: Store
	*/

	$history = get_field('history');
	$corporate_statement = get_field('corporate_statement');
	$made_in_the_usa = get_field('made_in_the_usa');
	$staff = get_field('staff');

	get_header();

?>

	<section class="row-wrap shop-hero center">
		<div class="row">
			<h1>
				Welcome to the Ovention Store
			</h1>
			<p>
				Our versatile line of ovens allows you to pick a perfect option for your unique needs, based on footprint, flexibility and volume.
			</p>

			<a href="<?php bloginfo('url'); ?>/shop/" class="btn outline-btn white-btn">Buy Now</a>
			<a href="<?php bloginfo('url'); ?>/order-info-form/" class="btn outline-btn white-btn">Order Info Form</a>
		</div>
	</section>

	<section class="row-wrap shop-products center">
		<div class="row">
			<h2>Shop Our Products</h2>
			<div class="flex-row">
				<div class="col col7">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_product_cat=matchbox&_sft_pa_unit-width=up-to-62in" class="box-link">
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2021/06/Matchbox.jpg" alt="matchbox"/>
						<h3>Matchbox</h3>
					</a>
				</div>

				<div class="col col7">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_product_cat=shuttle" class="box-link">
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2021/06/Shuttle.jpg" alt="Shuttle"/>
						<h3>Shuttle</h3>
					</a>
				</div>

				<div class="col col7">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_product_cat=milo" class="box-link">
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2021/06/MiLO-2.jpg" alt="MiLO"/>
						<h3>MiLO</h3>
					</a>
				</div>

				<div class="col col7">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_product_cat=conveyor" class="box-link">
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2021/06/Conveyor.png" alt="Conveyor"/>
						<h3>Conveyor</h3>
					</a>
				</div>

				<div class="col col7">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_product_cat=misa" class="box-link">
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2021/06/MiSA.jpg" alt="MiSA"/>
						<h3>MiSA</h3>
					</a>
				</div>

				<div class="col col7">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_product_cat=matchbox&_sft_pa_unit-width=up-to-35in" class="box-link">
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2021/06/M360-2.jpg" alt="M360"/>
						<h3>M360</h3>
					</a>
				</div>

				<div class="col col7">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_product_cat=finishing-ovens" class="box-link">
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2023/01/Finishing-v2.png" alt="F1400"/>
						<h3>Finishing</h3>
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="row-wrap looking-for gray-bgrd center">
		<div class="row">
			<h2>Not Sure What You Are Looking For?</h2>
			<div class="flex-row flex-center">
				<div class="col col5">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_pa_unit-width=up-to-24in,up-to-35in" class="box-link">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/store/Ovention_Small_Footprint.png" alt="Small Footprint Ovens" style="max-width: 210px; width: 100%;"/>
						<h3>Small Footprint Ovens</h3>
					</a>
				</div>

				<div class="col col5">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_pa_throughput-volume=26-50,51-100" class="box-link">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/store/Ovention_High-Throughput.png" alt="High-Throughput Ovens" style="max-width: 210px; width: 100%;"/>
						<h3>High-Throughput Ovens</h3>
					</a>
				</div>

				<div class="col col5">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_pa_features=ventless" class="box-link">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/store/Ovention_Ventless.png" alt="Ventless" style="max-width: 210px; width: 100%;"/>
						<h3>Ventless</h3>
					</a>
				</div>

				<div class="col col5">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_pa_quiet=quieter-61-70-db,quietest-50-60-db" class="box-link">
						<img src="<?php bloginfo('template_url'); ?>/assets/img/store/Ovention_Quiet.png" alt="Quiet" style="max-width: 210px; width: 100%;"/>
						<h3>Quiet</h3>
					</a>
				</div>
			</div>
		</div>
	</section>

	<section class="row-wrap featured-section">
		<div class="row center">
			<div class="flex-row">
				<div class="col col3">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_product_tag=accessories+oven" class="box-link">
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2021/06/All-Products.jpg" alt="All Products"/>
						<h3>All Products</h3>
					</a>
				</div>

				<div class="col col3">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_product_tag=oven" class="box-link">
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2021/06/All-Ovens.jpg" alt="All Ovens"/>
						<h3>All Ovens</h3>
					</a>
				</div>

				<div class="col col3">
					<a href="<?php bloginfo('url'); ?>/shop/?_sft_product_tag=accessories" class="box-link">
						<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2021/06/All-Accessories.jpg" alt="All Accessories"/>
						<h3>All Accessories</h3>
					</a>
				</div>
			</div>
		</div>

		<div class="row learn-more-col">
			<div class="flex-row">
				<div class="col col3">
					<span class="heading-prefix">See what is trending now</span>
					<h2>Ovention's Blog</h2>
					<p>Keeping on top of industry trends, solutions to service challenges, and what's most important in your business is easier than ever. From pizza vending machines to labor solutions to customer satisfaction, find what you need to know.</p>
					<a href="<?php bloginfo('url'); ?>/culinary-blog/" class="btn solid-btn orange-btn">Learn More</a>
				</div>

				<div class="col col3-lg col-padding-left">
					<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2021/06/Variety-of-foods-scaled-1.jpg" alt="pizza crust"/>
				</div>
			</div>
		</div>

		<div class="row learn-more-col">
			<div class="flex-row">
				<div class="col col3-lg col-padding-right">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/MNJBFFqFtrY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>

				<div class="col col3">
					<span class="heading-prefix">Video spotlight</span>
					<h2>MiSA-a12; When Speed and Quality Matter</h2>
					<p>MiSA has the largest cooking cavity in under 16" of counterspace and cooks up to 10x faster than conventional ovens. This also features a proprietary cook plate to brown that pizza crust more beautifully than any other rapidcook oven. It also comes in a wide range of colors, perfect to customize for your open kitchen. Cook more food, faster, and better with MiSA-a12.</p>
					<a href="<?php bloginfo('url'); ?>/ovention-ovens/misa/" class="btn solid-btn orange-btn">Learn More</a>
				</div>
			</div>
		</div>
	</section>

	<section class="row-wrap testimonials">
		<div class="row">
			<div class="flex-row">
				<div class="col col3"></div>

				<div class="col col3">
					<h2>Testimonials</h2>
				</div>

				<div class="col col3"></div>
			</div>

			<div class="flex-row">
				<div class="col col3">
					<blockquote>
						"We LOVE everything about our Ovention Double-MiLO oven.  It was quick and easy to install and set-up - even easier to use, program new recipes and make adjustments as needed.  This oven cooks everything to delicious perfection.  We have a small set-up, but this oven gets us through our busiest times stress-free with efficient cook times.  And cleaning is a breeze - reduces operations so our team can focus on the food!  Thank you, Ovention!."
					</blockquote>
					<div class="person">Molly Yee,</div>
					<div class="position">Owner, <br/>Poppin Craft Popcorn</div>
				</div>

				<div class="col col3">
					<blockquote>
						"Ovention- has improved our overall quality of service and with the speed of production in our Pizza Stands. I would definitely recommend this equipment and product to any vendors looking to make any improvements to their Pizza service."
					</blockquote>
					<div class="person">Foodservice at NFL Stadium,</div>
					<div class="position">Centerplate <br/></div>
				</div>

				<div class="col col3">
					<blockquote>
						"Our Ovention oven helped us provide food choices that you would traditionally find in a kitchen with a deep fryer, which we could not have in our space. With Ovention, we are able to offer items like chicken wings, mozzarella sticks, etc. that we would not have been able to otherwise.  We can provide high quality food that was not possible without the oven. The footprint of the oven is perfect as we don’t have a large kitchen, and the ease of use works great for our bartenders when they have to step in and cook food."
					</blockquote>
					<div class="person">Chad Ostram,</div>
					<div class="position">Owner/Brewmaster, <br/>Brewfinity Brewing Company</div>
				</div>
			</div>
		</div>
	</section>

	<?php get_template_part( 'partials/culinary-bar' ); ?>

<?php get_footer();
