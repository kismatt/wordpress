<?php/** * The template for displaying page NOT FOUND. * * @package Risana */get_header(); ?> <div class="blue-header">	<div class="img-container news-header-bg" <?php if(get_theme_mod('bg_image_blog')) { ?> style="background-image: url('<?php echo esc_url(get_theme_mod('bg_image_blog')); ?>')"  <?php }  ?>></div>	<div class="container">		<h3 class="white with-shadow"><?php _e( 'Not found', 'risana' ); ?></h3>		<p class="white with-shadow"><?php _e( 'Sorry, but you are looking for something that isn\'t here.', 'risana' ); ?></p>	</div></div><?php get_footer(); ?>