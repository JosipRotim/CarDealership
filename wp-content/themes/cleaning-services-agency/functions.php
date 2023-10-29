<?php
/**
 * Cleaning Services Agency functions and definitions
 *
 * @package Cleaning Services Agency
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

if ( ! function_exists( 'cleaning_services_agency_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function cleaning_services_agency_setup() {
	global $content_width;
	if ( ! isset( $content_width ) )
		$content_width = 680;

	load_theme_textdomain( 'cleaning-services-agency', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'custom-header', array(
		'default-text-color' => false,
		'header-text' => false,
	) );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'cleaning-services-agency' ),
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_editor_style( 'editor-style.css' );
}
endif; // cleaning_services_agency_setup
add_action( 'after_setup_theme', 'cleaning_services_agency_setup' );

function cleaning_services_agency_the_breadcrumb() {
	if (!is_home()) {
		echo '<a class="text-decoration-none fw-light" href="';
		echo esc_url( home_url() );
		echo '">';
		bloginfo('name');
		echo "</a> <i class='fas fa-chevron-right fs-6'></i> ";
		if (is_category() || is_single()) {
			the_category(' , ');
			if (is_single()) {
				echo " <i class='fas fa-chevron-right fs-6'></i> ";
				the_title();
			}
		} elseif (is_page()) {
			echo '<span class="text-decoration-none fw-light">';
			echo the_title();
			echo '</span>';
		}
	}
}

function cleaning_services_agency_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'cleaning-services-agency' ),
		'description'   => __( 'Appears on blog page sidebar', 'cleaning-services-agency' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'cleaning-services-agency' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'cleaning-services-agency' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'cleaning-services-agency' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'cleaning-services-agency' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );


	register_sidebar( array(
		'name'          => __( 'Footer', 'cleaning-services-agency' ),
		'description'   => __( 'Appears on footer', 'cleaning-services-agency' ),
		'id'            => 'footer-nav',
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-lg-3 col-mb-3 col-sm-6 col-xs-12">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h6 class="widget-title fw-normal fs-4 mt-4 mb-3">',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'cleaning_services_agency_widgets_init' );

function cleaning_services_agency_scripts() {
	
	wp_enqueue_style( 'bootstrap-css', esc_url(get_template_directory_uri())."/css/bootstrap.css" );
	wp_enqueue_style('cleaning-services-agency-style', get_stylesheet_uri(), array() );
		wp_style_add_data('cleaning-services-agency-style', 'rtl', 'replace');

	require get_parent_theme_file_path( '/inc/color-scheme/custom-color-control.php' );
	wp_add_inline_style( 'cleaning-services-agency-style',$cleaning_services_agency_color_scheme_css );
	
	wp_enqueue_style( 'owl.carousel-css', esc_url(get_template_directory_uri())."/css/owl.carousel.css" );
	wp_enqueue_style( 'cleaning-services-agency-default', esc_url(get_template_directory_uri())."/css/default.css" );
	
	wp_enqueue_style( 'cleaning-services-agency-style', get_stylesheet_uri() );
	wp_enqueue_script( 'owl.carousel-js', esc_url(get_template_directory_uri()). '/js/owl.carousel.js', array('jquery') );
	wp_enqueue_script( 'bootstrap-js', esc_url(get_template_directory_uri()). '/js/bootstrap.js', array('jquery') );
	wp_enqueue_script( 'cleaning-services-agency-theme', esc_url(get_template_directory_uri()) . '/js/theme.js' );
	wp_enqueue_style( 'font-awesome-css', esc_url(get_template_directory_uri())."/css/fontawesome-all.css" );
	wp_enqueue_style( 'cleaning-services-agency-block-style', esc_url( get_template_directory_uri() ).'/css/blocks.css' );
	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

// font family
	$cleaning_services_agency_body_font = esc_html(get_theme_mod('cleaning_services_agency_body_fonts'));

	if( $cleaning_services_agency_body_font ) {
		wp_enqueue_style( 'poppins', '//fonts.googleapis.com/css?family='. $cleaning_services_agency_body_font );
	} else {
		wp_enqueue_style( 'cleaning-services-agency-source-body', '//fonts.googleapis.com/css?family=Poppins:0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900');
	}
}
add_action( 'wp_enqueue_scripts', 'cleaning_services_agency_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Sanitization Callbacks.
 */
require get_template_directory() . '/inc/sanitization-callbacks.php';

/**
 * Webfont-Loader.
 */
require get_template_directory() . '/inc/wptt-webfont-loader.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/upgrade-to-pro.php';

/**
 * Theme Info Page.
 */
require get_template_directory() . '/inc/addon.php';

/**
 * Theme Info Page.
 */
if ( ! defined( 'CLEANING_SERVICES_AGENCY_PRO_NAME' ) ) {
	define( 'CLEANING_SERVICES_AGENCY_PRO_NAME', __( 'About Cleaning Services Agency', 'cleaning-services-agency' ));
}
if ( ! defined( 'CLEANING_SERVICES_AGENCY_THEME_PAGE' ) ) {
define('CLEANING_SERVICES_AGENCY_THEME_PAGE',__('https://www.theclassictemplates.com/themes/','cleaning-services-agency'));
}
if ( ! defined( 'CLEANING_SERVICES_AGENCY_SUPPORT' ) ) {
define('CLEANING_SERVICES_AGENCY_SUPPORT',__('https://wordpress.org/support/theme/cleaning-services-agency/','cleaning-services-agency'));
}
if ( ! defined( 'CLEANING_SERVICES_AGENCY_REVIEW' ) ) {
define('CLEANING_SERVICES_AGENCY_REVIEW',__('https://wordpress.org/support/theme/cleaning-services-agency/reviews/#new-post','cleaning-services-agency'));
}
if ( ! defined( 'CLEANING_SERVICES_AGENCY_PRO_DEMO' ) ) {
define('CLEANING_SERVICES_AGENCY_PRO_DEMO',__('https://www.theclassictemplates.com/trial/cleaning-services-agency-pro/','cleaning-services-agency'));
}
if ( ! defined( 'CLEANING_SERVICES_AGENCY_PREMIUM_PAGE' ) ) {
define('CLEANING_SERVICES_AGENCY_PREMIUM_PAGE',__('https://www.theclassictemplates.com/wp-themes/cleaning-services-wordpress-theme/','cleaning-services-agency'));
}
if ( ! defined( 'CLEANING_SERVICES_AGENCY_THEME_DOCUMENTATION' ) ) {
define('CLEANING_SERVICES_AGENCY_THEME_DOCUMENTATION',__('https://theclassictemplates.com/documentation/cleaning-services-agency-free/','cleaning-services-agency'));
}


if ( ! function_exists( 'cleaning_services_agency_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 */
function cleaning_services_agency_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;
