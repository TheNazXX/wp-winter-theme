<?php 

  function wp1_register_blocks(){

    if(!function_exists('register_block_type')){
      return;
    };
    
    wp_register_script('gc-about', __FILE__ . '/blocks/js/gc-about.js', ['wp-blocks', 'wp-element', 'wp-editor'], '1.0');
    wp_register_script('gc-about', __FILE__ . '/blocks/css/gc-about.css', ['wp-blocks', 'wp-element', 'wp-editor'], '1.0');

    register_block_type('wp1/gc-about', ['style' => 'gc-about', 'editor_script' => 'gc-about']);
  };

  add_action('init', 'wp1_register_blocks');
?>