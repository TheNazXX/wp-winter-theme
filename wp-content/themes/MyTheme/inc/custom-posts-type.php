<?php 
  function cars_post_type() {
    $labels = array(
        'name' => 'Cars',
        'singular_name' => 'Custom Post Type',
        'menu_name' => 'Cars Posts',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,  // Делаем записи видимыми на сайте
        'has_archive' => true,  // Включаем архив для записей
        'publicly_queryable' => true,  // Разрешаем запросы к записям
        'show_ui' => true,  // Включаем пользовательский интерфейс в админке
        'show_in_menu' => true,  // Показываем в меню админки
        'supports' => array('title', 'editor', 'thumbnail'),  // Поддерживаемые поля
    );

    register_post_type('cars', $args);
}

add_action('init', 'cars_post_type');

?>