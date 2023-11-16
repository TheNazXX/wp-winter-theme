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
  <meta charset="<?php bloginfo('charset'); ?>">
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
      <a href="<?php echo esc_url(home_url('/')) ?>">
        <div class="logo float-left">
          <?php if($winter_options['winter_logo']['url']){?>
          <img class="big-device" src="<?php echo $winter_options['winter_logo']['url']?>" alt="logo" width="318px"
            height="110px">
          <?php }?>
          <?php if($winter_options['winter_logo']['url']){?>
          <img class="small-device" src="<?php echo $winter_options['winter_logo']['url']?>" alt="logo" width="200px"
            height="69px">
          <?php }?>
          <span><?php echo $winter_options['winter_slogan']; ?></span>
        </div>
      </a>

      <!-- Social & Search -->
      <div class="social float-right cf">
        <form id="search" method="get" action="<?php echo esc_url(site_url()) ?>">
          <input class="search-inp" type="text" name="s" size="21" maxlength="120" placeholder="Search">
          <input class="search-btn" type="submit" value="">
        </form>
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

      <!-- Nav -->


      <?php
			wp_nav_menu([
				'theme_location' => 'menu-1',
				'menu_id' => 'primary-menu',
				'menu_class' => 'cf',
				'container' => 'nav'
			])
			?>


      <!-- Drop Down -->
      <div class="drop-menu">
        <a>Menu</a>

        <?php
				wp_nav_menu([
					'theme_location' => 'menu-1',
					'menu_id' => 'mobile-menu',
					'menu_class' => 'ul-drop',
					'container' => 'ul'
				])
				?>
      </div>

    </div>
  </header>
  <?php
	if (is_front_page()) { ?>
  <section id="content" class="center-align">
    <div class="center-align">
      <div id="slider">
        <?php
					$slides = '';
					$slides = $winter_options['homepage_slider'];
					?>
        <ul class="slides">

          <?php
						if ($slides) {
							foreach ($slides as $slide) { ?>
          <li>
            <div class="wood">
              <div class="text">
                <?php if($slide['title']){?><h2 class="caption"><?php echo esc_html($slide['title'])?></h2><?php }?>
                <?php if($slide['description']){?><p class="content"><?php echo esc_html($slide['description'])?></p>
                <?php }?>
                <?php if($slide['url']){?><a class="more"
                  href="<?php esc_url($slide['url'])?>"><?php esc_html_e('More >', 'winter')?></a><?php }?>
              </div>
            </div>
            <img src="http://wp1.loc/wp-content/uploads/2023/10/slide1.jpg" alt="slide-img" />
          </li>
          <?php };
						}
						?>
        </ul>
      </div>
    </div>
    <?php } else { ?>
    <section class="center-align">

      <div class="title-page">
        <h2><?php 
					
					if(is_tag()){
						echo esc_html_e('Tag Archive: ') . single_tag_title('', false);
					}
					else if(is_search()){
						echo esc_html_e('Search Results for: '). get_search_query();
					}
					else if(is_category()){
						echo esc_html_e('Category: ') . single_term_title();
					}
					else if(is_author()){
						echo esc_html_e('Author: ') . get_the_author();
					}
					else if(is_post_type_archive('winter_gallery')) {
						echo 'Our Gallery';
					}
					else {
						wp_title('');
					}

					?></h2>
        <div class="page">
          <span class="home"></span><?php if(get_breadcrumbs()) echo get_breadcrumbs();?></span>
        </div>
      </div>


      <div class="dotted-line"></div>
      <?php }
			?>