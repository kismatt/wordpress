<?php
/**
 * Template Name: Home Page
 *
 * @package Styled Lite
 */

get_header(); ?>

<div id="wrapper"> </div>                
	<div id="contentfull">
    <div id="frontoverlay"></div>
  		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  			<?php if ( has_post_thumbnail() ) { ?>
  				<div class="bg-img" style="background-image: url(<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'styled-homeimg' ); ?><?php echo esc_url ($image[0]); ?>);"> </div>
  			<?php } ?>
  			<div class="post" id="post-<?php the_ID(); ?>">
    			<h1 class="entry-title"><?php the_title(); ?></h1>
    			<div class="entry">
      				<?php the_content(); ?>
      				<?php edit_post_link(); ?>
      				<?php wp_link_pages(array('before' => '<p><strong>'. esc_html__( 'Pages:', 'styled-lite' ) .'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
      				<?php comments_template(); ?>
    			</div>
  			</div>
  		<?php endwhile; endif; ?>
	</div>
  		<?php
   			$args = array(
   							'posts_per_page' => -1,
							'paged'          => $paged,
							'post_type' => 'any',
							'post__not_in' => get_option( 'sticky_posts' ),
							'tax_query' => array(
                array(
                    'taxonomy' => 'post_tag',
                    'terms' => 'featured',
					'field' => 'slug'
                )
            )
   							);
  				$portfolio_entries = new WP_Query($args);
			?>

  			<?php if($portfolio_entries->have_posts()) : ?>
  				<div class="featuredcarousel">
    				<div class="owltitle">
      					<h2><?php echo esc_html(get_theme_mod( 'carousel_title', 'Featured Portfolio')); ?></h2>
    				</div>
    				<div class="owl-carousel">
      					<?php while($portfolio_entries->have_posts()) : $portfolio_entries->the_post() ?>
      						<a href="<?php the_permalink(); ?>">
      							<?php if ( has_post_thumbnail() ) : ?>
      								<?php the_post_thumbnail('styled-portcarousel'); ?>
      							<?php else : ?>
      								<img src="<?php echo esc_url(get_template_directory_uri() .'/images/featcarousel.jpg'); ?>" />
      							<?php endif ?>
      							<h2 class="entry-title"><?php the_title(); ?></h2>
      							<h3 class="carmore"><?php esc_html_e( 'View Details', 'styled-lite' ); ?></h3>
      						</a>
      					<?php endwhile ?>
    				</div>
  				</div>
  				<?php wp_reset_postdata(); ?>
  				<?php endif ?>
	
<?php get_footer(); ?>
