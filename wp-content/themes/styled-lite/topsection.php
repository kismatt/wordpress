<?php
/**
 * The Custom background.
 *
 *
 * @package Styled Lite
 */
?>

<div id="headerbg">
<div id="headeroverlay"></div>
  		<div id="headerimage" style="background-image: url(

		<?php
        if ( ((is_page () || is_single()) && has_post_thumbnail()) && (!(is_front_page()))) {
        		$featuredImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'styled-header' );
                echo $featuredImage;
		} elseif (is_home() && has_post_thumbnail(get_option('page_for_posts')) ) {
				$homeImage = wp_get_attachment_url( get_post_thumbnail_id(get_option('page_for_posts')), 'styled-header' );
            	echo $homeImage;
		} else {
        	header_image();
		} 
		?>
        );"></div>
</div>