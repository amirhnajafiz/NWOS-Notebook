<?php
/**
 * This template displays single post content.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php get_template_part( 'content/banner', 'image' ); ?>

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .content -->
		<div class="content">

			<!-- BEGIN .sixteen columns -->
			<section class="sixteen columns">

				<?php get_template_part( 'content/loop', 'post' ); ?>

			<!-- END .sixteen columns -->
			</section>

		<!-- END .content -->
		</div>

	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
