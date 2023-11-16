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

require get_template_directory() . '/inc/redux-options.php';

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

	add_action( 'after_setup_theme', 'winter_setup' );

	add_image_size( 'post_front', 235, 183, true );
	add_image_size( 'post_single', 370, 280, true );

	add_image_size( 'gallery_one', 222, 341, true );
	add_image_size( 'gallery_two', 222, 164, true );
	add_image_size( 'gallery_three', 456, 164, true );

	add_image_size( 'teacher_photo', 281, 162, true );

	add_image_size( 'room_photo', 212, 168, true );
}

add_action('after_setup_theme', 'winter_setup');


function create_posts_type(){
	register_post_type('winter_gallery', [
		'labels' => [
			'name' => __('Gallery', 'winter'),
			'singular_name' => __('Gallery', 'winter'),
		],
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-format-gallery',
		'menu_position' => 4,
		'supports' => ['title', 'editor', 'thumbnail']
	]);

	register_post_type('winter_teachers', [
		'labels' => [
			'name' => __('Teachers', 'winter'),
			'singular_name' => __('Teacher', 'winter'),
		],
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-welcome-learn-more',
		'menu_position' => 4,
		'supports' => ['title', 'editor', 'thumbnail'],
	]);

	register_post_type('winter_rooms', [
		'labels' => [
			'name' => __('Rooms', 'winter'),
			'singular_name' => __('Room', 'winter'), 
		],
		'public' => true,
		'has_archive' => true,
		'rewrite' => ['slug' => 'rooms'],
		'menu_icon' => 'dashicons-admin-home',
		'menu_position' => 4,
		'supports' => ['title', 'editor', 'thumbnail']
	]);
};
add_action('init', 'create_posts_type');



function winter_tax(){
	register_taxonomy(
		'gallery-category',
		'winter_gallery',
		[
			'label' => __('Category'),
			'rewrite' => ['slug' => 'gallery-category'],
			'hierarchical' => true
		]
	);
};
add_action('init', 'winter_tax');

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
	wp_enqueue_style( 'winter-custom', get_template_directory_uri() . '/assets/custom.css', array(), _S_VERSION , false);
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
		wp_enqueue_script( 'winter_metaboxes-gallery', get_template_directory_uri()  . '/assets/js/admin/metabox-gallery.js', array('jquery') );
	}
}
add_action('admin_enqueue_scripts', 'ale_add_scripts');



require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

require get_template_directory() . '/inc/breadcrumbs.php';

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
require get_template_directory() . '/inc/gallery-meta.php';


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




//---------------------------------------------------------------------------------------------------------------------------------------------------//



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


	$meta_boxes[] = array(
		'id'         => 'about_page_metabox',
		'title'      => 'About Page Options',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => __('Teachers section title', 'winter'),
				'desc' => __('Type the title for teachers section','winter'),
				'id'   => $prefix . 'teachers_section_title',
				'type' => 'text',
			)
		)
	);

	$meta_boxes[] = array(
		'id'         => 'teachers_metabox',
		'title'      => 'Teacher Socials Links',
		'pages'      => array( 'winter_teachers', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Fackebook', 'winter'),
				'desc' => __('Type the link on facebook','winter'),
				'id'   => $prefix . 'teacher_facebook',
				'type' => 'text',
			),
			array(
				'name' => __('Pinterest', 'winter'),
				'desc' => __('Type the link on pinterest','winter'),
				'id'   => $prefix . 'teacher_pinterest',
				'type' => 'text',
			),
			array(
				'name' => __('Twitter', 'winter'),
				'desc' => __('Type the link on twitter','winter'),
				'id'   => $prefix . 'teacher_twitter',
				'type' => 'text',
			),
		)
	);

	$meta_boxes[] = array(
		'id'         => 'contact_metabox',
		'title'      => 'Contacts',
		'pages'      => array( 'page', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'show_on'    => array( 'key' => 'page-template', 'value' => array('template-contact.php'), ), // Specific post templates to display this metabox
		'fields' => array(
			array(
				'name' => __('Address', 'winter'),
				'desc' => __('Type the address','winter'),
				'id'   => $prefix . 'contact_address',
				'type' => 'text',
			),
			array(
				'name' => __('Phone', 'winter'),
				'desc' => __('Type the phone','winter'),
				'id'   => $prefix . 'contact_phone',
				'type' => 'text',
			),
			array(
				'name' => __('Email', 'winter'),
				'desc' => __('Type the email','winter'),
				'id'   => $prefix . 'contact_email',
				'type' => 'text',
			),
			array(
				'name' => __('Contact Form Shortcode', 'winter'),
				'desc' => __('You can use any contact form Plugin. Genetate the Form and paste the shortcode here','winter'),
				'id'   => $prefix . 'contact_form_shortcode',
				'type' => 'textarea_code',
			),
		)
	);	

	return $meta_boxes;
}

function ale_get_share($type = 'fb', $permalink = false, $title = false) {
	if (!$permalink) {
		$permalink = get_permalink();
	}
	if (!$title) {
		$title = get_the_title();
	}
	switch ($type) {
		case 'twi':
			return 'http://twitter.com/home?status=' . $title . '+-+' . $permalink;
			break;
		case 'fb':
			return 'http://www.facebook.com/sharer.php?u=' . $permalink . '&t=' . $title;
			break;
		case 'goglp':
			return 'https://plus.google.com/share?url='. urlencode($permalink);
			break;
		case 'pin':
			return 'http://pinterest.com/pin/create/button/?url=' . $permalink;
			break;
		default:
			return '';
	}
}

function winter_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'article' == $args['style'] ) {
		$tag = 'article';
		$add_below = 'comment';
	} else {
		$tag = 'article';
		$add_below = 'comment';
	}

	?>
<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' :'parent') ?>
  id="comment-<?php comment_ID() ?>" itemscope itemtype="http://schema.org/Comment">

  <div class="<?php if($depth > 1){ echo 'reply'; } else { ?>comment<?php } ?> cf">
    <?php

		if($depth == 2){ ?><div class="enter"></div><?php } ?>
    <div class="avatar">
      <?php echo get_avatar( $comment, 105 ); ?>
      <h4><?php comment_author(); ?></h4>
    </div>
    <div class="text">
      <div class="top">
        <h4 class="date">Date<?php esc_html('Date','winter');?>: <?php comment_date() ?></h4>
        <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
      <div class="dotted-line"></div>

      <?php if ($comment->comment_approved == '0') : ?>
      <p class="comment-meta-item"><?php esc_html('Your comment is awaiting moderation.','bebe');?></p>
      <?php endif; ?>
      <?php comment_text() ?>

      <p>
        <?php edit_comment_link('<p class="comment-meta-item">'.esc_html__('Edit this comment','winter').'</p>','',''); ?>
      </p>
    </div>
  </div>

  <?php }

// end of awesome semantic comment

function winter_comment_close() {
	echo '</article>';
}