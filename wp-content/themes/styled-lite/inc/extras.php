<?php
/**
 * Extra functions for this theme.
 *
 * @package Styled Lite
 */

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 * @return array
 */
function styled_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'styled_page_menu_args' );

/**
* Defines new blog excerpt length and link text.
*/
function styled_new_excerpt_length($length) {
	return 80;
}
add_filter('excerpt_length', 'styled_new_excerpt_length');

function styled_new_excerpt_more($more) {
	global $post;
	return '<a class="more-link" href="'.esc_url(get_permalink($post->ID)) . '"><span>'. __('Read More', 'styled-lite') .'</span></a>';
}
add_filter('excerpt_more', 'styled_new_excerpt_more');

/**
* Adds excerpt support for pages.
*/
add_post_type_support( 'page', 'excerpt');

/**
* Manages display of archive titles.
*/
function styled_get_the_archive_title( $title ) {
   if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_year() ) {
        $title = get_the_date( _x( 'Y', 'yearly archives date format','styled-lite' ) );
    } elseif ( is_month() ) {
        $title = get_the_date( _x( 'F Y', 'monthly archives date format','styled-lite' ) );
    } elseif ( is_day() ) {
        $title = get_the_date( _x( 'F j, Y', 'daily archives date format','styled-lite' ) );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } else {
        $title = esc_html__( 'Archives', 'styled-lite' );
    }
    return $title;
};
add_filter( 'get_the_archive_title', 'styled_get_the_archive_title', 10, 1 );
// display custom admin notice
function styled_admin_notice__success() {
    ?>
    <div class="notice notice-success is-dismissible">
        <p><?php esc_html_e( 'Thanks for installing Styled Lite! Want more features?'); ?> <a href="https://www.vivathemes.com/wordpress-theme/styled/" target="blank"><?php esc_html_e( 'Check out the Pro Version  &#8594;'); ?></a></p>
    </div>
    <?php
}
add_action( 'admin_notices', 'styled_admin_notice__success' );