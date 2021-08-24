<?php
/**
 * This template displays the archive loop.
 *
 * @package Block Lite
 * @since Block Lite 1.0
 */

?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<?php $thumb = ( '' !== get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'block-featured-medium' ) : false; ?>

	<!-- BEGIN .post class -->
	<article <?php post_class( 'post-holder' ); ?> id="post-<?php the_ID(); ?>">

		<?php if ( has_post_thumbnail() ) { ?>
			<a class="featured-img banner-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'block-lite' ), the_title_attribute( 'echo=0' ) ) ); ?>" style="background-image: url(<?php echo esc_url( $thumb[0] ); ?>);">
				<div class="img-title">
					<h2><?php the_title(); ?></h2>
					<p class="post-author"><?php block_lite_posted_on_no_link(); ?> <em><?php esc_html_e( 'by', 'block-lite' ); ?></em> <?php esc_html( the_author() ); ?></p>
				</div>
			</a>
		<?php } else { ?>
			<div class="featured-content">
				<div class="post-content">
					<h2><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p class="post-author"><?php block_lite_posted_on_no_link(); ?> <em><?php esc_html_e( 'by', 'block-lite' ); ?></em> <?php esc_html( the_author() ); ?></p>
					<div class="excerpt"><?php the_excerpt(); ?></div>
				</div>
			</div>
		<?php } ?>

	<!-- END .post class -->
	</article>

<?php endwhile; ?>

	<?php if ( $wp_query->max_num_pages > 1 ) { ?>

		<div class="pagination">
			<div class="nav-links">
				<?php previous_posts_link( '<i class="fa fa-angle-left" aria-hidden="true"></i>' ); ?>
				<?php next_posts_link( '<i class="fa fa-angle-right" aria-hidden="true"></i>' ); ?>
			</div>
		</div>

	<?php } ?>

<?php else : ?>

	<!-- BEGIN .entry-content -->
	<article class="entry-content">

		<?php get_template_part( 'content/content', 'none' ); ?>

	<!-- END .entry-content -->
	</article>

<?php endif; ?>
