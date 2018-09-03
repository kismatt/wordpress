<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Styled Lite
 */

get_header(); ?>

<div id="wrapper">
<h1 class="entry-title">
          <?php the_title(); ?>
        </h1>
        <?php the_post_navigation(); ?>
  <div id="contentwrapper" class="animated fadeIn">
    <div id="content">
      <?php while ( have_posts() ) : the_post(); ?>
      <div <?php post_class(); ?>>
        <div class="entry">
          <?php the_content(); ?>
          <?php wp_link_pages(array('before' => '<p><strong>'. esc_html__( 'Pages:', 'styled-lite' ) .'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
          <?php edit_post_link(); ?>
          <?php echo get_the_tag_list('<p class="singletags">',' ','</p>'); ?>
         
          <?php comments_template(); ?>
        </div>
      </div>
      <?php endwhile; // end of the loop. ?>
    </div>
    <?php get_sidebar(); ?>
  </div>
</div>
<?php get_footer(); ?>
