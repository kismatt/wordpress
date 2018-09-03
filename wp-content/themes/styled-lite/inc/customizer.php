<?php
/**
 * Theme Customizer
 *
 * @package Styled Lite
 */
function styled_customize_register($wp_customize){
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	
	$wp_customize->add_section('styled_theme_options', array(
        'title'    => esc_html__('Theme Options', 'styled-lite'),
        'priority' => 125,
	));
	
	$wp_customize->add_setting(
    	'carousel_title',
    		array(
        		'default' => esc_html__('Featured Products', 'styled-lite'),
				'sanitize_callback' => 'sanitize_text_field',
				'transport' => 'postMessage'
    		)
	);
	
	$wp_customize->add_control(
    	'carousel_title',
    		array(
        		'label' => esc_html__('Carousel Title', 'styled-lite'),
        		'section' => 'styled_theme_options',
        		'type' => 'text'
    		)
	);
}
add_action('customize_register', 'styled_customize_register');
function styled_customizer_css() {
	wp_enqueue_style( 'styled-customizer', get_stylesheet_uri() );
		$more_link_color = get_background_color();
			$customizer_css = 'a.more-link span {
					background: #'.$more_link_color.';
			}';
		wp_add_inline_style( 'styled-customizer', $customizer_css );
}
add_action( 'wp_enqueue_scripts', 'styled_customizer_css' );

function styled_customize_preview_js() {
	wp_enqueue_script( 'styled_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'styled_customize_preview_js' );