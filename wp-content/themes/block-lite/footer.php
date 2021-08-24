<?php
/**
 * The footer for our theme.
 * This template is used to generate the footer for the theme.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

?>

<!-- END .container -->
</main>

<!-- BEGIN .footer -->
<footer class="footer" role="contentinfo">

	<?php if ( is_active_sidebar( 'footer' ) ) { ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .footer-widgets -->
			<div class="footer-widgets clearfix">

				<?php dynamic_sidebar( 'footer' ); ?>

			<!-- END .footer-widgets -->
			</div>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

	<?php } ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .footer-information -->
			<div class="footer-information">

				<div class="align-left">

					<p><?php esc_html_e( 'Copyright', 'block-lite' ); ?> &copy; <?php echo esc_html( date( 'Y' ) ); ?> &middot; <?php esc_html_e( 'All Rights Reserved', 'block-lite' ); ?> &middot; <?php esc_html( bloginfo( 'name' ) ); ?></p>

					<?php if ( '' !== get_theme_mod( 'block_lite_footer_text' ) ) { ?>

						<p><span class="footer-site-info"><?php echo wp_kses_post( get_theme_mod( 'block_lite_footer_text' ) ); ?></span></p>

					<?php } else { ?>

						<p><?php printf( esc_html__( 'Theme: %1$s by %2$s', 'block-lite' ), 'Block', '<a href="http://organicthemes.com/">Organic Themes</a>' ); ?></p>

					<?php } ?>

				</div>

				<?php if ( has_nav_menu( 'social-menu' ) ) { ?>

				<nav class="align-right" role="navigation" aria-label="<?php esc_attr_e( 'Social Navigation', 'block-lite' ); ?>">

					<?php
					wp_nav_menu( array(
						'theme_location'  => 'social-menu',
						'title_li'        => '',
						'depth'           => 1,
						'container_class' => 'social-menu',
						'menu_class'      => 'social-icons',
						'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
					) );
					?>

				</nav>

				<?php } ?>

			<!-- END .footer-information -->
			</div>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .footer -->
</footer>

<!-- END #wrapper -->
</div>

<?php wp_footer(); ?>

</body>
</html>
