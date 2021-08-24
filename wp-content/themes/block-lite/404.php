<?php
/**
 * This page template is used to display a 404 error message.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

get_header(); ?>

<!-- BEGIN .row -->
<div class="row">

	<!-- BEGIN .content -->
	<div class="content">

		<!-- BEGIN .sixteen columns -->
		<section class="sixteen columns">

			<!-- BEGIN .entry-content -->
			<article class="entry-content">

				<h1><?php esc_html_e( 'Not Found, Error 404', 'block-lite' ); ?></h1>
				<p><?php esc_html_e( 'The page you are looking for no longer exists.', 'block-lite' ); ?></p>

			<!-- END .entry-content -->
			</article>

		<!-- END .sixteen columns -->
		</section>

	<!-- END .content -->
	</div>

<!-- END .row -->
</div>

<?php get_footer(); ?>
