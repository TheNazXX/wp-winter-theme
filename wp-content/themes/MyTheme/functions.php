<?php
/*
   Styles and Scripts
  */

require_once __DIR__ . '/inc/wp1_custom_menu.php';
require_once get_template_directory() . '/inc/redux-options.php';
require_once get_template_directory() . '/inc/custom-posts-type.php';


function wp1_scripts()
{
  wp_enqueue_style('wp1-bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
  wp_enqueue_style('wp1-bootstrap-4', get_template_directory_uri() . '/assets/bootstrap/bootstrap.min.css');
  wp_enqueue_style('wp1-owlcarousel', get_template_directory_uri() . '/assets/libs/owlcarousel/assets/owl.carousel.min.css');
  wp_enqueue_style('wp1-tempusdominus', get_template_directory_uri() . '/assets/libs/tempusdominus/css/tempusdominus-bootstrap-4.min.css');
  wp_enqueue_style('wp1-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css');

  wp_enqueue_style('wp1-footer-style', get_template_directory_uri() . '/assets/css/footer.css');
  wp_enqueue_style('wp1-style', get_stylesheet_uri());

  wp_enqueue_script('wp1-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', ['jquery'], false, true);
  wp_enqueue_script('wp1-bootstrap-bundle', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js', ['jquery']);
  wp_enqueue_script('wp1-bootstrap', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', ['jquery'], false, true);
  wp_enqueue_script('wp1-easing', get_template_directory_uri() . '/assets/libs/easing/easing.min.js', ['jquery'], false, true);
  wp_enqueue_script('wp1-waypoints', get_template_directory_uri() . '/assets/libs/waypoints/waypoints.min.js', ['jquery'], false, true);
  wp_enqueue_script('wp1-owlcarousel', get_template_directory_uri() . '/assets/libs/owlcarousel/owl.carousel.min.js', ['jquery'], false, true);
  wp_enqueue_script('tempusdominus-moment', get_template_directory_uri() . '/assets/libs/tempusdominus/js/moment.min.js', ['jquery'], false, true);
  wp_enqueue_script('tempusdominus-timezone', get_template_directory_uri() . '/assets/libs/tempusdominus/js/moment-timezone.min.js', ['jquery'], false, true);
  wp_enqueue_script('tempusdominus-bootstrap', get_template_directory_uri() . '/assets/libs/tempusdominus/js/tempusdominus-bootstrap-4.min.js', ['jquery'], false, true);
  wp_enqueue_script('wp1-main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], false, true);

  wp_enqueue_style('wp1_fonts', wp1_fonts_url(), [], '1.0');
};

add_action('wp_enqueue_scripts', 'wp1_scripts');

function wp1_fonts_url(){
  $fonts_url = '';
  $families = [];
  $families[] = 'Oswald:wght@400;500;600;700';
  $families[] = 'Rubik';
  
  $query_args = [
    'family' => urlencode(implode('|', $families))
  ];

  $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
  return esc_url_raw($fonts_url);
};

function wp1_setup()
{
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


add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);

function my_navigation_template()
{
  return '
    <nav class="navigation %1$s" role="navigation">
      <div class="nav-links">%3$s</div>
    </nav>
    ';
};


the_posts_pagination(array(
  'end_size' => 2,
));

function wp1_test_func(){
  echo "Hello from hook";
};

add_action('wp1_our_hook', 'wp1_test_func');

function wp1_add_class_on_li($classes, $item, $args){
  if(isset($args->add_li_class)){
    $classes[] = $args->add_li_class;
  };

  return $classes;
};

add_filter('nav_menu_css_class', 'wp1_add_class_on_li', 1,3);
?>