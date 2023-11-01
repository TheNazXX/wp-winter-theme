<?php
/**
 * Winter functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Winter
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}




function winter_setup() {
	
	load_theme_textdomain( 'winter', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'winter' ),
			'footer_links' => esc_html__('Footer', 'winter')
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'winter_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'winter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function winter_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'winter_content_width', 640 );
}
add_action( 'after_setup_theme', 'winter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function winter_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'winter' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'winter' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'winter_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function winter_scripts() {
	wp_enqueue_style( 'winter-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'winter-general', get_template_directory_uri() . '/assets/general.css', array(), _S_VERSION , false);
	wp_style_add_data( 'winter-style', 'rtl', 'replace' );

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'winter-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'scrollable', get_template_directory_uri() . '/assets/js/libs/scrollable.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/js/libs/jquery.flexslider-min.js', array(), _S_VERSION, true );


	wp_enqueue_script( 'winter-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'winter_scripts' );

function ale_add_scripts($hook) {
	if('post-new.php' == $hook || 'post.php' == $hook){
		wp_enqueue_script( 'winter_metaboxes', get_template_directory_uri()  . '/assets/js/admin/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );
	}
}
add_action('admin_enqueue_scripts', 'ale_add_scripts');

add_image_size('post-front', 235, 183, true);

require get_template_directory() . '/inc/custom-header.php';


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';



/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * Init TGM Plugin Installer.
*/
require get_template_directory() . '/inc/tgm-list.php';

/**
 * Init Metaboxes.
 */
require get_template_directory() . '/inc/metaboxes.php';


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';



/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

add_filter('wpcf7_form_elements', function($content) {
	$content = preg_replace('/<(span).*?class="\s*(?:.*\s)?wpcf7-form-control-wrap(?:\s[^"]+)?\s*"[^\>]*>(.*)<\/\1>/i', '\2', $content);
	$content = str_replace('<br />', '', $content);
	return $content;
});


/**
 * Init Redux Theme Options Settings
 */
require get_template_directory() . '/inc/redux-options.php';


//---------------------------------------------------------------------------------------------------------------------------------------------------//

// Цей код представляє собою функцію aletheme_metaboxes, яка визначає метабокси для сторінок в WordPress. Метабокси додають додатковий контент та налаштування на сторінки редагування записів.

// Основні риси цього коду:

// Ви оголошуєте порожній масив $meta_boxes, який буде містити інформацію про всі метабокси, які ви хочете додати.

// Ви встановлюєте змінну $prefix зі значенням "winter_". Це використовується для створення ідентифікаторів полів метабоксів.

// Далі, ви оголошуєте кожен окремий метабокс, додавши його до масиву $meta_boxes. Кожен метабокс включає такі властивості:

// id: Унікальний ідентифікатор метабокса.
// title: Назва метабокса.
// pages: Типи записів, на яких він буде відображатися.
// context: Розташування метабокса (наприклад, "normal").
// priority: Пріоритет відображення метабокса.
// show_names: Показ імен полів зліва (булеве значення).
// show_on: Умови, при яких метабокс буде відображатися (у цьому прикладі, він відображатиметься на сторінках з певними шаблонами).
// Властивість fields містить масив полів, які включаються в метабокс. Кожне поле має свої властивості, такі як name, desc, id, std, type, і т. д. Наприклад, поля можуть бути файлами, текстовими рядками чи редакторами.

// Цей код додає метабокси для різних сторінок та визначає, які поля будуть доступні для редагування на цих сторінках. Метабокси використовуються для розширення можливостей редагування контенту в WordPress та налаштування параметрів для сторінок.

function aletheme_metaboxes($meta_boxes) {

	$meta_boxes = array();

	wp_reset_postdata();

	$prefix = "winter_";


	$meta_boxes[] = array(
		'id'         => 'homepage_metabox',
		'title'      => 'Homepage Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => __('About Photo', 'winter'),
				'desc' => __('Upload a photo. Recommended size: 280-194px','winter'),
				'id'   => $prefix . 'about_photo',
				'std'  => '',
				'type' => 'file',
			),
			array(
				'name' => __('About title','winter'),
				'desc' => __('The title','winter'),
				'id'   => $prefix . 'about_title',
				'std'  => 'About Us',
				'type' => 'text',
			),
			array(
				'name' => __('Description About Box','winter'),
				'desc' => __('Type the description','winter'),
				'id'   => $prefix . 'about_desc',
				'std'  => '',
				'type' => 'wysiwyg',
			),
			array(
				'name' => __('About Link','winter'),
				'desc' => __('The Link','winter'),
				'id'   => $prefix . 'about_link',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info title 1','winter'),
				'desc' => __('Type here the  Info Title 1','winter'),
				'id'   => $prefix . 'info_title_1',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info title 2','winter'),
				'desc' => __('Type here the  Info Title 2','winter'),
				'id'   => $prefix . 'info_title_2',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info title 3','winter'),
				'desc' => __('Type here the  Info Title 3','winter'),
				'id'   => $prefix . 'info_title_3',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info description 1','winter'),
				'desc' => __('Type here the info Description 1','winter'),
				'id'   => $prefix . 'info_description_1',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info description 2','winter'),
				'desc' => __('Type here the info Description 2','winter'),
				'id'   => $prefix . 'info_description_2',
				'std'  => '',
				'type' => 'text',
			),
			array(
				'name' => __('Info description 3','winter'),
				'desc' => __('Type here the info Description 3','winter'),
				'id'   => $prefix . 'info_description_3',
				'std'  => '',
				'type' => 'text',
			),
			
		)
	);

	return $meta_boxes;
}







