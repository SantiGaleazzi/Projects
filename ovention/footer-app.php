<?php $footer = get_field('footer', 'option'); ?>


		<div id="footer" class="footer-app">
			<div class="row">
				<div id="bottom_footer">
					<div id="social_bar">
						<div class="social_icon">
							<a href="https://www.facebook.com/OventionOvens/" target="_blank" rel="nofollow">
								<img src="<?php bloginfo('template_url') ?>/assets/img/facebook.png" alt="Facebook>"  class="hide-for-small">
							</a>
						</div>

						<div class="social_icon">
							<a href="https://twitter.com/OventionOvens" target="_blank" rel="nofollow">
								<img src="<?php bloginfo('template_url') ?>/assets/img/twitter.png" alt="Twitter"  class="hide-for-small">
							</a>
						</div>

						<div class="social_icon">
							<a href="https://www.linkedin.com/company/2951065?trk=tyah&trkInfo=clickedVertical%3Acompany%2Cidx%3A1-1-1%2CtarId%3A1432744710307%2Ctas%3Aovention" target="_blank" rel="nofollow">
								<img src="<?php bloginfo('template_url') ?>/assets/img/linkedin.png" alt="LinkedIn"  class="hide-for-small">
							</a>
						</div>
					</div>

					<div class="eight columns">
						<div  id="logo_footer" class="three columns no-padding ">
							<a href="<?php echo esc_url( home_url( '/' )); ?>"><img src="<?= $footer['footer_logo']['url']; ?>" alt="<?= $footer['footer_logo']['alt']; ?>"></a>
						</div>
						<div class="nine columns connect">
							<div id="hatco">
								<?= $footer['footer_copyright']; ?>
								<?= $footer['footer_info']; ?>
							</div>
						</div>
					</div>

					<div class="four columns">
						<div id="top_footer_menu">
							<ul>
								<li>
									<a href="<?php echo site_url(); ?>/ovention-ovens/">Catalog</a>
								</li>
								<li>
									<a href="<?php site_url() ?>/customer-care/">Support</a>
								</li>
							</ul>
						</div>
						<div id="bottom_footer_menu">
							<ul>
								<li>
									<a href="https://www3.hatcocorp.com/RegUser2/Login.jsp" target="_blank">Distributor Login</a>
								</li>
							</ul>
						</div>
						<a href="http://ovention.kclcad.com/" target="_blank"><img id="kcl_logo" src="<?php echo bloginfo('template_url'); ?>/src/appstyles/images/KCL-Logo.png" alt="KCL-Log"></a>
					</div>
					<div class="clean"></div>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
		</script>

  		<?php wp_footer(); ?>

  		<?php get_template_part( 'partials/partial', 'trackingcode' ); ?>

	</body>
</html>
