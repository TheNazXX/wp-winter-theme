<?php 
  /*
   Styles and Scripts
  */

  require_once __DIR__ . '/inc/wp1_custom_menu.php';

  function wp1_scripts(){
    wp_enqueue_style('wp1-bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('wp1-style', get_stylesheet_uri());

    wp_enqueue_script('wp1-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', ['jquery'], false, true);
    wp_enqueue_script('wp1-bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', ['jquery'], false, true);
  };

  add_action('wp_enqueue_scripts', 'wp1_scripts');

  function wp1_setup(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    register_nav_menus([
      'header_menu' => 'Menu in Header',
      'footer_menu' => 'Menu in Footer'
    ]);
  };

  add_action('after_setup_theme', 'wp1_setup');


  // add_filter('intermediate_image_size', 'delelte_intermediate_image_size');

  // function delete_intermediate_image_size($sizes){
  //   unset($sizes['medium_large']);
  //   return $sizes;
  // };


  add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );

  function my_navigation_template(){
    return '
    <nav class="navigation %1$s" role="navigation">
      <div class="nav-links">%3$s</div>
    </nav>
    ';
  }


  the_posts_pagination( array(
    'end_size' => 2,
  ));
?>

