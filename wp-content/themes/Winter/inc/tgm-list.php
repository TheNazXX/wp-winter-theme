<?php

// Цей код встановлює і активує певні плагіни в WordPress за допомогою TGM Plugin Activation (TGM-Plugin-Activation), як я вже згадував раніше. Ось як це працює:

// Ви включили бібліотеку TGM Plugin Activation, вказавши шлях до файлу class-tgm-plugin-activation.php.

// Ви створили функцію winter_register_required_plugins, яка визначає, які плагіни потрібно встановити та активувати.

// У масиві $plugins ви вказали перелік плагінів, які потрібно встановити та активувати. Для кожного плагіна ви вказали ім'я, слаг (зазвичай це папка плагіна), джерело, обов'язковість встановлення, версію, форсування активації та інші параметри.

// В масиві $config ви вказали конфігурацію для TGM Plugin Activation, таку як ID, шлях до плагінів, відображення повідомлень та інші налаштування.

// Нарешті, викликається функція tgmpa(), якій передаються масив плагінів і конфігурація, і TGM Plugin Activation бере на себе встановлення та активацію вказаних плагінів.

// Цей підхід корисний для автоматизації процесу встановлення і активації плагінів, що може бути корисним для розробників тем або плагінів, коли вони хочуть забезпечити певні функції або інтеграції з плагінами для користувачів своїх продуктів.

require_once get_template_directory() . '/inc/tgm.php'; // Подключаем саму библиотеку

add_action( 'tgmpa_register', 'winter_register_required_plugins' );


function winter_register_required_plugins() {

	$plugins = array(


		// array(
		// 	'name'               => 'TGM Example Plugin', // The plugin name.
		// 	'slug'               => 'tgm-example-plugin', // The plugin slug (typically the folder name).
		// 	'source'             => get_template_directory() . '/lib/plugins/tgm-example-plugin.zip', // The plugin source.
		// 	'required'           => true, // If false, the plugin is only 'recommended' instead of required.
		// 	'version'            => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher. If the plugin version is higher than the plugin version installed, the user will be notified to update the plugin.
		// 	'force_activation'   => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch.
		// 	'force_deactivation' => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins.
		// 	'external_url'       => '', // If set, overrides default API URL and points to an external URL.
		// 	'is_callable'        => '', // If set, this callable will be be checked for availability to determine if a plugin is active.
		// ),

		// // This is an example of how to include a plugin from an arbitrary external source in your theme.
		// array(
		// 	'name'         => 'TGM New Media Plugin', // The plugin name.
		// 	'slug'         => 'tgm-new-media-plugin', // The plugin slug (typically the folder name).
		// 	'source'       => 'https://s3.amazonaws.com/tgm/tgm-new-media-plugin.zip', // The plugin source.
		// 	'required'     => true, // If false, the plugin is only 'recommended' instead of required.
		// 	'external_url' => 'https://github.com/thomasgriffin/New-Media-Image-Uploader', // If set, overrides default API URL and points to an external URL.
		// ),


		// array(
		// 	'name'      => 'Adminbar Link Comments to Pending',
		// 	'slug'      => 'adminbar-link-comments-to-pending',
		// 	'source'    => 'https://github.com/jrfnl/WP-adminbar-comments-to-pending/archive/master.zip',
		// ),

		// Це приклад того, як включити плагін із репозиторію плагінів WordPress.
		array(
			'name'      => 'Redux Framework',
			'slug'      => 'redux-framework',
			'required'  => true,
		),

		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => true,
		),

		array(
			'name'      => 'Simple Google Maps Short Code',
			'slug'      => 'simple-google-maps-short-code',
			'required'  => true,
		),



	);


	$config = array(
		'id'           => 'winter',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}