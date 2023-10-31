<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Winter
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
	wp_body_open(); 
	global $winter_options;
?>

 <!-- Background Awesomeness -->
 <div id="night"></div>

<!-- Stars -->
<div class="back" id="stars1"></div>
<div class="back" id="stars2"></div>

<!-- Clouds -->
<div class="back" id="cloud1"></div>
<div class="back" id="cloud2"></div>
<div class="back" id="cloud3"></div>
<div class="back" id="cloud4"></div>
<div class="back" id="cloud5"></div>

<!-- Header Section -->
<header>
		<div class="center-align cf">

				<!-- Logo -->
				<a href="<?php echo esc_url(home_url('/'))?>">
						<div class="logo float-left"> <span><?php echo $winter_options['winter_slogan'];?></span> </div>
				</a>

				<!-- Social & Search -->
				<div class="social float-right cf">
						<form id="search" method="get" action="http://www.google.com">
								<input class="search-inp" type="text" name="q" size="21" maxlength="120" placeholder="Search">
								<input class="search-btn" type="submit" value="">
						</form>
						<ul>
								<li class="facebook"><a href=""></a></li>
								<li class="instagram"><a href=""></a></li>
								<li class="pinterest"><a href=""></a></li>
								<li class="twitter"><a href=""></a></li>
								<li class="youtube"><a href=""></a></li>
						</ul>
				</div>

				<!-- Nav -->
				<nav>
						<ul class="cf">
								<li class="active"><a href="index.html">Home</a></li>
								<li><a href="about.html">About Us</a></li>
								<li>
										<a href="blog.html">Activities</a>
										<ul>
												<li><a href="blog-single.html">Single Post</a></li>
												<li>
														<a>Second level</a>
														<ul>
																<li><a>Third level</a></li>
																<li><a>Third level</a></li>
														</ul>
												</li>
										</ul>
								</li>
								<li><a href="rooms.html">Rooms</a></li>
								<li>
										<a>Pages</a>
										<ul>
												<li><a href="gallery.html">Gallery</a></li>
												<li><a href="gallery-opened.html">Single Gallery</a></li>
										</ul>
								</li>
								<li><a href="contacts.html">Contact</a></li>
						</ul>
				</nav>

				<!-- Drop Down -->
				<div class="drop-menu">
						<a>Menu</a>
						<ul class="ul-drop">
								<li class="active"><a href="index.html">Home</a></li>
								<li><a href="about.html">About Us</a></li>
								<li>
										<a>Activities</a>
										<ul>
												<li><a href="blog.html">Blog</a></li>
												<li><a href="blog-single.html">Single Post</a></li>
												<li><a href="#">Second level</a></li>
										</ul>
								</li>
								<li><a href="rooms.html">Rooms</a></li>
								<li>
										<a>Pages</a>
										<ul>
												<li><a href="gallery.html">Gallery</a></li>
												<li><a href="gallery-opened.html">Single Gallery</a></li>
										</ul>
								</li>
								<li><a href="contacts.html">Contact</a></li>
						</ul>
				</div>

		</div>
</header>

<!-- Slider -->
<div class="center-align">
		<div id="slider">
				<ul class="slides">
						<!-- -->
						<li>
								<div class="wood">
										<div class="text">
												<span class="category">Category</span>
												<h2 class="caption">Header Text here</h2>
												<p class="content">
														Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur.
												</p>
												<a class="more" href="">More ></a>
										</div>
								</div>
								<img src="css/images/home/slide1.jpg" alt="" />
						</li>

						<!-- -->
						<li>
								<img src="css/images/home/slide2.jpg" alt="" />
						</li>
				</ul>
		</div>
</div>

<!-- Content Section -->
<section id="content" class="center-align">


<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'winter' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
					<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$winter_description = get_bloginfo( 'description', 'display' );
			if ( $winter_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $winter_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'winter' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
