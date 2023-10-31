<?php global $winter_options;?>

<footer>
	<section>
		<div class="center-align cf">

			<!-- Some Info  -->
			<div class="col-6 float-left">
				<div class="col-5 information">
					<h3>Information</h3>
					<?php 
						wp_nav_menu([
							'theme_location' => 'footer_links',
							'menu_id' => 'footer-links'
						])
					?>
				</div>
				<div class="col-7 contacts">
					<h3><?php echo esc_html($winter_options['contacts_title'])?></h3>
					<?php if($winter_options['contacts_number']){?>
					<?php }?>
					<span class="tel"><?php echo ($winter_options['contacts_number'])?></span>
					<?php if($winter_options['contacts_email']){?> 
						<span><a href="mailto:<?php echo esc_html($winter_options['contacts_email'])?>"><?php echo esc_html($winter_options['contacts_email'])?></a></span>	
					<?php }?> 
					<?php if($winter_options['contacts_addres']){?> 
						<span><?php echo esc_html($winter_options['contacts_addres'])?></span>	
					<?php }?> 
					<ul>
						<?php
						if ($winter_options['fb']) { ?>
							<li class="facebook"><a href="<?php echo esc_url($winter_options['fb']) ?>"></a></li>
						<?php }
						?>
						<?php
						if ($winter_options['inst']) { ?>
							<li class="instagram"><a href="<?php echo esc_url($winter_options['inst']) ?>"></a></li>
						<?php }
						?>
						<?php
						if ($winter_options['youtube']) { ?>
							<li class="youtube"><a href="<?php echo esc_url($winter_options['youtube']) ?>"></a></li>
						<?php }
						?>
					</ul>
				</div>
			</div>

			<!-- Form -->
			<div class="form float-right">
				<?php if($winter_options['shortcode']){
					echo do_shortcode($winter_options['shortcode']);
				}?>
			</div>

		</div>

		<!-- Bottom Line -->
		<div class="bottom-line">
			<a class="top" href="#top">TOP</a>

			<div class="center-align cf">
				<div class="left">&copy; 2023 Winter. All rights reserved</div>
				<img class="right" src="http://wp1.loc/wp-content/uploads/2023/10/logo-small.png" alt="logo">
			</div>
		</div>

	</section>


	<!-- Background Awesomeness -->
	<div id="footer-white"></div>
	<div id="footer-yellow"></div>

	<!-- Clouds -->
	<div id="footer-cloud1"></div>
	<div id="footer-cloud2"></div>

	<!-- Birds -->
	<div id="footer-bird1"></div>
	<div id="footer-bird2"></div>
	<div id="footer-bird3"></div>

	<!-- Waves -->
	<div class="waves">
		<div id="footer-wave1"></div>
		<div id="bui"></div>
		<div id="footer-wave2"></div>
	</div>
</footer>


<?php wp_footer(); ?>
</body>

</html>