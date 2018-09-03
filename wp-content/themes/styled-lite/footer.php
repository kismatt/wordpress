<?php
/**
 * The template for displaying the footer.
 *
 *
 * @package Styled Lite
 */
?>

<div id="footer">
  <?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
  <div id="footerinner">
    <div id="footerwidgets">
      <?php dynamic_sidebar( 'sidebar-3' ); ?>
    </div>
  </div>
  <?php endif ?>
  <div id="copyinfo">
    <?php if ( has_nav_menu( 'social' ) ) {
					wp_nav_menu(
						array(
							'theme_location'  => 'social',
							'container'       => 'div',
							'container_id'    => 'menu-social',
							'container_class' => 'menu',
							'menu_id'         => 'menu-social-items',
							'menu_class'      => 'menu-items',
							'depth'           => 1,
							'link_before'     => '<span class="screen-reader-text">',
							'link_after'      => '</span>',
							'fallback_cb'     => '',
						)
					);
	} ?>
     &copy; <?php echo date_i18n(__('Y','styled-lite')); ?>
    <?php bloginfo('name'); ?>
    . <a href="<?php echo esc_url( esc_html__( 'http://wordpress.org/', 'styled-lite' ) ); ?>"> <?php printf( esc_html__( 'Powered by %s.', 'styled-lite' ), 'WordPress' ); ?> </a> <?php printf( esc_html__( 'Theme by %1$s.', 'styled-lite' ), '<a href="http://www.vivathemes.com/" rel="designer">Viva Themes</a>' ); ?> </div>
</div>
</div>
<?php wp_footer(); ?>
</body></html>