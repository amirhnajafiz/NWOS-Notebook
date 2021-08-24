<?php
/**
 * The search template for our theme.
 *
 * This template is used to display search results.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .row -->
		<div class="row">

			<!-- BEGIN .block-post-layout -->
			<section id="infinite-container" class="block-post-layout clearfix">

				<?php get_template_part( 'content/loop', 'archive' ); ?>

			<!-- END .block-post-layout -->
			</section>

		<!-- END .row -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
