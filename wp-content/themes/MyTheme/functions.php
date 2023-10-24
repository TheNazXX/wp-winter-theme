<?php 
  /*
   Styles and Scripts
  */

  function wp1_scripts(){
    wp_enqueue_style('wp1-bootstrap-css', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style('wp1-style', get_stylesheet_uri());

    wp_enqueue_script('wp1-popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js', ['jquery'], false, true);
    wp_enqueue_script('wp1-bootstrap-js', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', ['jquery'], false, true);
  };

  add_action('wp_enqueue_scripts', 'wp1_scripts');

  function wp1_setup(){
    add_theme_support('post-thumbnails');
  };

  add_action('after_setup_theme', 'wp1_setup');


  // add_filter('intermediate_image_size', 'delelte_intermediate_image_size');

  // function delete_intermediate_image_size($sizes){
  //   unset($sizes['medium_large']);
  //   return $sizes;
  // };
?>

