<?php
/**
 *
 * @package Styled Lite
 */

/**
 * Setup the WordPress core custom header feature.
 */
function styled_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'styled_custom_header_args', array(
		'width'         => 2000,
		'height'        => 700,
		'uploads'       => true,
		'default-text-color'     => 'ffffff',
		'wp-head-callback'       => 'styled_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'styled_custom_header_setup' );

if ( ! function_exists( 'styled_header_style' ) ) :
        function styled_header_style() {
                wp_enqueue_style( 'styled-style', get_stylesheet_uri() );
                $header_text_color = get_header_textcolor();
                $position = "absolute";
                $clip ="rect(1px, 1px, 1px, 1px)";
                if ( ! display_header_text() ) {
                        $custom_css = '.site-title{
                                position: '.$position.';
                                clip: '.$clip.'; 
                        }';
                } else{

                        $custom_css = 'h1.site-title  {
                                color: #' . $header_text_color . ';                     
                        }';
                }
                wp_add_inline_style( 'styled-style', $custom_css );
        }
        add_action( 'wp_enqueue_scripts', 'styled_header_style' );

endif;