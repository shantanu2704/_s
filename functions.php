<?php
/**
 * shantanu functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package shantanu
 */

if ( ! function_exists( 'shantanu_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function shantanu_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on shantanu, use a find and replace
		 * to change 'shantanu' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'shantanu', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'shantanu' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'shantanu_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'shantanu_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function shantanu_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'shantanu_content_width', 640 );
}
add_action( 'after_setup_theme', 'shantanu_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shantanu_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'shantanu' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'shantanu' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'shantanu_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function shantanu_scripts() {
	wp_enqueue_style( 'shantanu-style', get_stylesheet_uri() );

	wp_enqueue_script( 'shantanu-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'shantanu-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'shantanu_scripts' );

function shantanu_header_background_color_customizer_css() {
    ?>
    <style type="text/css">
        header.site-header { background-color: <?php echo get_theme_mod( 'header_background_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'shantanu_header_background_color_customizer_css' );

function shantanu_footer_background_color_customizer_css() {
    ?>
    <style type="text/css">
        footer.site-footer { background-color: <?php echo get_theme_mod( 'footer_background_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'shantanu_footer_background_color_customizer_css' );

function shantanu_main_background_color_customizer_css() {
    ?>
    <style type="text/css">
        .content-area { background-color: <?php echo get_theme_mod( 'main_background_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'shantanu_main_background_color_customizer_css' );

function shantanu_sidebar_background_color_customizer_css() {
    ?>
    <style type="text/css">
        aside.widget-area { background-color: <?php echo get_theme_mod( 'sidebar_background_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'shantanu_sidebar_background_color_customizer_css' );

function shantanu_link_color_customizer_css() {
    ?>
    <style type="text/css">
        a { color: <?php echo get_theme_mod( 'link_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'shantanu_link_color_customizer_css' );

function shantanu_link_visited_color_customizer_css() {
    ?>
    <style type="text/css">
        a:visited { color: <?php echo get_theme_mod( 'link_visited_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'shantanu_link_visited_color_customizer_css' );

function shantanu_link_hover_color_customizer_css() {
    ?>
    <style type="text/css">
        a:hover { color: <?php echo get_theme_mod( 'link_hover_color' ); ?>; }
    </style>
    <?php
}
add_action( 'wp_head', 'shantanu_link_hover_color_customizer_css' );
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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}
