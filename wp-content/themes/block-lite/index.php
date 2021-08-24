<?php
/**
 *
 * This template is used to display a blog. The content is displayed in post formats.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN #blog-posts-->
		<section id="blog-posts" class="block-post-layout clearfix">

			<?php get_template_part( 'content/loop', 'blog' ); ?>

		<!-- END #blog-posts -->
		</section>

	<!-- END .row -->
	</div>

	<?php if ( is_active_sidebar( 'home-bottom' ) ) { ?>

		<!-- BEGIN .row -->
		<div class="row">

			<section class="organic-ocw-container">
				<?php dynamic_sidebar( 'home-bottom' ); ?>
			</section>

		<!-- END .row -->
		</div>

	<?php } ?>

<!-- END .post class -->
</div>

<?php get_footer(); ?>
