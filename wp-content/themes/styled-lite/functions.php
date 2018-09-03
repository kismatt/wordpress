<?php
/**
 * Themes functions and definitions
 *
 * @package Styled Lite
 */
function styled_setup() {
	global $content_width;
		if ( ! isset( $content_width ) ){
      		$content_width = 1200;
		}
	load_theme_textdomain( 'styled-lite', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo');
	add_theme_support( 'customize-selective-refresh-widgets' );
	register_nav_menus( array(
			'main-menu' => esc_attr__( 'Primary Menu', 'styled-lite' ),
			'social' 	=> esc_attr__( 'Social', 'styled-lite' )
		) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff',
	) );
	add_theme_support( 'post-thumbnails' );
	add_image_size('styled-portcarousel', 400, 400, true);
	add_image_size('styled-homeimg', 2000, 600, true);
	add_image_size('styled-blogthumb', 640, 9999);
	add_image_size('styled-header', 2000, 600, true);
}
add_action( 'after_setup_theme', 'styled_setup' );


/**
 * Register widget areas.
 *
 */
function styled_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'styled-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Front Widget', 'styled-lite' ),
		'id'            => 'sidebar-2',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widgets', 'styled-lite' ),
		'id'            => 'sidebar-3',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'styled_widgets_init' );

/**
 * Register Open Sans Google fonts for Styled Lite.
 *
 * @return string
 */
function styled_open_sans_font_url() {
	$open_sans_font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'styled-lite' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'styled-lite' );

		if ( 'cyrillic' == $subset ) {
			$subsets .= ',cyrillic,cyrillic-ext';
		} elseif ( 'greek' == $subset ) {
			$subsets .= ',greek,greek-ext';
		} elseif ( 'vietnamese' == $subset ) {
			$subsets .= ',vietnamese';
		}

		$query_args = array(
			'family' => urlencode( 'Open Sans:300,400,600,700,800' ),
			'subset' => urlencode( $subsets ),
		);

		$open_sans_font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $open_sans_font_url;
}

/**
 * Register Hind Google font for Styled Lite.
 *
 * @return string
 */
function styled_hind_font_url() {
	$hind_font_url = '';

	/* translators: If there are characters in your language that are not supported
	   by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Hind font: on or off', 'styled-lite' ) ) {

		$hind_font_url = add_query_arg( 'family', urlencode( 'Hind:700' ), "https://fonts.googleapis.com/css" );
	}

	return $hind_font_url;
}


/**
 * Including theme scrips and styles.
 */
function styled_scripts_styles() {
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	if (!is_admin()) {
		wp_enqueue_script( 'jquery-mobile-menu', get_template_directory_uri() . '/js/menu.js', array( 'jquery' ), '', true );
		if(is_page_template('template-home-page.php')){
			wp_enqueue_script( 'jquery-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), '', true );
			
		}
		wp_enqueue_script( 'jquery-responsive-videos', get_template_directory_uri() . '/js/responsive-videos.js', array( 'jquery' ), '', true );
		wp_enqueue_style( 'styled-open-sans', styled_open_sans_font_url(), array(), null );
		wp_enqueue_style( 'styled-hind', styled_hind_font_url(), array(), null );
		wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.3' );
		wp_enqueue_style('animate', get_template_directory_uri().'/animate.css', array(), '1', 'screen');
		wp_enqueue_style( 'styled-style', get_stylesheet_uri());
	}
}
add_action( 'wp_enqueue_scripts', 'styled_scripts_styles' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';