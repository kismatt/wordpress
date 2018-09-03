<?php
/**
 * The main template file.
 *
 *
 * @package Styled Lite
 */

get_header(); ?>

<div id="wrapper">
<?php if( is_home() && get_option('page_for_posts') ) {
			$blog_page_id = get_option('page_for_posts');
			echo '<h1 class="entry-title">'.get_page($blog_page_id)->post_title.'</h1>';
		}
	?>
  <div id="contentwrapper" class="animated fadeIn">
  
    <div id="content">
      <?php if (have_posts()) : ?>
      <?php while ( have_posts() ) : the_post();
  				get_template_part( 'content', get_post_format() );
  			endwhile; ?>
      <?php the_posts_pagination(); ?> 
      <?php else : ?>
      <p class="center">
        <?php esc_html_e( 'You don&#39;t have any posts yet.', 'styled-lite' ); ?>
      </p>
      <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
