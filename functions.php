<?php

/**
 * zeein functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zeein
 */

if (!defined('_ZEEIN_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_ZEEIN_VERSION', '1.0.0');
}

if (!function_exists('zeein_setup')):
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zeein_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on zeein, use a find and replace
		 * to change '_zeein' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('_zeein', get_template_directory() . '/languages');

		add_theme_support('editor-styles');
		add_editor_style('editor-style.css');
		add_theme_support('wp-block-styles');
		add_theme_support('align-wide');
		add_theme_support('revisions');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus([
			'menu-1' => esc_html__('Primary', '_zeein'),
			'menu-2' => esc_html__('Secondary', '_zeein'),
		]);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		]);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters('zeein_custom_background_args', [
				'default-color' => 'ffffff',
				'default-image' => '',
			])
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', [
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		]);

		add_post_type_support('page', 'excerpt');
	}
endif;
add_action('after_setup_theme', 'zeein_setup');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zeein_content_width()
{
	$GLOBALS['content_width'] = apply_filters('zeein_content_width', 640);
}
add_action('after_setup_theme', 'zeein_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zeein_widgets_init()
{
	register_sidebar([
		'name' => esc_html__('Sidebar', '_zeein'),
		'id' => 'sidebar-1',
		'description' => esc_html__('Add widgets here.', '_zeein'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h2 class="widget-title">',
		'after_title' => '</h2>',
	]);
}
add_action('widgets_init', 'zeein_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function zeein_scripts()
{
	wp_enqueue_style('zeein-style', get_stylesheet_uri(), [], _ZEEIN_VERSION);
	wp_style_add_data('zeein-style', 'rtl', 'replace');

	// Loads bundled frontend CSS.
	wp_enqueue_style(
		'_zeein-frontend',
		get_stylesheet_directory_uri() . '/assets/public/css/frontend.css'
	);

	wp_enqueue_script(
		'_zeein-frontend-scripts',
		get_template_directory_uri() . '/assets/public/js/frontend.js',
		[],
		'v1.0',
		true
	);

	wp_enqueue_script('wp-api');

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'zeein_scripts', 1000);

function zeein_scripts_admin()
{
	wp_enqueue_style(
		'_zeein-backend',
		get_stylesheet_directory_uri() . '/assets/public/css/backend.css'
	);
	wp_enqueue_script(
		'_zeein-backend-scripts',
		get_template_directory_uri() . '/assets/public/js/backend.js',
		[],
		'v1.0',
		true
	);
}
add_action('admin_enqueue_scripts', 'zeein_scripts_admin');

// footer query init
function footer_somethings()
{
	wp_localize_script('_zeein-frontend-scripts', 'frontendAjaxObject', [
		'ajaxurl' => admin_url('admin-ajax.php'),
		'themeurl' => get_template_directory_uri(),
		'rootUrl' => get_site_url(),
		'postsPerPage' => get_option('posts_per_page'),
	]);
}
add_action('wp_footer', 'footer_somethings');

/**
 * Implement the Custom Header feature.
 */
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
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/*************************************************************************/
/**
 * Author : zeein81@gmail.com
 */

add_filter('big_image_size_threshold', '__return_false');

/**
 * Custom nav walker & function & route
 */

require get_template_directory() . '/inc/cssmenu-navwalker.php';
require get_template_directory() . '/inc/template-func.php';
require get_template_directory() . '/inc/template-ajax.php';
require get_template_directory() . '/inc/template-admin.php';
