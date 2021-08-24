<?php
/**
Template Name: Full Width
 *
 * This template is used to display full-width pages.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class( 'full-width' ); ?> id="page-<?php the_ID(); ?>">

	<?php get_template_part( 'content/banner', 'image' ); ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .sixteen columns -->
			<section class="sixteen columns">

				<?php get_template_part( 'content/loop', 'page' ); ?>

			<!-- END .sixteen columns -->
			</section>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
